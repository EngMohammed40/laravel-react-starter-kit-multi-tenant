<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {

            // tenant domain login
            if ($request->getHost() !== 'localhost') {
                return "http://{$request->getHost()}/login";
            }

            // central login
            return route('login');
        }

        return null;
    }
}