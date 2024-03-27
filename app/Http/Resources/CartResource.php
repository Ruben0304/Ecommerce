<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Cart */
class CartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $product = Product::findOrFail($this->product_id);
        return [

            'id' => $this->id,
            'quantity' => $this->quantity,
            'product' => new ProductResource($product),
        ];
    }
}
