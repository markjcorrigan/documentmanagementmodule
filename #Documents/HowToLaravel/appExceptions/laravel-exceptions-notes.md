# Laravel Exceptions - Complete Guide

## What Are Exceptions?

Exceptions are errors that occur when something goes wrong in your application. Instead of the app crashing or continuing with bad data, exceptions let you:

- **Stop execution** when something goes wrong
- **Handle errors gracefully** with try/catch
- **Return custom error pages** to users
- **Log errors** for debugging
- **Control error responses** (JSON for APIs, HTML for web)

### Why Use Custom Exceptions?

- **Clarity**: `PaymentFailedException` is clearer than generic `Exception`
- **Consistency**: Handle similar errors the same way
- **Maintainability**: Change error handling in one place
- **Custom Logic**: Different exceptions can render differently
- **API Responses**: Automatically return proper JSON responses

## File Locations

```
app/Exceptions/Handler.php              (Global exception handler)
app/Exceptions/PaymentFailedException.php  (Custom exception)
app/Exceptions/InsufficientFundsException.php
```

## The Exception Handler (Handler.php)

This file catches ALL exceptions in your app. It's where you decide what to do with them.

### Basic Handler Structure

```php
<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Exceptions that should not be reported (logged).
     */
    protected $dontReport = [
        // Add exception classes you don't want logged
    ];

    /**
     * A list of inputs that are never flashed to the session on validation exceptions.
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Custom reporting logic
        });

        $this->renderable(function (Throwable $e, $request) {
            // Custom rendering logic
        });
    }
}
```

## Creating Custom Exceptions

### Generate Exception Class

```bash
php artisan make:exception PaymentFailedException
```

### Basic Custom Exception

```php
<?php

namespace App\Exceptions;

use Exception;

class PaymentFailedException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public function __construct(string $message = "Payment processing failed")
    {
        parent::__construct($message);
    }
}
```

### Exception with Custom Properties

```php
<?php

namespace App\Exceptions;

use Exception;

class InsufficientFundsException extends Exception
{
    public float $requiredAmount;
    public float $availableAmount;

    public function __construct(float $required, float $available)
    {
        $this->requiredAmount = $required;
        $this->availableAmount = $available;
        
        $deficit = $required - $available;
        
        parent::__construct("Insufficient funds. Need $$deficit more.");
    }
}
```

### Exception with Custom Rendering

```php
<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    protected int $statusCode;
    protected array $errors;

    public function __construct(
        string $message,
        int $statusCode = 400,
        array $errors = []
    ) {
        parent::__construct($message);
        $this->statusCode = $statusCode;
        $this->errors = $errors;
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage(),
            'errors' => $this->errors,
        ], $this->statusCode);
    }
}
```

### Exception with Custom Reporting (Logging)

```php
<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class CriticalSystemException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        // Custom logging
        Log::critical('CRITICAL SYSTEM ERROR', [
            'message' => $this->getMessage(),
            'file' => $this->getFile(),
            'line' => $this->getLine(),
            'trace' => $this->getTraceAsString(),
        ]);
        
        // Send notification to admins
        // \Notification::send($admins, new CriticalErrorNotification($this));
    }
}
```

## Throwing Exceptions

### Basic Throw

```php
use App\Exceptions\PaymentFailedException;

public function processPayment()
{
    if ($paymentFails) {
        throw new PaymentFailedException();
    }
}
```

### Throw with Custom Message

```php
throw new PaymentFailedException("Card was declined");
```

### Throw with Data

```php
throw new InsufficientFundsException(
    required: 100.00,
    available: 75.50
);
```

### Conditional Throw

```php
throw_if($balance < $amount, InsufficientFundsException::class, $amount, $balance);

throw_unless($user->isAdmin(), UnauthorizedException::class);
```

## Catching Exceptions

### Try/Catch in Controller

```php
use App\Exceptions\PaymentFailedException;
use App\Exceptions\InsufficientFundsException;

public function checkout(Request $request)
{
    try {
        $order = $this->orderService->process($request->all());
        
        return redirect()->route('orders.show', $order)
            ->with('success', 'Order placed successfully!');
            
    } catch (InsufficientFundsException $e) {
        return back()->with('error', $e->getMessage());
        
    } catch (PaymentFailedException $e) {
        return back()->with('error', 'Payment failed. Please try again.');
        
    } catch (\Exception $e) {
        // Catch any other exception
        return back()->with('error', 'An error occurred. Please try again.');
    }
}
```

### Try/Catch in Service

```php
class PaymentService
{
    public function charge(User $user, float $amount): Payment
    {
        try {
            return $this->gateway->charge($user->card_token, $amount);
            
        } catch (GatewayException $e) {
            // Transform external exception to our exception
            throw new PaymentFailedException(
                "Unable to process payment: " . $e->getMessage()
            );
        }
    }
}
```

### Multiple Catch Blocks (Specific to General)

```php
try {
    $this->processOrder();
    
} catch (InsufficientFundsException $e) {
    // Handle insufficient funds
    Log::info('User lacks funds', ['user' => auth()->id()]);
    return back()->with('error', $e->getMessage());
    
} catch (PaymentFailedException $e) {
    // Handle payment failure
    Log::warning('Payment failed', ['error' => $e->getMessage()]);
    return back()->with('error', 'Payment processing failed');
    
} catch (\Exception $e) {
    // Catch all other exceptions
    Log::error('Unexpected error during checkout', [
        'error' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ]);
    return back()->with('error', 'An unexpected error occurred');
}
```

## Global Exception Handling (Handler.php)

### Rendering Specific Exceptions

```php
// In Handler.php

public function register(): void
{
    // Handle PaymentFailedException
    $this->renderable(function (PaymentFailedException $e, Request $request) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Payment failed',
                'error' => $e->getMessage()
            ], 402);
        }
        
        return redirect()->back()
            ->with('error', $e->getMessage());
    });
    
    // Handle InsufficientFundsException
    $this->renderable(function (InsufficientFundsException $e, Request $request) {
        return response()->json([
            'message' => 'Insufficient funds',
            'required' => $e->requiredAmount,
            'available' => $e->availableAmount,
            'deficit' => $e->requiredAmount - $e->availableAmount,
        ], 402);
    });
}
```

### Custom Reporting for Specific Exceptions

```php
// In Handler.php

public function register(): void
{
    // Don't log certain exceptions
    $this->dontReport([
        ValidationException::class,
        AuthenticationException::class,
    ]);
    
    // Custom reporting for specific exceptions
    $this->reportable(function (PaymentFailedException $e) {
        // Send to external service
        // Sentry::captureException($e);
        
        // Notify admins
        // Mail::to('admin@example.com')->send(new PaymentErrorNotification($e));
    });
    
    // Report but don't stop
    $this->reportable(function (InsufficientFundsException $e) {
        Log::info('User lacks funds', [
            'required' => $e->requiredAmount,
            'available' => $e->availableAmount
        ]);
        
        // Return false to continue to default reporting
        return false;
    });
}
```

### Ignore Specific Exceptions from Logging

```php
// In Handler.php

protected $dontReport = [
    ValidationException::class,
    AuthenticationException::class,
    AuthorizationException::class,
    HttpException::class,
    ModelNotFoundException::class,
    TokenMismatchException::class,
];
```

### Report with Context

```php
public function register(): void
{
    $this->reportable(function (Throwable $e) {
        if (app()->bound('sentry')) {
            app('sentry')->captureException($e);
        }
    })->stop(); // Don't continue to default reporting
}
```

## HTTP Exceptions (Built-in)

Laravel provides HTTP exceptions for common status codes:

### Throwing HTTP Exceptions

```php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

// 404 Not Found
abort(404);
abort_if($user === null, 404);
abort_unless($user->isActive(), 404, 'User account is inactive');

// 403 Forbidden
abort(403, 'Unauthorized action');

// 401 Unauthorized
abort(401);

// 500 Internal Server Error
abort(500, 'Something went wrong');

// Or throw directly
throw new NotFoundHttpException('Resource not found');
```

### Common HTTP Status Codes

```php
abort(400);  // Bad Request
abort(401);  // Unauthorized
abort(403);  // Forbidden
abort(404);  // Not Found
abort(405);  // Method Not Allowed
abort(419);  // CSRF Token Mismatch
abort(422);  // Unprocessable Entity
abort(429);  // Too Many Requests
abort(500);  // Internal Server Error
abort(503);  // Service Unavailable
```

## Custom Error Pages

### Create Error Views

```
resources/views/errors/404.blade.php
resources/views/errors/403.blade.php
resources/views/errors/500.blade.php
resources/views/errors/503.blade.php
```

### Custom 404 Page

```blade
<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
</head>
<body>
    <h1>404 - Page Not Found</h1>
    <p>The page you're looking for doesn't exist.</p>
    <a href="{{ url('/') }}">Go Home</a>
</body>
</html>
```

### Custom 500 Page

```blade
<!-- resources/views/errors/500.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Server Error</title>
</head>
<body>
    <h1>500 - Something went wrong</h1>
    <p>We're working on fixing this issue.</p>
    <a href="{{ url('/') }}">Go Home</a>
</body>
</html>
```

### Access Exception Data in Error Views

```blade
<!-- resources/views/errors/custom.blade.php -->
<h1>Error: {{ $exception->getMessage() }}</h1>

@if(config('app.debug'))
    <pre>{{ $exception->getTraceAsString() }}</pre>
@endif
```

## Form Request Exceptions

Form requests automatically throw `ValidationException` when validation fails:

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\InvalidOrderException;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Order::class);
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * Handle a failed authorization attempt.
     */
    protected function failedAuthorization()
    {
        throw new InvalidOrderException('You are not authorized to create orders');
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new InvalidOrderException(
            'Invalid order data: ' . $validator->errors()->first()
        );
    }
}
```

## Complete Working Examples

### Example 1: E-commerce Order Processing

#### Exception Classes

```php
<?php

namespace App\Exceptions;

use Exception;

class OrderException extends Exception
{
    //
}

class InsufficientStockException extends OrderException
{
    public int $requested;
    public int $available;

    public function __construct(int $requested, int $available)
    {
        $this->requested = $requested;
        $this->available = $available;
        
        parent::__construct(
            "Only {$available} units available, but {$requested} requested"
        );
    }
}

class PaymentFailedException extends OrderException
{
    public string $reason;

    public function __construct(string $reason = "Payment processing failed")
    {
        $this->reason = $reason;
        parent::__construct($reason);
    }
    
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'payment_failed',
                'message' => $this->getMessage(),
            ], 402);
        }
        
        return redirect()->back()
            ->with('error', 'Payment failed: ' . $this->reason)
            ->withInput();
    }
}

class InvalidDiscountCodeException extends OrderException
{
    public function __construct(string $code)
    {
        parent::__construct("Invalid discount code: {$code}");
    }
}
```

#### Service Using Exceptions

```php
<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Exceptions\InsufficientStockException;
use App\Exceptions\PaymentFailedException;
use App\Exceptions\InvalidDiscountCodeException;

class OrderService
{
    public function createOrder(array $data): Order
    {
        // Check stock
        $product = Product::findOrFail($data['product_id']);
        if ($product->stock < $data['quantity']) {
            throw new InsufficientStockException(
                requested: $data['quantity'],
                available: $product->stock
            );
        }
        
        // Validate discount code
        if (isset($data['discount_code'])) {
            $discount = $this->validateDiscountCode($data['discount_code']);
            if (!$discount) {
                throw new InvalidDiscountCodeException($data['discount_code']);
            }
        }
        
        // Calculate total
        $total = $product->price * $data['quantity'];
        if (isset($discount)) {
            $total -= $discount->amount;
        }
        
        // Process payment
        try {
            $payment = $this->paymentGateway->charge($data['payment_method'], $total);
        } catch (\Exception $e) {
            throw new PaymentFailedException($e->getMessage());
        }
        
        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
            'total' => $total,
            'payment_id' => $payment->id,
        ]);
        
        // Update stock
        $product->decrement('stock', $data['quantity']);
        
        return $order;
    }
}
```

#### Controller Catching Exceptions

```php
<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Exceptions\InsufficientStockException;
use App\Exceptions\PaymentFailedException;
use App\Exceptions\InvalidDiscountCodeException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'discount_code' => 'nullable|string',
        ]);

        try {
            $order = $this->orderService->createOrder($validated);
            
            return redirect()->route('orders.show', $order)
                ->with('success', 'Order placed successfully!');
                
        } catch (InsufficientStockException $e) {
            return back()
                ->with('error', "Sorry, only {$e->available} units available")
                ->withInput();
                
        } catch (InvalidDiscountCodeException $e) {
            return back()
                ->with('error', $e->getMessage())
                ->withInput();
                
        } catch (PaymentFailedException $e) {
            return back()
                ->with('error', 'Payment failed. Please check your payment details.')
                ->withInput();
                
        } catch (\Exception $e) {
            \Log::error('Order creation failed', [
                'error' => $e->getMessage(),
                'data' => $validated
            ]);
            
            return back()
                ->with('error', 'An unexpected error occurred. Please try again.')
                ->withInput();
        }
    }
}
```

### Example 2: API Exception Handler

```php
<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    protected int $statusCode;
    protected string $errorCode;
    protected array $errors;

    public function __construct(
        string $message,
        string $errorCode = 'api_error',
        int $statusCode = 400,
        array $errors = []
    ) {
        parent::__construct($message);
        $this->errorCode = $errorCode;
        $this->statusCode = $statusCode;
        $this->errors = $errors;
    }

    public function render(Request $request): JsonResponse
    {
        $response = [
            'success' => false,
            'error_code' => $this->errorCode,
            'message' => $this->getMessage(),
        ];
        
        if (!empty($this->errors)) {
            $response['errors'] = $this->errors;
        }
        
        if (config('app.debug')) {
            $response['debug'] = [
                'file' => $this->getFile(),
                'line' => $this->getLine(),
            ];
        }
        
        return response()->json($response, $this->statusCode);
    }
    
    public function report(): void
    {
        \Log::error('API Exception', [
            'code' => $this->errorCode,
            'message' => $this->getMessage(),
            'errors' => $this->errors,
        ]);
    }
}

// Specific API exceptions
class ResourceNotFoundException extends ApiException
{
    public function __construct(string $resource)
    {
        parent::__construct(
            message: "{$resource} not found",
            errorCode: 'resource_not_found',
            statusCode: 404
        );
    }
}

class ValidationApiException extends ApiException
{
    public function __construct(array $errors)
    {
        parent::__construct(
            message: 'Validation failed',
            errorCode: 'validation_error',
            statusCode: 422,
            errors: $errors
        );
    }
}

class UnauthorizedApiException extends ApiException
{
    public function __construct(string $message = 'Unauthorized')
    {
        parent::__construct(
            message: $message,
            errorCode: 'unauthorized',
            statusCode: 401
        );
    }
}
```

## Testing Exceptions

```php
<?php

namespace Tests\Feature;

use App\Exceptions\InsufficientStockException;
use App\Models\Product;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_throws_exception_when_insufficient_stock()
    {
        $product = Product::factory()->create(['stock' => 5]);
        
        $this->expectException(InsufficientStockException::class);
        $this->expectExceptionMessage('Only 5 units available');
        
        $this->orderService->createOrder([
            'product_id' => $product->id,
            'quantity' => 10,
        ]);
    }
    
    public function test_returns_error_response_on_payment_failure()
    {
        $product = Product::factory()->create(['stock' => 10]);
        
        $response = $this->post('/orders', [
            'product_id' => $product->id,
            'quantity' => 1,
            'payment_method' => 'invalid',
        ]);
        
        $response->assertStatus(302);
        $response->assertSessionHas('error');
    }
}
```

## Best Practices

### 1. Create Specific Exception Classes

```php
// Good - specific and clear
throw new InsufficientStockException(10, 5);
throw new PaymentDeclinedException();
throw new UserBannedException();

// Bad - generic and unclear
throw new Exception('Stock error');
throw new Exception('Payment error');
```

### 2. Use Exception Inheritance

```php
// Base exception
class OrderException extends Exception {}

// Specific exceptions extend base
class InsufficientStockException extends OrderException {}
class PaymentFailedException extends OrderException {}

// Catch all order-related exceptions
try {
    // ...
} catch (OrderException $e) {
    // Handles all order exceptions
}
```

### 3. Add Context to Exceptions

```php
// Good - includes useful data
throw new InsufficientStockException(
    requested: 10,
    available: 5
);

// Bad - no context
throw new Exception('Not enough stock');
```

### 4. Handle Exceptions at the Right Level

```php
// Service throws
class OrderService {
    public function createOrder() {
        throw new PaymentFailedException();
    }
}

// Controller catches and handles UI
class OrderController {
    public function store() {
        try {
            $this->orderService->createOrder();
        } catch (PaymentFailedException $e) {
            return back()->with('error', 'Payment failed');
        }
    }
}
```

### 5. Don't Catch and Ignore

```php
// Bad - silently fails
try {
    $this->doSomething();
} catch (Exception $e) {
    // Nothing here - exception is lost!
}

// Good - log it at minimum
try {
    $this->doSomething();
} catch (Exception $e) {
    \Log::error('Something failed', ['error' => $e->getMessage()]);
    throw $e; // Re-throw or handle properly
}
```

### 6. Return Proper HTTP Status Codes

```php
class InvalidInputException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage()
        ], 422); // Unprocessable Entity
    }
}

class UnauthorizedException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => 'Unauthorized'
        ], 401); // Unauthorized
    }
}
```

### 7. Use Type Hints

```php
// Good
catch (PaymentFailedException $e) {
    // IDE knows what $e is
}

// Bad
catch (Exception $e) {
    // Generic - less helpful
}
```

## Quick Reference

| Task | Code |
|------|------|
| Create exception | `php artisan make:exception ExceptionName` |
| Throw exception | `throw new CustomException('message')` |
| Throw if condition | `throw_if($condition, Exception::class)` |
| Throw unless condition | `throw_unless($condition, Exception::class)` |
| Abort with status | `abort(404, 'Not found')` |
| Abort if condition | `abort_if($user === null, 404)` |
| Abort unless condition | `abort_unless($user->isAdmin(), 403)` |
| Catch exception | `catch (CustomException $e) { }` |
| Render in exception | `public function render($request) { }` |
| Report in exception | `public function report() { }` |
| Don't report | Add to `$dontReport` in Handler |
| Custom error page | Create `resources/views/errors/404.blade.php` |

## Common Laravel Exceptions

| Exception | When to Use |
|-----------|-------------|
| `ModelNotFoundException` | Model not found in database |
| `ValidationException` | Form validation failed |
| `AuthenticationException` | User not authenticated |
| `AuthorizationException` | User not authorized (policies) |
| `TokenMismatchException` | CSRF token invalid |
| `ThrottleRequestsException` | Rate limit exceeded |
| `NotFoundHttpException` | 404 errors |
| `AccessDeniedHttpException` | 403 errors |
| `MethodNotAllowedHttpException` | Wrong HTTP method |

## Exception Flow

```
1. Something goes wrong
   ↓
2. throw new CustomException()
   ↓
3. Caught by try/catch? 
   YES → Handle locally
   NO  → Continue to step 4
   ↓
4. Caught by Handler.php renderable()?
   YES → Custom rendering
   NO  → Continue to step 5
   ↓
5. Does exception have render() method?
   YES → Use it
   NO  → Continue to step 6
   ↓
6. Default Laravel error handling
   - Production: Generic error page
   - Debug mode: Detailed error page
```
