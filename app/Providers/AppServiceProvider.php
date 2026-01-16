<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ✅ FIX: Force Reverb TLS to empty array for v1.6.3 compatibility
        config(['reverb.servers.reverb.options.tls' => []]);

        // ✅ ONLY FORCE PRODUCTION URLs IN PRODUCTION ENVIRONMENT
        if (app()->environment('production')) {
            // Force session configuration for cross-machine login
            config([
                'session.domain' => 'pmway.hopto.org',
                'session.secure' => true,
                'session.same_site' => 'lax',
            ]);

            // Force URL generation to use correct domain
            URL::forceRootUrl('https://pmway.hopto.org');
            URL::forceScheme('https');

            // Add response macro to set cache headers
            \Response::macro('noCache', function ($content) {
                return response($content)
                    ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
            });
        } else {
            // ✅ LOCAL DEVELOPMENT - Use .env settings
            // Don't force any URLs, let .env APP_URL control it
            
            // Local session config
            config([
                'session.domain' => null,
                'session.secure' => false,
                'session.same_site' => 'lax',
            ]);
        }

        // ✅ Debug session configuration
        \Log::info('Session Configuration Loaded', [
            'environment' => app()->environment(),
            'domain' => config('session.domain'),
            'secure' => config('session.secure'),
            'same_site' => config('session.same_site'),
            'app_url' => config('app.url'),
        ]);

        // Keep your pagination styling
        Paginator::useBootstrapFive();
        Paginator::useTailwind();

        // ✅ Option 1: Only share $user with views in "pmboksix" folder
        View::composer('pmboksix.*', function ($view) {
            $view->with('user', Auth::user());
        });

        // ✅ Option 2 (optional): Uncomment if you want $user in ALL views
        // View::share('user', Auth::user());

        Vite::useBuildDirectory('build');
        Vite::useManifestFilename('.vite/manifest.json');
    }
}