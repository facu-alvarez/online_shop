<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Carts;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'quantity' => [
                'required',
                'int',
                'gt:0',
            ]
        ];
    }
}
