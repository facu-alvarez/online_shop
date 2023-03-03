<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\ValueObjects\CartValueObject;
use Illuminate\Database\Eloquent\Model;
use Domains\Customer\Models\Cart;

class CreateCart
{
    public static function handle(CartValueObject $cart): Model
    {
        return Cart::query()->create($cart->toArray());
    }
}
