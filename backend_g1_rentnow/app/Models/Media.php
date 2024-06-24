<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['image', 'user_id', 'post_id'];
    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // public static function uploadfile($file) : string
    // {
    //     $filename = $file->getClientOriginalName();
    //     $getfilenamewitoutext = pathinfo($filename, PATHINFO_FILENAME);
    //     $getfileExtansion = $file->getclientOriginalExtension();
    //     $newFileName = time(). '_'. str_replace(' ', '_', $getfilenamewitoutext). ".". $getfileExtansion;
    //     $im_path = $file->storeAs('public/image', $newFileName);
    //     return $newFileName;
    // }
    public static function createOrUpdate ($request){
        foreach ($request['image'] as $image){
            // $image = self::uploadfile($image);
            $modia = [
                'image' => $image ?? null,
                'user_id' => $request['user_id'] ?? null,
                'post_id' => $request['post_id'] ?? null,
            ];
            self::create($modia);
        }
    }
}
