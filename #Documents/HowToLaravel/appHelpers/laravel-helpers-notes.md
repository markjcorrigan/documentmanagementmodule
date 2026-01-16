# Laravel Helpers - Complete Guide

## What Are Helpers?

Helpers are simple PHP functions that you can use anywhere in your Laravel application. They're global utility functions that don't belong to a specific class. Think of them as your personal toolbox of reusable functions.

### Why Use Helpers?

- **Convenience**: Use functions anywhere without importing classes
- **Reusability**: Write once, use everywhere
- **Readability**: `format_price(1000)` is cleaner than `(new PriceFormatter)->format(1000)`
- **Organization**: Group related utilities together
- **DRY Principle**: Avoid repeating the same logic

### Common Use Cases

- Formatting (dates, prices, phone numbers)
- String manipulation (slugs, excerpts)
- Array operations
- File operations
- Data transformations
- Conditional logic shortcuts
- Business logic shortcuts

## File Location

```
app/Helpers/helpers.php          (General helpers)
app/Helpers/DateHelpers.php      (Date-specific helpers)
app/Helpers/StringHelpers.php    (String-specific helpers)
app/Helpers/PriceHelpers.php     (Price-specific helpers)
```

**Note**: Unlike Commands, Events, and Exceptions, the Helpers directory is NOT created by default. You need to create it yourself.

## Setting Up Helpers

### Step 1: Create the Helpers Directory

```bash
mkdir app/Helpers
```

### Step 2: Create a Helper File

```bash
touch app/Helpers/helpers.php
```

### Step 3: Autoload the Helper File

#### Option A: Using composer.json (Recommended)

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        },
        "files": [
            "app/Helpers/helpers.php"
        ]
    }
}
```

Then run:
```bash
composer dump-autoload
```

#### Option B: Create a Service Provider

```bash
php artisan make:provider HelperServiceProvider
```

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Load all PHP files in the Helpers directory
        foreach (glob(app_path('Helpers/*.php')) as $file) {
            require_once $file;
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
```

Register in `config/app.php`:

```php
'providers' => [
    // ...
    App\Providers\HelperServiceProvider::class,
],
```

## Basic Helper Structure

```php
<?php

// app/Helpers/helpers.php

if (!function_exists('format_price')) {
    /**
     * Format a price with currency symbol.
     *
     * @param float $price
     * @param string $currency
     * @return string
     */
    function format_price(float $price, string $currency = 'USD'): string
    {
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
        ];
        
        $symbol = $symbols[$currency] ?? $currency;
        
        return $symbol . number_format($price, 2);
    }
}

if (!function_exists('greeting')) {
    /**
     * Get a greeting based on time of day.
     *
     * @return string
     */
    function greeting(): string
    {
        $hour = now()->hour;
        
        if ($hour < 12) {
            return 'Good morning';
        } elseif ($hour < 18) {
            return 'Good afternoon';
        } else {
            return 'Good evening';
        }
    }
}
```

## Why `if (!function_exists())`?

The `if (!function_exists())` check prevents errors if:
- The function is defined elsewhere
- The file is included multiple times
- Laravel's built-in helpers have the same name

**Always wrap your helpers in this check!**

## Common Helper Patterns

### String Helpers

```php
<?php

// app/Helpers/StringHelpers.php

if (!function_exists('str_limit_words')) {
    /**
     * Limit a string to a certain number of words.
     *
     * @param string $text
     * @param int $limit
     * @param string $end
     * @return string
     */
    function str_limit_words(string $text, int $limit = 50, string $end = '...'): string
    {
        $words = explode(' ', $text);
        
        if (count($words) <= $limit) {
            return $text;
        }
        
        return implode(' ', array_slice($words, 0, $limit)) . $end;
    }
}

if (!function_exists('generate_username')) {
    /**
     * Generate a username from a name.
     *
     * @param string $name
     * @return string
     */
    function generate_username(string $name): string
    {
        $username = strtolower(str_replace(' ', '_', $name));
        $username = preg_replace('/[^a-z0-9_]/', '', $username);
        
        // Check if username exists
        $originalUsername = $username;
        $counter = 1;
        
        while (\App\Models\User::where('username', $username)->exists()) {
            $username = $originalUsername . $counter;
            $counter++;
        }
        
        return $username;
    }
}

if (!function_exists('excerpt')) {
    /**
     * Create an excerpt from text.
     *
     * @param string $text
     * @param int $length
     * @return string
     */
    function excerpt(string $text, int $length = 150): string
    {
        $text = strip_tags($text);
        
        if (strlen($text) <= $length) {
            return $text;
        }
        
        return substr($text, 0, $length) . '...';
    }
}

if (!function_exists('initials')) {
    /**
     * Get initials from a name.
     *
     * @param string $name
     * @return string
     */
    function initials(string $name): string
    {
        $words = explode(' ', $name);
        
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }
        
        return strtoupper(substr($name, 0, 2));
    }
}
```

### Date Helpers

```php
<?php

// app/Helpers/DateHelpers.php

if (!function_exists('human_date')) {
    /**
     * Format a date in a human-friendly way.
     *
     * @param string|Carbon $date
     * @return string
     */
    function human_date($date): string
    {
        return \Carbon\Carbon::parse($date)->format('F j, Y');
    }
}

if (!function_exists('time_ago')) {
    /**
     * Get time ago in human readable format.
     *
     * @param string|Carbon $date
     * @return string
     */
    function time_ago($date): string
    {
        return \Carbon\Carbon::parse($date)->diffForHumans();
    }
}

if (!function_exists('business_days_between')) {
    /**
     * Calculate business days between two dates.
     *
     * @param Carbon $start
     * @param Carbon $end
     * @return int
     */
    function business_days_between(\Carbon\Carbon $start, \Carbon\Carbon $end): int
    {
        $days = 0;
        
        while ($start->lte($end)) {
            if ($start->isWeekday()) {
                $days++;
            }
            $start->addDay();
        }
        
        return $days;
    }
}

if (!function_exists('is_past')) {
    /**
     * Check if a date is in the past.
     *
     * @param string|Carbon $date
     * @return bool
     */
    function is_past($date): bool
    {
        return \Carbon\Carbon::parse($date)->isPast();
    }
}

if (!function_exists('is_future')) {
    /**
     * Check if a date is in the future.
     *
     * @param string|Carbon $date
     * @return bool
     */
    function is_future($date): bool
    {
        return \Carbon\Carbon::parse($date)->isFuture();
    }
}
```

### Formatting Helpers

```php
<?php

// app/Helpers/FormatHelpers.php

if (!function_exists('format_price')) {
    /**
     * Format a price with currency symbol.
     *
     * @param float $price
     * @param string $currency
     * @return string
     */
    function format_price(float $price, string $currency = 'USD'): string
    {
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'ZAR' => 'R',
        ];
        
        $symbol = $symbols[$currency] ?? $currency . ' ';
        
        return $symbol . number_format($price, 2);
    }
}

if (!function_exists('format_phone')) {
    /**
     * Format a phone number.
     *
     * @param string $phone
     * @return string
     */
    function format_phone(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        if (strlen($phone) == 10) {
            return sprintf('(%s) %s-%s', 
                substr($phone, 0, 3),
                substr($phone, 3, 3),
                substr($phone, 6)
            );
        }
        
        return $phone;
    }
}

if (!function_exists('format_bytes')) {
    /**
     * Format bytes into human readable size.
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    function format_bytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}

if (!function_exists('format_number')) {
    /**
     * Format a number with K, M, B suffixes.
     *
     * @param int $number
     * @return string
     */
    function format_number(int $number): string
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'B';
        }
        
        if ($number >= 1000000) {
            return number_format($number / 1000000, 1) . 'M';
        }
        
        if ($number >= 1000) {
            return number_format($number / 1000, 1) . 'K';
        }
        
        return (string) $number;
    }
}
```

### Array Helpers

```php
<?php

// app/Helpers/ArrayHelpers.php

if (!function_exists('array_first_where')) {
    /**
     * Get the first array element matching a condition.
     *
     * @param array $array
     * @param callable $callback
     * @return mixed
     */
    function array_first_where(array $array, callable $callback)
    {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }
        
        return null;
    }
}

if (!function_exists('array_group_by')) {
    /**
     * Group an array by a key.
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    function array_group_by(array $array, string $key): array
    {
        $result = [];
        
        foreach ($array as $item) {
            $groupKey = $item[$key] ?? 'undefined';
            $result[$groupKey][] = $item;
        }
        
        return $result;
    }
}

if (!function_exists('array_pluck_unique')) {
    /**
     * Pluck unique values from an array.
     *
     * @param array $array
     * @param string $key
     * @return array
     */
    function array_pluck_unique(array $array, string $key): array
    {
        return array_unique(array_column($array, $key));
    }
}
```

### User/Auth Helpers

```php
<?php

// app/Helpers/AuthHelpers.php

if (!function_exists('current_user')) {
    /**
     * Get the current authenticated user.
     *
     * @return \App\Models\User|null
     */
    function current_user(): ?\App\Models\User
    {
        return auth()->user();
    }
}

if (!function_exists('user_can')) {
    /**
     * Check if current user can perform an ability.
     *
     * @param string $ability
     * @param mixed $model
     * @return bool
     */
    function user_can(string $ability, $model = null): bool
    {
        return auth()->check() && auth()->user()->can($ability, $model);
    }
}

if (!function_exists('is_admin')) {
    /**
     * Check if current user is an admin.
     *
     * @return bool
     */
    function is_admin(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }
}

if (!function_exists('user_avatar')) {
    /**
     * Get user avatar URL with fallback.
     *
     * @param \App\Models\User|null $user
     * @return string
     */
    function user_avatar(?\App\Models\User $user = null): string
    {
        $user = $user ?? current_user();
        
        if (!$user) {
            return asset('images/default-avatar.png');
        }
        
        if ($user->avatar) {
            return Storage::url($user->avatar);
        }
        
        // Generate Gravatar URL
        $hash = md5(strtolower(trim($user->email)));
        return "https://www.gravatar.com/avatar/{$hash}?d=mp&s=200";
    }
}
```

### URL Helpers

```php
<?php

// app/Helpers/UrlHelpers.php

if (!function_exists('current_route_name')) {
    /**
     * Get the current route name.
     *
     * @return string|null
     */
    function current_route_name(): ?string
    {
        return request()->route() ? request()->route()->getName() : null;
    }
}

if (!function_exists('is_active_route')) {
    /**
     * Check if given route is currently active.
     *
     * @param string $route
     * @return bool
     */
    function is_active_route(string $route): bool
    {
        return request()->routeIs($route);
    }
}

if (!function_exists('active_class')) {
    /**
     * Return a class if route is active.
     *
     * @param string $route
     * @param string $class
     * @return string
     */
    function active_class(string $route, string $class = 'active'): string
    {
        return is_active_route($route) ? $class : '';
    }
}

if (!function_exists('external_link')) {
    /**
     * Create an external link with security attributes.
     *
     * @param string $url
     * @param string $text
     * @return string
     */
    function external_link(string $url, string $text): string
    {
        return sprintf(
            '<a href="%s" target="_blank" rel="noopener noreferrer">%s</a>',
            e($url),
            e($text)
        );
    }
}
```

### File Helpers

```php
<?php

// app/Helpers/FileHelpers.php

if (!function_exists('upload_path')) {
    /**
     * Get the upload path for a file.
     *
     * @param string $filename
     * @param string $directory
     * @return string
     */
    function upload_path(string $filename, string $directory = 'uploads'): string
    {
        return storage_path("app/public/{$directory}/{$filename}");
    }
}

if (!function_exists('file_extension')) {
    /**
     * Get file extension from filename.
     *
     * @param string $filename
     * @return string
     */
    function file_extension(string $filename): string
    {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    }
}

if (!function_exists('is_image')) {
    /**
     * Check if file is an image.
     *
     * @param string $filename
     * @return bool
     */
    function is_image(string $filename): bool
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
        return in_array(file_extension($filename), $imageExtensions);
    }
}

if (!function_exists('random_filename')) {
    /**
     * Generate a random filename.
     *
     * @param string $extension
     * @return string
     */
    function random_filename(string $extension): string
    {
        return \Illuminate\Support\Str::random(40) . '.' . $extension;
    }
}
```

### Validation Helpers

```php
<?php

// app/Helpers/ValidationHelpers.php

if (!function_exists('is_valid_email')) {
    /**
     * Check if email is valid.
     *
     * @param string $email
     * @return bool
     */
    function is_valid_email(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

if (!function_exists('is_valid_url')) {
    /**
     * Check if URL is valid.
     *
     * @param string $url
     * @return bool
     */
    function is_valid_url(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}

if (!function_exists('is_valid_phone')) {
    /**
     * Check if phone number is valid (basic check).
     *
     * @param string $phone
     * @return bool
     */
    function is_valid_phone(string $phone): bool
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        return strlen($phone) >= 10 && strlen($phone) <= 15;
    }
}

if (!function_exists('sanitize_input')) {
    /**
     * Sanitize user input.
     *
     * @param string $input
     * @return string
     */
    function sanitize_input(string $input): string
    {
        return htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
    }
}
```

### Business Logic Helpers

```php
<?php

// app/Helpers/BusinessHelpers.php

if (!function_exists('calculate_tax')) {
    /**
     * Calculate tax amount.
     *
     * @param float $amount
     * @param float $rate
     * @return float
     */
    function calculate_tax(float $amount, float $rate = 0.15): float
    {
        return round($amount * $rate, 2);
    }
}

if (!function_exists('calculate_discount')) {
    /**
     * Calculate discount amount.
     *
     * @param float $price
     * @param float $percentage
     * @return float
     */
    function calculate_discount(float $price, float $percentage): float
    {
        return round($price * ($percentage / 100), 2);
    }
}

if (!function_exists('apply_discount')) {
    /**
     * Apply discount to price.
     *
     * @param float $price
     * @param float $percentage
     * @return float
     */
    function apply_discount(float $price, float $percentage): float
    {
        return round($price - calculate_discount($price, $percentage), 2);
    }
}

if (!function_exists('calculate_commission')) {
    /**
     * Calculate commission amount.
     *
     * @param float $amount
     * @param float $percentage
     * @return float
     */
    function calculate_commission(float $amount, float $percentage): float
    {
        return round($amount * ($percentage / 100), 2);
    }
}

if (!function_exists('profit_margin')) {
    /**
     * Calculate profit margin percentage.
     *
     * @param float $cost
     * @param float $price
     * @return float
     */
    function profit_margin(float $cost, float $price): float
    {
        if ($price == 0) {
            return 0;
        }
        
        return round((($price - $cost) / $price) * 100, 2);
    }
}
```

### Random/Utility Helpers

```php
<?php

// app/Helpers/UtilityHelpers.php

if (!function_exists('generate_code')) {
    /**
     * Generate a random code.
     *
     * @param int $length
     * @param string $prefix
     * @return string
     */
    function generate_code(int $length = 8, string $prefix = ''): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $prefix . $code;
    }
}

if (!function_exists('generate_order_number')) {
    /**
     * Generate a unique order number.
     *
     * @return string
     */
    function generate_order_number(): string
    {
        return 'ORD-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(6));
    }
}

if (!function_exists('random_color')) {
    /**
     * Generate a random hex color.
     *
     * @return string
     */
    function random_color(): string
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('clamp')) {
    /**
     * Clamp a value between min and max.
     *
     * @param float $value
     * @param float $min
     * @param float $max
     * @return float
     */
    function clamp(float $value, float $min, float $max): float
    {
        return max($min, min($max, $value));
    }
}

if (!function_exists('percentage')) {
    /**
     * Calculate percentage.
     *
     * @param float $value
     * @param float $total
     * @return float
     */
    function percentage(float $value, float $total): float
    {
        if ($total == 0) {
            return 0;
        }
        
        return round(($value / $total) * 100, 2);
    }
}
```

## Using Helpers

### In Controllers

```php
<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        return view('orders.show', [
            'order' => $order,
            'formatted_total' => format_price($order->total),
            'order_date' => human_date($order->created_at),
            'time_ago' => time_ago($order->created_at),
        ]);
    }
}
```

### In Blade Views

```blade
<!-- Show formatted price -->
<p>Total: {{ format_price($order->total) }}</p>

<!-- Show time ago -->
<p>Ordered {{ time_ago($order->created_at) }}</p>

<!-- Active navigation class -->
<li class="{{ active_class('dashboard') }}">
    <a href="{{ route('dashboard') }}">Dashboard</a>
</li>

<!-- User avatar -->
<img src="{{ user_avatar() }}" alt="Avatar">

<!-- Excerpt -->
<p>{{ excerpt($post->content, 200) }}</p>

<!-- Initials -->
<div class="avatar">{{ initials(auth()->user()->name) }}</div>
```

### In Models

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getFormattedPriceAttribute(): string
    {
        return format_price($this->price);
    }
    
    public function getDiscountedPriceAttribute(): float
    {
        if ($this->discount_percentage > 0) {
            return apply_discount($this->price, $this->discount_percentage);
        }
        
        return $this->price;
    }
}
```

### In Services

```php
<?php

namespace App\Services;

class OrderService
{
    public function createOrder(array $data): Order
    {
        $total = $data['subtotal'];
        $tax = calculate_tax($total);
        
        if (isset($data['discount_code'])) {
            $discount = calculate_discount($total, $data['discount_percentage']);
            $total = $total - $discount;
        }
        
        return Order::create([
            'order_number' => generate_order_number(),
            'subtotal' => $data['subtotal'],
            'tax' => $tax,
            'total' => $total + $tax,
        ]);
    }
}
```

## Complete Working Example

```php
<?php

// app/Helpers/helpers.php

if (!function_exists('flash')) {
    /**
     * Flash a message to the session.
     *
     * @param string $message
     * @param string $type
     * @return void
     */
    function flash(string $message, string $type = 'info'): void
    {
        session()->flash('flash_message', $message);
        session()->flash('flash_type', $type);
    }
}

if (!function_exists('flash_success')) {
    /**
     * Flash a success message.
     *
     * @param string $message
     * @return void
     */
    function flash_success(string $message): void
    {
        flash($message, 'success');
    }
}

if (!function_exists('flash_error')) {
    /**
     * Flash an error message.
     *
     * @param string $message
     * @return void
     */
    function flash_error(string $message): void
    {
        flash($message, 'error');
    }
}

if (!function_exists('format_price')) {
    /**
     * Format price with currency.
     *
     * @param float $price
     * @param string $currency
     * @return string
     */
    function format_price(float $price, string $currency = 'USD'): string
    {
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'ZAR' => 'R',
        ];
        
        return ($symbols[$currency] ?? $currency) . number_format($price, 2);
    }
}

if (!function_exists('settings')) {
    /**
     * Get a setting value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function settings(string $key, $default = null)
    {
        static $settings = null;
        
        if ($settings === null) {
            $settings = cache()->remember('app_settings', 3600, function () {
                return \App\Models\Setting::pluck('value', 'key')->toArray();
            });
        }
        
        return $settings[$key] ?? $default;
    }
}

if (!function_exists('avatar')) {
    /**
     * Generate an avatar URL.
     *
     * @param \App\Models\User $user
     * @param int $size
     * @return string
     */
    function avatar(\App\Models\User $user, int $size = 200): string
    {
        if ($user->avatar_path) {
            return Storage::url($user->avatar_path);
        }
        
        $hash = md5(strtolower(trim($user->email)));
        return "https://www.gravatar.com/avatar/{$hash}?d=mp&s={$size}";
    }
}

if (!function_exists('active_link')) {
    /**
     * Generate an active navigation link.
     *
     * @param string $route
     * @param string $text
     * @param string $activeClass
     * @return string
     */
    function active_link(string $route, string $text, string $activeClass = 'active'): string
    {
        $class = request()->routeIs($route) ? $activeClass : '';
        $url = route($route);
        
        return sprintf(
            '<a href="%s" class="%s">%s</a>',
            $url,
            $class,
            e($text)
        );
    }
}
```

### Usage in Controller

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create($request->validated());
        
        flash_success('Product created successfully!');
        
        return redirect()->route('products.index');
    }
    
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => format_price($product->price),
                'created' => time_ago($product->created_at),
            ];
        });
        
        return view('products.index', compact('products'));
    }
}
```

### Usage in Blade

```blade
<!-- Display flash messages -->
@if(session('flash_message'))
    <div class="alert alert-{{ session('flash_type') }}">
        {{ session('flash_message') }}
    </div>
@endif

<!-- Active navigation -->
<nav>
    {!! active_link('dashboard', 'Dashboard') !!}
    {!! active_link('products.index', 'Products') !!}
    {!! active_link('orders.index', 'Orders') !!}
</nav>

<!-- User avatar -->
<img src="{{ avatar(auth()->user()) }}" alt="Avatar">

<!-- Settings -->
<p>Site Name: {{ settings('site_name', 'My App') }}</p>
```

## Testing Helpers

```php
<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function test_format_price()
    {
        $this->assertEquals('$10.00', format_price(10));
        $this->assertEquals('$1,234.56', format_price(1234.56));
        $this->assertEquals('€50.00', format_price(50, 'EUR'));
    }
    
    public function test_excerpt()
    {
        $text = 'This is a long text that should be truncated at some point because it exceeds the maximum length.';
        
        $result = excerpt($text, 50);
        
        $this->assertLessThanOrEqual(53, strlen($result)); // 50 + "..."
        $this->assertStringEndsWith('...', $result);
    }
    
    public function test_calculate_tax()
    {
        $this->assertEquals(15.00, calculate_tax(100, 0.15));
        $this->assertEquals(20.00, calculate_tax(100, 0.20));
    }
    
    public function test_generate_order_number()
    {
        $orderNumber = generate_order_number();
        
        $this->assertStringStartsWith('ORD-', $orderNumber);
        $this->assertStringContainsString(date('Ymd'), $orderNumber);
    }
}
```

## Best Practices

### 1. Always Use `if (!function_exists())`

```php
// Good
if (!function_exists('my_helper')) {
    function my_helper() {
        // ...
    }
}

// Bad - can cause conflicts
function my_helper() {
    // ...
}
```

### 2. Type Hint Parameters and Returns

```php
// Good - clear what's expected
function format_price(float $price, string $currency = 'USD'): string
{
    // ...
}

// Bad - unclear types
function format_price($price, $currency = 'USD')
{
    // ...
}
```

### 3. Document Your Helpers

```php
// Good - clear documentation
/**
 * Format a price with currency symbol.
 *
 * @param float $price The price to format
 * @param string $currency The currency code (USD, EUR, etc.)
 * @return string The formatted price
 */
function format_price(float $price, string $currency = 'USD'): string
{
    // ...
}
```

### 4. Keep Helpers Simple

```php
// Good - simple and focused
function format_price(float $price): string
{
    return '$' . number_format($price, 2);
}

// Bad - too complex for a helper
function process_order($data) {
    // 50 lines of complex logic
    // This should be a service class
}
```

### 5. Use Descriptive Names

```php
// Good - clear what it does
function format_phone(string $phone): string

// Bad - unclear
function fp(string $p): string
```

### 6. Organize by Type

```
app/Helpers/
    helpers.php          (General)
    StringHelpers.php    (String utilities)
    DateHelpers.php      (Date utilities)
    FormatHelpers.php    (Formatting)
    AuthHelpers.php      (Auth-related)
```

### 7. Don't Overuse Helpers

```php
// Good - simple utility
function format_price(float $price): string

// Bad - complex business logic should be in a service
function process_payment_and_send_invoice_and_update_inventory()
```

### 8. Avoid Global State

```php
// Good - pass what you need
function format_user_name(User $user): string
{
    return $user->first_name . ' ' . $user->last_name;
}

// Acceptable - but be careful
function current_user(): ?User
{
    return auth()->user();
}
```

## When NOT to Use Helpers

### Use Services Instead When:

- Logic is complex
- Multiple steps involved
- Needs dependency injection
- Requires testing with mocks

```php
// Bad - too complex for helper
function processOrderWithPaymentAndInventory($order) {
    // 100 lines of code
}

// Good - use a service
class OrderService {
    public function process(Order $order) {
        // Complex logic here
    }
}
```

### Use Model Methods When:

- Logic is specific to a model
- Needs access to model properties

```php
// Bad - in helper
function getUserFullName(User $user) {
    return $user->first_name . ' ' . $user->last_name;
}

// Good - in model
class User extends Model {
    public function getFullNameAttribute(): string {
        return $this->first_name . ' ' . $this->last_name;
    }
}
```

## Quick Reference

| Task | Location |
|------|----------|
| Create helpers directory | `mkdir app/Helpers` |
| Create helper file | `touch app/Helpers/helpers.php` |
| Autoload helpers | Add to `composer.json` files array |
| Reload autoload | `composer dump-autoload` |
| Use helper | `format_price(100)` anywhere |
| Test helper | Create unit test in `tests/Unit` |

## Common Helper Categories

| Category | Examples |
|----------|----------|
| **String** | excerpt(), initials(), str_limit_words() |
| **Date** | human_date(), time_ago(), is_past() |
| **Format** | format_price(), format_phone(), format_bytes() |
| **Array** | array_first_where(), array_group_by() |
| **Auth** | current_user(), is_admin(), user_can() |
| **URL** | active_class(), is_active_route() |
| **File** | is_image(), random_filename() |
| **Business** | calculate_tax(), apply_discount() |
| **Validation** | is_valid_email(), is_valid_url() |
| **Random** | generate_code(), random_color() |

## Laravel's Built-in Helpers

Laravel provides many built-in helpers. Don't recreate these:

```php
// Arrays
array_add(), array_divide(), array_flatten(), head(), last()

// Paths
app_path(), base_path(), config_path(), public_path(), storage_path()

// Strings
class_basename(), e(), str_contains(), str_finish(), str_limit()

// URLs
action(), asset(), route(), secure_asset(), url()

// Misc
abort(), back(), bcrypt(), collect(), dd(), dump(), env(), logger()
```

Check Laravel docs before creating a helper - it might already exist!
