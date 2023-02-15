<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class VariantResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => 'range',
            'attributes' => [
                'key' => $this->key,
                'name' => $this->name,
                'cost' => $this->cost,
                'retail' => $this->retail,
                'width' => $this->width,
                'length' => $this->length,
                'weight' => $this->weight,
                'active' => $this->active,
                'shippable'=> $this->shippable,
            ],
            'relationships' => [
                'product' => new ProductResource(
                    $this->whenLoaded('product')
                ),
            ]
        ];
    }
}
