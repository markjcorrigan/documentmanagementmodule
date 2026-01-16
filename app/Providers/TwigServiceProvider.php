<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Twig\Environment;
use Twig\TwigFunction;

class TwigServiceProvider extends ServiceProvider
{
    public function boot(Environment $twig)
    {
        // Make 'user' always available in all Twig templates
        // If not logged in, user will be false
        $twig->addGlobal('user', Auth::user() ?: false);

        // Optional: add helper function to check if authenticated
        $twig->addFunction(new TwigFunction('auth_check', function () {
            return Auth::check();
        }));

        // Optional: helper to get current user
        $twig->addFunction(new TwigFunction('auth_user', function () {
            return Auth::user();
        }));
    }
}
