<?php

use Livewire\Livewire;
use Tests\TestHelpers;
use Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm;

test('other browser sessions can be logged out', function () {
    $this->actingAs($user = TestHelpers::registeredUser());

    Livewire::test(LogoutOtherBrowserSessionsForm::class)
        ->set('password', 'password')
        ->call('logoutOtherBrowserSessions')
        ->assertSuccessful();
});
