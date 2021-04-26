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
        $user = \App\Models\User::find(1);
        if (!$user) {
            $user = \App\Models\User::factory();
        }
        
        return [
            'user_id' => $user,
            'name' => $this->faker->name(),
            'document' => $this->faker->randomNumber(8),
            'status' => $this->faker->numberBetween(1, 4),
        ];
    }
}
