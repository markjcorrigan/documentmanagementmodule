# Laravel Jobs - Complete Guide

## What Are Jobs?

Jobs are tasks that can be queued (pushed to background processing) instead of running immediately. They allow you to defer time-consuming operations so your application responds faster to users.

### The Problem They Solve

```php
// Without Jobs - user waits for everything to complete
public function register(Request $request)
{
    $user = User::create($request->all());
    
    Mail::to($user)->send(new WelcomeEmail($user));           // Takes 2 seconds
    $this->resizeProfileImage($user);                          // Takes 3 seconds
    $this->generatePDF($user);                                 // Takes 5 seconds
    $this->sendSlackNotification($user);                       // Takes 1 second
    
    return redirect('/dashboard');  // User waited 11 seconds!
}
```

```php
// With Jobs - user gets instant response
public function register(Request $request)
{
    $user = User::create($request->all());
    
    SendWelcomeEmail::dispatch($user);
    ResizeProfileImage::dispatch($user);
    GenerateUserPDF::dispatch($user);
    SendSlackNotification::dispatch($user);
    
    return redirect('/dashboard');  // User waits < 1 second!
}
// Jobs process in background
```

### Why Use Jobs?

- **Speed**: User doesn't wait for slow operations
- **Reliability**: Failed jobs can retry automatically
- **Scalability**: Process tasks across multiple workers
- **Priority**: Process important jobs first
- **Rate Limiting**: Control API call frequency
- **Scheduling**: Process tasks at specific times
- **Resource Management**: Prevent server overload

### Common Use Cases

- Sending emails
- Processing images/videos
- Generating PDFs/reports
- API calls to external services
- Database maintenance
- Importing/exporting data
- Sending notifications
- Processing payments
- Analytics tracking
- Cache warming

## File Locations

```
app/Jobs/SendWelcomeEmail.php
app/Jobs/ProcessVideo.php
app/Jobs/GenerateReport.php
config/queue.php                    (Queue configuration)
database/migrations/*_create_jobs_table.php
```

## Creating Jobs

### Generate Job

```bash
php artisan make:job SendWelcomeEmail
```

This creates: `app/Jobs/SendWelcomeEmail.php`

### Basic Job Structure

```php
<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
```

### Simple Job Example

```php
<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User $user
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new WelcomeEmail($this->user));
    }
}
```

## Dispatching Jobs

### Method 1: Using dispatch() Helper

```php
use App\Jobs\SendWelcomeEmail;

// Dispatch immediately
dispatch(new SendWelcomeEmail($user));

// Dispatch to specific queue
dispatch(new SendWelcomeEmail($user))->onQueue('emails');

// Dispatch with delay
dispatch(new SendWelcomeEmail($user))->delay(now()->addMinutes(10));
```

### Method 2: Using Static dispatch() Method

```php
use App\Jobs\SendWelcomeEmail;

// Dispatch immediately
SendWelcomeEmail::dispatch($user);

// Dispatch to specific queue
SendWelcomeEmail::dispatch($user)->onQueue('emails');

// Dispatch with delay
SendWelcomeEmail::dispatch($user)->delay(now()->addMinutes(10));
```

### Method 3: Dispatch If/Unless

```php
// Only dispatch if condition is true
SendWelcomeEmail::dispatchIf($user->wants_emails, $user);

// Only dispatch if condition is false
SendWelcomeEmail::dispatchUnless($user->is_banned, $user);
```

### Method 4: Dispatch After Response

```php
// Dispatch after HTTP response is sent to user
SendWelcomeEmail::dispatchAfterResponse($user);
```

### Method 5: Dispatch Synchronously (Run Immediately)

```php
// Run immediately without queuing
SendWelcomeEmail::dispatchSync($user);

// Or use dispatchNow (same thing)
SendWelcomeEmail::dispatchNow($user);
```

## Queue Configuration

### Configure Queue Driver

```php
// .env file

# Use database for queue
QUEUE_CONNECTION=database

# Or use Redis (recommended for production)
QUEUE_CONNECTION=redis

# Or use sync (no queue, runs immediately)
QUEUE_CONNECTION=sync
```

### Queue Drivers

| Driver | Use Case | Setup Required |
|--------|----------|----------------|
| **sync** | Development, testing | None - runs immediately |
| **database** | Simple apps, low traffic | Migration required |
| **redis** | Production, high traffic | Redis server required |
| **sqs** | AWS infrastructure | AWS SQS setup |
| **beanstalkd** | Alternative to Redis | Beanstalkd server |

### Setup Database Queue

```bash
# Create jobs table migration
php artisan queue:table

# Run migration
php artisan migrate
```

This creates a `jobs` table to store queued jobs.

### Setup Failed Jobs Table

```bash
# Create failed_jobs table migration
php artisan queue:failed-table

# Run migration
php artisan migrate
```

## Job Properties and Configuration

### Tries (Maximum Attempts)

```php
<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     */
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     */
    public $timeout = 120;

    public function __construct(
        public string $videoPath
    ) {}

    public function handle(): void
    {
        // Process video
    }
}
```

### Timeout (Maximum Execution Time)

```php
public $timeout = 300; // 5 minutes
```

### Backoff (Time Between Retries)

```php
// Wait increasing time between retries
public $backoff = [30, 60, 120]; // 30s, then 60s, then 120s

// Or use a method
public function backoff(): array
{
    return [30, 60, 120, 240];
}
```

### Max Exceptions Before Failing

```php
// Fail after 3 exceptions, even if tries left
public $maxExceptions = 3;
```

### Delete Job on Failure

```php
// Delete job if it fails (default is keep in failed_jobs table)
public $deleteWhenMissingModels = true;
```

### Specify Queue

```php
// Run on specific queue
public $queue = 'emails';
```

### Specify Connection

```php
// Use specific queue connection
public $connection = 'redis';
```

## Job Middleware

Job middleware allows you to wrap job execution with custom logic.

### Creating Job Middleware

```bash
php artisan make:middleware RateLimited
```

```php
<?php

namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\Redis;

class RateLimited
{
    /**
     * Process the queued job.
     */
    public function handle(object $job, callable $next): void
    {
        Redis::throttle('key')
            ->block(0)
            ->allow(10)
            ->every(60)
            ->then(
                function () use ($job, $next) {
                    // Lock obtained, process job
                    $next($job);
                },
                function () use ($job) {
                    // Could not obtain lock, release job back to queue
                    $job->release(10);
                }
            );
    }
}
```

### Using Job Middleware

```php
<?php

namespace App\Jobs;

use App\Jobs\Middleware\RateLimited;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Get the middleware the job should pass through.
     */
    public function middleware(): array
    {
        return [new RateLimited];
    }

    public function handle(): void
    {
        // Process podcast
    }
}
```

### Built-in Middleware

```php
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

public function middleware(): array
{
    return [
        // Prevent job overlap
        new WithoutOverlapping('user-'.$this->user->id),
        
        // Rate limit jobs
        new RateLimited('backups'),
        
        // Throttle exceptions
        new ThrottlesExceptions(10, 5), // 10 exceptions in 5 minutes
    ];
}
```

## Job Chaining

Chain multiple jobs to run in sequence:

```php
use App\Jobs\ProcessVideo;
use App\Jobs\GenerateThumbnail;
use App\Jobs\NotifyUser;
use Illuminate\Support\Facades\Bus;

Bus::chain([
    new ProcessVideo($video),
    new GenerateThumbnail($video),
    new NotifyUser($user, $video),
])->dispatch();
```

### Chain with Callbacks

```php
Bus::chain([
    new ProcessVideo($video),
    new GenerateThumbnail($video),
    new NotifyUser($user, $video),
])->catch(function (Throwable $e) {
    // A job in the chain failed
    Log::error('Video processing chain failed', ['error' => $e->getMessage()]);
})->dispatch();
```

### Chain on Specific Queue

```php
Bus::chain([
    new ProcessVideo($video),
    new GenerateThumbnail($video),
])->onQueue('videos')->dispatch();
```

### Dispatch Chain If

```php
Bus::chainIf($video->needsProcessing(), [
    new ProcessVideo($video),
    new GenerateThumbnail($video),
])->dispatch();
```

## Job Batching

Process multiple jobs as a batch and track their progress:

### Create a Batch

```php
use App\Jobs\ProcessVideo;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

$batch = Bus::batch([
    new ProcessVideo($video1),
    new ProcessVideo($video2),
    new ProcessVideo($video3),
])->then(function (Batch $batch) {
    // All jobs completed successfully
})->catch(function (Batch $batch, Throwable $e) {
    // First batch job failure detected
})->finally(function (Batch $batch) {
    // The batch has finished executing
})->dispatch();

return $batch->id;
```

### Setup Batching

```bash
# Create batches table
php artisan queue:batches-table

# Run migration
php artisan migrate
```

### Check Batch Progress

```php
use Illuminate\Support\Facades\Bus;

$batch = Bus::findBatch($batchId);

// Check progress
$batch->progress();         // Percentage complete
$batch->totalJobs;          // Total jobs
$batch->processedJobs();    // Completed jobs
$batch->pendingJobs;        // Remaining jobs
$batch->failedJobs;         // Failed jobs

// Check status
$batch->finished();         // All jobs finished
$batch->cancelled();        // Batch was cancelled
$batch->hasFailures();      // Any job failed
```

### Batch in Blade View

```blade
<div>
    <p>Progress: {{ $batch->progress() }}%</p>
    <p>Total: {{ $batch->totalJobs }}</p>
    <p>Processed: {{ $batch->processedJobs() }}</p>
    <p>Pending: {{ $batch->pendingJobs }}</p>
    <p>Failed: {{ $batch->failedJobs }}</p>
</div>
```

### Adding Jobs to Batch

```php
$batch = Bus::findBatch($batchId);

$batch->add([
    new ProcessVideo($video4),
    new ProcessVideo($video5),
]);
```

### Cancel a Batch

```php
$batch = Bus::findBatch($batchId);
$batch->cancel();
```

## Handling Failed Jobs

### Failed Job Handler

```php
<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public function __construct(
        public int $orderId
    ) {}

    public function handle(): void
    {
        // Process payment
    }

    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception): void
    {
        // Send notification to admin
        // Log to monitoring service
        // Update order status
        
        \Log::error('Payment processing failed', [
            'order_id' => $this->orderId,
            'error' => $exception->getMessage(),
        ]);
        
        // Notify admin
        // \Notification::send($admins, new PaymentFailedNotification($this->orderId));
    }
}
```

### View Failed Jobs

```bash
# List all failed jobs
php artisan queue:failed

# Retry a specific failed job
php artisan queue:retry {id}

# Retry all failed jobs
php artisan queue:retry all

# Forget a failed job
php artisan queue:forget {id}

# Delete all failed jobs
php artisan queue:flush
```

### Manually Failing a Job

```php
public function handle(): void
{
    if ($this->somethingWrong()) {
        $this->fail('Something went wrong');
    }
}
```

### Release Job Back to Queue

```php
public function handle(): void
{
    if ($this->apiIsDown()) {
        // Release back to queue with 30 second delay
        $this->release(30);
        return;
    }
    
    // Continue processing
}
```

## Running Queue Workers

### Start Queue Worker

```bash
# Process jobs from default queue
php artisan queue:work

# Process from specific queue
php artisan queue:work --queue=emails

# Process from multiple queues (priority order)
php artisan queue:work --queue=high,default,low

# Process from specific connection
php artisan queue:work redis

# Process only one job then stop
php artisan queue:work --once

# Limit memory usage
php artisan queue:work --memory=128

# Set timeout
php artisan queue:work --timeout=60

# Stop after processing all jobs
php artisan queue:work --stop-when-empty
```

### Queue Worker Daemon

```bash
# Run as daemon with supervisor (production)
php artisan queue:work --tries=3 --timeout=60
```

### Restart Workers

```bash
# Gracefully restart all workers
php artisan queue:restart
```

### Monitor Queue

```bash
# Monitor queue in real-time
php artisan queue:monitor redis:default --max=100
```

## Complete Working Examples

### Example 1: User Registration Flow

#### Jobs

```php
<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 30;
    public $queue = 'emails';

    public function __construct(
        public User $user
    ) {}

    public function handle(): void
    {
        Mail::to($this->user->email)->send(new WelcomeEmail($this->user));
    }

    public function failed(Throwable $exception): void
    {
        \Log::error('Failed to send welcome email', [
            'user_id' => $this->user->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
```

```php
<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateUserProfile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public User $user
    ) {}

    public function handle(): void
    {
        $this->user->profile()->create([
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

```php
<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyAdminOfNewUser implements ShouldQueue
{
    use Dispatchable, Queueable;

    public $queue = 'notifications';

    public function __construct(
        public User $user
    ) {}

    public function handle(): void
    {
        // Send Slack notification
        // Or email to admins
        // Or both
    }
}
```

#### Controller

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Jobs\CreateUserProfile;
use App\Jobs\NotifyAdminOfNewUser;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Bus;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        // Create user
        $user = User::create($request->validated());
        
        // Chain jobs
        Bus::chain([
            new CreateUserProfile($user),
            new SendWelcomeEmail($user),
        ])->dispatch();
        
        // Dispatch notification separately (not dependent on chain)
        NotifyAdminOfNewUser::dispatch($user);
        
        return redirect('/dashboard')
            ->with('success', 'Account created successfully!');
    }
}
```

### Example 2: Video Processing

#### Job

```php
<?php

namespace App\Jobs;

use App\Models\Video;
use FFMpeg\FFMpeg;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;
    public $timeout = 3600; // 1 hour
    public $queue = 'videos';
    
    public function __construct(
        public Video $video
    ) {}

    public function handle(): void
    {
        // Update status
        $this->video->update(['status' => 'processing']);
        
        $ffmpeg = FFMpeg::create();
        $videoFile = $ffmpeg->open(Storage::path($this->video->path));
        
        // Generate different quality versions
        $qualities = [
            '1080p' => ['width' => 1920, 'height' => 1080],
            '720p' => ['width' => 1280, 'height' => 720],
            '480p' => ['width' => 854, 'height' => 480],
        ];
        
        foreach ($qualities as $quality => $dimensions) {
            $outputPath = "videos/{$this->video->id}/{$quality}.mp4";
            
            $videoFile
                ->filters()
                ->resize(new \FFMpeg\Coordinate\Dimension($dimensions['width'], $dimensions['height']))
                ->synchronize();
                
            $videoFile
                ->save(new \FFMpeg\Format\Video\X264(), Storage::path($outputPath));
            
            // Update video record
            $this->video->versions()->create([
                'quality' => $quality,
                'path' => $outputPath,
                'size' => Storage::size($outputPath),
            ]);
        }
        
        // Generate thumbnail
        $videoFile
            ->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(1))
            ->save(Storage::path("videos/{$this->video->id}/thumbnail.jpg"));
        
        // Update status
        $this->video->update([
            'status' => 'completed',
            'thumbnail' => "videos/{$this->video->id}/thumbnail.jpg",
        ]);
        
        // Notify user
        NotifyVideoProcessed::dispatch($this->video);
    }

    public function failed(Throwable $exception): void
    {
        $this->video->update(['status' => 'failed']);
        
        \Log::error('Video processing failed', [
            'video_id' => $this->video->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
```

#### Controller

```php
<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessVideo;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,mov,avi|max:512000', // 500MB
        ]);
        
        // Store original video
        $path = $request->file('video')->store('videos/originals');
        
        // Create video record
        $video = Video::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'path' => $path,
            'status' => 'pending',
        ]);
        
        // Queue processing
        ProcessVideo::dispatch($video);
        
        return redirect()->route('videos.show', $video)
            ->with('success', 'Video uploaded! Processing will begin shortly.');
    }
}
```

### Example 3: Batch Import

#### Job

```php
<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProduct implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public function __construct(
        public array $productData
    ) {}

    public function handle(): void
    {
        // Check if batch has been cancelled
        if ($this->batch()->cancelled()) {
            return;
        }
        
        Product::updateOrCreate(
            ['sku' => $this->productData['sku']],
            [
                'name' => $this->productData['name'],
                'description' => $this->productData['description'],
                'price' => $this->productData['price'],
                'stock' => $this->productData['stock'],
                'category_id' => $this->productData['category_id'],
            ]
        );
    }
}
```

#### Controller

```php
<?php

namespace App\Http\Controllers;

use App\Jobs\ImportProduct;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ProductImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);
        
        // Parse CSV
        $products = $this->parseCSV($request->file('file'));
        
        // Create batch of jobs
        $batch = Bus::batch(
            collect($products)->map(fn ($product) => new ImportProduct($product))
        )->then(function (Batch $batch) {
            // All jobs completed successfully
            \Log::info("Product import completed", ['batch_id' => $batch->id]);
        })->catch(function (Batch $batch, Throwable $e) {
            // First batch job failure
            \Log::error("Product import failed", [
                'batch_id' => $batch->id,
                'error' => $e->getMessage()
            ]);
        })->finally(function (Batch $batch) {
            // Batch finished
        })->name('Product Import')
        ->dispatch();
        
        return redirect()->route('imports.show', $batch->id)
            ->with('success', 'Import started! Tracking ID: ' . $batch->id);
    }
    
    public function show(string $batchId)
    {
        $batch = Bus::findBatch($batchId);
        
        return view('imports.show', compact('batch'));
    }
    
    private function parseCSV($file): array
    {
        $products = [];
        $handle = fopen($file->getRealPath(), 'r');
        $header = fgetcsv($handle);
        
        while (($row = fgetcsv($handle)) !== false) {
            $products[] = array_combine($header, $row);
        }
        
        fclose($handle);
        
        return $products;
    }
}
```

#### View (imports/show.blade.php)

```blade
<div class="import-progress">
    <h2>Import Progress</h2>
    
    <div class="progress-bar">
        <div style="width: {{ $batch->progress() }}%">
            {{ $batch->progress() }}%
        </div>
    </div>
    
    <div class="stats">
        <div>Total: {{ $batch->totalJobs }}</div>
        <div>Processed: {{ $batch->processedJobs() }}</div>
        <div>Pending: {{ $batch->pendingJobs }}</div>
        <div>Failed: {{ $batch->failedJobs }}</div>
    </div>
    
    @if($batch->finished())
        <div class="alert alert-success">
            Import completed successfully!
        </div>
    @elseif($batch->cancelled())
        <div class="alert alert-warning">
            Import was cancelled.
        </div>
    @else
        <div class="alert alert-info">
            Import in progress...
            <button wire:click="refresh">Refresh</button>
        </div>
    @endif
</div>
```

### Example 4: Report Generation

#### Job

```php
<?php

namespace App\Jobs;

use App\Models\Report;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class GenerateReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;
    public $timeout = 300;
    public $queue = 'reports';

    public function __construct(
        public Report $report
    ) {}

    public function handle(): void
    {
        // Update status
        $this->report->update(['status' => 'generating']);
        
        // Gather data
        $data = $this->gatherReportData();
        
        // Generate PDF
        $pdf = Pdf::loadView('reports.template', [
            'report' => $this->report,
            'data' => $data,
        ]);
        
        // Save PDF
        $filename = "reports/{$this->report->id}.pdf";
        Storage::put($filename, $pdf->output());
        
        // Update report
        $this->report->update([
            'status' => 'completed',
            'file_path' => $filename,
            'file_size' => Storage::size($filename),
            'completed_at' => now(),
        ]);
        
        // Notify user
        $this->report->user->notify(
            new \App\Notifications\ReportGenerated($this->report)
        );
    }

    private function gatherReportData(): array
    {
        // Gather data based on report type
        return match($this->report->type) {
            'sales' => $this->getSalesData(),
            'users' => $this->getUsersData(),
            'inventory' => $this->getInventoryData(),
            default => [],
        };
    }

    private function getSalesData(): array
    {
        // Query sales data
        return [
            'total_sales' => 10000,
            'orders' => 150,
            // ... more data
        ];
    }

    public function failed(Throwable $exception): void
    {
        $this->report->update(['status' => 'failed']);
        
        $this->report->user->notify(
            new \App\Notifications\ReportFailed($this->report, $exception->getMessage())
        );
    }
}
```

## Testing Jobs

### Test Job Dispatching

```php
<?php

namespace Tests\Feature;

use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_email_job_is_dispatched()
    {
        Queue::fake();

        $user = User::factory()->create();

        SendWelcomeEmail::dispatch($user);

        Queue::assertPushed(SendWelcomeEmail::class);
    }

    public function test_welcome_email_job_is_dispatched_with_correct_user()
    {
        Queue::fake();

        $user = User::factory()->create();

        SendWelcomeEmail::dispatch($user);

        Queue::assertPushed(SendWelcomeEmail::class, function ($job) use ($user) {
            return $job->user->id === $user->id;
        });
    }

    public function test_job_is_dispatched_to_correct_queue()
    {
        Queue::fake();

        $user = User::factory()->create();

        SendWelcomeEmail::dispatch($user)->onQueue('emails');

        Queue::assertPushedOn('emails', SendWelcomeEmail::class);
    }
}
```

### Test Job Execution

```php
public function test_job_sends_welcome_email()
{
    Mail::fake();

    $user = User::factory()->create();

    // Actually run the job
    (new SendWelcomeEmail($user))->handle();

    Mail::assertSent(WelcomeEmail::class, function ($mail) use ($user) {
        return $mail->hasTo($user->email);
    });
}
```

### Test Failed Job Handler

```php
public function test_failed_job_logs_error()
{
    Log::fake();

    $user = User::factory()->create();
    $job = new SendWelcomeEmail($user);
    $exception = new \Exception('SMTP server down');

    $job->failed($exception);

    Log::assertLogged('error');
}
```

## Best Practices

### 1. Keep Jobs Focused

```php
// Good - single responsibility
class SendWelcomeEmail implements ShouldQueue
{
    public function handle(): void
    {
        Mail::to($this->user)->send(new WelcomeEmail($this->user));
    }
}

// Bad - doing too much
class ProcessNewUser implements ShouldQueue
{
    public function handle(): void
    {
        // Send email
        // Create profile
        // Resize image
        // Generate PDF
        // Send notification
        // Update analytics
        // Too much in one job!
    }
}
```

### 2. Set Appropriate Tries and Timeout

```php
// Good - reasonable values
public $tries = 3;
public $timeout = 60;

// Bad - too many tries or too long
public $tries = 100;
public $timeout = 3600;
```

### 3. Handle Failures Gracefully

```php
// Good - proper error handling
public function failed(Throwable $exception): void
{
    Log::error('Job failed', [
        'job' => self::class,
        'error' => $exception->getMessage(),
    ]);
    
    // Notify someone
    // Clean up resources
}

// Bad - no failure handler
// (Job fails silently)
```

### 4. Use Specific Queues

```php
// Good - organized by priority/type
public $queue = 'emails';     // Fast, important
public $queue = 'videos';     // Slow, resource-intensive
public $queue = 'reports';    // Medium priority

// Bad - everything on default queue
// (Slow jobs block fast ones)
```

### 5. Pass IDs, Not Models (for Large Data)

```php
// Good - pass ID
public function __construct(
    public int $userId
) {}

public function handle(): void
{
    $user = User::find($this->userId);
    // Process user
}

// Acceptable - Laravel handles serialization
public function __construct(
    public User $user
) {}

// Bad - passing large collections
public function __construct(
    public Collection $users  // Don't do this
) {}
```

### 6. Use Unique Jobs When Needed

```php
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessPayment implements ShouldQueue, ShouldBeUnique
{
    public $uniqueFor = 3600; // Unique for 1 hour

    public function uniqueId(): string
    {
        return $this->order->id;
    }
}
```

### 7. Monitor Your Queues

```bash
# Check queue size
php artisan queue:monitor redis:default --max=1000

# Set up alerts in production
# Use Laravel Horizon for Redis queues
# Use services like Sentry, Bugsnag for error tracking
```

### 8. Use Job Batching for Related Tasks

```php
// Good - batch related jobs
Bus::batch([
    new ProcessVideo($video1),
    new ProcessVideo($video2),
    new ProcessVideo($video3),
])->dispatch();

// Bad - dispatching individually
ProcessVideo::dispatch($video1);
ProcessVideo::dispatch($video2);
ProcessVideo::dispatch($video3);
// (Can't track as a group)
```

## Queue Horizon (Redis Only)

Laravel Horizon provides a dashboard for Redis queues:

```bash
# Install Horizon
composer require laravel/horizon

# Publish assets
php artisan horizon:install

# Run Horizon
php artisan horizon
```

Access dashboard at: `http://your-app.test/horizon`

## Quick Reference

| Task | Code |
|------|------|
| Create job | `php artisan make:job JobName` |
| Dispatch job | `JobName::dispatch($data)` |
| Dispatch with delay | `JobName::dispatch($data)->delay(now()->addMinutes(10))` |
| Dispatch to queue | `JobName::dispatch($data)->onQueue('emails')` |
| Dispatch if | `JobName::dispatchIf($condition, $data)` |
| Dispatch after response | `JobName::dispatchAfterResponse($data)` |
| Dispatch sync | `JobName::dispatchSync($data)` |
| Chain jobs | `Bus::chain([...])->dispatch()` |
| Batch jobs | `Bus::batch([...])->dispatch()` |
| Run worker | `php artisan queue:work` |
| Restart workers | `php artisan queue:restart` |
| List failed | `php artisan queue:failed` |
| Retry failed | `php artisan queue:retry {id}` |
| Retry all | `php artisan queue:retry all` |
| Create jobs table | `php artisan queue:table` |
| Create failed table | `php artisan queue:failed-table` |
| Create batches table | `php artisan queue:batches-table` |

## Job Properties Quick Reference

| Property | Purpose | Example |
|----------|---------|---------|
| `$tries` | Max attempts | `public $tries = 3;` |
| `$timeout` | Max seconds | `public $timeout = 60;` |
| `$backoff` | Retry delay | `public $backoff = [30, 60];` |
| `$maxExceptions` | Max exceptions | `public $maxExceptions = 3;` |
| `$queue` | Queue name | `public $queue = 'emails';` |
| `$connection` | Queue connection | `public $connection = 'redis';` |
| `$deleteWhenMissingModels` | Delete if model missing | `public $deleteWhenMissingModels = true;` |

## Summary

**Jobs** allow you to:
- Defer time-consuming tasks to background processing
- Improve application response time
- Handle failures gracefully with retries
- Process tasks in parallel across multiple workers
- Chain and batch related tasks
- Monitor and manage queued work

**Key concepts**:
- **Dispatching**: Sending jobs to the queue
- **Workers**: Processes that execute jobs
- **Queues**: Different priority levels/categories
- **Chaining**: Sequential job execution
- **Batching**: Grouped job execution with progress tracking
- **Failed Jobs**: Automatic retry and failure handling

Jobs are essential for building responsive, scalable Laravel applications!
