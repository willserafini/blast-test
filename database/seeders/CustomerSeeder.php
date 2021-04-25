<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::factory()
            ->count(10)
            ->create()
            ->each(function($customer, $key) {
                \App\Models\Number::factory()
                    ->count(mt_rand(5, 20))
                    ->create(['customer_id' => $customer->id]);
            });
    }
}
