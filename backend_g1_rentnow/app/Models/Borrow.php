<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'borrow_date', 'return_date', 'price', 'quantity', 'borrow_status', 'status'
    ];

    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function list (string $user_id){
        $user = self::where('user_id', $user_id)->get();
        return $user;
    }
}
