<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $tenantId = Auth::guard($guard)->user()->tenant_id;

                if ($tenantId) {
                    $target = "/{$tenantId}/dashboard";

                    // Prevent redirect loop — don't redirect if already heading there
                    if ($request->path() !== ltrim($target, '/')) {
                        return redirect($target);
                    }
                }

                return $next($request);
            }
        }

        // No guard passed — check default auth
        if (Auth::check()) {
            $tenantId = Auth::user()->tenant_id;

            if ($tenantId) {
                $target = "/{$tenantId}/dashboard";

                if ($request->path() !== ltrim($target, '/')) {
                    return redirect($target);
                }
            }

            return $next($request);
        }

        return $next($request);
    }
}