<?php

// app/Http/Middleware/TransitionInterceptor.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TransitionInterceptor
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $path = trim($request->path(), '/');
            $legacyRoutes = config('legacy.routes', []);

            if (array_key_exists($path, $legacyRoutes)) {
                // Create a unique cache key per user per page
                $userId = auth()->id() ?? $request->ip(); // Use user ID if logged in, IP if guest
                $cacheKey = 'legacy_ack_'.md5($userId.'_'.$path);

                // Check for bypass parameter FIRST
                if ($request->has('acknowledged') && $request->get('acknowledged') == '1') {
                    Log::info('TransitionInterceptor: Acknowledged - setting cache', [
                        'path' => $path,
                        'cache_key' => $cacheKey,
                    ]);

                    // Store in cache for 30 days
                    Cache::put($cacheKey, true, now()->addDays(30));

                    // Pass through to the actual page
                    return $next($request);
                }

                // Check if cache exists
                if (Cache::has($cacheKey)) {
                    Log::debug('TransitionInterceptor: Cache found, passing through');

                    return $next($request);
                }

                // No cache - show transition page
                Log::info('TransitionInterceptor: No cache - redirecting to transition', [
                    'target' => $path,
                ]);

                return redirect()->route('site.transition', ['target' => $path]);
            }

            return $next($request);

        } catch (\Exception $e) {
            Log::error('TransitionInterceptor: Error', [
                'error' => $e->getMessage(),
            ]);

            return $next($request);
        }
    }
}
