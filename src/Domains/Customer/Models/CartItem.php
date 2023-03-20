<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Domains\Shared\Models\Concerns\HasUuid;
use Database\Factories\CartItemFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasUuid;
    use HasFactory;

    protected $fillable = [
        'uuid',
        'quantity',
        'purchasable_id',
        'purchasable_type',
        'cart_id',
    ];

    protected $casts = [
        //
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }

    protected static function newFactory(): Factory
    {
        return CartItemFactory::new();
    }
}
