<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowResource extends JsonResource
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
            'start_date'=>$this->borrow_date,
            'return_date'=>$this->return_date,
            'borrow_status'=>$this->borrow_status,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'status'=>$this->status,
            'user'=>$this->user,
            'product'=>$this->product,
        ];
    }
}
