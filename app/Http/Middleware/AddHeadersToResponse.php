<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddHeadersToResponse
{
    public function handle(Request $request, Closure $next): mixed
    {
        $response = $next($request);
        // $response->header('Access-Control-Allow-Origin', '*');
        // $response->header('Access-Control-Allow-Headers', '*');
        return $response;
    }
}
