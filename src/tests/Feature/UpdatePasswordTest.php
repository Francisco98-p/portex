<?php

use Tests\TestHelpers;
use Livewire\Livewire;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Http\Livewire\UpdatePasswordForm;

test('password can be updated', function () {
    $registered_user = TestHelpers::registeredUser();
    $registered_pass = TestHelpers::fakeUsersPassword();
    $this->actingAs($registered_user);

    Livewire::test(UpdatePasswordForm::class)
        ->set('state', [
            'current_password' => $registered_pass,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])
        ->call('updatePassword');

    expect(Hash::check('new-password', $registered_user->fresh()->password))->toBeTrue();
});

test('current password must be correct', function () {
    $registered_user = TestHelpers::registeredUser();
    $registered_pass = TestHelpers::fakeUsersPassword();
    $this->actingAs($registered_user);

    Livewire::test(UpdatePasswordForm::class)
        ->set('state', [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])
        ->call('updatePassword')
        ->assertHasErrors(['current_password']);

    expect(Hash::check($registered_pass, $registered_user->fresh()->password))->toBeTrue();
});

test('new passwords must match', function () {
    $registered_user = TestHelpers::registeredUser();
    $registered_pass = TestHelpers::fakeUsersPassword();
    $this->actingAs($registered_user);

    Livewire::test(UpdatePasswordForm::class)
        ->set('state', [
            'current_password' => $registered_pass,
            'password' => 'new-password',
            'password_confirmation' => 'wrong-password',
        ])
        ->call('updatePassword')
        ->assertHasErrors(['password']);

    expect(Hash::check($registered_pass, $registered_user->fresh()->password))->toBeTrue();
});
