<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'businessname' => $this->faker->text(255),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'date_begin' => $this->faker->date,
            'date_end' => $this->faker->date,
            'tne_id' => $this->faker->randomNumber(0),
            'profile_company' => $this->faker->randomNumber(0),
            'active' => $this->faker->boolean,
            'plan_id' => \App\Models\Plan::factory(),
        ];
    }
}
