<?php

namespace App\Http\Responses;

use Laravel\Fortify\Http\Responses\RedirectAsIntended as BaseRedirectAsIntended;

class RedirectAsIntended extends BaseRedirectAsIntended
{
    public function toResponse($request)
    {
        $tenantId = $request->user()->tenant_id;

        return redirect()->intended("/{$tenantId}/dashboard");
    }
}
