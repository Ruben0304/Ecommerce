<?php

namespace Database\Factories;

use App\Models\ShippingInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShippingInfoFactory extends Factory
{
    protected $model = ShippingInfo::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'state' => $this->faker->word(),
            'zipcode' => $this->faker->word(),
            'references' => $this->faker->word(),
            'latitud' => $this->faker->randomNumber(),
            'longitud' => $this->faker->randomNumber(),
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
