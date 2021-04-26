<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'is_admin' => 1
        ]);

        $userRole = Role::create(['name' => 'User']);

        $userRole->permissions()->sync(self::getPermissionsDefaultForUser());
        
    }

    private static function getPermissionsDefaultForUser()
    {
        $permissionsDefault =  [
            'index-customer',
            'show-customer'
        ];

        return \App\Models\Permission::whereIn('name', $permissionsDefault)->pluck('id')->toArray();
    }
}
