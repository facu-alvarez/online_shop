<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->uuid,
            'type' => 'cart-item',
            'attributes' => [
                'uuid' => $this->uuid,
                'quantity' => $this->quantity,
                'item' => [
                    'id' => $this->uuid,
                    'type' => $this->quantity,
                ]
            ],
            'relationships' => [
                'cart' => CartResource::collection(
                    $this->whenLoaded('cart')
                )
            ]
        ];
    }
}
