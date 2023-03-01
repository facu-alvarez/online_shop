<?php

declare(strict_types=1);

namespace Domains\Customer\Events;

class AbstractProductCartEvent extends \Spatie\EventSourcing\StoredEvents\ShouldBeStored
{
    public function __construct(
        public int $purchasableID,
        public int $cartID,
        public string $type
    ) {}
}
