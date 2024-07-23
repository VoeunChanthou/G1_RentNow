<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shop;


class Message extends Model
{
    use HasFactory;

    public function shop(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
