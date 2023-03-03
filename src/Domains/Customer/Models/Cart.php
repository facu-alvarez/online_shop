<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\Factory;
use Domains\Customer\States\Statuses\CartStatus;
use Domains\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CartFactory;

class Cart extends Model
{
    use HasFactory;
    use Prunable;
    use HasUuid;

    protected $fillable = [
        'uuid',
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

    public function prunable(): Builder
    {
        return static::query()->where('created_at', '<=', now()->subMonth());
    }

    protected static function newFactory(): Factory
    {
        return CartFactory::new();
    }
}
