<?php

declare(strict_types=1);

namespace Domains\Customer\Projectors;

use Domains\Customer\Aggregates\CartAggregate;
use Domains\Customer\Events\IncreaseCartQuantity;
use Domains\Customer\Models\CartItem;
use Illuminate\Support\Str;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Domains\Customer\Events\ProductWasRemovedFromCart;
use Domains\Customer\Events\ProductWasAddedToCart;
use Domains\Customer\Models\Cart;

class CartProjector extends Projector
{
    public function onProductWasAddedToCart(ProductWasAddedToCart $event): void
    {
        $cart = Cart::query()->find(
            id: $event->cartID
        );

        $cart->items()->create(
            [
                'purchasable_id' => $event->purchasableID,
                'purchasable_type' => $event->type
            ]
        );
    }

    public function onProductWasRemovedFromCart(ProductWasRemovedFromCart $event): void
    {
        $cart = Cart::query()->find(
            id: $event->cartID
        );

        $cart->items()
            ->where('purchasable_id', $event->purchasableID)
            ->where('purchasable_type', $event->purchasableID)
            ->delete();
    }

    public function onIncreaseCartQuantity(IncreaseCartQuantity $event): void
    {
        $item = CartItem::query()
            ->where(
                column: 'cart_id', value: $event->cartID
            )->where(
                column: 'id', value: $event->cartItemID
            )->first();

        $item->update([
            'quantity' => ($item->quantity + $event->quantity)
        ]);
    }

    public function onDecreaseCartQuantity(IncreaseCartQuantity $event): void
    {
        $item = CartItem::query()
            ->where(
                column: 'cart_id', value: $event->cartID
            )->where(
                column: 'id', value: $event->cartItemID
            )->first();

        if ($item->quantity >= $event->quantity) {
            CartAggregate::retrieve(
                uuid: Str::uuid()->toString()
            )->removeProduct(
                purchasableID: $item->purchasable->id,
                cartID: $item->cart_id,
                type: get_class(object: $item->purchasable)
            );

            return;
        }

        $item->update([
            'quantity' => ($item->quantity - $event->quantity)
        ]);
    }

}
