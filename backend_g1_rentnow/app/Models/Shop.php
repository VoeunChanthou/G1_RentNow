<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Member;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'Country',
        'Province',
        'street',
        'latitude',
        'longitude'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function products(){
        return $this->hasMany(Products::class);
    }

    public function members(){
        return $this->hasMany(Member::class);
    }
}
