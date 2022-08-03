<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\PublicationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Public routes
Route::get('/products',[ProductContoller::class,'index']);
Route::get('/products/{id}',[ProductContoller::class,'show']);

Route::resource('/books',BookController::class);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
// Protected ROutes
Route::group(['middleware'=> ['auth:sanctum']], function(){
    Route::post('/products',[ProductContoller::class,'store']);
    Route::put('/products/{id}',[ProductContoller::class,'update']);
    Route::delete('/products/{id}',[ProductContoller::class,'destroy']);
    Route::get('/products/search/{name}',[ProductContoller::class,'search']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::get('/posts',[PostController::class,'index']);
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::put('/posts/{id}',[PostController::class,'update']);
Route::delete('/posts/{id}',[PostController::class,'destroy']);
Route::get('/posts/search/{title}',[PostController::class,'search']);

Route::get('/authors',[AuthorController::class,'index']);
Route::post('/authors',[AuthorController::class,'store']);
Route::get('/authors/{id}',[AuthorController::class,'show']);
Route::put('/authors/{id}',[AuthorController::class,'update']);
Route::delete('/authors/{id}',[AuthorController::class,'destroy']);

Route::get('/publications',[PublicationController::class,'index']);
Route::post('/publications',[PublicationController::class,'store']);
Route::get('/publications/{id}',[PublicationController::class,'show']);
Route::put('/publications/{id}',[PublicationController::class,'update']);
Route::delete('/publications/{id}',[PublicationController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
