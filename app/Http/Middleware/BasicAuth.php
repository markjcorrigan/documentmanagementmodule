<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAuth
{
    /**
     * Handle basic authentication
     */
    // app/Http/Middleware/BasicAuth.php
    public function handle(Request $request, Closure $next): Response
    {
        // Add this logging line
        \Log::info('BasicAuth middleware triggered for path: '.$request->path());

        // Your existing validation logic
        $validUsername = 'markjc';
        $validPassword = 'Zoltar@123'; // Change to your actual password

        $username = $request->getUser();
        $password = $request->getPassword();

        \Log::info('Credentials - User: '.($username ?: 'none'));

        if ($username !== $validUsername || $password !== $validPassword) {
            \Log::info('Authentication failed or no credentials');
            $headers = ['WWW-Authenticate' => 'Basic realm="Protected Area"'];

            return response('Unauthorized', 401, $headers);
        }

        return $next($request);
    }
}
