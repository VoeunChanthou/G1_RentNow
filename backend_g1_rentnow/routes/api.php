<?php

use App\Http\Controllers\API\feedbackcontroller;
use App\Http\Controllers\API\borrowcontrpller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductDtailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
// use App\Http\Controllers\MemberController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::get('/post/list', [PostController::class, 'index'])->middleware('auth:sanctum');
Route::post('/register', [RegisteredUserController::class, "register"]);
Route::post('/loginuser', [RegisteredUserController::class, "Login"]);
Route::middleware('auth:sanctum')->group(function () {

});

// logout route
Route::post('/logout', [RegisteredUserController::class, 'logout']); 
    Route::post('/create/product', [PostController::class, 'create']);
    Route::delete('/delete/product', [PostController::class, 'delete']);
    Route::put('/update/product', [PostController::class, 'update']);
    Route::get('/get/products', [PostController::class, 'index']);

// ----product admin---
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create_product_admin', [ProductController::class, 'create']);
    
});

//--shop------
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create_product', [ProductsController::class, 'create']);
    Route::post('/create/shop', [ShopController::class, 'create']);
    Route::post('/create/category', [CategoriesController::class, 'create']);
    Route::post('/create/product', [ProductsController::class,'create']);
    Route::post('/shop/create/product', [ProductsController::class, 'store']);

    Route::get('/product/shop', [ShopController::class, 'showProduct']);
    Route::post('/comment', [feedbackcontroller::class, 'create']);
    Route::delete('/delete/product/{id}', [ProductsController::class, 'destroy']);
    Route::put('/update/product/{id}', [ProductsController::class, 'update']);

    Route::get('list/history', [borrowcontrpller::class, "gethistory"]);
    Route::delete('/delete/{id}', [borrowcontrpller::class, "delete"]);
    Route::post('/reset', [PasswordResetLinkController::class, "store"]);
});
route::get ('/list/comment/{id}', [feedbackcontroller::class, "getcomment"]);


Route::post('/logout', [RegisteredUserController::class, 'logout'])->middleware();
Route::get('/product', [ProductsController::class, 'index']);
Route::get('/category', [CategoriesController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/search', [ProductsController::class, 'search']);
Route::get('/category/select', [CategoriesController::class, 'searchCate']);


Route::post('/detail', [ProductDtailController::class,'putDetail']);
Route::get('/product/{id}', [ProductsController::class,'show']);


//shop owner//
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/add/member', [MemberController::class, 'create']);
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/show/member/{id}', [MemberController::class, 'show']);
    Route::get('/list/user', [MemberController::class, 'listUser']);
    Route::get('/detail/user/{id}', [MemberController::class, 'detailUser']);

    Route::delete('/remove/{id}', [MemberController::class, 'destroy']);

    //shop categories//
    Route::get('/shop/categories', [ProductsController::class, 'getCateShop']);


    Route::post('/create/product/detail/{id}', [ProductDtailController::class, 'putDetail']);
    Route::get('/image/detail/{id}', [ProductDtailController::class, 'showDetail']);
});


Route::get('/get/shop/{id}', [ShopController::class, 'show']);

