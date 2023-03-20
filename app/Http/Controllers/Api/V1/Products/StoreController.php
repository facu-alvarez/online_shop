<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Requests\Api\V1\Carts\ProductRequest;
use App\Http\Resources\Api\V1\CartItemResource;
use Domains\Customer\Factories\CartItemFactory;
use Domains\Customer\Actions\AddProductToCart;
use App\Http\Controllers\Controller;
use JustSteveKing\StatusCode\Http;
use Domains\Customer\Models\Cart;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    public function __invoke(ProductRequest $request, Cart $cart): JsonResponse
    {
        $carItem = AddProductToCart::handle(
            CartItemFactory::make(
                $request->validated(),
            ),
            $cart
        );

        return new JsonResponse(
            new CartItemResource(
                $carItem
            ),
            Http::CREATED()
        );
    }
}
