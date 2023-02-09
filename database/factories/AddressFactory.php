<?php

declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\Address;
use Domains\Customer\Models\Location;
use Domains\Customer\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'label' => Arr::random([
                'Convention Center',
                'Office',
                'Home',
                'Moms house',
            ]),
            'billing' => fake()->boolean,
            'user_id' => User::factory()->create(),
            'location_id' => Location::factory()->create(),
        ];
    }

    public function billing(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'billing' => 1
            ];
        });
    }

    public function shipping(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'shipping' => 0
            ];
        });
    }
}
