<?php

namespace Database\Seeders;

use Domains\Catalog\Models\Product;
use Domains\Customer\Models\Coupon;
use Domains\Customer\Models\OrderLine;
use Domains\Customer\Models\Address;
use Domains\Catalog\Models\Variant;
use Domains\Customer\Models\Order;
use Domains\Customer\Models\Cart;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Address::factory()->create();
        Variant::factory(50)->create();
        Cart::factory(10)->create();
        OrderLine::factory(20)->create();
        Order::factory(20)->create();
        Coupon::factory(15)->create();
        Product::factory(50)->create();
    }
}
