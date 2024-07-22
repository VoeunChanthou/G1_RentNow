<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\role;
use Spatie\Permission\Models\Permission;
use App\Models\model_has_role;
use App\Models\role_has_permissions;
use App\Http\Resources\RoleResource;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $locations = Shop::all(['latitude', 'longitude']); 
    //     return $locations;
    //     return view('shop', ['locations' => $locations]);
    // }

    public function index()
    {
        // This will load the main view with the map
        return view('shop');
    }

    public function getLocations()
    {
        // Fetch the locations from the database
        $locations = Shop::all(['latitude', 'longitude']);
        // return $locations;
        
        // Return locations as a JSON response
        return response()->json($locations);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // return $request->user();
        // return "hello";
        // return Permission::all();
        // return role::all();
        $role = RoleResource::collection(model_has_role::all());
        // $role = role_has_permissions::all();
        // $roleOfuser = [];
        // foreach ($role as $key => $value) {
        //     if ($role[$key]->model_id == $request->user()->id) {
        //         $roleId = role_has_permissions::all();
        //         foreach ($roleId as $key2 => $value2) {
        //             if($role[$key]->role_id === $roleId[$key2]->role_id){
        //                 array_push($roleOfuser, $roleId[$key2]);
        //             }
        //         };
        //     }
        // }
        // return $roleOfuser;

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
    public function show(Shop $shop)
    {
        //
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
}
