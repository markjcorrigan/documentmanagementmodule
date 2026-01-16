# Laravel Listeners - Complete Guide

## What Are Listeners?

Listeners are classes that **react** to events. When an event is fired, all registered listeners for that event are executed. They contain the logic for what happens **in response** to an event.

### Event → Listener Relationship

```
Event (What Happened)  →  Listener (What To Do About It)
UserRegistered        →  SendWelcomeEmail
UserRegistered        →  CreateUserProfile
UserRegistered        →  LogRegistration
UserRegistered        →  NotifyAdmin

One Event → Multiple Listeners
```

### Why Use Listeners?

- **Separation of Concerns**: Keep event firing separate from handling
- **Multiple Reactions**: One event can trigger many actions
- **Reusability**: Same listener can handle different events
- **Testability**: Test listeners independently
- **Flexibility**: Add/remove listeners without touching event
- **Async Processing**: Queue listeners for background processing

### Common Use Cases

- Send emails when events occur
- Create related records
- Update statistics/analytics
- Log activities
- Send notifications (Slack, SMS, push)
- Clear caches
- Trigger webhooks
- Update search indexes
- Generate thumbnails
- Archive data

## File Locations

```
app/Listeners/SendWelcomeEmail.php
app/Listeners/CreateUserProfile.php
app/Listeners/LogUserActivity.php
app/Providers/EventServiceProvider.php    (Register listeners)
```

## Creating Listeners

### Generate Listener

```bash
# Create listener
php artisan make:listener SendWelcomeEmail

# Create listener for specific event
php artisan make:listener SendWelcomeEmail --event=UserRegistered
```

This creates: `app/Listeners/SendWelcomeEmail.php`

### Generate All Listeners at Once

In `EventServiceProvider.php`, define events and listeners, then run:

```bash
php artisan event:generate
```

This creates all missing listeners automatically.

## Basic Listener Structure

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmail
{
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
        // React to the event
    }
}
```

## Simple Listener Example

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
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
        // Access data from the event
        $user = $event->user;
        
        // Send welcome email
        Mail::to($user->email)->send(new WelcomeEmail($user));
    }
}
```

## Registering Listeners

### In EventServiceProvider.php

```php
<?php

namespace App\Providers;

use App\Events\OrderShipped;
use App\Events\UserRegistered;
use App\Listeners\CreateUserProfile;
use App\Listeners\LogRegistration;
use App\Listeners\SendShipmentNotification;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [
        // One event, multiple listeners
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

### Order Matters

Listeners execute in the order they're listed:

```php
UserRegistered::class => [
    SendWelcomeEmail::class,      // Runs first
    CreateUserProfile::class,     // Runs second
    LogRegistration::class,       // Runs third
],
```

## Listener Dependencies

Listeners support dependency injection in the constructor:

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Services\InventoryService;
use App\Services\PaymentService;

class ProcessOrder
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected InventoryService $inventory,
        protected PaymentService $payment
    ) {}

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        $order = $event->order;
        
        // Use injected services
        $this->payment->charge($order);
        $this->inventory->decrement($order->items);
    }
}
```

## Queued Listeners

Make listeners run asynchronously by implementing `ShouldQueue`:

### Basic Queued Listener

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
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}
```

### Queued Listener Configuration

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
     * The name of the connection the job should be sent to.
     */
    public $connection = 'redis';

    /**
     * The number of times the queued listener may be attempted.
     */
    public $tries = 3;

    /**
     * The number of seconds to wait before retrying.
     */
    public $backoff = 60;

    /**
     * The number of seconds the job can run before timing out.
     */
    public $timeout = 120;

    /**
     * Determine whether the listener should be queued.
     */
    public function shouldQueue(OrderPlaced $event): bool
    {
        // Only queue for orders over $100
        return $event->order->total > 100;
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlaced $event): void
    {
        // Send confirmation email
    }

    /**
     * Handle a job failure.
     */
    public function failed(OrderPlaced $event, Throwable $exception): void
    {
        // Handle failure
        \Log::error('Failed to send order confirmation', [
            'order_id' => $event->order->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
```

## Stopping Event Propagation

Return `false` from a listener to stop remaining listeners from executing:

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;

class CheckUserStatus
{
    public function handle(UserRegistered $event): bool
    {
        // Check if user is banned
        if ($event->user->is_banned) {
            \Log::warning('Banned user tried to register', [
                'user_id' => $event->user->id
            ]);
            
            // Stop other listeners from running
            return false;
        }
        
        // Continue to next listener
        return true;
    }
}
```

## Accessing Event Data

Listeners receive the event object and can access all its public properties:

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
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;

class SendOrderConfirmation
{
    public function handle(OrderPlaced $event): void
    {
        // Access all event properties
        $order = $event->order;
        $user = $event->user;
        $paymentMethod = $event->paymentMethod;
        
        // Use the data
        \Log::info('Order placed', [
            'order_id' => $order->id,
            'user_id' => $user->id,
            'payment_method' => $paymentMethod,
        ]);
    }
}
```

## Conditional Listener Execution

### Using shouldQueue()

```php
public function shouldQueue(OrderPlaced $event): bool
{
    // Only queue for large orders
    return $event->order->total > 1000;
}
```

### Early Return in handle()

```php
public function handle(UserRegistered $event): void
{
    // Don't send email to test users
    if ($event->user->is_test_user) {
        return;
    }
    
    // Send email
    Mail::to($event->user)->send(new WelcomeEmail($event->user));
}
```

### Multiple Conditions

```php
public function handle(UserRegistered $event): void
{
    $user = $event->user;
    
    // Multiple checks
    if (!$user->email_verified_at) {
        \Log::info('Skipping welcome email - email not verified');
        return;
    }
    
    if ($user->opted_out_of_emails) {
        \Log::info('Skipping welcome email - user opted out');
        return;
    }
    
    // All checks passed, send email
    Mail::to($user)->send(new WelcomeEmail($user));
}
```

## Event Subscribers

When a listener needs to handle multiple events, use a subscriber:

### Create Subscriber

```bash
php artisan make:listener UserEventSubscriber
```

### Subscriber Structure

```php
<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Events\UserUpdated;
use Illuminate\Events\Dispatcher;

class UserEventSubscriber
{
    /**
     * Handle user created events.
     */
    public function handleUserCreated(UserCreated $event): void
    {
        \Log::info('User created', ['user_id' => $event->user->id]);
    }

    /**
     * Handle user updated events.
     */
    public function handleUserUpdated(UserUpdated $event): void
    {
        \Log::info('User updated', ['user_id' => $event->user->id]);
    }

    /**
     * Handle user deleted events.
     */
    public function handleUserDeleted(UserDeleted $event): void
    {
        \Log::info('User deleted', ['user_id' => $event->user->id]);
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            UserCreated::class => 'handleUserCreated',
            UserUpdated::class => 'handleUserUpdated',
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

## Complete Working Examples

### Example 1: User Registration Flow

#### Event

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

    public function __construct(
        public User $user
    ) {}
}
```

#### Listener 1: SendWelcomeEmail

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

    public $queue = 'emails';
    public $tries = 3;
    public $backoff = 60;

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }

    /**
     * Handle a job failure.
     */
    public function failed(UserRegistered $event, Throwable $exception): void
    {
        \Log::error('Failed to send welcome email', [
            'user_id' => $event->user->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
```

#### Listener 2: CreateUserProfile

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;

class CreateUserProfile
{
    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $event->user->profile()->create([
            'bio' => '',
            'avatar' => 'default.png',
            'preferences' => [
                'newsletter' => true,
                'notifications' => true,
            ],
        ]);
    }
}
```

#### Listener 3: AssignDefaultRole

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;

class AssignDefaultRole
{
    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $event->user->assignRole('member');
    }
}
```

#### Listener 4: LogRegistration

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;

class LogRegistration
{
    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        \Log::info('New user registered', [
            'user_id' => $event->user->id,
            'email' => $event->user->email,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        
        // Also track in analytics
        // Analytics::track('user.registered', [...]);
    }
}
```

#### Listener 5: NotifyAdmin

```php
<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdmin implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $admins = User::where('role', 'admin')->get();
        
        foreach ($admins as $admin) {
            $admin->notify(new NewUserRegistered($event->user));
        }
    }
}
```

#### Register All Listeners

```php
// EventServiceProvider.php

protected $listen = [
    UserRegistered::class => [
        SendWelcomeEmail::class,
        CreateUserProfile::class,
        AssignDefaultRole::class,
        LogRegistration::class,
        NotifyAdmin::class,
    ],
];
```

#### Fire Event in Controller

```php
<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        // Create user
        $user = User::create($request->validated());
        
        // Fire event - all listeners will run
        event(new UserRegistered($user));
        
        return redirect('/dashboard')
            ->with('success', 'Welcome! Please check your email.');
    }
}
```

### Example 2: Order Processing

#### Event

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

    public function __construct(
        public Order $order
    ) {}
}
```

#### Listener 1: SendOrderConfirmation

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
}
```

#### Listener 2: UpdateInventory

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
        
        \Log::info('Inventory updated for order', [
            'order_id' => $event->order->id,
        ]);
    }
}
```

#### Listener 3: GenerateInvoice

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Services\InvoiceService;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateInvoice implements ShouldQueue
{
    public function __construct(
        protected InvoiceService $invoiceService
    ) {}

    public function handle(OrderPlaced $event): void
    {
        $invoice = $this->invoiceService->generate($event->order);
        
        $event->order->update([
            'invoice_path' => $invoice->path,
        ]);
    }
}
```

#### Listener 4: NotifyWarehouse

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Notifications\NewOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyWarehouse implements ShouldQueue
{
    public function handle(OrderPlaced $event): void
    {
        // Send to Slack channel
        Notification::route('slack', config('services.slack.warehouse_webhook'))
            ->notify(new NewOrderNotification($event->order));
    }
}
```

#### Listener 5: UpdateAnalytics

```php
<?php

namespace App\Listeners;

use App\Events\OrderPlaced;

class UpdateAnalytics
{
    public function handle(OrderPlaced $event): void
    {
        $order = $event->order;
        
        // Update daily statistics
        \DB::table('daily_stats')
            ->where('date', today())
            ->increment('total_orders');
            
        \DB::table('daily_stats')
            ->where('date', today())
            ->increment('total_revenue', $order->total);
        
        // Track in analytics service
        // Analytics::track('order.placed', [...]);
    }
}
```

### Example 3: File Upload Processing

#### Event

```php
<?php

namespace App\Events;

use App\Models\File;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public File $file
    ) {}
}
```

#### Listener 1: ScanForViruses

```php
<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use App\Services\VirusScanService;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScanForViruses implements ShouldQueue
{
    public $queue = 'security';
    
    public function __construct(
        protected VirusScanService $scanner
    ) {}

    public function handle(FileUploaded $event): void
    {
        $result = $this->scanner->scan($event->file->path);
        
        if ($result->infected) {
            $event->file->update(['status' => 'infected']);
            $event->file->delete(); // Delete infected file
            
            \Log::alert('Infected file detected', [
                'file_id' => $event->file->id,
                'user_id' => $event->file->user_id,
            ]);
        } else {
            $event->file->update(['status' => 'safe']);
        }
    }
}
```

#### Listener 2: GenerateThumbnail

```php
<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GenerateThumbnail implements ShouldQueue
{
    public $queue = 'images';

    public function shouldQueue(FileUploaded $event): bool
    {
        // Only queue for images
        return in_array($event->file->type, ['image/jpeg', 'image/png', 'image/jpg']);
    }

    public function handle(FileUploaded $event): void
    {
        $image = Image::make(Storage::path($event->file->path));
        
        // Generate thumbnail
        $thumbnail = $image->fit(200, 200);
        
        $thumbnailPath = 'thumbnails/' . basename($event->file->path);
        Storage::put($thumbnailPath, (string) $thumbnail->encode());
        
        $event->file->update(['thumbnail_path' => $thumbnailPath]);
    }
}
```

#### Listener 3: ExtractMetadata

```php
<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use Illuminate\Support\Facades\Storage;

class ExtractMetadata
{
    public function handle(FileUploaded $event): void
    {
        $path = Storage::path($event->file->path);
        
        $metadata = [
            'size' => filesize($path),
            'mime_type' => mime_content_type($path),
            'extension' => pathinfo($path, PATHINFO_EXTENSION),
        ];
        
        // For images, extract EXIF data
        if (str_starts_with($event->file->type, 'image/')) {
            $exif = @exif_read_data($path);
            if ($exif) {
                $metadata['camera'] = $exif['Model'] ?? null;
                $metadata['date_taken'] = $exif['DateTimeOriginal'] ?? null;
            }
        }
        
        $event->file->update(['metadata' => $metadata]);
    }
}
```

#### Listener 4: UpdateStorageQuota

```php
<?php

namespace App\Listeners;

use App\Events\FileUploaded;

class UpdateStorageQuota
{
    public function handle(FileUploaded $event): void
    {
        $user = $event->file->user;
        
        $user->increment('storage_used', $event->file->size);
        
        // Check if approaching limit
        $storageLimit = $user->plan->storage_limit;
        $percentUsed = ($user->storage_used / $storageLimit) * 100;
        
        if ($percentUsed >= 90) {
            // Notify user they're approaching limit
            $user->notify(new \App\Notifications\StorageQuotaWarning($percentUsed));
        }
    }
}
```

### Example 4: Payment Processing

#### Event

```php
<?php

namespace App\Events;

use App\Models\Payment;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentProcessed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Payment $payment
    ) {}
}
```

#### Listener 1: SendReceipt

```php
<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use App\Mail\PaymentReceipt;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendReceipt implements ShouldQueue
{
    public $queue = 'emails';
    public $tries = 3;

    public function handle(PaymentProcessed $event): void
    {
        Mail::to($event->payment->user->email)
            ->send(new PaymentReceipt($event->payment));
    }
}
```

#### Listener 2: UpdateSubscription

```php
<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;

class UpdateSubscription
{
    public function handle(PaymentProcessed $event): void
    {
        $payment = $event->payment;
        
        if ($payment->type === 'subscription') {
            $payment->user->subscription()->update([
                'status' => 'active',
                'expires_at' => now()->addMonth(),
                'last_payment_at' => now(),
            ]);
        }
    }
}
```

#### Listener 3: RecordTransaction

```php
<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;

class RecordTransaction
{
    public function handle(PaymentProcessed $event): void
    {
        \DB::table('transactions')->insert([
            'user_id' => $event->payment->user_id,
            'payment_id' => $event->payment->id,
            'amount' => $event->payment->amount,
            'type' => 'credit',
            'description' => 'Payment received',
            'created_at' => now(),
        ]);
    }
}
```

#### Listener 4: NotifyAccountant

```php
<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAccountant implements ShouldQueue
{
    public function shouldQueue(PaymentProcessed $event): bool
    {
        // Only notify for large payments
        return $event->payment->amount >= 1000;
    }

    public function handle(PaymentProcessed $event): void
    {
        $accountant = \App\Models\User::where('role', 'accountant')->first();
        
        if ($accountant) {
            $accountant->notify(
                new \App\Notifications\LargePaymentReceived($event->payment)
            );
        }
    }
}
```

## Testing Listeners

### Test Listener is Registered

```php
<?php

namespace Tests\Feature;

use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    public function test_listener_is_registered_for_event()
    {
        Event::assertListening(
            UserRegistered::class,
            SendWelcomeEmail::class
        );
    }
}
```

### Test Listener Execution

```php
<?php

namespace Tests\Unit;

use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendWelcomeEmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_sends_welcome_email()
    {
        Mail::fake();

        $user = User::factory()->create();
        $event = new UserRegistered($user);

        $listener = new SendWelcomeEmail();
        $listener->handle($event);

        Mail::assertSent(\App\Mail\WelcomeEmail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }
}
```

### Test Queued Listener

```php
public function test_listener_is_queued()
{
    Queue::fake();

    $user = User::factory()->create();
    event(new UserRegistered($user));

    Queue::assertPushed(SendWelcomeEmail::class);
}
```

### Test Listener with Dependencies

```php
public function test_listener_uses_service()
{
    $mockService = $this->createMock(InventoryService::class);
    $mockService->expects($this->once())
        ->method('decrement');

    $listener = new UpdateInventory($mockService);
    
    $order = Order::factory()->create();
    $event = new OrderPlaced($order);
    
    $listener->handle($event);
}
```

### Test Failed Listener

```php
public function test_failed_listener_logs_error()
{
    Log::fake();

    $user = User::factory()->create();
    $event = new UserRegistered($user);
    $exception = new \Exception('SMTP error');

    $listener = new SendWelcomeEmail();
    $listener->failed($event, $exception);

    Log::assertLogged('error');
}
```

## Best Practices

### 1. Keep Listeners Focused

```php
// Good - single responsibility
class SendWelcomeEmail
{
    public function handle(UserRegistered $event): void
    {
        Mail::to($event->user)->send(new WelcomeEmail($event->user));
    }
}

// Bad - doing too much
class HandleUserRegistration
{
    public function handle(UserRegistered $event): void
    {
        // Send email
        // Create profile
        // Update analytics
        // Send notifications
        // Too much in one listener!
    }
}
```

### 2. Queue Slow Listeners

```php
// Good - queued for slow operations
class SendWelcomeEmail implements ShouldQueue
{
    // Sending emails is slow, queue it
}

// Bad - blocking operations
class SendWelcomeEmail
{
    // User waits for email to send
}
```

### 3. Handle Failures in Queued Listeners

```php
// Good - proper error handling
class SendWelcomeEmail implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        // Send email
    }

    public function failed(UserRegistered $event, Throwable $exception): void
    {
        \Log::error('Failed to send welcome email', [
            'user_id' => $event->user->id,
            'error' => $exception->getMessage(),
        ]);
    }
}

// Bad - no failure handling
class SendWelcomeEmail implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        // Send email
    }
    // No failed() method
}
```

### 4. Use Type Hints

```php
// Good - clear types
public function handle(UserRegistered $event): void
{
    $user = $event->user;
}

// Bad - unclear types
public function handle($event)
{
    $user = $event->user;
}
```

### 5. Return Early for Conditions

```php
// Good - early return
public function handle(UserRegistered $event): void
{
    if ($event->user->is_test_user) {
        return;
    }
    
    // Send email
}

// Bad - nested conditions
public function handle(UserRegistered $event): void
{
    if (!$event->user->is_test_user) {
        // Send email
    }
}
```

### 6. Use Dependency Injection

```php
// Good - injected dependencies
public function __construct(
    protected MailService $mailService
) {}

public function handle(UserRegistered $event): void
{
    $this->mailService->send($event->user);
}

// Acceptable - use facades
public function handle(UserRegistered $event): void
{
    Mail::to($event->user)->send(new WelcomeEmail($event->user));
}
```

### 7. Log Important Actions

```php
// Good - logging for audit trail
public function handle(OrderPlaced $event): void
{
    \Log::info('Order confirmation sent', [
        'order_id' => $event->order->id,
        'user_id' => $event->order->user_id,
    ]);
    
    // Send confirmation
}
```

### 8. Use shouldQueue() for Conditional Queueing

```php
// Good - conditional queueing
public function shouldQueue(OrderPlaced $event): bool
{
    return $event->order->total > 100;
}

// Bad - checking in handle()
public function handle(OrderPlaced $event): void
{
    if ($event->order->total > 100) {
        // Do something
    }
}
```

## Quick Reference

| Task | Code |
|------|------|
| Create listener | `php artisan make:listener ListenerName` |
| Create for event | `php artisan make:listener ListenerName --event=EventName` |
| Generate all | `php artisan event:generate` |
| Register listener | Add to `EventServiceProvider::$listen` |
| Queue listener | `implements ShouldQueue` |
| Stop propagation | `return false` in listener |
| Failed handler | `public function failed(Event $event, Throwable $e)` |
| Conditional queue | `public function shouldQueue(Event $event): bool` |
| Access event data | `$event->property` |
| Test registered | `Event::assertListening(Event::class, Listener::class)` |
| Test execution | Instantiate and call `handle()` |

## Listener vs Job

**When to use Listener:**
- Reacting to something that happened
- Multiple things need to happen after an event
- Event-driven architecture
- Loose coupling between components

**When to use Job:**
- Specific task that must complete
- Not necessarily tied to an event
- Need more control (retries, delays)
- Task is independent of events

**Example:**
```php
// Event + Listener - when user registers
event(new UserRegistered($user));
// Listeners: SendWelcomeEmail, CreateProfile, etc.

// Job - specific task
ProcessVideo::dispatch($video);
```

**Often used together:**
```php
class SendWelcomeEmail implements ShouldQueue
{
    // Listener that becomes a queued job
    public function handle(UserRegistered $event): void
    {
        // This runs as a queued job
    }
}
```

## Summary

**Listeners** allow you to:
- React to events in a decoupled way
- Handle multiple actions for a single event
- Queue slow operations for background processing
- Keep code organized and maintainable
- Test event reactions independently

**Key concepts**:
- **Events fire** → **Listeners react**
- **One event** → **Many listeners**
- **Queued listeners** run in background
- **Listener order** matters
- **Subscribers** handle multiple events
- **Type hints** for better code

Listeners are essential for event-driven architecture in Laravel!
