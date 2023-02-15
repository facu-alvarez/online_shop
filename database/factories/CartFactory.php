<?php

declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\States\Statuses\CartStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Customer\Models\Cart;
use Domains\Customer\Models\User;
use Illuminate\Support\Arr;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        $useCoupon =fake()->boolean;

        return [
            'status' => Arr::random(CartStatus::toLabels()),
            'coupon' =>  $useCoupon ? fake()->imei : null,
            'total' => fake()->numberBetween(1000, 10000),
            'discount' => $useCoupon ? fake()->numberBetween(250, 500): null,
            'user_id' => User::factory()->create()
        ];
    }
}
