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
        // $products = Products::where('status', 'can_borrow')->get();
        $products = Products::where('status', 'can_borrow')->get();
        return ProductResource::collection($products);
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

        if(!$product){
            return response()->json(['error' => 'create failed'], 500);
        }
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
        $product->status = 'can_borrow';
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

    public function getCateShop(Request $request){
        $userId = $request->user()->id;
        $shop = Shop::where('user_id', $userId)->first();
        $products = ProductResource::collection(Products::where('shop_id', $shop->id)->get());
        $categories = [];
        foreach ($products as $product){
            if(count($categories) >= 1){
            foreach($categories as $cate){
                if($cate->id != $product->category->id){
                    array_push($categories, $product->category);
                }
            }
        }
        else{
            array_push($categories, $product->category);
        }
    }
    return $categories;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return response()->json([
                'message' => 'Updated successfully',
                'product' => $product
            ]);
        } else {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::find($id);

        if ($products) {
            $products->delete();
            return response([
                'success' => true,
                'message' => 'Deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    }
}
