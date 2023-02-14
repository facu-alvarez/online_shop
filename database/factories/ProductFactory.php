<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Catalog\Models\Category;
use Domains\Catalog\Models\Product;
use Domains\Catalog\Models\Range;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $cost = fake()->numberBetween(100, 100000);

        return [
            'name' => fake()->words(2, true),
            'description' => fake()->paragraphs(2, true),
            'cost' => $cost,
            'retail' => ($cost * config('shop.profit_margin')),
            'active' => fake()->boolean,
            'vat' => config('shop.vat'),
            'category_id' => Category::factory()->create(),
            'range_id' => fake()->boolean ? Range::factory()->create() : null
        ];
    }
}
