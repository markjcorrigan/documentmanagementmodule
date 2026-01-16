<?php

namespace App\Http\Middleware;

use App\Events\UserPresenceUpdated;
use App\Models\OnlineUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserPresence
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            OnlineUser::updatePresence(Auth::id());

            // Broadcast presence update
            $user = Auth::user();
            broadcast(new UserPresenceUpdated(
                $user->id,
                $user->name,
                true
            ));
        }

        return $next($request);
    }
}
