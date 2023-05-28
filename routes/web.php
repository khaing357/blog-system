<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

Route::get('/',[BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show']); 

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscriptionHandler']);

//admin route
Route::middleware('can:admin')->group(function (){
    Route::get('/admin/blogs',[AdminController::class,'index']);
    Route::get('/admin/blogs/create',[AdminController::class,'create']);
    Route::post('/admin/blogs/store',[AdminController::class,'store']);
    Route::get('/admin/blogs/{blog:slug}/edit',[AdminController::class,'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update',[AdminController::class,'update']);
    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminController::class,'destroy']);  
});


