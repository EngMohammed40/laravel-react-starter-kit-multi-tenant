<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $tenantId = auth()->user()->tenant_id;

        // Path-based tenant redirect
        return redirect("/{$tenantId}/dashboard");
    }
}
