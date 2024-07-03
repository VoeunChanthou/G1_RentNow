<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Products;
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
        $product->price = $request->price;
        $product->days = $request->days;
        $product->image = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($request->image->path()));
        $product->shop_id = $request->shop_id;
        $product->category_id = $request->category_id;
        $product->save();

        return response()->json([
            'data' => new ProductResource($product)
        ], 201);
        

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
        //
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
    public function destroy(Products $products)
    {
        //
    }
}
