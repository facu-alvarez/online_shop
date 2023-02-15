<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Customer\Models\Coupon;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        $maxUses = $this->faker->numberBetween(10, 1000);

        return [
            'code' => $this->faker->bothify('COUP-????-????'),
            'discount' => $this->faker->numberBetween(100, 5000),
            'uses' => $this->faker->numberBetween(1, $maxUses),
            'max_uses' => $this->faker->boolean ? $maxUses : null,
            'active' => $this->faker->boolean
        ];
    }
}
