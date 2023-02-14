<?php


namespace Domains\Catalog\Models\Builders\Shared;


use Illuminate\Database\Eloquent\Builder;

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
