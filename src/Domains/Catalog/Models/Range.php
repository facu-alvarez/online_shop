<?php

declare(strict_types=1);

namespace Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\RangeFactory;

class Range extends Model
{
    use HasKey;
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return RangeFactory::new();
    }
}
