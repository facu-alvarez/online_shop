<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use App\OrderLine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Order extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'key',
        'number',
        'state',
        'coupon',
        'total',
        'discount',
        'user_id',
        'billing_id',
        'shipping_id',
        'completed_at',
        'cancelled_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'cancelled_at','datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lineItems(): HasMany
    {
        return $this->hasMany(OrderLine::class, 'order_id');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_id');
    }

    public function billing(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_id');
    }

    protected static function newFactory(): Factory
    {
        return OrderFactory::new();
    }
}
