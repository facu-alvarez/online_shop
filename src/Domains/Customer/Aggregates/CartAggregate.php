<?php

namespace Domains\Customer\Aggregates;
use Domains\Customer\Events\DecreaseCartQuantity;
use Domains\Customer\Events\ProductWasAddedToCart;
use Domains\Customer\Events\ProductWasRemovedFromCart;
use Domains\Customer\Events\IncreaseCartQuantity;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

/*
 *
 */
class CartAggregate extends AggregateRoot
{
    public function addProduct(int $product, int $cart, string $type): self
    {
        $this->recordThat(
            domainEvent: new ProductWasAddedToCart(
                purchasableID: $product,
                cartID: $cart,
                type: $type
            )
        );

        return $this;
    }

    public function removeProduct(int $purchasableID, int $cartID, string $type): self
    {
        $this->recordThat(
            domainEvent: new ProductWasRemovedFromCart(
                purchasableID: $purchasableID,
                cartID: $cartID,
                type: $type

            )
        );

        return $this;
    }

    public function increaseQuantity(int $carID, int $carItemID, int $quantity): self
    {
        $this->recordThat(
            domainEvent: new IncreaseCartQuantity(
                cartID: $carID,
                cartItemID: $carItemID,
                quantity: $quantity

            )
        );

        return $this;
    }

    public function decreaseQuantity(int $carID, int $carItemID, int $quantity): self
    {
        $this->recordThat(
            domainEvent: new DecreaseCartQuantity(
                cartID: $carID,
                cartItemID: $carItemID,
                quantity: $quantity

            )
        );

        return $this;
    }
}
