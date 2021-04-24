<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'name' => $this->faker->name(),
            'document' => $this->faker->randomNumber(8),
            'status' => $this->faker->numberBetween(1, 4),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Customer $customer) {
            \App\Models\Number::factory()
                ->state([
                    'customer_id' => $customer->id,
                ])
                ->count(rand(1, 10))
                ->create();
        });
    }
}
