<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domains\Customer\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasUuid;
    use HasFactory;

    protected $fillable = [
        'uuid',
        'house',
        'street',
        'parish',
        'ward',
        'district',
        'county',
        'postcode',
        'country'
    ];
}
