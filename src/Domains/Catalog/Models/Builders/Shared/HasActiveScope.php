<?php

declare(strict_types=1);


namespace Domains\Catalog\Models\Builders\Shared;

trait HasActiveScope
{
    public function active(): self
    {
        return $this->where('active', true);
    }

    public function inaactive(): self
    {
        return $this->where('active', false);
    }
}
