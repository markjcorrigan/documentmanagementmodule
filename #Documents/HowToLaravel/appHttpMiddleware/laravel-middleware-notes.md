# Laravel Middleware - Complete Guide

## What Is Middleware?

Middleware is code that runs **before** or **after** an HTTP request reaches your controller. Think of it as a series of filters or layers that a request passes through.

### The Middleware Pipeline

```
Request → Middleware 1 → Middleware 2 → Middleware 3 → Controller → Response
                                                                         ↓
         Middleware 1 ← Middleware 2 ← Middleware 3 ← ← ← ← ← ← ← ← ←  ↓
```

Each middleware can:
- Inspect the request
- Modify the request
- Reject the request (before it reaches the controller)
- Modify the response
- Perform actions after the response

### Why Use Middleware?

- **Authentication**: Check if user is logged in
- **Authorization**: Check if user has permission
- **Logging**: Log every request
- **CORS**: Add CORS headers to responses
- **Rate Limiting**: Limit API requests
- **Input Sanitization**: Clean user input
- **Redirects**: Redirect based on conditions
- **API Version Checking**: Ensure correct API version
- **Maintenance Mode**: Block access during maintenance

### Common Use Cases

- Check if user is authenticated
- Verify user is admin/has specific role
- Log all API requests
- Add security headers to responses
- Check if user owns a resource
- Force HTTPS
- Verify API tokens
- Block banned users
- Track user activity

## File Locations

```
app/Http/Middleware/EnsureUserIsAdmin.php       (Custom middleware)
app/Http/Middleware/CheckSubscription.php
app/Http/Middleware/LogApiRequests.php
bootstrap/app.php                                (Register middleware)
```

## Creating Middleware

### Generate Middleware

```bash
php artisan make:middleware EnsureUserIsAdmin
```

This creates: `app/Http/Middleware/EnsureUserIsAdmin.php`

### Basic Middleware Structure

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Your middleware logic here
        
        // Pass request to next middleware/controller
        return $next($request);
    }
}
```

## Before vs After Middleware

### Before Middleware (Runs Before Controller)

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeforeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Perform action BEFORE request reaches controller
        
        // Example: Log request
        \Log::info('Request received', [
            'url' => $request->url(),
            'method' => $request->method()
        ]);
        
        // Example: Block access
        if ($request->has('blocked')) {
            abort(403, 'Access denied');
        }
        
        // Pass to next middleware/controller
        return $next($request);
    }
}
```

### After Middleware (Runs After Controller)

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AfterMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pass to next middleware/controller FIRST
        $response = $next($request);
        
        // Perform action AFTER controller has executed
        
        // Example: Add custom header
        $response->headers->set('X-Custom-Header', 'Value');
        
        // Example: Log response
        \Log::info('Response sent', [
            'status' => $response->status()
        ]);
        
        return $response;
    }
}
```

### Combined Before and After

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackingMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // BEFORE: Start timer
        $startTime = microtime(true);
        
        // Execute request
        $response = $next($request);
        
        // AFTER: Calculate duration and log
        $duration = microtime(true) - $startTime;
        \Log::info('Request completed', [
            'url' => $request->url(),
            'duration' => $duration
        ]);
        
        return $response;
    }
}
```

## Registering Middleware

In Laravel 11+, middleware is registered in `bootstrap/app.php`:

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global middleware (runs on every request)
        $middleware->append(\App\Http\Middleware\LogRequests::class);
        
        // Middleware aliases (for use in routes)
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
            'subscribed' => \App\Http\Middleware\CheckSubscription::class,
            'verified.email' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);
        
        // Middleware groups
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\TrackVisits::class,
        ]);
        
        $middleware->appendToGroup('api', [
            \App\Http\Middleware\ApiVersion::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
```

## Using Middleware in Routes

### Apply to Single Route

```php
use App\Http\Controllers\AdminController;

// Using alias
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('admin');

// Using class name
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(\App\Http\Middleware\EnsureUserIsAdmin::class);
```

### Apply Multiple Middleware

```php
Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware(['auth', 'admin', 'verified']);
```

### Apply to Route Group

```php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::get('/admin/settings', [SettingsController::class, 'index']);
});
```

### Apply in Controller

```php
<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        // Apply to all methods
        $this->middleware('admin');
        
        // Apply to specific methods
        $this->middleware('auth')->only(['edit', 'update', 'destroy']);
        
        // Apply except to specific methods
        $this->middleware('throttle:60,1')->except(['index', 'show']);
    }
}
```

## Middleware Parameters

Pass parameters to middleware for flexible logic:

### Define Middleware with Parameters

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  string  $role  The required role
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()->hasRole($role)) {
            abort(403, 'Unauthorized. Required role: ' . $role);
        }

        return $next($request);
    }
}
```

### Multiple Parameters

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission, string $resource = null): Response
    {
        $user = $request->user();
        
        if ($resource) {
            if (!$user->can($permission, $resource)) {
                abort(403);
            }
        } else {
            if (!$user->can($permission)) {
                abort(403);
            }
        }

        return $next($request);
    }
}
```

### Using Parameters in Routes

```php
// Single parameter
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('role:admin');

// Multiple parameters
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('permission:edit,post');

// Multiple middleware with parameters
Route::get('/posts', [PostController::class, 'index'])
    ->middleware(['auth', 'role:admin', 'verified']);
```

## Terminable Middleware

Middleware that runs after the response is sent to the browser:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerformanceMonitoring
{
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);
        
        $request->attributes->set('start_time', $startTime);
        
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void
    {
        $startTime = $request->attributes->get('start_time');
        $duration = microtime(true) - $startTime;
        
        // This runs AFTER response is sent
        // Good for: logging, analytics, cleanup
        \Log::info('Request performance', [
            'url' => $request->url(),
            'duration' => $duration,
            'memory' => memory_get_peak_usage(true),
            'status' => $response->getStatusCode(),
        ]);
    }
}
```

## Common Middleware Examples

### 1. Check User Role

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (!auth()->user()->isAdmin()) {
            abort(403, 'Access denied. Admin only.');
        }

        return $next($request);
    }
}
```

### 2. Check Subscription Status

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->hasActiveSubscription()) {
            return redirect()->route('subscription.expired')
                ->with('error', 'Your subscription has expired.');
        }

        return $next($request);
    }
}
```

### 3. Log API Requests

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogApiRequests
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        \Log::channel('api')->info('API Request', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'user_id' => auth()->id(),
            'status' => $response->status(),
            'duration' => defined('LARAVEL_START') ? microtime(true) - LARAVEL_START : null,
        ]);

        return $response;
    }
}
```

### 4. Force HTTPS

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->secure() && app()->environment('production')) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
```

### 5. Check Resource Ownership

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPostOwnership
{
    public function handle(Request $request, Closure $next): Response
    {
        $post = $request->route('post');
        
        if (!$post) {
            abort(404);
        }

        // Check if user owns the post or is admin
        if ($post->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'You do not own this post.');
        }

        return $next($request);
    }
}
```

### 6. API Version Check

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiVersion
{
    public function handle(Request $request, Closure $next): Response
    {
        $version = $request->header('API-Version', 'v1');
        
        $supportedVersions = ['v1', 'v2'];
        
        if (!in_array($version, $supportedVersions)) {
            return response()->json([
                'error' => 'Unsupported API version',
                'supported_versions' => $supportedVersions
            ], 400);
        }

        $request->attributes->set('api_version', $version);

        return $next($request);
    }
}
```

### 7. Block Banned Users

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfBanned
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_banned) {
            auth()->logout();
            
            return redirect()->route('login')
                ->with('error', 'Your account has been banned.');
        }

        return $next($request);
    }
}
```

### 8. Add Security Headers

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=()');

        return $response;
    }
}
```

### 9. Track User Activity

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackUserActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            auth()->user()->update([
                'last_seen_at' => now(),
                'last_ip' => $request->ip()
            ]);
        }

        return $next($request);
    }
}
```

### 10. Sanitize Input

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SanitizeInput
{
    public function handle(Request $request, Closure $next): Response
    {
        $input = $request->all();
        
        array_walk_recursive($input, function (&$value) {
            if (is_string($value)) {
                $value = strip_tags($value);
                $value = trim($value);
            }
        });
        
        $request->merge($input);

        return $next($request);
    }
}
```

## Complete Working Example: Role-Based Access

### Middleware: CheckUserRole.php

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  string  ...$roles  Allowed roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to continue.');
        }

        $user = auth()->user();

        // Check if user has any of the required roles
        if (!$user->hasAnyRole($roles)) {
            // API request
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized. Required roles: ' . implode(', ', $roles)
                ], 403);
            }

            // Web request
            abort(403, 'Unauthorized access.');
        }

        // Log access for audit
        \Log::info('Role-based access granted', [
            'user_id' => $user->id,
            'roles' => $roles,
            'url' => $request->url(),
        ]);

        return $next($request);
    }
}
```

### Register Middleware

```php
// bootstrap/app.php

->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'role' => \App\Http\Middleware\CheckUserRole::class,
    ]);
})
```

### Use in Routes

```php
// Single role
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('role:admin');

// Multiple roles (user needs ANY of these)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('role:admin,manager,supervisor');

// Group with role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::get('/admin/settings', [SettingsController::class, 'index']);
});

// Different roles for different actions
Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    
    Route::middleware('role:author,editor')->group(function () {
        Route::post('/posts', [PostController::class, 'store']);
        Route::put('/posts/{post}', [PostController::class, 'update']);
    });
    
    Route::middleware('role:admin')->group(function () {
        Route::delete('/posts/{post}', [PostController::class, 'destroy']);
    });
});
```

### User Model

```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
```

## Middleware Order Matters

Middleware executes in the order they're listed:

```php
// Order matters!
Route::middleware(['first', 'second', 'third'])->group(function () {
    // Request flows: first → second → third → controller
    // Response flows: controller → third → second → first
});
```

### Example: Auth Must Come Before Role Check

```php
// Correct - auth runs first, then role check
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Works correctly
});

// Wrong - role check runs before auth (will fail)
Route::middleware(['role:admin', 'auth'])->group(function () {
    // Error: trying to check role before user is authenticated
});
```

## Conditional Middleware

### Skip Middleware Based on Condition

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        // Skip for specific IPs (admin IPs)
        $allowedIps = ['123.456.789.0', '98.765.432.1'];
        
        if (in_array($request->ip(), $allowedIps)) {
            return $next($request);
        }

        // Skip for specific routes
        if ($request->is('health-check') || $request->is('status')) {
            return $next($request);
        }

        // Check maintenance mode
        if (app()->isDownForMaintenance()) {
            abort(503, 'Site is under maintenance. Please check back soon.');
        }

        return $next($request);
    }
}
```

## Testing Middleware

```php
<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    public function test_guest_cannot_access_admin_area()
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    public function test_regular_user_cannot_access_admin_area()
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(403);
    }

    public function test_admin_can_access_admin_area()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
    }

    public function test_banned_user_is_logged_out()
    {
        $user = User::factory()->create(['is_banned' => true]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_middleware_adds_security_headers()
    {
        $response = $this->get('/');

        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
    }
}
```

## Best Practices

### 1. Keep Middleware Focused

```php
// Good - single responsibility
class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return $next($request);
    }
}

// Bad - doing too much
class CheckEverything
{
    public function handle(Request $request, Closure $next): Response
    {
        // Checking auth, role, subscription, banned status, etc.
        // Too much in one middleware
    }
}
```

### 2. Return Early

```php
// Good - return early on failure
public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (!auth()->user()->isActive()) {
        abort(403);
    }

    return $next($request);
}

// Bad - nested conditions
public function handle(Request $request, Closure $next): Response
{
    if (auth()->check()) {
        if (auth()->user()->isActive()) {
            return $next($request);
        }
    }
}
```

### 3. Use Descriptive Names

```php
// Good - clear what it does
EnsureUserIsAdmin
CheckSubscription
LogApiRequests
ForceHttps

// Bad - unclear
Checker
Validator
Manager
```

### 4. Handle Both Web and API

```php
public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check()) {
        // API request
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        
        // Web request
        return redirect()->route('login');
    }

    return $next($request);
}
```

### 5. Use Parameters for Flexibility

```php
// Good - flexible with parameters
class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!auth()->user()->can($permission)) {
            abort(403);
        }
        return $next($request);
    }
}

// Usage: ->middleware('permission:edit-posts')

// Bad - hard-coded
class CheckCanEditPosts { /* ... */ }
class CheckCanDeletePosts { /* ... */ }
class CheckCanViewPosts { /* ... */ }
// Too many similar middleware classes
```

### 6. Log Important Actions

```php
public function handle(Request $request, Closure $next): Response
{
    if (!auth()->user()->isAdmin()) {
        \Log::warning('Unauthorized admin access attempt', [
            'user_id' => auth()->id(),
            'ip' => $request->ip(),
            'url' => $request->url()
        ]);
        
        abort(403);
    }

    return $next($request);
}
```

### 7. Provide Helpful Error Messages

```php
// Good - clear message
if (!auth()->user()->hasActiveSubscription()) {
    return redirect()->route('subscription.expired')
        ->with('error', 'Your subscription has expired. Please renew to continue.');
}

// Bad - generic message
if (!auth()->user()->hasActiveSubscription()) {
    abort(403);
}
```

### 8. Consider Performance

```php
// Bad - hitting database on every request
public function handle(Request $request, Closure $next): Response
{
    $settings = Settings::all(); // Database query on every request!
    // ...
}

// Good - cache expensive operations
public function handle(Request $request, Closure $next): Response
{
    $settings = cache()->remember('settings', 3600, function () {
        return Settings::all();
    });
    // ...
}
```

## Common Laravel Middleware

Laravel includes several built-in middleware:

```php
// Authentication
'auth' => \Illuminate\Auth\Middleware\Authenticate::class
'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class

// Authorization
'can' => \Illuminate\Auth\Middleware\Authorize::class

// Guest
'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class

// Email verification
'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class

// Rate limiting
'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class

// CORS
\Illuminate\Http\Middleware\HandleCors::class

// Signed routes
'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class

// Password confirmation
'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class
```

## Quick Reference

| Task | Code |
|------|------|
| Create middleware | `php artisan make:middleware MiddlewareName` |
| Register alias | Add to `bootstrap/app.php` |
| Apply to route | `->middleware('alias')` |
| Apply multiple | `->middleware(['auth', 'admin'])` |
| Apply to group | `Route::middleware(['auth'])->group(...)` |
| Apply in controller | `$this->middleware('auth')` |
| With parameters | `->middleware('role:admin')` |
| Before middleware | Logic before `$next($request)` |
| After middleware | Get response, modify, then return |
| Terminable | Add `terminate()` method |

## Middleware Flow Diagram

```
HTTP Request
     ↓
[Global Middleware]
     ↓
[Route Middleware] → [auth] → [admin] → [verified]
     ↓
[Controller]
     ↓
[Response Generated]
     ↓
[Middleware (After)]
     ↓
[Terminable Middleware]
     ↓
HTTP Response Sent
     ↓
[terminate() methods run]
```

## When to Use Middleware vs Other Solutions

### Use Middleware When:
- Need to check something on EVERY request to certain routes
- Working with HTTP requests/responses
- Need to run code before/after controller
- Want to reject requests based on conditions

### Use Route Model Binding When:
- Need to load a model based on route parameter
- Example: `Route::get('/posts/{post}', ...)` auto-loads Post model

### Use Policies When:
- Need to authorize specific actions on models
- Example: Can user edit THIS post?

### Use Form Requests When:
- Need to validate incoming data
- Example: Validate POST data before controller

### Use Service Classes When:
- Complex business logic
- Multiple steps of processing
- Example: Processing an order with payment, inventory, emails

## Common Middleware Patterns

```php
// Pattern 1: Check and redirect
if (!condition) {
    return redirect()->route('somewhere');
}

// Pattern 2: Check and abort
if (!condition) {
    abort(403, 'Message');
}

// Pattern 3: Modify request
$request->merge(['key' => 'value']);

// Pattern 4: Modify response
$response->headers->set('Header', 'Value');

// Pattern 5: Log and continue
\Log::info('Something happened');
return $next($request);

// Pattern 6: Measure performance
$start = microtime(true);
$response = $next($request);
$duration = microtime(true) - $start;
```
