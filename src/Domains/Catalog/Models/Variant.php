<?php

declare(strict_types=1);

namespace Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\VariantFactory;

class Variant extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'cost',
        'retail',
        'width',
        'length',
        'weight',
        'active',
        'shippable',
        'product_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'shippable' => 'boolean'
    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected static function newFactory(): Factory
    {
        return VariantFactory::new();
    }
}
