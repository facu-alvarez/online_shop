<?php

declare(strict_types=1);

namespace Domains\Customer\Factories;

use Domains\Customer\ValueObjects\CartValueObject;

class CartFactory
{
    public static function make(array $attributes): CartValueObject
    {
        return new CartValueObject(
            $attributes['status'],
            $attributes['user_id']
        );
    }
}
