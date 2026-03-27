<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $tenantId = auth()->user()->tenant_id;

        // Path-based tenant redirect
        return redirect("/{$tenantId}/dashboard");
    }
}
