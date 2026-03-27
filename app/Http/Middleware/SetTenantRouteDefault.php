<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetTenantRouteDefault
{
    public function handle(Request $request, Closure $next)
    {
        if (tenancy()->initialized) {
            URL::defaults(['tenant' => tenant('id')]);
        }

        return $next($request);
    }
}
