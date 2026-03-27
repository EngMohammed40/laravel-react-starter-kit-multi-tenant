<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $user = User::factory()->create();
    $response = $this->get(route('dashboard', ['tenant' => $user->tenant_id]));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard', ['tenant' => $user->tenant_id]));
    $response->assertOk();
});
