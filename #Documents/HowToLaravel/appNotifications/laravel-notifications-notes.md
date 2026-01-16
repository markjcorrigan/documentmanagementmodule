# Laravel Notifications - Complete Guide

## What Are Notifications?

Notifications are messages you send to users across various channels (email, SMS, Slack, database, etc.) to inform them about something. They provide a unified API for sending notifications through multiple channels from a single class.

### The Problem They Solve

```php
// Without Notifications - repetitive code
public function orderPlaced(Order $order)
{
    // Send email
    Mail::to($order->user)->send(new OrderConfirmationEmail($order));
    
    // Store in database
    DB::table('notifications')->insert([
        'user_id' => $order->user->id,
        'type' => 'order_placed',
        'data' => json_encode(['order_id' => $order->id]),
    ]);
    
    // Send SMS
    Twilio::sendSms($order->user->phone, 'Your order has been placed!');
    
    // Send to Slack
    Slack::send('#orders', 'New order placed');
}
```

```php
// With Notifications - clean and unified
public function orderPlaced(Order $order)
{
    $order->user->notify(new OrderPlaced($order));
}
```

### Why Use Notifications?

- **Multi-Channel**: Send to email, database, SMS, Slack, etc. from one place
- **Unified API**: Consistent interface across all channels
- **User Preferences**: Users can choose notification channels
- **Organization**: All notification logic in one class
- **Reusability**: Use same notification in multiple places
- **Testability**: Easy to test notifications
- **Queueing**: Queue notifications for background processing

### Common Use Cases

- Order confirmations
- Shipping updates
- Payment receipts
- New messages
- Friend requests
- Comment replies
- System alerts
- Account activity
- Reminder notifications
- Admin alerts

## Notification Channels

Laravel supports multiple notification channels:

| Channel | Use Case | Requires |
|---------|----------|----------|
| **mail** | Email notifications | Mail configured |
| **database** | Store in database, show in app | Migration |
| **broadcast** | Real-time notifications | Broadcasting configured |
| **vonage** | SMS via Vonage (Nexmo) | Vonage account |
| **slack** | Slack messages | Slack webhook |
| **custom** | Any custom channel | Custom channel class |

## File Locations

```
app/Notifications/OrderPlaced.php
app/Notifications/InvoiceGenerated.php
app/Notifications/CommentReply.php
database/migrations/*_create_notifications_table.php
```

## Creating Notifications

### Generate Notification

```bash
php artisan make:notification OrderPlaced
```

This creates: `app/Notifications/OrderPlaced.php`

### Basic Notification Structure

```php
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
```

## Sending Notifications

### Method 1: Using Notifiable Trait

```php
use App\Notifications\OrderPlaced;

// Send to single user (User model uses Notifiable trait)
$user->notify(new OrderPlaced($order));

// Send to multiple users
foreach ($users as $user) {
    $user->notify(new OrderPlaced($order));
}
```

### Method 2: Using Notification Facade

```php
use Illuminate\Support\Facades\Notification;

// Send to single user
Notification::send($user, new OrderPlaced($order));

// Send to multiple users
Notification::send($users, new OrderPlaced($order));

// Send to specific channels
Notification::route('mail', 'user@example.com')
    ->notify(new OrderPlaced($order));
```

### Method 3: On-Demand Notifications

Send to someone who isn't a user in your system:

```php
Notification::route('mail', 'guest@example.com')
    ->route('vonage', '15556667777')
    ->notify(new OrderPlaced($order));
```

## Mail Notifications

### Simple Mail Notification

```php
<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Order $order
    ) {}

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Order Confirmation - #' . $this->order->number)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your order has been placed successfully.')
            ->line('Order Number: ' . $this->order->number)
            ->line('Total: $' . number_format($this->order->total, 2))
            ->action('View Order', route('orders.show', $this->order))
            ->line('Thank you for your order!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            'total' => $this->order->total,
        ];
    }
}
```

### Customizing Mail Message

```php
public function toMail(object $notifiable): MailMessage
{
    return (new MailMessage)
        ->from('orders@example.com', 'Order Team')
        ->replyTo('support@example.com')
        ->subject('Order #' . $this->order->number . ' Confirmed')
        ->greeting('Hi ' . $notifiable->name . '!')
        ->line('Your order has been confirmed.')
        ->lineIf($this->order->hasDiscount(), 'You saved $' . $this->order->discount_amount . '!')
        ->action('Track Order', route('orders.track', $this->order))
        ->line('Estimated delivery: ' . $this->order->estimated_delivery->format('M d, Y'))
        ->salutation('Best regards, ' . config('app.name'));
}
```

### Using Markdown Mail Template

```php
public function toMail(object $notifiable): MailMessage
{
    return (new MailMessage)
        ->subject('Order Shipped!')
        ->markdown('emails.order-shipped', [
            'order' => $this->order,
            'trackingUrl' => route('orders.track', $this->order),
        ]);
}
```

### Attach Files to Mail Notification

```php
public function toMail(object $notifiable): MailMessage
{
    return (new MailMessage)
        ->subject('Invoice Ready')
        ->line('Your invoice is ready.')
        ->attach('/path/to/invoice.pdf', [
            'as' => 'Invoice-' . $this->invoice->number . '.pdf',
            'mime' => 'application/pdf',
        ])
        ->action('View Invoice', route('invoices.show', $this->invoice));
}
```

## Database Notifications

Database notifications store notification data in your database so you can display them in your app.

### Setup Database Notifications

```bash
# Create notifications table
php artisan notifications:table

# Run migration
php artisan migrate
```

This creates a `notifications` table with columns:
- id (uuid)
- type (notification class)
- notifiable_type (model type)
- notifiable_id (model id)
- data (json)
- read_at (timestamp)
- created_at (timestamp)

### Database Notification

```php
<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CommentReply extends Notification
{
    use Queueable;

    public function __construct(
        public Comment $comment
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'comment_id' => $this->comment->id,
            'post_id' => $this->comment->post_id,
            'author_name' => $this->comment->user->name,
            'excerpt' => substr($this->comment->body, 0, 50) . '...',
            'url' => route('posts.show', ['post' => $this->comment->post_id, 'comment' => $this->comment->id]),
        ];
    }
}
```

### Retrieving Database Notifications

```php
// Get all notifications for a user
$notifications = $user->notifications;

// Get unread notifications
$unreadNotifications = $user->unreadNotifications;

// Get notification count
$count = $user->unreadNotifications->count();

// Loop through notifications
foreach ($user->unreadNotifications as $notification) {
    echo $notification->type;        // Notification class
    echo $notification->data['author_name'];
    echo $notification->created_at;
}
```

### Marking Notifications as Read

```php
// Mark single notification as read
$notification = $user->notifications->first();
$notification->markAsRead();

// Mark all as read
$user->unreadNotifications->markAsRead();

// Mark specific notifications as read
$user->unreadNotifications()
    ->where('type', CommentReply::class)
    ->markAsRead();

// Delete notification
$notification->delete();

// Delete all notifications
$user->notifications()->delete();
```

### Display Notifications in Blade

```blade
<!-- Display unread count -->
<span class="notification-badge">
    {{ auth()->user()->unreadNotifications->count() }}
</span>

<!-- Display notifications -->
<div class="notifications-dropdown">
    @forelse(auth()->user()->unreadNotifications as $notification)
        <div class="notification-item">
            @if($notification->type === 'App\Notifications\CommentReply')
                <p>
                    <strong>{{ $notification->data['author_name'] }}</strong>
                    replied to your comment
                </p>
                <p class="excerpt">{{ $notification->data['excerpt'] }}</p>
                <a href="{{ $notification->data['url'] }}">View Comment</a>
            @elseif($notification->type === 'App\Notifications\OrderShipped')
                <p>Your order #{{ $notification->data['order_number'] }} has shipped!</p>
                <a href="{{ $notification->data['tracking_url'] }}">Track Package</a>
            @endif
            <small>{{ $notification->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p>No new notifications</p>
    @endforelse
</div>
```

## Broadcast Notifications (Real-Time)

Broadcast notifications send real-time updates to users via WebSockets.

### Setup Broadcasting

```bash
# Install Pusher (or use Laravel Echo Server)
composer require pusher/pusher-php-server
```

### Broadcast Notification

```php
<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification implements ShouldBroadcast
{
    use Queueable;

    public function __construct(
        public Message $message
    ) {}

    public function via(object $notifiable): array
    {
        return ['broadcast', 'database'];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'message_id' => $this->message->id,
            'sender_name' => $this->message->sender->name,
            'sender_avatar' => $this->message->sender->avatar_url,
            'body' => $this->message->body,
        ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message_id' => $this->message->id,
            'sender_name' => $this->message->sender->name,
            'body' => $this->message->body,
        ];
    }
}
```

### Listen for Broadcasts (JavaScript)

```javascript
// Using Laravel Echo
Echo.private(`App.Models.User.${userId}`)
    .notification((notification) => {
        console.log(notification);
        
        // Display notification
        showNotification(notification.sender_name, notification.body);
        
        // Update notification count
        updateNotificationCount();
    });
```

## SMS Notifications (Vonage/Nexmo)

### Setup Vonage

```bash
composer require laravel/vonage-notification-channel
```

```env
VONAGE_KEY=your-key
VONAGE_SECRET=your-secret
VONAGE_SMS_FROM=15556667777
```

### SMS Notification

```php
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class OrderShipped extends Notification
{
    use Queueable;

    public function __construct(
        public $order
    ) {}

    public function via(object $notifiable): array
    {
        return ['vonage'];
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        return (new VonageMessage)
            ->content('Your order #' . $this->order->number . ' has shipped! Track at: ' . route('track', $this->order));
    }

    // Specify phone number route
    public function routeNotificationForVonage(object $notifiable): string
    {
        return $notifiable->phone;
    }
}
```

## Slack Notifications

### Setup Slack

```bash
composer require laravel/slack-notification-channel
```

### Slack Notification

```php
<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Order $order
    ) {}

    public function via(object $notifiable): array
    {
        return ['slack'];
    }

    public function toSlack(object $notifiable): SlackMessage
    {
        return (new SlackMessage)
            ->from('Order Bot', ':shopping_cart:')
            ->to('#orders')
            ->content('New order placed!')
            ->attachment(function ($attachment) {
                $attachment
                    ->title('Order #' . $this->order->number, route('admin.orders.show', $this->order))
                    ->fields([
                        'Customer' => $this->order->user->name,
                        'Total' => '$' . number_format($this->order->total, 2),
                        'Items' => $this->order->items->count(),
                    ])
                    ->color($this->order->total > 100 ? 'good' : 'warning');
            });
    }
}
```

### Send to Slack Webhook

```php
// On-demand notification to Slack
Notification::route('slack', config('services.slack.orders_webhook'))
    ->notify(new NewOrderNotification($order));
```

## Custom Notification Channels

### Create Custom Channel

```php
<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send(object $notifiable, Notification $notification): void
    {
        $message = $notification->toSms($notifiable);

        // Send SMS using your preferred service
        // $this->smsService->send($notifiable->phone, $message);
    }
}
```

### Use Custom Channel

```php
<?php

namespace App\Notifications;

use App\Notifications\Channels\SmsChannel;
use Illuminate\Notifications\Notification;

class AccountVerification extends Notification
{
    public function via(object $notifiable): array
    {
        return [SmsChannel::class];
    }

    public function toSms(object $notifiable): string
    {
        return 'Your verification code is: ' . $this->code;
    }
}
```

## Conditional Channels

### Via Method with Conditions

```php
public function via(object $notifiable): array
{
    $channels = ['database'];

    // Send email if user wants email notifications
    if ($notifiable->prefers_email_notifications) {
        $channels[] = 'mail';
    }

    // Send SMS for urgent notifications
    if ($this->isUrgent) {
        $channels[] = 'vonage';
    }

    // Send Slack for admin users
    if ($notifiable->isAdmin()) {
        $channels[] = 'slack';
    }

    return $channels;
}
```

### User Notification Preferences

```php
public function via(object $notifiable): array
{
    $channels = ['database']; // Always store in database

    $preferences = $notifiable->notification_preferences ?? [];

    if ($preferences['email'] ?? true) {
        $channels[] = 'mail';
    }

    if ($preferences['sms'] ?? false) {
        $channels[] = 'vonage';
    }

    return $channels;
}
```

## Complete Working Examples

### Example 1: Order Lifecycle Notifications

#### Notification: OrderPlaced

```php
<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Order $order
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Order Confirmation - #' . $this->order->number)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Thank you for your order!')
            ->line('Order Number: ' . $this->order->number)
            ->line('Total: $' . number_format($this->order->total, 2))
            ->line('Items: ' . $this->order->items->count())
            ->action('View Order', route('orders.show', $this->order))
            ->line('We will notify you when your order ships.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'order_placed',
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            'total' => $this->order->total,
            'url' => route('orders.show', $this->order),
        ];
    }
}
```

#### Notification: OrderShipped

```php
<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderShipped extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Order $order
    ) {}

    public function via(object $notifiable): array
    {
        $channels = ['mail', 'database'];
        
        // Send SMS if user has phone
        if ($notifiable->phone) {
            $channels[] = 'vonage';
        }
        
        return $channels;
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Order Shipped - #' . $this->order->number)
            ->greeting('Great news, ' . $notifiable->name . '!')
            ->line('Your order has shipped!')
            ->line('Order Number: ' . $this->order->number)
            ->line('Tracking Number: ' . $this->order->tracking_number)
            ->line('Estimated Delivery: ' . $this->order->estimated_delivery->format('M d, Y'))
            ->action('Track Package', route('orders.track', $this->order))
            ->line('Thank you for shopping with us!');
    }

    public function toVonage(object $notifiable)
    {
        return (new \Illuminate\Notifications\Messages\VonageMessage)
            ->content('Your order #' . $this->order->number . ' has shipped! Track: ' . route('orders.track', $this->order));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'order_shipped',
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            'tracking_number' => $this->order->tracking_number,
            'estimated_delivery' => $this->order->estimated_delivery,
            'tracking_url' => route('orders.track', $this->order),
        ];
    }
}
```

#### Notification: OrderDelivered

```php
<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderDelivered extends Notification
{
    use Queueable;

    public function __construct(
        public Order $order
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Order Delivered - #' . $this->order->number)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your order has been delivered!')
            ->line('Order Number: ' . $this->order->number)
            ->line('We hope you love your purchase!')
            ->action('Review Your Order', route('orders.review', $this->order))
            ->line('Thank you for shopping with us!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'order_delivered',
            'order_id' => $this->order->id,
            'order_number' => $this->order->number,
            'review_url' => route('orders.review', $this->order),
        ];
    }
}
```

#### Usage

```php
// When order is placed
$order->user->notify(new OrderPlaced($order));

// When order ships
$order->user->notify(new OrderShipped($order));

// When order is delivered
$order->user->notify(new OrderDelivered($order));
```

### Example 2: Social Notifications

#### Notification: CommentReply

```php
<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentReply extends Notification implements ShouldBroadcast
{
    use Queueable;

    public function __construct(
        public Comment $comment
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->comment->user->name . ' replied to your comment')
            ->line($this->comment->user->name . ' replied to your comment on "' . $this->comment->post->title . '"')
            ->line('"' . substr($this->comment->body, 0, 100) . '..."')
            ->action('View Reply', route('posts.show', ['post' => $this->comment->post_id, 'comment' => $this->comment->id]));
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'type' => 'comment_reply',
            'comment_id' => $this->comment->id,
            'author_name' => $this->comment->user->name,
            'author_avatar' => $this->comment->user->avatar_url,
            'excerpt' => substr($this->comment->body, 0, 50) . '...',
            'post_title' => $this->comment->post->title,
            'url' => route('posts.show', ['post' => $this->comment->post_id, 'comment' => $this->comment->id]),
        ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'comment_reply',
            'comment_id' => $this->comment->id,
            'post_id' => $this->comment->post_id,
            'author_name' => $this->comment->user->name,
            'author_avatar' => $this->comment->user->avatar_url,
            'excerpt' => substr($this->comment->body, 0, 100),
            'url' => route('posts.show', ['post' => $this->comment->post_id, 'comment' => $this->comment->id]),
        ];
    }
}
```

#### Notification: FriendRequest

```php
<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class FriendRequest extends Notification implements ShouldBroadcast
{
    use Queueable;

    public function __construct(
        public User $sender
    ) {}

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'type' => 'friend_request',
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'sender_avatar' => $this->sender->avatar_url,
        ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'friend_request',
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'sender_avatar' => $this->sender->avatar_url,
            'url' => route('friends.requests'),
        ];
    }
}
```

### Example 3: System Notifications

#### Notification: MaintenanceScheduled

```php
<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MaintenanceScheduled extends Notification
{
    use Queueable;

    public function __construct(
        public Carbon $scheduledAt,
        public int $durationMinutes
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Scheduled Maintenance Notice')
            ->line('We will be performing scheduled maintenance on our system.')
            ->line('**Start Time:** ' . $this->scheduledAt->format('F j, Y g:i A'))
            ->line('**Duration:** Approximately ' . $this->durationMinutes . ' minutes')
            ->line('During this time, the application will be temporarily unavailable.')
            ->line('We apologize for any inconvenience.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'maintenance_scheduled',
            'scheduled_at' => $this->scheduledAt,
            'duration_minutes' => $this->durationMinutes,
        ];
    }
}
```

#### Notification: AccountSecurity

```php
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountSecurity extends Notification
{
    use Queueable;

    public function __construct(
        public string $activity,
        public string $ipAddress,
        public string $location
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Security Alert: ' . $this->activity)
            ->line('We detected a new ' . $this->activity . ' on your account.')
            ->line('**Location:** ' . $this->location)
            ->line('**IP Address:** ' . $this->ipAddress)
            ->line('**Time:** ' . now()->format('F j, Y g:i A'))
            ->line('If this was you, you can ignore this message.')
            ->line('If this wasn\'t you, please secure your account immediately.')
            ->action('Review Activity', route('account.security'))
            ->line('Stay safe!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'account_security',
            'activity' => $this->activity,
            'ip_address' => $this->ipAddress,
            'location' => $this->location,
            'timestamp' => now(),
        ];
    }
}
```

### Example 4: Admin Notifications

#### Notification: NewUserRegistered

```php
<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;

    public function __construct(
        public User $user
    ) {}

    public function via(object $notifiable): array
    {
        return ['slack', 'database'];
    }

    public function toSlack(object $notifiable): SlackMessage
    {
        return (new SlackMessage)
            ->from('User Bot', ':bust_in_silhouette:')
            ->to('#user-registrations')
            ->content('New user registered!')
            ->attachment(function ($attachment) {
                $attachment
                    ->title($this->user->name, route('admin.users.show', $this->user))
                    ->fields([
                        'Email' => $this->user->email,
                        'Registered' => $this->user->created_at->diffForHumans(),
                        'IP' => request()->ip(),
                    ])
                    ->color('good');
            });
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'new_user',
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'user_email' => $this->user->email,
        ];
    }
}
```

### Example 5: Notification with User Preferences

#### User Model

```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'notification_preferences' => 'array',
    ];

    // Helper to check preference
    public function wantsNotificationVia(string $channel, string $type = null): bool
    {
        $preferences = $this->notification_preferences ?? [];

        if ($type) {
            return $preferences[$type][$channel] ?? true;
        }

        return $preferences[$channel] ?? true;
    }
}
```

#### Notification Using Preferences

```php
<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    public function via(object $notifiable): array
    {
        $channels = [];

        if ($notifiable->wantsNotificationVia('database')) {
            $channels[] = 'database';
        }

        if ($notifiable->wantsNotificationVia('mail', 'general')) {
            $channels[] = 'mail';
        }

        if ($notifiable->wantsNotificationVia('sms', 'general')) {
            $channels[] = 'vonage';
        }

        return $channels;
    }

    // ... rest of notification
}
```

## Testing Notifications

### Test Notification is Sent

```php
<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\OrderPlaced;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class OrderNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_notification_is_sent_when_order_placed()
    {
        Notification::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);

        $user->notify(new OrderPlaced($order));

        Notification::assertSentTo($user, OrderPlaced::class);
    }

    public function test_notification_has_correct_data()
    {
        Notification::fake();

        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id]);

        $user->notify(new OrderPlaced($order));

        Notification::assertSentTo(
            $user,
            OrderPlaced::class,
            function ($notification) use ($order) {
                return $notification->order->id === $order->id;
            }
        );
    }

    public function test_notification_sent_via_correct_channels()
    {
        $user = User::factory()->create();
        $order = Order::factory()->create();
        $notification = new OrderPlaced($order);

        $this->assertContains('mail', $notification->via($user));
        $this->assertContains('database', $notification->via($user));
    }
}
```

### Test Database Notification

```php
public function test_notification_is_stored_in_database()
{
    $user = User::factory()->create();
    $order = Order::factory()->create();

    $user->notify(new OrderPlaced($order));

    $this->assertDatabaseHas('notifications', [
        'notifiable_id' => $user->id,
        'notifiable_type' => User::class,
        'type' => OrderPlaced::class,
    ]);
}

public function test_notification_data_is_correct()
{
    $user = User::factory()->create();
    $order = Order::factory()->create(['number' => 'ORD-123']);

    $user->notify(new OrderPlaced($order));

    $notification = $user->notifications->first();

    $this->assertEquals('ORD-123', $notification->data['order_number']);
}
```

### Test Mail Notification Content

```php
public function test_mail_notification_has_correct_subject()
{
    $user = User::factory()->create();
    $order = Order::factory()->create(['number' => 'ORD-123']);
    
    $notification = new OrderPlaced($order);
    $mailMessage = $notification->toMail($user);

    $this->assertEquals(
        'Order Confirmation - #ORD-123',
        $mailMessage->subject
    );
}

public function test_mail_notification_has_action_button()
{
    $user = User::factory()->create();
    $order = Order::factory()->create();
    
    $notification = new OrderPlaced($order);
    $mailMessage = $notification->toMail($user);

    $this->assertNotEmpty($mailMessage->actionText);
    $this->assertNotEmpty($mailMessage->actionUrl);
}
```

## Best Practices

### 1. Use Appropriate Channels

```php
// Good - multiple channels for important notifications
public function via(object $notifiable): array
{
    return ['mail', 'database', 'vonage'];
}

// Good - database only for in-app notifications
public function via(object $notifiable): array
{
    return ['database'];
}

// Bad - SMS for everything (expensive)
public function via(object $notifiable): array
{
    return ['vonage'];
}
```

### 2. Queue Notifications

```php
// Good - queued for performance
class OrderPlaced extends Notification implements ShouldQueue
{
    use Queueable;
}

// Bad - synchronous (slow)
class OrderPlaced extends Notification
{
    // User waits for all channels to send
}
```

### 3. Respect User Preferences

```php
// Good - check preferences
public function via(object $notifiable): array
{
    $channels = ['database'];
    
    if ($notifiable->wants_email) {
        $channels[] = 'mail';
    }
    
    return $channels;
}

// Bad - ignore preferences
public function via(object $notifiable): array
{
    return ['mail', 'database', 'vonage'];
}
```

### 4. Provide Actionable Content

```php
// Good - clear action
return (new MailMessage)
    ->line('Your order has shipped.')
    ->action('Track Package', $trackingUrl);

// Bad - no action
return (new MailMessage)
    ->line('Your order has shipped.');
```

### 5. Include Relevant Data

```php
// Good - complete data for display
public function toArray(object $notifiable): array
{
    return [
        'type' => 'order_placed',
        'order_id' => $this->order->id,
        'order_number' => $this->order->number,
        'total' => $this->order->total,
        'url' => route('orders.show', $this->order),
    ];
}

// Bad - minimal data
public function toArray(object $notifiable): array
{
    return [
        'order_id' => $this->order->id,
    ];
}
```

### 6. Use Type Hints

```php
// Good - clear types
public function __construct(
    public Order $order
) {}

// Bad - unclear types
public function __construct(
    public $order
) {}
```

### 7. Handle Failures

```php
// In queued notification
public function failed(Throwable $exception): void
{
    \Log::error('Notification failed', [
        'notification' => self::class,
        'error' => $exception->getMessage(),
    ]);
}
```

### 8. Keep Notification Text Concise

```php
// Good - concise
->line('Your order has shipped.')
->line('Tracking: ' . $trackingNumber)

// Bad - verbose
->line('We are pleased to inform you that your order has been successfully shipped and is now on its way to your designated delivery address.')
```

## Quick Reference

| Task | Code |
|------|------|
| Create notification | `php artisan make:notification NotificationName` |
| Send notification | `$user->notify(new Notification($data))` |
| Send to multiple | `Notification::send($users, new Notification($data))` |
| On-demand | `Notification::route('mail', 'email')->notify(...)` |
| Get notifications | `$user->notifications` |
| Get unread | `$user->unreadNotifications` |
| Mark as read | `$notification->markAsRead()` |
| Mark all as read | `$user->unreadNotifications->markAsRead()` |
| Delete notification | `$notification->delete()` |
| Test sent | `Notification::assertSentTo($user, Notification::class)` |
| Create notifications table | `php artisan notifications:table` |

## Notification Channels Quick Reference

| Channel | Method | Use Case |
|---------|--------|----------|
| **mail** | `toMail()` | Email notifications |
| **database** | `toArray()` | In-app notifications |
| **broadcast** | `toBroadcast()` | Real-time notifications |
| **vonage** | `toVonage()` | SMS notifications |
| **slack** | `toSlack()` | Slack messages |
| **custom** | `toCustom()` | Custom channels |

## MailMessage Methods

| Method | Purpose |
|--------|---------|
| `->greeting()` | Set greeting |
| `->line()` | Add line of text |
| `->lineIf()` | Conditional line |
| `->action()` | Add action button |
| `->subject()` | Set email subject |
| `->from()` | Set from address |
| `->replyTo()` | Set reply-to |
| `->attach()` | Add attachment |
| `->markdown()` | Use markdown template |
| `->salutation()` | Set closing |

## Summary

**Notifications** provide a unified way to:
- Send messages across multiple channels (email, database, SMS, Slack, etc.)
- Store notifications in database for in-app display
- Send real-time notifications via broadcasting
- Respect user notification preferences
- Queue notifications for background processing
- Test notification sending and content

**Key concepts**:
- **Channels**: Where notifications are sent (mail, database, broadcast, etc.)
- **via()**: Determines which channels to use
- **toMail()**: Formats email notification
- **toArray()**: Formats database notification
- **Notifiable**: Trait that makes models receivable
- **Queueing**: Background processing
- **User Preferences**: Customizable notification settings

Notifications make multi-channel communication in Laravel simple and maintainable!
