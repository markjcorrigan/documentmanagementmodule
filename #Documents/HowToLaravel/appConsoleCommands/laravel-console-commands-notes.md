# Laravel Console Commands - Complete Guide

## What Are Console Commands?

Console commands (Artisan commands) are CLI tasks you can run from the terminal to perform operations on your Laravel application. They're like scripts that can:
- Perform database operations
- Process data in batches
- Send emails/notifications
- Clean up old records
- Generate reports
- Run scheduled tasks
- Anything you can code in PHP

## File Location
```
app/Console/Commands/YourCommandName.php
```

## Creating a Command

### Generate Command File
```bash
php artisan make:command SendEmails
```

This creates: `app/Console/Commands/SendEmails.php`

With options:
```bash
php artisan make:command SendEmails --command=emails:send
```

## Basic Command Structure

```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     * This is what you type in the terminal
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     * Shows up when you run: php artisan list
     */
    protected $description = 'Send emails to all users';

    /**
     * Execute the console command.
     * This is where your logic goes
     */
    public function handle()
    {
        // Your code here
        $this->info('Emails sent successfully!');
        
        return Command::SUCCESS; // or Command::FAILURE
    }
}
```

## Command Signatures (Arguments & Options)

### Basic Signature
```php
protected $signature = 'emails:send';
```

### With Required Argument
```php
protected $signature = 'emails:send {user}';

// Usage: php artisan emails:send john
// Access: $this->argument('user')
```

### With Optional Argument
```php
protected $signature = 'emails:send {user?}';

// Usage: php artisan emails:send
//     or: php artisan emails:send john
```

### With Default Value
```php
protected $signature = 'emails:send {user=all}';

// If not provided, defaults to "all"
```

### With Options (Flags)
```php
protected $signature = 'emails:send {user} {--queue}';

// Usage: php artisan emails:send john --queue
// Access: $this->option('queue') // returns true/false
```

### With Option Values
```php
protected $signature = 'emails:send {user} {--queue=default}';

// Usage: php artisan emails:send john --queue=high
// Access: $this->option('queue') // returns "high"
```

### With Option Shortcut
```php
protected $signature = 'emails:send {user} {--Q|queue}';

// Usage: php artisan emails:send john -Q
//     or: php artisan emails:send john --queue
```

### With Array Arguments
```php
protected $signature = 'emails:send {users*}';

// Usage: php artisan emails:send john jane bob
// Access: $this->argument('users') // returns ['john', 'jane', 'bob']
```

### Complex Example
```php
protected $signature = 'emails:send 
                        {user : The ID of the user}
                        {--Q|queue : Whether to queue the emails}
                        {--type=welcome : Type of email to send}';
```

## Output Methods

```php
public function handle()
{
    // Standard output
    $this->info('Info message');      // Green text
    $this->comment('Comment');        // Yellow text
    $this->question('Question?');     // Cyan text
    $this->error('Error!');           // Red text
    $this->warn('Warning!');          // Yellow text
    $this->line('Plain text');        // No color
    
    // New line
    $this->newLine();
    $this->newLine(3); // 3 new lines
    
    // Table
    $this->table(
        ['Name', 'Email'],
        [
            ['John', 'john@example.com'],
            ['Jane', 'jane@example.com'],
        ]
    );
    
    // Progress bar
    $users = User::all();
    $bar = $this->output->createProgressBar(count($users));
    $bar->start();
    
    foreach ($users as $user) {
        // Process user
        $bar->advance();
    }
    
    $bar->finish();
    $this->newLine();
}
```

## User Input

```php
public function handle()
{
    // Ask question
    $name = $this->ask('What is your name?');
    
    // Secret input (password)
    $password = $this->secret('What is the password?');
    
    // Confirm (yes/no)
    if ($this->confirm('Do you wish to continue?')) {
        // User confirmed
    }
    
    // Anticipate (with autocomplete)
    $name = $this->anticipate('What is your name?', ['John', 'Jane']);
    
    // Choice
    $role = $this->choice(
        'What is your role?',
        ['Admin', 'User', 'Guest'],
        0 // default index
    );
}
```

## Calling Other Commands

```php
public function handle()
{
    // Call another command
    $this->call('emails:send', [
        'user' => 1,
        '--queue' => 'default'
    ]);
    
    // Call silently (no output)
    $this->callSilently('emails:send');
    
    // Call in background
    $this->callSilent('emails:send');
}
```

## Complete Working Example

```php
<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\WeeklySummary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWeeklyEmails extends Command
{
    protected $signature = 'emails:weekly 
                            {--limit=100 : Maximum number of emails to send}
                            {--Q|queue : Queue the emails instead of sending immediately}
                            {--dry-run : Run without actually sending emails}';

    protected $description = 'Send weekly summary emails to active users';

    public function handle()
    {
        $this->info('Starting weekly email campaign...');
        $this->newLine();
        
        // Get options
        $limit = (int) $this->option('limit');
        $shouldQueue = $this->option('queue');
        $dryRun = $this->option('dry-run');
        
        if ($dryRun) {
            $this->warn('DRY RUN MODE - No emails will be sent');
            $this->newLine();
        }
        
        // Get users
        $users = User::where('is_active', true)
            ->where('receives_emails', true)
            ->limit($limit)
            ->get();
            
        if ($users->isEmpty()) {
            $this->error('No users found to email');
            return Command::FAILURE;
        }
        
        $this->info("Found {$users->count()} users to email");
        
        // Confirm
        if (!$dryRun && !$this->confirm('Do you want to proceed?', true)) {
            $this->info('Cancelled');
            return Command::SUCCESS;
        }
        
        // Progress bar
        $bar = $this->output->createProgressBar($users->count());
        $bar->start();
        
        $sent = 0;
        $failed = 0;
        
        foreach ($users as $user) {
            try {
                if (!$dryRun) {
                    if ($shouldQueue) {
                        Mail::to($user)->queue(new WeeklySummary($user));
                    } else {
                        Mail::to($user)->send(new WeeklySummary($user));
                    }
                }
                $sent++;
            } catch (\Exception $e) {
                $this->error("Failed for {$user->email}: {$e->getMessage()}");
                $failed++;
            }
            
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine(2);
        
        // Summary table
        $this->table(
            ['Metric', 'Count'],
            [
                ['Total Users', $users->count()],
                ['Sent Successfully', $sent],
                ['Failed', $failed],
            ]
        );
        
        $this->info('Weekly emails completed!');
        
        return Command::SUCCESS;
    }
}
```

## Registering Commands (Usually Automatic)

Laravel 12 auto-discovers commands in `app/Console/Commands/`, but if needed:

```php
// app/Console/Kernel.php
protected $commands = [
    Commands\SendWeeklyEmails::class,
];
```

## Running Commands

```bash
# Basic
php artisan emails:send

# With arguments
php artisan emails:send john

# With options
php artisan emails:send john --queue

# With short option
php artisan emails:send john -Q

# Multiple arguments
php artisan emails:send john jane bob

# Help
php artisan help emails:send

# List all commands
php artisan list
```

## Scheduling Commands

Add to `app/Console/Kernel.php`:

```php
protected function schedule(Schedule $schedule)
{
    // Run command every day at 1am
    $schedule->command('emails:weekly')->dailyAt('01:00');
    
    // Run every hour
    $schedule->command('emails:send')->hourly();
    
    // Run every 5 minutes
    $schedule->command('backup:run')->everyFiveMinutes();
    
    // With options
    $schedule->command('emails:weekly --limit=50')->daily();
    
    // Only on weekdays
    $schedule->command('reports:generate')->weekdays()->at('17:00');
}
```

## Testing Commands

```php
// tests/Feature/SendWeeklyEmailsTest.php
use Illuminate\Support\Facades\Artisan;

public function test_command_sends_emails()
{
    $exitCode = Artisan::call('emails:weekly', [
        '--limit' => 10,
        '--dry-run' => true
    ]);
    
    $this->assertEquals(0, $exitCode);
}
```

## Best Practices

1. **Always validate input**
   ```php
   $userId = $this->argument('user');
   if (!User::find($userId)) {
       $this->error('User not found');
       return Command::FAILURE;
   }
   ```

2. **Use descriptive signatures**
   ```php
   protected $signature = 'emails:send 
                           {user : The user ID to send email to}';
   ```

3. **Provide feedback**
   ```php
   $this->info('Processing...');
   // Do work
   $this->info('Done!');
   ```

4. **Return proper exit codes**
   ```php
   return Command::SUCCESS;  // 0
   return Command::FAILURE;  // 1
   return Command::INVALID;  // 2
   ```

5. **Handle exceptions**
   ```php
   try {
       // risky operation
   } catch (\Exception $e) {
       $this->error($e->getMessage());
       return Command::FAILURE;
   }
   ```

6. **Use --dry-run for destructive operations**
   ```php
   protected $signature = 'users:delete {--dry-run}';
   ```

## Quick Reference

| Task | Code |
|------|------|
| Create command | `php artisan make:command CommandName` |
| Run command | `php artisan command:name` |
| Required argument | `{name}` |
| Optional argument | `{name?}` |
| Option flag | `{--flag}` |
| Option with value | `{--option=}` |
| Get argument | `$this->argument('name')` |
| Get option | `$this->option('flag')` |
| Success | `return Command::SUCCESS;` |
| Failure | `return Command::FAILURE;` |
