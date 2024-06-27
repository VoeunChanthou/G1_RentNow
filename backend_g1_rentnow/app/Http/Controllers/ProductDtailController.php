<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Detail;

class ProductDtailController extends Controller
{
    public function putDetail(Request $request)
    {
        // return $request;
        $imgagName = Str::random(32) . "." . $request->img->getClientOriginalExtension();
        Storage::disk('images')->put($imgagName, file_get_contents($request->img));

        // You can now save the image path or other relevant data in your database
        $detail = new Detail();
        $detail->product_id = $request->product_id;
        $detail->image = $imgagName;
        $detail->save();
        

        return $detail;

    }
}
