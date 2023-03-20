<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Resources\Api\V1\ProductResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use Domains\Catalog\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $products =
            QueryBuilder::for(Product::class)
                ->allowedIncludes(['category', 'range', 'variants'])
                ->allowedFilters(['active', 'vat'])
                ->paginate();

        return response()->json(
            ProductResource::collection($products),
            200
        );
    }
}
