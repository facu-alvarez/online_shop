<?php

declare(strict_types=1);

namespace Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasKey;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'active'
    ];

    protected function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function newFactory(): Factory
    {
        return CategoryFactory::new();
    }
}
