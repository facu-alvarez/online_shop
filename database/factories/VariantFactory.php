<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Catalog\Models\Product;
use Domains\Catalog\Models\Variant;

class VariantFactory extends Factory
{
    protected $model = Variant::class;

    public function definition(): array
    {
        $product = Product::factory()->create();

        $cost = fake()->boolean
            ? $product->cost
            : $product->cost + fake()->numberBetween(100,7500);
        $retail = ($product->cost === $cost)
            ? $product->retail
            : $product->retail + fake()->numberBetween(100,7500);

        $shippable = fake()->boolean;

        return [
            'name' => fake()->words(3, true),
            'cost' => $cost,
            'retail' => $retail,
            'height' => $shippable ? fake()->numberBetween(100, 1000): null,
            'width' => $shippable ? fake()->numberBetween(100, 1000): null,
            'length' => $shippable ? fake()->numberBetween(100, 1000): null,
            'weight' => $shippable ? fake()->numberBetween(100, 1000): null,
            'active' => fake()->boolean,
            'shippable' => $shippable,
            'product_id' => $product->id,
        ];
    }
}
