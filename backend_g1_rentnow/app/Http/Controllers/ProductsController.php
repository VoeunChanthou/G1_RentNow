<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\model_has_role;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userRole = model_has_role::where('model_id', $request->user()->id)->first();
        $role = Role::where('id', $userRole->role_id)->first();
        if ($role->name === 'admin') {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'price' => 'required|integer',
                'category_id' => 'required',
                'shop_id' => 'required',
            ]);
            $product = Product::create($validatedData);
            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product
            ], 201);
        } else {
            return response()->json([
                'message' => 'You do not have permission to create new products'
            ], 403);
        }
        
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
