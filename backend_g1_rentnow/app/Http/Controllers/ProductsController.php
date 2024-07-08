<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Products;
use App\Models\Shop;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Products::all();
        return ProductResource::collection(Products::all());
    }


    public function create(Request $request)
    {
        $product = new Products();
        $product->name = $request->name;
        $product->shop_id = $request->shop_id;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->image = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($request->image->path()));
        $product->save();

        return response()->json([
            'message' => 'create successfully',
            'product' => $product
        ]);
        // return $shop;

    }

    public function search(Request $request)
    {
        $query = $request->input('name');

        $products = Products::query()
            ->where('name', 'like', '%' . $query . '%')
            ->get();

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shop = Shop::where('user_id', $request->user()->id)->first();

        $product = new Products();
        $product->name = $request->name;
        $product->image = $request->image;
        $product->user_id = $request->user_id;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->shop_id = $shop->id;

        $product->save();

        return response()->json([
            'message' => 'create successfully',
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        // $product = Products::where('id', $id)->first();
        $products = ProductResource::collection(Products::all());
        foreach ($products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $products = Products::find($id);
        $products->delete();
        // $products->save();
        return response([
            'success' => true,
            'message' => 'delete successfully'
        ]);
    }
}
