<?php

namespace Domains\Customer\Actions;

use Domains\Customer\ValueObjects\CartItemValueObject;
use Illuminate\Database\Eloquent\Model;
use Domains\Customer\Models\Cart;

class AddProductToCart
{
    public static function handle(CartItemValueObject $cartItem, Cart $cart): Model
    {
        return $cart->items()->create($cartItem->toArray());
    }
}
