<?php

use Livewire\Livewire;
use Tests\TestHelpers;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;

test('user accounts can be deleted', function () {
    $this->actingAs($user = TestHelpers::rootUser());
    $root_password = TestHelpers::rootDefaultPassword();

    $component = Livewire::test(DeleteUserForm::class)
        ->set('password', $root_password)
        ->call('deleteUser');

    expect($user->fresh())->toBeNull();
})->skip(function () {
    return !Features::hasAccountDeletionFeatures();
}, 'Account deletion is not enabled.');

test('correct password must be provided before account can be deleted', function () {
    $this->actingAs($user = TestHelpers::rootUser());

    Livewire::test(DeleteUserForm::class)
        ->set('password', 'wrong-password')
        ->call('deleteUser')
        ->assertHasErrors(['password']);

    expect($user->fresh())->not->toBeNull();
})->skip(function () {
    return !Features::hasAccountDeletionFeatures();
}, 'Account deletion is not enabled.');
