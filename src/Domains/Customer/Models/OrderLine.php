<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Database\Factories\OrderLineFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'description',
        'retail',
        'cost',
        'quantity',
        'purchaseable_id',
        'purchaseable_type',
        'order_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }

    protected static function newFactory(): Factory
    {
        return OrderLineFactory::new();
    }
}
