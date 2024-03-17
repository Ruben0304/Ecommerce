<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'price' => $this->faker->randomFloat(),
            'description' => $this->faker->text(),
            'stock' => $this->faker->randomNumber(),
            'rating' => $this->faker->randomNumber(),
            'category_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
