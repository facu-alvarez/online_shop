<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CouponFactory;

class Coupon extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'key',
        'code',
        'discount',
        'uses',
        'max_uses',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    protected static function newFactory(): Factory
    {
        return CouponFactory::new();
    }
}
