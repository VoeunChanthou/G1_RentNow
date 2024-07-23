<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailHistoryownerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "Product" => $this->product,
            "Shop_owner" => new DetailHistoryResource($this->product),
            "Borrow_date" => $this->borrow_date,
            "Return_date" => $this->return_date,
            "borrow_status" => $this->borrow_status,
        ];
    }
}
