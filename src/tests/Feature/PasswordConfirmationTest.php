<?php

use App\Models\User;
use Tests\TestHelpers;
use Laravel\Jetstream\Features;

test('confirm password screen can be rendered', function () {
    $user = Features::hasTeamFeatures()
                    ? User::factory()->withPersonalTeam()->create()
                    : TestHelpers::registeredUser();

    $response = $this->actingAs($user)->get('/user/confirm-password');
    $response->assertStatus(200);
});

test('password can be confirmed', function () {
    $root_user = TestHelpers::rootUser();
    $root_pass = TestHelpers::rootDefaultPassword();

    $response = $this->actingAs($root_user)->post('/user/confirm-password', [
        'password' => $root_pass,
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    $user = TestHelpers::registeredUser();

    $response = $this->actingAs($user)->post('/user/confirm-password', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
