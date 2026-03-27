<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::group([
    'prefix' => '/{tenant}',
    'middleware' => ['web', InitializeTenancyByPath::class],
], function () {

    Route::get('/dssdsdsdds', function () {
        return 'sddssdsd';
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::inertia('dashboard', 'dashboard')->name('dashboard');
    });

    require __DIR__.'/settings.php';

});
