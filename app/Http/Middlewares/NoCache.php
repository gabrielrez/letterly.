<?php

namespace App\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class NoCache
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Cache-Control', 'post-check=0, pre-check=0', false);
        $response->headers->set('Pragma', 'no-cache');
        return $response;
    }
}
