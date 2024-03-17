<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ShippingInfo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();
        Category::factory(5)->create();
        Product::factory(20)->create();
        Cart::factory(10)->create();
        ShippingInfo::factory(1)->create();
        Payment::factory(5)->create();
        Order::factory(5)->create();
        OrderItem::factory(10)->create();
    }
}
