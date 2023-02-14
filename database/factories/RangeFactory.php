<?php

declare(strict_types=1);

namespace Database\Factories;

use Domains\Catalog\Models\Range;
use Illuminate\Database\Eloquent\Factories\Factory;

class RangeFactory extends Factory
{
    protected $model = Range::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description'=> fake()->paragraphs(4,true),
            'active'=> true
        ];
    }
}
