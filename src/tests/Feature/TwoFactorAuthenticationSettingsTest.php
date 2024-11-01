<?php

use Livewire\Livewire;
use Tests\TestHelpers;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Http\Livewire\TwoFactorAuthenticationForm;

test('two factor authentication can be enabled', function () {
    $registered_user = TestHelpers::registeredUser()->fresh();
    $this->actingAs($registered_user);

    $this->withSession(['auth.password_confirmed_at' => time()]);

    Livewire::test(TwoFactorAuthenticationForm::class)
        ->call('enableTwoFactorAuthentication');

    $user = $registered_user->fresh();

    expect($user->two_factor_secret)->not->toBeNull();
    expect($user->recoveryCodes())->toHaveCount(8);
})->skip(function () {
    return !Features::canManageTwoFactorAuthentication();
}, 'Two factor authentication is not enabled.');

test('recovery codes can be regenerated', function () {
    $registered_user = TestHelpers::registeredUser()->fresh();
    $this->actingAs($registered_user);
    $this->withSession(['auth.password_confirmed_at' => time()]);

    $component = Livewire::test(TwoFactorAuthenticationForm::class)
        ->call('enableTwoFactorAuthentication')
        ->call('regenerateRecoveryCodes');

    $user = $registered_user->fresh();

    $component->call('regenerateRecoveryCodes');

    expect($user->recoveryCodes())->toHaveCount(8);
    expect(array_diff($user->recoveryCodes(), $user->fresh()->recoveryCodes()))->toHaveCount(8);
})->skip(function () {
    return !Features::canManageTwoFactorAuthentication();
}, 'Two factor authentication is not enabled.');

test('two factor authentication can be disabled', function () {
    $registered_user = TestHelpers::registeredUser()->fresh();
    $this->actingAs($registered_user);

    $this->withSession(['auth.password_confirmed_at' => time()]);

    $component = Livewire::test(TwoFactorAuthenticationForm::class)
        ->call('enableTwoFactorAuthentication');

    $this->assertNotNull($registered_user->fresh()->two_factor_secret);

    $component->call('disableTwoFactorAuthentication');

    expect($registered_user->fresh()->two_factor_secret)->toBeNull();
})->skip(function () {
    return !Features::canManageTwoFactorAuthentication();
}, 'Two factor authentication is not enabled.');
