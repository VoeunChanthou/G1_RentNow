<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Shop;
use Spatie\Permission\Models\role;
use App\Models\model_has_role;
use App\Http\Resources\RoleResource;

use function Laravel\Prompts\alert;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Post access|Post create|Post edit|Post delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Post create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Post edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Post delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops= Shop::all();

        return view('shop.index',['shops'=>$shops]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            };

        }
        $shops= Shop::all();
        return view('shop.index',['shops'=>$shops]);

        // return response()->json(["message"=>"you are not allowed", "success"=>false]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
       return view('shop.edit',['shop' => $shop]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        $shops= Shop::all();
        return view('shop.index',['shops'=>$shops]);
    }

    public function update(Request $request, String $id){
        $shop = Shop::find($id);
        $shop->update($request->all());
        $shops= Shop::all();
        return view('shop.index',['shops'=>$shops]);
    }
}