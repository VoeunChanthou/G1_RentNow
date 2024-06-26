<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\Products;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function products(){
        return $this->hasMany(Products::class);
    }
}
