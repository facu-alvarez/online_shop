<?php

declare(strict_types=1);

use Domains\Customer\Events\ProductWasAddedToCart;
use Domains\Customer\Aggregates\CartAggregate;
use Domains\Catalog\Models\Variant;
use Domains\Customer\Models\Cart;

it(description: 'Can store an event for adding a product', closure: function () {

    $product = Variant ::factory()->create();
    $cart = Cart::factory()->create();

    $event = new ProductWasAddedToCart(
        purchasableID: $product->id,
        cartID: $cart->id,
        type: Cart::class
    );

    CartAggregate::fake()
        ->given(
            events: [
                $event
            ])
        ->when(
            callable: function (CartAggregate $aggregate) use ($product, $cart): void {
                $aggregate->addProduct(
                    product: $product->id,
                    cart: $cart->id,
                    type: Cart::class
                );
            })
        ->assertEventRecorded(
            expectedEvent: new ProductWasAddedToCart(
                purchasableID: $product->id,
                cartID: $cart->id,
                type: Cart::class
            )
        );
});
