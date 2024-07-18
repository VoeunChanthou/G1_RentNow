<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Products;
use Auth;
use PharIo\Manifest\Author;

class PostController extends Controller
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
        $this->middleware('role_or_permission:Product edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Product delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= Products::latest()->get();

        return view('product.index',['products'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // validation 
    //    $request->validate([
    //     'name'=>'required',
    //     'price'=>'required',
    //     'category_id'=>'required',
    //     'shop_id'=>'required',
        
   
    // ]);
    // $product = Product::create([
    //     'name'=>$request->name,
    //     'price'=>$request->price,
    //     'category_id'=>$request->category_id,
    //     'shop_id'=>$request->shop_id,
    // ]);
    return redirect()->back()->withSuccess('Product created !!!');
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
    public function edit(Product $product)
    {
       return view('product.edit',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'shop_id'=>$request->shop_id,]);
        return redirect()->back()->withSuccess('Product updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->back()->withSuccess('Product deleted !!!');
    }
}
