<?php

namespace App\Providers;

use App\Models\Log;
use App\Models\Post;
use App\Policies\LogPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Log::class => LogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //        Gate::define('visitAdminPages', function ($user) {
        //            return $user->isAdmin === 1;
        //        });

        Gate::define('Super Admin', function ($user) {
            return $user->hasRole('Super Admin');
        });
    }
}