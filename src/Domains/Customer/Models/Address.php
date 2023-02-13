<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\AddressFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'billing',
        'user_id',
        'location_id',
    ];

    protected $casts = [
        'billing' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    protected static function newFactory(): Factory
    {
        return new AddressFactory();
    }
}
