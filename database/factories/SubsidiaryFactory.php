<?php

namespace Database\Factories;

use App\Models\Subsidiary;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubsidiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subsidiary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text(255),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'active' => $this->faker->boolean,
            'company_id' => \App\Models\Company::factory(),
        ];
    }
}
