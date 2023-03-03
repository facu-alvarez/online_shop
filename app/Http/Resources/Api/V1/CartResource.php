<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class CartResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->uuid,
            'type' => 'cart',
            'attributes' => [
                'id' => $this->uuid,
                'status' => $this->status,
                'coupon' => [
                    'code' => $this->coupon,
                    'discount' => $this->discount,
                ],
                'total' => $this->total,
            ],
            'relationships' => [
                'items' => CartItemResource::collection(
                    $this->whenLoaded(
                        'items'
                    )
                )
            ]
        ];
    }
}
