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
            'index-customer',
            'show-customer',
            'create-customer',
            'edit-customer',   
            'delete-customer'
        ];
    }
}
