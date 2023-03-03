<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Carts;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use App\Http\Resources\Api\V1\ProductResource;
use App\Http\Resources\Api\V1\CartResource;
use App\Http\Controllers\Controller;
use JustSteveKing\StatusCode\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): SymfonyResponse
    {
        if (!auth()->check() || !auth()->user()->cart()->count()) {
            return new Response(
                null,
                Http::NO_CONTENT(),
            );
        }

        return new JsonResponse(
            new CartResource(
                auth()->user()->cart
            ),
            Http::OK(),
        );
    }
}
