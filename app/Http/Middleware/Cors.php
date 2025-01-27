<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Authorization, Accept, X-API-KEY, Access-Control-Request-Method')
            ->header('Allow', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}

