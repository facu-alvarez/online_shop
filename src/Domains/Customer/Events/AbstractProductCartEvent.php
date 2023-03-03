<?php

declare(strict_types=1);

namespace Domains\Customer\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class AbstractProductCartEvent extends ShouldBeStored
{
    public function __construct(
        public int $purchasableID,
        public int $cartID,
        public string $type
    ) {}
}
