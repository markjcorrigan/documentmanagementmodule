# Laravel Kernel & bootstrap/app.php - Complete Guide

## What Is the Kernel?

The Kernel is the **heart of your Laravel application**. It's the central hub that:
- Receives HTTP requests
- Loads the application
- Runs middleware
- Routes requests to controllers
- Returns responses

Think of it as the **gatekeeper and orchestrator** of your entire application.

## The Big Change in Laravel 11/12

### Before Laravel 11 (Old Way)

```
app/Http/Kernel.php           → HTTP request handling
app/Console/Kernel.php         → Console/Artisan commands
bootstrap/app.php              → Basic app bootstrapping
```

The old `app/Http/Kernel.php` was complex with hundreds of lines:

```php
<?php
// OLD WAY - app/Http/Kernel.php (Laravel 10 and earlier)

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global middleware (runs on every request)
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
```

### After Laravel 11/12 (New Way)

```
bootstrap/app.php              → Everything in one clean place!
```

The Kernel files are **gone** (well, hidden in the framework). Everything now happens in `bootstrap/app.php`:

```php
<?php
// NEW WAY - bootstrap/app.php (Laravel 11+)

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
        // Configure middleware here
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Configure exception handling here
    })
    ->create();
```

**Much cleaner and simpler!**

## Understanding bootstrap/app.php

### Basic Structure

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
        // Middleware configuration
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exception handling configuration
    })
    ->create();
```

### What Each Section Does

#### 1. `Application::configure()`
Sets up the base application with the project's root directory.

#### 2. `->withRouting()`
Defines where your route files are located.

#### 3. `->withMiddleware()`
Configures all middleware for your application.

#### 4. `->withExceptions()`
Configures exception handling and error reporting.

#### 5. `->create()`
Actually creates and returns the application instance.

## Configuring Middleware in bootstrap/app.php

### Global Middleware (Runs on Every Request)

```php
->withMiddleware(function (Middleware $middleware) {
    // Add global middleware (runs on EVERY request)
    $middleware->append(\App\Http\Middleware\LogRequests::class);
    
    // Multiple global middleware
    $middleware->append([
        \App\Http\Middleware\TrackVisits::class,
        \App\Http\Middleware\SecurityHeaders::class,
    ]);
    
    // Prepend (add to beginning instead of end)
    $middleware->prepend(\App\Http\Middleware\CheckMaintenanceMode::class);
})
```

### Middleware Groups

```php
->withMiddleware(function (Middleware $middleware) {
    // Add to 'web' group
    $middleware->appendToGroup('web', [
        \App\Http\Middleware\TrackVisits::class,
        \App\Http\Middleware\HandleInertiaRequests::class,
    ]);
    
    // Add to 'api' group
    $middleware->appendToGroup('api', [
        \App\Http\Middleware\ApiVersion::class,
        \App\Http\Middleware\LogApiRequests::class,
    ]);
    
    // Prepend to group
    $middleware->prependToGroup('web', \App\Http\Middleware\FirstMiddleware::class);
})
```

### Middleware Aliases

```php
->withMiddleware(function (Middleware $middleware) {
    // Define middleware aliases for use in routes
    $middleware->alias([
        'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
        'subscribed' => \App\Http\Middleware\CheckSubscription::class,
        'verified.email' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        'role' => \App\Http\Middleware\CheckRole::class,
        'permission' => \App\Http\Middleware\CheckPermission::class,
    ]);
})
```

### Replace Middleware

```php
->withMiddleware(function (Middleware $middleware) {
    // Replace default middleware with custom version
    $middleware->replace(
        \Illuminate\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CustomTrustProxies::class
    );
})
```

### Remove Middleware

```php
->withMiddleware(function (Middleware $middleware) {
    // Remove middleware from global stack
    $middleware->remove(\Illuminate\Http\Middleware\HandleCors::class);
    
    // Remove from specific group
    $middleware->removeFromGroup('web', \App\Http\Middleware\VerifyCsrfToken::class);
})
```

### Skip Middleware for Specific Routes

```php
->withMiddleware(function (Middleware $middleware) {
    // Skip CSRF verification for specific routes
    $middleware->validateCsrfTokens(except: [
        'stripe/*',
        'webhook/*',
    ]);
    
    // Skip all middleware for specific routes
    $middleware->skipWhen(
        fn ($request) => $request->is('admin/*') && app()->environment('local')
    );
})
```

### Priority Middleware (Control Order)

```php
->withMiddleware(function (Middleware $middleware) {
    // Set middleware execution priority
    $middleware->priority([
        \App\Http\Middleware\First::class,
        \App\Http\Middleware\Second::class,
        \App\Http\Middleware\Third::class,
    ]);
})
```

## Complete Middleware Configuration Example

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
        $middleware->append([
            \App\Http\Middleware\LogRequests::class,
            \App\Http\Middleware\SecurityHeaders::class,
        ]);
        
        // Web middleware group
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\TrackVisits::class,
            \App\Http\Middleware\HandleInertiaRequests::class,
        ]);
        
        // API middleware group
        $middleware->appendToGroup('api', [
            \App\Http\Middleware\ApiVersion::class,
            \App\Http\Middleware\LogApiRequests::class,
        ]);
        
        // Middleware aliases
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
            'subscribed' => \App\Http\Middleware\CheckSubscription::class,
            'role' => \App\Http\Middleware\CheckRole::class,
            'permission' => \App\Http\Middleware\CheckPermission::class,
            'banned' => \App\Http\Middleware\CheckIfBanned::class,
        ]);
        
        // Skip CSRF for webhooks
        $middleware->validateCsrfTokens(except: [
            'webhook/*',
            'stripe/*',
            'paypal/ipn',
        ]);
        
        // Middleware priority
        $middleware->priority([
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\Authenticate::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Illuminate\Auth\Middleware\Authorize::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exception handling configuration
    })
    ->create();
```

## Configuring Routing

### Basic Routing Configuration

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
```

### Custom Route Files

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    channels: __DIR__.'/../routes/channels.php',
    health: '/up',
    then: function () {
        // Load additional route files
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
            
        Route::middleware('api')
            ->prefix('api/v2')
            ->group(base_path('routes/api-v2.php'));
    }
)
```

### API Route Configuration

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
    apiPrefix: 'api/v1',  // Custom API prefix
    then: function () {
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api.php'));
    }
)
```

### Disable Specific Routes

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    // No API routes
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
```

## Exception Handling Configuration

### Basic Exception Handling

```php
->withExceptions(function (Exceptions $exceptions) {
    // Custom exception reporting
    $exceptions->report(function (InvalidOrderException $e) {
        // Log to external service
        // \Sentry::captureException($e);
    });
    
    // Custom exception rendering
    $exceptions->render(function (InvalidOrderException $e, $request) {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        
        return response()->view('errors.invalid-order', ['exception' => $e], 400);
    });
})
```

### Stop Exception Reporting

```php
->withExceptions(function (Exceptions $exceptions) {
    // Don't report these exceptions
    $exceptions->dontReport([
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Validation\ValidationException::class,
    ]);
    
    // Stop reporting after handling
    $exceptions->report(function (CustomException $e) {
        \Log::critical('Custom exception occurred', [
            'message' => $e->getMessage(),
        ]);
    })->stop();
})
```

### Throttle Exception Reporting

```php
->withExceptions(function (Exceptions $exceptions) {
    // Only report same exception once per minute
    $exceptions->throttle(function (CustomException $e) {
        return 'custom-exception-' . $e->getCode();
    });
})
```

### Custom Error Pages

```php
->withExceptions(function (Exceptions $exceptions) {
    // Use custom error pages
    $exceptions->respond(function (Response $response, Throwable $exception, Request $request) {
        if ($response->getStatusCode() === 404) {
            return response()->view('errors.404', [], 404);
        }
        
        return $response;
    });
})
```

## Complete bootstrap/app.php Example

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // Admin routes
            Route::middleware(['web', 'auth', 'admin'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
                
            // API v2 routes
            Route::middleware('api')
                ->prefix('api/v2')
                ->name('api.v2.')
                ->group(base_path('routes/api-v2.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        // === GLOBAL MIDDLEWARE ===
        $middleware->append([
            \App\Http\Middleware\SecurityHeaders::class,
            \App\Http\Middleware\LogRequests::class,
        ]);
        
        // === WEB MIDDLEWARE GROUP ===
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\TrackVisits::class,
            \App\Http\Middleware\CheckIfBanned::class,
        ]);
        
        // === API MIDDLEWARE GROUP ===
        $middleware->appendToGroup('api', [
            \App\Http\Middleware\ApiVersion::class,
            \App\Http\Middleware\LogApiRequests::class,
        ]);
        
        // === MIDDLEWARE ALIASES ===
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
            'subscribed' => \App\Http\Middleware\CheckSubscription::class,
            'role' => \App\Http\Middleware\CheckRole::class,
            'permission' => \App\Http\Middleware\CheckPermission::class,
            'verified.email' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);
        
        // === CSRF EXCEPTIONS ===
        $middleware->validateCsrfTokens(except: [
            'webhook/*',
            'stripe/*',
            'paypal/ipn',
            'api/*',
        ]);
        
        // === MIDDLEWARE PRIORITY ===
        $middleware->priority([
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\Authenticate::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
            \Illuminate\Auth\Middleware\Authorize::class,
        ]);
        
        // === CONDITIONAL MIDDLEWARE ===
        $middleware->when(
            fn (Request $request) => $request->is('admin/*'),
            \App\Http\Middleware\AdminLogger::class
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // === CUSTOM EXCEPTION REPORTING ===
        $exceptions->report(function (\App\Exceptions\PaymentFailedException $e) {
            \Log::error('Payment failed', [
                'user_id' => auth()->id(),
                'amount' => $e->amount,
                'message' => $e->getMessage(),
            ]);
        });
        
        // === CUSTOM EXCEPTION RENDERING ===
        $exceptions->render(function (\App\Exceptions\ApiException $e, Request $request) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], $e->getStatusCode());
        });
        
        // === DON'T REPORT ===
        $exceptions->dontReport([
            \Illuminate\Auth\AuthenticationException::class,
            \Illuminate\Validation\ValidationException::class,
        ]);
        
        // === THROTTLE REPORTING ===
        $exceptions->throttle(function (\App\Exceptions\ApiRateLimitException $e) {
            return 'api-rate-limit-' . auth()->id();
        });
        
        // === CUSTOM ERROR PAGES ===
        $exceptions->respond(function (Response $response, Throwable $exception, Request $request) {
            if (app()->environment('production')) {
                if ($response->getStatusCode() === 404) {
                    return response()->view('errors.404', [], 404);
                }
                
                if ($response->getStatusCode() === 500) {
                    return response()->view('errors.500', [], 500);
                }
            }
            
            return $response;
        });
    })
    ->create();
```

## Request Lifecycle (What Happens When a Request Comes In)

### The Flow

```
1. Browser sends HTTP request to server
         ↓
2. public/index.php receives request
         ↓
3. bootstrap/app.php creates Application
         ↓
4. Kernel receives request
         ↓
5. Global Middleware runs (in order)
         ↓
6. Router matches request to route
         ↓
7. Route Middleware runs (web or api group + any route-specific)
         ↓
8. Controller method executes
         ↓
9. Response generated
         ↓
10. Middleware runs in reverse (after middleware)
         ↓
11. Response sent to browser
         ↓
12. Terminable middleware runs (after response sent)
```

### Visual Diagram

```
HTTP Request
    ↓
[public/index.php]
    ↓
[bootstrap/app.php] → Creates Application
    ↓
[Kernel] → Bootstraps framework
    ↓
[Global Middleware]
  - SecurityHeaders
  - LogRequests
    ↓
[Router] → Matches route
    ↓
[Route Middleware]
  - web/api group
  - auth
  - admin
    ↓
[Controller]
  - Store user
  - Return response
    ↓
[Response]
    ↓
[After Middleware] (reverse order)
    ↓
[Terminable Middleware]
    ↓
HTTP Response to Browser
```

## Migrating from Laravel 10 to Laravel 11/12

### Old Kernel (Laravel 10)

```php
// app/Http/Kernel.php
protected $middleware = [
    \App\Http\Middleware\TrustProxies::class,
];

protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
    ],
];

protected $middlewareAliases = [
    'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
];
```

### New bootstrap/app.php (Laravel 11/12)

```php
// bootstrap/app.php
->withMiddleware(function (Middleware $middleware) {
    // Global middleware
    $middleware->append(\App\Http\Middleware\TrustProxies::class);
    
    // Web group
    $middleware->appendToGroup('web', [
        \App\Http\Middleware\EncryptCookies::class,
    ]);
    
    // Aliases
    $middleware->alias([
        'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
    ]);
})
```

## Advanced Configuration

### Environment-Specific Configuration

```php
->withMiddleware(function (Middleware $middleware) {
    // Only in production
    if (app()->environment('production')) {
        $middleware->append(\App\Http\Middleware\ForceHttps::class);
    }
    
    // Only in local
    if (app()->environment('local')) {
        $middleware->append(\App\Http\Middleware\DebugBar::class);
    }
})
```

### Conditional Middleware Based on Request

```php
->withMiddleware(function (Middleware $middleware) {
    // Apply middleware only to specific routes
    $middleware->when(
        fn (Request $request) => $request->is('admin/*'),
        \App\Http\Middleware\AdminLogger::class
    );
    
    // Skip middleware for specific routes
    $middleware->skipWhen(
        fn (Request $request) => $request->is('health-check'),
        \App\Http\Middleware\Authenticate::class
    );
})
```

### Multiple Routing Files by Domain

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
    then: function () {
        // Admin subdomain
        Route::domain('admin.example.com')
            ->middleware('web')
            ->group(base_path('routes/admin.php'));
            
        // API subdomain
        Route::domain('api.example.com')
            ->middleware('api')
            ->group(base_path('routes/api.php'));
            
        // Blog subdomain
        Route::domain('blog.example.com')
            ->middleware('web')
            ->group(base_path('routes/blog.php'));
    }
)
```

## Best Practices

### 1. Keep bootstrap/app.php Organized

```php
// Good - organized with comments
->withMiddleware(function (Middleware $middleware) {
    // === GLOBAL MIDDLEWARE ===
    $middleware->append([...]);
    
    // === WEB GROUP ===
    $middleware->appendToGroup('web', [...]);
    
    // === API GROUP ===
    $middleware->appendToGroup('api', [...]);
    
    // === ALIASES ===
    $middleware->alias([...]);
})

// Bad - everything mixed together
->withMiddleware(function (Middleware $middleware) {
    $middleware->append(\App\Http\Middleware\Something::class);
    $middleware->alias(['admin' => \App\Http\Middleware\Admin::class]);
    $middleware->appendToGroup('web', [\App\Http\Middleware\Other::class]);
})
```

### 2. Use Descriptive Middleware Aliases

```php
// Good
$middleware->alias([
    'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
    'subscribed' => \App\Http\Middleware\CheckSubscription::class,
    'verified.email' => \App\Http\Middleware\EnsureEmailIsVerified::class,
]);

// Bad
$middleware->alias([
    'a' => \App\Http\Middleware\EnsureUserIsAdmin::class,
    's' => \App\Http\Middleware\CheckSubscription::class,
]);
```

### 3. Group Related Middleware

```php
// Good - related middleware together
$middleware->appendToGroup('api', [
    \App\Http\Middleware\ApiVersion::class,
    \App\Http\Middleware\LogApiRequests::class,
    \App\Http\Middleware\ValidateApiToken::class,
]);

// Bad - scattered
$middleware->appendToGroup('api', [\App\Http\Middleware\ApiVersion::class]);
$middleware->appendToGroup('api', [\App\Http\Middleware\LogApiRequests::class]);
$middleware->appendToGroup('api', [\App\Http\Middleware\ValidateApiToken::class]);
```

### 4. Be Careful with Middleware Order

```php
// Good - correct order (auth before role check)
$middleware->priority([
    \Illuminate\Session\Middleware\StartSession::class,
    \App\Http\Middleware\Authenticate::class,
    \App\Http\Middleware\CheckRole::class,
]);

// Bad - wrong order (checking role before authentication)
$middleware->priority([
    \App\Http\Middleware\CheckRole::class,
    \App\Http\Middleware\Authenticate::class,
]);
```

### 5. Use Environment Checks Wisely

```php
// Good - specific environments
if (app()->environment('production')) {
    $middleware->append(\App\Http\Middleware\ForceHttps::class);
}

// Bad - negating production (unclear)
if (!app()->environment('production')) {
    // What environments does this cover?
}
```

## Common Patterns

### Pattern 1: Multi-Tenant Application

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    then: function () {
        // Tenant routes with subdomain
        Route::domain('{tenant}.example.com')
            ->middleware(['web', 'tenant'])
            ->group(base_path('routes/tenant.php'));
    }
)
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'tenant' => \App\Http\Middleware\IdentifyTenant::class,
    ]);
})
```

### Pattern 2: API Versioning

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    then: function () {
        // API v1
        Route::prefix('api/v1')
            ->middleware(['api', 'api.v1'])
            ->group(base_path('routes/api-v1.php'));
            
        // API v2
        Route::prefix('api/v2')
            ->middleware(['api', 'api.v2'])
            ->group(base_path('routes/api-v2.php'));
    }
)
```

### Pattern 3: Admin Panel

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    then: function () {
        // Admin routes
        Route::prefix('admin')
            ->name('admin.')
            ->middleware(['web', 'auth', 'admin'])
            ->group(base_path('routes/admin.php'));
    }
)
```

### Pattern 4: Localization

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->appendToGroup('web', [
        \App\Http\Middleware\SetLocale::class,
    ]);
})

->withRouting(
    then: function () {
        // Localized routes
        Route::prefix('{locale}')
            ->where(['locale' => '[a-z]{2}'])
            ->middleware('web')
            ->group(base_path('routes/web.php'));
    }
)
```

## Quick Reference

| Task | Code |
|------|------|
| Add global middleware | `$middleware->append(Class::class)` |
| Add to group | `$middleware->appendToGroup('web', [])` |
| Create alias | `$middleware->alias(['name' => Class::class])` |
| Remove middleware | `$middleware->remove(Class::class)` |
| Replace middleware | `$middleware->replace(Old::class, New::class)` |
| Skip CSRF | `$middleware->validateCsrfTokens(except: [])` |
| Set priority | `$middleware->priority([])` |
| Conditional | `$middleware->when(fn() => true, Class::class)` |
| Add route file | Use `then:` in `withRouting()` |
| Custom exception | `$exceptions->render(fn() => response())` |
| Don't report | `$exceptions->dontReport([])` |

## Key Takeaways

1. **No more app/Http/Kernel.php** - Everything is in `bootstrap/app.php`
2. **Cleaner and simpler** - Less boilerplate, more readable
3. **Same functionality** - Just organized differently
4. **Middleware order matters** - Use `priority()` to control
5. **Use descriptive aliases** - Makes routes more readable
6. **Organize by sections** - Global, groups, aliases, etc.
7. **Comment your code** - Make it clear what each section does
8. **Environment-specific** - Use `app()->environment()` checks
9. **Test thoroughly** - Middleware changes affect entire app
10. **Migration is straightforward** - Just move config from Kernel to bootstrap/app.php

## Summary

The Laravel 11/12 Kernel changes simplify application configuration by:
- Removing separate Kernel files
- Consolidating everything in `bootstrap/app.php`
- Providing a cleaner, more fluent API
- Making middleware configuration more intuitive
- Reducing boilerplate code

The functionality is the same - it's just organized better!
