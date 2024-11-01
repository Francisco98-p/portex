<?php

use Tests\TestHelpers;

test('login screen can be rendered', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $root_user = TestHelpers::rootUser();
    $root_pass = TestHelpers::rootDefaultPassword();
    $response = $this->post('/login', [
        'email' => $root_user->email,
        'password' => $root_pass
    ]);
    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('users cannot authenticate with invalid password', function () {
    $user = TestHelpers::registeredUser();
    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);
    $this->assertGuest();
});
