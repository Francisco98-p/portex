<?php

namespace Tests;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class TestHelpers
{
    private const SEE_PANEL = 'see-panel';

    public static function rootUser()
    {
        Role::create(['name' => 'root']);
        $user = User::factory()->rootUser()->create()->assignRole('root');
        return $user;
    }

    public static function createRegisteredRole()
    {
        Permission::create(['name' => self::SEE_PANEL]);
        $registered_role = Role::create(['name' => 'registered']);
        $registered_role->givePermissionTo(self::SEE_PANEL);
        return $registered_role;
    }

    public static function registeredUser()
    {
        self::createRegisteredRole();
        $user = User::factory()->create()->assignRole('registered');
        return $user;
    }

    public static function rootDefaultPassword()
    {
        return env('ADMIN_PASSWORD');
    }

    public static function fakeUsersPassword()
    {
        return env('FAKE_USERS_PASSWORD');
    }
}
