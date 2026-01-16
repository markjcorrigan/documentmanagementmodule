<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Get current request path
        $currentPath = request()->path();

        // ONLY disable broadcasting for these SPECIFIC legacy routes
        // Everything else (including all new blog routes) will work normally
        $disableBroadcastingFor = [
            'portfolio',                    // Portfolio page (where toaster is broken)
            'contact',                      // Contact form (if using toaster)
            'store-contact-message',        // Contact form submission
            
            // Legacy blog admin pages (only if toasters are broken here)
            'dashboard',
            'all-post',
            'blogsbyauthor',
            'add-post',
            'store-post',
            'edit-post',
            'update-post',
            'delete-post',
            'update-post-status',
            'user-comments',
            'comment-status-update',
            'contact-message',
            'delete-contact',
        ];

        // Check if we should disable broadcasting for this specific route
        $shouldDisableBroadcasting = false;
        foreach ($disableBroadcastingFor as $route) {
            if ($currentPath === $route || str_starts_with($currentPath, $route . '/')) {
                $shouldDisableBroadcasting = true;
                break;
            }
        }

        // DEFAULT: Enable broadcasting (safe for all new blog routes)
        // EXCEPTION: Disable only for specific legacy routes listed above
        if (!$shouldDisableBroadcasting) {
            // This is your EXISTING code - unchanged for new blog
            Broadcast::routes(['middleware' => ['web', 'auth']]);
            require base_path('routes/channels.php');
        }
        // If $shouldDisableBroadcasting is true, we simply skip loading broadcasting
        // This prevents the Reverb error and allows toasters to work
    }
}