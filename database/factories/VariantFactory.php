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

        $cost = $this->faker->boolean
            ? $product->cost
            : $product->cost + $this->faker->numberBetween(100,7500);
        $retail = ($product->cost === $cost)
            ? $product->retail
            : $product->retail + $this->faker->numberBetween(100,7500);

        $shippable = $this->faker->boolean;

        return [
            'name' => $this->faker->words(3, true),
            'cost' => $cost,
            'retail' => $retail,
            'height' => $shippable ? $this->faker->numberBetween(100, 1000): null,
            'width' => $shippable ? $this->faker->numberBetween(100, 1000): null,
            'length' => $shippable ? $this->faker->numberBetween(100, 1000): null,
            'weight' => $shippable ? $this->faker->numberBetween(100, 1000): null,
            'active' => $this->faker->boolean,
            'shippable' => $shippable,
            'product_id' => $product->id,
        ];
    }
}
