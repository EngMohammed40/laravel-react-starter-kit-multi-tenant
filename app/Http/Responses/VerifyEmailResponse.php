<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\VerifyEmailResponse as VerifyEmailResponseContract;

class VerifyEmailResponse implements VerifyEmailResponseContract
{
    public function toResponse($request)
    {
        $tenantId = $request->user()->tenant_id;

        return redirect("/{$tenantId}/dashboard?verified=1");
    }
}
