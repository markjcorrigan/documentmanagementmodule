<?php

// app/Http/Middleware/AlwaysBlock.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlwaysBlock
{
    public function handle(Request $request, Closure $next)
    {
        return response('BLOCKED BY MIDDLEWARE', 403);
    }
}
