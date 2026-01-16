# Laravel Events - Complete Guide

## What Are Events?

Events are a way to decouple different parts of your application. When something happens (an event), your app can notify other parts to react (listeners). Think of it as a broadcasting system - one part announces something happened, and multiple parts can listen and respond.

### Why Use Events?

- **Decouple code**: Controllers don't need to know about emails, notifications, logging, etc.
- **Reusability**: One event can trigger multiple listeners
- **Maintainability**: Easy to add/remove listeners without touching core logic
- **Testing**: Test event firing separately from what happens after
- **Organization**: Keep related logic together

### Common Use Cases

- User registered → Send welcome email, create profile, log activity
- Order placed → Send confirmation, update inventory, notify admin
- File uploaded → Resize image, scan for viruses, update database
- Payment processed → Send receipt, update subscription, trigger fulfillment

## File Locations

```
app/Events/UserRegistered.php      (the event)
app/Listeners/SendWelcomeEmail.php (the listener)
app/Providers/EventServiceProvider.php (registration)
```

## Creating Events and Listeners

### Generate Event
```bash
php artisan make:event UserRegistered
```

### Generate Listener
```bash
php artisan make:listener SendWelcomeEmail --event=UserRegistered
```

### Generate Both Together
In `EventServiceProvider.php`, add to `$listen` array, then run:
```bash
php artisan event:generate
```

This creates all missing events and listeners.

## Basic Event Structure

```php
<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The user instance.
     * Make public so listeners can access it
     */
    public User $user;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
```

## Basic Listener Structure

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        // Access the user from the event
        $user = $event->user;
        
        // Send the email
        Mail::to($user)->send(new WelcomeEmail($user));
    }
}
```

## Registering Events and Listeners

### In EventServiceProvider.php

```php
<?php

namespace App\Providers;

use App\Events\OrderShipped;
use App\Events\UserRegistered;
use App\Listeners\SendShipmentNotification;
use App\Listeners\SendWelcomeEmail;
use App\Listeners\CreateUserProfile;
use App\Listeners\LogRegistration;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [
        // One event can have multiple listeners
        UserRegistered::class => [
            SendWelcomeEmail::class,
            CreateUserProfile::class,
            LogRegistration::class,
        ],
        
        OrderShipped::class => [
            SendShipmentNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }
}
```

## Dispatching (Firing) Events

### Method 1: Using event() Helper

```php
use App\Events\UserRegistered;

// In a controller
public function store(Request $request)
{
    $user = User::create($request->validated());
    
    // Fire the event
    event(new UserRegistered($user));
    
    return redirect('/dashboard');
}
```

### Method 2: Using Event Facade

```php
use Illuminate\Support\Facades\Event;
use App\Events\UserRegistered;

Event::dispatch(new UserRegistered($user));
```

### Method 3: Using Dispatchable Trait

```php
use App\Events\UserRegistered;

UserRegistered::dispatch($user);
```

### Method 4: Model Events (Automatic)

```php
<?php

namespace App\Models;

use App\Events\UserRegistered;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $dispatchesEvents = [
        'created' => UserRegistered::class,
    ];
}

// Now event fires automatically when user is created
$user = User::create([...]);  // UserRegistered event fires automatically
```

## Passing Data to Events

### Multiple Parameters

```php
<?php

namespace App\Events;

use App\Models\Order;
use App\Models\User;

class OrderPlaced
{
    public Order $order;
    public User $user;
    public string $paymentMethod;
    
    public function __construct(Order $order, User $user, string $paymentMethod)
    {
        $this->order = $order;
        $this->user = $user;
        $this->paymentMethod = $paymentMethod;
    }
}
```

```php
// Dispatching
event(new OrderPlaced($order, $user, 'credit_card'));
```

```php
// In listener
public function handle(OrderPlaced $event): void
{
    $order = $event->order;
    $user = $event->user;
    $paymentMethod = $event->paymentMethod;
}
```

## Queued Listeners

Make listeners run in background (async) by implementing `ShouldQueue`:

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderConfirmation implements ShouldQueue
{
    use InteractsWithQueue;
    
    /**
     * The name of the queue the job should be sent to.
     */
    public $queue = 'emails';
    
    /**
     * The number of times the queued listener may be attempted.
     */
    public $tries = 3;
    
    /**
     * The number of seconds to wait before retrying.
     */
    public $backoff = 60;
    
    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        // Send email
    }
    
    /**
     * Handle a job failure.
     */
    public function failed(OrderPlaced $event, \Throwable $exception): void
    {
        // Handle failure - log, notify admin, etc.
    }
}
```

## Event Subscribers (Multiple Events in One Class)

For when one listener needs to handle multiple events:

### Create Subscriber

```bash
php artisan make:listener UserEventSubscriber
```

### Subscriber Structure

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Events\UserDeleted;
use Illuminate\Events\Dispatcher;

class UserEventSubscriber
{
    /**
     * Handle user register events.
     */
    public function handleUserRegistered(UserRegistered $event): void
    {
        // Handle registration
    }

    /**
     * Handle user delete events.
     */
    public function handleUserDeleted(UserDeleted $event): void
    {
        // Handle deletion
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            UserRegistered::class => 'handleUserRegistered',
            UserDeleted::class => 'handleUserDeleted',
        ];
    }
}
```

### Register Subscriber

```php
// EventServiceProvider.php

protected $subscribe = [
    UserEventSubscriber::class,
];
```

## Stopping Event Propagation

If a listener returns `false`, it stops other listeners from running:

```php
public function handle(UserRegistered $event): bool
{
    if ($event->user->is_banned) {
        // Stop other listeners from running
        return false;
    }
    
    // Continue to next listener
    return true;
}
```

## Event Discovery (Auto-Registration)

Laravel can auto-discover events in your `app/Listeners` directory:

```php
// EventServiceProvider.php

public function shouldDiscoverEvents(): bool
{
    return true;
}
```

Now you don't need to manually register in `$listen` array.

## Complete Working Example

### Event: OrderPlaced.php

```php
<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
```

### Listener 1: SendOrderConfirmation.php

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Mail\OrderConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmation implements ShouldQueue
{
    use InteractsWithQueue;

    public $queue = 'emails';
    public $tries = 3;

    public function handle(OrderPlaced $event): void
    {
        Mail::to($event->order->user->email)
            ->send(new OrderConfirmation($event->order));
    }

    public function failed(OrderPlaced $event, \Throwable $exception): void
    {
        \Log::error('Failed to send order confirmation', [
            'order_id' => $event->order->id,
            'error' => $exception->getMessage()
        ]);
    }
}
```

### Listener 2: UpdateInventory.php

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;

class UpdateInventory
{
    public function handle(OrderPlaced $event): void
    {
        foreach ($event->order->items as $item) {
            $item->product->decrement('stock', $item->quantity);
        }
    }
}
```

### Listener 3: NotifyAdmin.php

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Models\Admin;
use App\Notifications\NewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdmin implements ShouldQueue
{
    public function handle(OrderPlaced $event): void
    {
        $admins = Admin::all();
        
        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($event->order));
        }
    }
}
```

### Register in EventServiceProvider.php

```php
protected $listen = [
    OrderPlaced::class => [
        SendOrderConfirmation::class,
        UpdateInventory::class,
        NotifyAdmin::class,
    ],
];
```

### Fire Event in Controller

```php
<?php

namespace App\Http\Controllers;

use App\Events\OrderPlaced;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'total' => $this->calculateTotal($validated),
        ]);

        // Fire the event - all listeners will be triggered
        event(new OrderPlaced($order));

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order placed successfully!');
    }
}
```

## Built-in Model Events

Laravel models fire events automatically:

```php
// Available model events:
retrieved  // Model retrieved from database
creating   // Before model is created
created    // After model is created
updating   // Before model is updated
updated    // After model is updated
saving     // Before model is saved (create or update)
saved      // After model is saved (create or update)
deleting   // Before model is deleted
deleted    // After model is deleted
restoring  // Before soft-deleted model is restored
restored   // After soft-deleted model is restored
```

### Listening to Model Events

#### Method 1: In Model

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected static function booted()
    {
        static::created(function ($user) {
            // Do something when user is created
        });

        static::deleting(function ($user) {
            // Do something before user is deleted
            $user->posts()->delete(); // Delete all posts
        });
    }
}
```

#### Method 2: Observers (Recommended for Multiple Events)

```bash
php artisan make:observer UserObserver --model=User
```

```php
<?php

namespace App\Observers;

use App\Models\User;
use App\Events\UserRegistered;

class UserObserver
{
    public function created(User $user): void
    {
        event(new UserRegistered($user));
    }

    public function deleting(User $user): void
    {
        $user->posts()->delete();
    }

    public function deleted(User $user): void
    {
        \Log::info("User {$user->id} was deleted");
    }
}
```

Register observer in `EventServiceProvider`:

```php
use App\Models\User;
use App\Observers\UserObserver;

public function boot(): void
{
    User::observe(UserObserver::class);
}
```

## Testing Events

### Assert Event Was Dispatched

```php
use App\Events\OrderPlaced;
use Illuminate\Support\Facades\Event;

public function test_order_placed_event_is_fired()
{
    Event::fake();

    // Perform order creation
    $response = $this->post('/orders', [
        'product_id' => 1,
        'quantity' => 2,
    ]);

    // Assert event was dispatched
    Event::assertDispatched(OrderPlaced::class);
    
    // Assert event was dispatched with specific data
    Event::assertDispatched(function (OrderPlaced $event) {
        return $event->order->quantity === 2;
    });
}
```

### Assert Listener Was Called

```php
use App\Events\OrderPlaced;
use App\Listeners\SendOrderConfirmation;
use Illuminate\Support\Facades\Event;

public function test_listener_sends_confirmation()
{
    Event::fake();

    $response = $this->post('/orders', [...]);

    Event::assertDispatched(OrderPlaced::class);
    
    // Assert specific listener attached to event
    Event::assertListening(
        OrderPlaced::class,
        SendOrderConfirmation::class
    );
}
```

### Don't Fake Events (Test Actual Behavior)

```php
public function test_order_confirmation_is_sent()
{
    Mail::fake();

    $response = $this->post('/orders', [...]);

    Mail::assertSent(OrderConfirmation::class);
}
```

## Best Practices

### 1. Keep Events Simple (Just Data Containers)

```php
// Good
class OrderPlaced
{
    public Order $order;
    
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}

// Bad - no logic in events
class OrderPlaced
{
    public function sendEmails() { /* ... */ }
    public function updateInventory() { /* ... */ }
}
```

### 2. Put Logic in Listeners, Not Events

```php
// Good - listener has the logic
class SendOrderConfirmation
{
    public function handle(OrderPlaced $event): void
    {
        // All the email sending logic here
    }
}
```

### 3. Name Events as Past Tense Actions

```php
// Good
UserRegistered
OrderPlaced
PaymentProcessed
FileUploaded

// Bad
RegisterUser
PlaceOrder
ProcessPayment
```

### 4. Queue Slow Listeners

```php
// If listener does slow work (emails, API calls), queue it
class SendWelcomeEmail implements ShouldQueue
{
    // ...
}
```

### 5. Handle Failures in Queued Listeners

```php
class SendEmail implements ShouldQueue
{
    public function failed(UserRegistered $event, \Throwable $exception): void
    {
        // Log, notify admin, etc.
    }
}
```

### 6. Use Type Hints

```php
// Good - clear what's being passed
public function handle(OrderPlaced $event): void
{
    $order = $event->order;
}

// Bad - unclear
public function handle($event): void
{
    $order = $event->order;
}
```

### 7. One Event Can Have Multiple Listeners

Don't be afraid to have many listeners for one event. It's better than one giant listener.

```php
UserRegistered::class => [
    SendWelcomeEmail::class,
    CreateUserProfile::class,
    SendAdminNotification::class,
    LogRegistration::class,
    AssignDefaultRole::class,
],
```

## Common Patterns

### Pattern 1: Chain of Actions After User Registration

```php
// Event
class UserRegistered { public User $user; }

// Listeners
SendWelcomeEmail        // Email user
CreateUserProfile       // Create profile record
AssignDefaultRole       // Give 'member' role
LogRegistration         // Log to analytics
SendAdminNotification   // Notify admin of new user
```

### Pattern 2: Multi-Step Order Processing

```php
// Event
class OrderPlaced { public Order $order; }

// Listeners
SendOrderConfirmation   // Email customer
UpdateInventory         // Decrement stock
ChargePayment          // Process payment
GenerateInvoice        // Create PDF invoice
NotifyWarehouse        // Alert fulfillment team
```

### Pattern 3: File Processing Pipeline

```php
// Event
class FileUploaded { public string $path; public User $user; }

// Listeners
ScanForViruses         // Security scan
ResizeImage            // Optimize images
GenerateThumbnails     // Create thumbnails
ExtractMetadata        // Get EXIF data
UpdateDatabase         // Save file record
```

## Quick Reference

| Task | Code |
|------|------|
| Create event | `php artisan make:event EventName` |
| Create listener | `php artisan make:listener ListenerName --event=EventName` |
| Fire event | `event(new EventName($data))` |
| Fire event (alt) | `EventName::dispatch($data)` |
| Queue listener | `implements ShouldQueue` |
| Stop propagation | `return false` in listener |
| Model events | `retrieved, creating, created, updating, updated, saving, saved, deleting, deleted` |
| Create observer | `php artisan make:observer ObserverName --model=ModelName` |
| Test event fired | `Event::assertDispatched(EventName::class)` |
| Test listener attached | `Event::assertListening(Event::class, Listener::class)` |

## Event vs Job

**When to use Event:**
- Multiple things need to happen after an action
- Different parts of app need to react
- You want loose coupling
- Actions are related but independent

**When to use Job:**
- Single specific task
- Task should definitely happen
- Task is part of main workflow
- You need more control (retries, delays, etc.)

**Example:**
```php
// Event - multiple reactions to user registration
event(new UserRegistered($user));

// Job - specific task that must complete
SendWelcomeEmail::dispatch($user);
```

Often you'll use both: fire an event, and listeners dispatch jobs!

```php
class SendWelcomeEmail implements ShouldQueue  // This IS a queued job
{
    public function handle(UserRegistered $event): void
    {
        // Listener becomes a queued job
    }
}
```
