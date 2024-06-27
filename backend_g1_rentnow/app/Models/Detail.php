<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'product_id'
    ];

    public function Detail(){
        return $this->belongsTo(Categories::class);
    }

}
