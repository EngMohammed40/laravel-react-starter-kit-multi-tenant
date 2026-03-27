<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::inertia('/', 'welcome', [
            'canRegister' => Features::enabled(Features::registration()),
        ])->name('home');
    });
}
