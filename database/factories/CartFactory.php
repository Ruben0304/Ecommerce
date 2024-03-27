<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'quantity' => $this->faker->numberBetween(1,5),
            'product_id' => $this->faker->numberBetween(1,20),
            'user_id' => 36
        ];
    }
}
