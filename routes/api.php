<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ActionLogController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('user/login',[AuthController::class,'login']);
Route::post('user/register',[AuthController::class,'register']);

Route::get('category',[AuthController::class,'categoryList'])->middleware('auth:sanctum');

Route::get('nameList',[AuthController::class,'userNameList'])->middleware('auth:sanctum');

Route::get('postList',[AuthController::class,'postList'])->middleware('auth:sanctum');


Route::get('allPostList',[PostController::class,'getPostList']);
Route::post('post/search',[PostController::class,'postSearch']);
Route::post('post/details',[PostController::class,'postDetails']);

// category all list
Route::get('allCategoryList',[CategoryController::class,'getCategoryList']);
// category search
Route::post('category/search',[CategoryController::class,'categorySearch']);


// action log create
Route::post('post/actionLog',[ActionLogController::class,'actionLogCreate']);
