<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Comment;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Member;
use App\Models\Message;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
    ];
    public function profile (): HasOne{
        return $this->hasOne(Media::class, 'user_id',"id");
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => "hashed"
    ];
    public static function createUser($request, string $id = null){
        $user = $request->only('first_name', 'last_name', 'email', 'phone_number', 'password');
        $user = self::updateOrCreate(['id'=> $id], $user);
        if ($request->image){
            Media::createOrUpdate(['image' =>[$request->image], 'user_id' => $user->id]);
            return $user;
        }
        return $user;
    }
    public static function loingUser ($request){
        $user = $request->only('email', 'password');
        if (!Auth::attempt($request->only(['email', 'password'])))
            return response()->json([
                    'massage' => "user not found",
            ], 401);
           $users = User::where('email', $request -> email)->first();
            return $users;
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function members(){
        return $this->belongsToMany(Member::class,'user_id');
    }

    public function message(){
        return $this->hasMany(Message::class);
    }
}
