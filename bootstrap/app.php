<?php

use App\Http\Middleware\Localization;
use App\Http\Middleware\TransitionInterceptor;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        //        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withBroadcasting(
        channels: __DIR__.'/../routes/channels.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([Localization::class]);

        // Apply TransitionInterceptor globally to all web routes
        $middleware->append(TransitionInterceptor::class);

        // Add visitor logging to web group
        $middleware->appendToGroup('web', \App\Http\Middleware\LogAllVisitors::class);

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'mustBeLoggedIn' => \App\Http\Middleware\MustBeLoggedIn::class,
            'transition' => \App\Http\Middleware\TransitionInterceptor::class,
            'alwaysblock' => \App\Http\Middleware\AlwaysBlock::class,
            'basicauth' => \App\Http\Middleware\BasicAuth::class,
            'logVisitors' => \App\Http\Middleware\LogAllVisitors::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function ($schedule) {

        // Scheduler test (no overlap needed)
        $schedule->call(function () {
            \Illuminate\Support\Facades\Log::info('SCHEDULER TEST: Running at ' . now());
        })
            ->everyMinute()
            ->name('scheduler-test');

        // ==========================
        // BACKUPS (NO OVERLAPPING)
        // ==========================

        // Daily database backup at 2:30 AM
        $schedule->command('db:backup --type=daily')
            ->dailyAt('02:30')
            ->withoutOverlapping()
            ->name('Daily Database Backup')
            ->appendOutputTo(storage_path('logs/backup.log'));

        // Weekly database backup (Sunday 4:00 AM)
        $schedule->command('db:backup --type=weekly')
            ->weeklyOn(0, '04:00')
            ->withoutOverlapping()
            ->name('Weekly Database Backup')
            ->appendOutputTo(storage_path('logs/backup.log'));

        // Monthly database backup (1st @ 5:00 AM)
        $schedule->command('db:backup --type=monthly')
            ->monthlyOn(1, '05:00')
            ->withoutOverlapping()
            ->name('Monthly Database Backup')
            ->appendOutputTo(storage_path('logs/backup.log'));

        // Daily config backup at 2:35 AM
        $schedule->command('config:backup --type=daily')
            ->dailyAt('02:35')
            ->withoutOverlapping()
            ->name('Daily Config Backup')
            ->appendOutputTo(storage_path('logs/backup.log'));

        // ==========================
        // MAINTENANCE TASKS
        // ==========================

        // Close inactive visitor sessions every 10 minutes
        $schedule->command('visitors:close-inactive --minutes=30')
            ->everyTenMinutes()
            ->withoutOverlapping();

        // Clean up expired shares daily at 2:00 AM
        $schedule->command('notes:cleanup-shares')
            ->dailyAt('02:00')
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/notes-cleanup.log'));

        // Reindex notes daily at 1:00 AM
        $schedule->command('notes:reindex --queue')
            ->dailyAt('01:00')
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/notes-reindex.log'));

        // Generate daily statistics report
        $schedule->command('notes:stats')
            ->dailyAt('23:55')
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/notes-stats.log'));
    })
    ->withProviders([
        \TwigBridge\ServiceProvider::class,
        \App\Providers\BroadcastServiceProvider::class,
    ])
    ->create();
