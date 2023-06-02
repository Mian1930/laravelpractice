<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// get
Route::get('/blog',[PostsController::class,'index']);
Route::get('/blog/{id}',[PostsController::class,'show']);
//post 
Route::get('/blog/create',[PostsController::class,'create']);
Route::post('/blog',[PostsController::class,'store']);

//put or patch
Route::get('/blog/edit/{id}',[PostsController::class,'edit']);
Route::patch('/blog/{id}',[PostsController::class,'update']);
// delete
Route::delete('/blog/{id}',[PostsController::class,'destroy']);


Route::resource('blog',PostsController::class);

