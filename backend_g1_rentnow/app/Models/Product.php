<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'shop_id',
    ];

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
