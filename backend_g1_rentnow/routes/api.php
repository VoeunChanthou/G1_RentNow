<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ShopController;

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
    // logout route
});
Route::post('/logout', [RegisteredUserController::class, 'logout']);

//Comment on poste 
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comment', [CommentController::class, 'createComment']);
Route::get('users', [UserController::class, 'indexUser']);
Route::get('/shop', [ShopController::class, 'index']);