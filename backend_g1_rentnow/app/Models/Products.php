<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Favorite;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'days', 'category_id','shop_id'];

    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function detail(){
        return $this->hasMany(Detail::class, 'product_id');
    }
    
    public function favorite(){
        return $this->belongsTo(Favorite::class);
    }
}
