<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

use App\Http\Resources\FavoriteResource;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $allFav = Favorite::all();
        // return $allFav;

        return FavoriteResource::collection(Favorite::all());
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $creatfav = new Favorite();
        $creatfav->user_id = $request->user()->id;
        $creatfav->product_id = $request->product_id;
        $creatfav->save();
        

         return response()->json([
           'message' => 'Favorite created successfully',
            'favorite' => $creatfav
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();
        
        return response()->json([
           'message' => 'Favorite deleted successfully',
            'favorite' => $favorite
        ], 200);
    }
   
}
