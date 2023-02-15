<?php

declare(strict_types=1);

namespace Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Domains\Catalog\Models\Builders\ProductBuilder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'description',
        'cost',
        'retail',
        'active',
        'vat',
        'category_id',
        'range_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'vat' => 'boolean'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function range(): BelongsTo
    {
        return $this->belongsTo(Range::class, 'range_id');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class, 'product_id');
    }

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }

    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }
}
