<?php

use Livewire\Livewire;
use Tests\TestHelpers;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;

test('current profile information is available', function () {
    $this->actingAs($user = TestHelpers::registeredUser());

    $component = Livewire::test(UpdateProfileInformationForm::class);

    expect($component->state['name'])->toEqual($user->name);
    expect($component->state['email'])->toEqual($user->email);
});

test('profile information can be updated', function () {
    $this->actingAs($user = TestHelpers::registeredUser());

    Livewire::test(UpdateProfileInformationForm::class)
        ->set('state', ['name' => 'Test Name', 'email' => 'test@example.com'])
        ->call('updateProfileInformation');

    expect($user->fresh())
        ->name->toEqual('Test Name')
        ->email->toEqual('test@example.com');
});
