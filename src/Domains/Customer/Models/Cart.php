<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Domains\Customer\Models\States\Statuses\CartStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CartFactory;

class Cart extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'total',
        'status',
        'coupon',
        'discount',
        'user_id',
    ];

    protected $casts = [
        'status' => CartStatus::class .':nullable',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    protected static function newFactory(): Factory
    {
        return CartFactory::new();
    }
}
