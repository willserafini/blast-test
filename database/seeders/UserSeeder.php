<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'role_id' => \App\Models\Role::where('is_admin', true)->first()->id
        ]);

        \App\Models\User::create([
            'name' => 'User test',
            'email' => 'user@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test1234'),
            'remember_token' => Str::random(10),
            'role_id' => \App\Models\Role::where('is_admin', false)->first()->id
        ]);
    }
}
