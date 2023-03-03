<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Carts;

use App\Http\Resources\Api\V1\CartResource;
use Domains\Customer\States\Statuses\CartStatus;
use Domains\Customer\Factories\CartFactory;
use Domains\Customer\Actions\CreateCart;
use App\Http\Controllers\Controller;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $cart = CreateCart::handle(
            CartFactory::make(
                [
                    'status' => CartStatus::pending()->value,
                    'user_id' => auth()->id() ?? null
                ]
            )
        );

        return new JsonResponse(
            new CartResource($cart),
            Http::CREATED()
        );
    }
}
