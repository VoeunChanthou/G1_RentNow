<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Spatie\Permission\Models\role;
use Spatie\Permission\Models\Permission;
use App\Models\model_has_role;
use App\Models\role_has_permissions;
use App\Http\Resources\RoleResource;
use App\Http\Resources\ShopResource;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop = Shop::all();
        // return $shop;
        return response()->json(['data' => $shop]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $role = RoleResource::collection(model_has_role::all());
        $isAdmin = 'null';
        foreach ($role as $key => $value){
            if($role[$key]->model_id == $request->user()->id){
                $roles = role::all();
                foreach ($roles as $key1 => $value){
                    if($role[$key]->model_id == $roles[$key1]->id){
                        if($roles[$key1]->name == 'admin'){
                            $isAdmin = $roles[$key1];
                        }
                    }
                }
            }
        }

        
        if($isAdmin != 'null'){
            $ownerId = model_has_role::where('model_id', $request->user_id)->first();
            $isOwner = role::where('id', $ownerId->role_id)->first();
            if($isOwner->name == 'shop owner'){
                $shop = shop::create($request->all());
                return response()->json([
                    "message"=>"Created shop successfully",
                    "success"=> true,
                    "shop"=>$shop
                ]);
            };

            return response()->json(["message" => "This user don't has role shop owner"]);



        }

        return response()->json(["message"=>"you are not allowed", "success"=>false]);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $userId = $request->user()->id;
        return ShopResource::make(Shop::where('user_id', $userId)->first());
    }

    public function showProduct(Request $request)
{
    $userId = $request->user()->id;
    $shop = Shop::where('user_id', $userId)->first();

    if ($shop) {
        return response()->json(ShopResource::make($shop), 200);
    } else {
        return response()->json(['message' => 'Shop not found'], 404);
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function getShopById(String $id){
        $shop = Shop::find($id);
        if($shop){
            return ShopResource::make($shop);
            // return $shop;
        }
        return response()->json(['message' => 'Shop not found'], 404);
    }


}