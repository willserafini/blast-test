<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::getAllPermissionsToPopulateTable() as $permission) {
            Permission::create(['name' => $permission]);           
        }
    }

    public static function getAllPermissionsToPopulateTable()
    {
        return [
            'index-customer', 'show-customer', 'create-customer', 'edit-customer', 'delete-customer',

            //fazer futuramente
            //'index-number', 'show-number', 'create-number', 'edit-number', 'delete-number',
            //'index-number-preference', 'show-number-preference', 'create-number-preference', 'edit-number-preference', 'delete-number-preference',
            //'index-user', 'show-user', 'create-user', 'edit-user', 'delete-user',
            //'index-role', 'show-role', 'create-role', 'edit-role', 'delete-role',


        ];
    }
}
