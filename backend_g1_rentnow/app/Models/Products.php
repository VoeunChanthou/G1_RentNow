<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function detail(){
        return $this->hasMany(Detail::class, 'product_id');
    }
}
