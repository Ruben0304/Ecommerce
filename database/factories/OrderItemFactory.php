<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),
            'product_id' => $this->faker->numberBetween(1,20),
            'order_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
