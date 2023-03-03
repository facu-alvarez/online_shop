<?php

declare(strict_types=1);

namespace Domains\Customer\Factories;

use Domains\Customer\ValueObjects\CartItemValueObject;

class CartItemFactory
{
    public static function make(array $attributes): CartItemValueObject
    {
        return new CartItemValueObject(
            $attributes['quantity'],
            $attributes['purchasable_id'],
            $attributes['purchasable_type']
        );
    }
}
