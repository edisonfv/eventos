<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Cashregister;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashregisterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cashregister::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text(255),
            'responsible' => $this->faker->text(255),
            'subsidiary_id' => \App\Models\Subsidiary::factory(),
        ];
    }
}
