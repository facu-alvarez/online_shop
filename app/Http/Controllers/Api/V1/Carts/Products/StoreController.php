<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Carts\Products;

use App\Http\Resources\Api\V1\CartItemResource;
use Domains\Customer\Factories\CartItemFactory;
use Domains\Customer\Aggregates\CartAggregate;
use Domains\Customer\Actions\AddProductToCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use Domains\Customer\Models\Cart;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request, Cart $cart): Response
    {
        CartAggregate::retrieve($cart->uuid)->addProduct(
            $request->get('purchasable_id'),
            $cart->id,
            $request->get('purchasable_type')
        )->persist();

        return new Response(null, Http::CREATED());
    }
}
