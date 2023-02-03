<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'value' => $this->faker->randomNumber(1),
            'description' => $this->faker->sentence(15),
            'supplier' => $this->faker->text(255),
            'result' => $this->faker->text(255),
            'errCode' => $this->faker->text(255),
            'errorDescription' => $this->faker->text(255),
            'userPaymentOptionId' => $this->faker->text(255),
            'ccCardNumber' => $this->faker->text(255),
            'bin' => $this->faker->text(255),
            'last4Digits' => $this->faker->text(255),
            'ccExpMonth' => $this->faker->text(255),
            'ccExpYear' => $this->faker->text(255),
            'transactionId' => $this->faker->text(255),
            'threeDReason' => $this->faker->text(255),
            'threeDReasonId' => $this->faker->text(255),
            'challengeCancelReasonId' => $this->faker->text(255),
            'challengeCancelReason' => $this->faker->text,
            'cancelled' => $this->faker->boolean,
            'date_begin' => $this->faker->date,
            'date_end' => $this->faker->date,
            'user_id' => \App\Models\User::factory(),
            'company_id' => \App\Models\Company::factory(),
        ];
    }
}
