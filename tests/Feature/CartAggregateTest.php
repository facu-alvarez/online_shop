<?php

declare(strict_types=1);

use Domains\Customer\Events\ProductWasAddedToCart;
use Domains\Customer\Aggregates\CartAggregate;
use Domains\Catalog\Models\Variant;
use Domains\Customer\Models\Cart;

it('Can store an event for adding a product', function () {
    $product = Variant::factory()->create();
    $cart = Cart::factory()->create();


    CartAggregate::fake()
        ->given(
            new ProductWasAddedToCart(
                $product->id,
                $cart->id,
                Cart::class
            )
        )
        ->when(
            callable: function (CartAggregate $aggregate) use ($product, $cart): void {
                $aggregate->addProduct(
                    $product->id,
                    $cart->id,
                    Cart::class
                );
            })
        ->assertEventRecorded(
            new ProductWasAddedToCart(
                $product->id,
                $cart->id,
                Cart::class
            )
        );
});
