<?php

namespace Database\Factories;

use App\Models\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Number::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'number' => $this->faker->e164PhoneNumber(),
            'status' => $this->faker->numberBetween(1, 3),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Number $number) {
            event( new \App\Events\NewNumberEvent($number) );
        });
    }


}
