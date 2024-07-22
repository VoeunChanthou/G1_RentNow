<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\MemberResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'image'=>$this->image,
            'Country'=>$this->Country,
            'Province'=>$this->Province,
            'street'=>$this->street,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'ownership'=>$this->user,
            // 'products'=>$this->products
            'products'=>ProductResource::collection($this->products),
            'member'=>MemberResource::collection($this->members)
        ];
    }
}
