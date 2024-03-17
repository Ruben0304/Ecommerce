<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'total' => $this->faker->randomFloat(),
            'paymentMethod' => $this->faker->word(),
            'status' => $this->faker->word(),
            'user_id' => $this->faker->numberBetween(1,2),

        ];
    }
}
