<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'days' => $this->faker->randomNumber(0),
            'profile' => $this->faker->numberBetween(0, 127),
            'order' => $this->faker->numberBetween(0, 127),
            'receipt' => $this->faker->numberBetween(0, 127),
            'subsidiary' => $this->faker->numberBetween(0, 127),
            'users' => $this->faker->numberBetween(0, 127),
        ];
    }
}
