<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductDtailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FavoriteController;



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



//--shop------
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create/shop', [ShopController::class, 'create']);
    Route::post('/create/category', [CategoriesController::class, 'create']);

    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorite', [FavoriteController::class, 'create']);
    Route::delete('/unfavorite/{id}', [FavoriteController::class, 'destroy']);   
});


Route::post('/logout', [RegisteredUserController::class, 'logout'])->middleware();
Route::get('/product', [ProductsController::class, 'index']);
Route::get('/category', [CategoriesController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/search', [ProductsController::class, 'search']);
Route::get('/category/select', [CategoriesController::class, 'searchCate']);

Route::post('/detail', [ProductDtailController::class,'putDetail']);
Route::get('/product/{id}', [ProductsController::class,'show']);
