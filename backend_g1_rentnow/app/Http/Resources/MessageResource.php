<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user'=>$this->shop,
            'user_id'=>$this->user_id,
            'shop_id'=>$this->shop_id,
            'text'=>$this->text
        ];
    }
}
