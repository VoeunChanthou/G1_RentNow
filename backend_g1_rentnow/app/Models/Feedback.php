<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["user_id", "product_id", "comment"];
    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function createOrUpdate ($request, $id = null){
       $feedback = [
        'user_id' => Auth::user()->id,
        'product_id' => $request -> product_id,
        'comment' => $request->comment,
       ];
       $feedback = self::updateOrCreate(['id' => $id], $feedback);
       return $feedback;
    }
    public static function list (string $product_id){
        $user = self::where('product_id', $product_id)->get();
        return $user;
    }

}
