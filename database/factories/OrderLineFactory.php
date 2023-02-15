<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Customer\Models\OrderLine;
use Domains\Catalog\Models\Variant;
use Domains\Customer\Models\Order;

class OrderLineFactory extends Factory
{
    protected $model = OrderLine::class;

    public function definition(): array
    {
        $variant = Variant::factory()->create();

        return [
            'name' => $variant->name,
            'description' => $variant->product->description,
            'retail' => $variant->retail,
            'cost' => $variant->cost,
            'quantity' => $this->faker->numberBetween(1, 7),
            'purchasable_id' => $variant->id,
            'purchasable_type' => 'variant',
            'order_id' => Order::factory()->create(),
        ];
    }
}