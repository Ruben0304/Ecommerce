<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Product */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

                'id' => $this->id,
                'title' => $this->title,
                'price' => $this->price,
                'description' => $this->description,
                'stock' => $this->stock,
                'image' => $this->image,
            
        ];
    }
}
