<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperUserOnly
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Not logged in
        if (! $user) {
            return redirect('/');
        }

        // Logged in but missing role
        if (! $user->hasRole('Super User')) {
            return redirect('/');
        }

        return $next($request);
    }
}
