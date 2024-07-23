<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ListCommentResource;

class ProductResource extends JsonResource
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
            'name'=> $this->name,
            'price'=>$this->price,
            'status'=>$this->status,
            'image'=>$this->image,
            'shop'=>$this->shop,
            'category'=>$this->category,
            'detail'=>$this->detail,
            'feedback'=>ListCommentResource::collection($this->feedback)
        ];
    }
}
