<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Detail;

class ProductDtailController extends Controller
{
    public function putDetail(Request $request, $id)
    {
        try {
            $detail = new Detail();
            $detail->product_id = $id;
            $detail->image = "data:image/jpeg;base64,".$request->input('image');
            $detail->save();
    
            return response()->json([
                'success' => true,
                'data' => $detail
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function ShowDetail(String $id){
        $detail = Detail::where('product_id', $id)->get();
        return response()->json([
            'message' => 'get detail successfully',
            'detail' => $detail
        ]);
    }
}
