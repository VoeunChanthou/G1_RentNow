<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\role;
use Spatie\Permission\Models\Permission;
use App\Models\model_has_role;
use App\Models\role_has_permissions;
use App\Http\Resources\RoleResource;
use App\Http\Resources\CategoryResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->json([
            'categories' => $categories
        ]);
        // return CategoryResource::collection(Categories::all());
    }

    public function searchCate(Request $request){
        $categories = Categories::where('name', 'like', '%'.$request->search.'%')->get();
        return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userRole = model_has_role::where('model_id', $request->user()->id)->first();
        $role = role::where('id', $userRole->role_id)->first();
        $isAdmin = $role->name;
        if($isAdmin === 'admin'){
            $cate = Categories::create($request->all());
            return response()->json([
                'message' => 'Successfully created',
                'succeed' => true,
                'cate'=> $cate
            ]);
        }
        return response()->json([
            'message' => 'you do not have permission to create new category',
            'success' => false
        ]);
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
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
