<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TrendPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.profile.index');
    // })->name('dashboard');

    //Dashboard
    Route::get('dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::post('admin/update',[ProfileController::class, 'adminAccountUpdate'])->name('admin#update');

    //Change Direct Password
    Route::get('admin/changePassword',[ProfileController::class,'directChangePassword'])->name('admin#directChangePassword');
    Route::post('admin/changePassword',[ProfileController::class,'changePassword'])->name('admin#changePassword');

    //Direct Delete Account
    Route::get('admin/deleteAccount/{id}',[ListController::class,'deleteAccount'])->name('admin#deleteAccount');

    //Category Delete Account
    Route::get('admin/category/{id}',[CategoryController::class,'deleteCategory'])->name('category#deleteAccount');

    //category
    Route::get('category', [CategoryController::class, 'index'])->name('admin#category');
    Route::post('category/create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
    Route::post('category/list',[CategoryController::class,'categorySearchList'])->name('admin#categorySearchList');
    Route::get('category/editPage/{id}',[CategoryController::class,'categoryEditPage'])->name('admin#categoryEditPage');
    Route::post('category/update/{id}',[CategoryController::class,'categoryUpdate'])->name('admin#categoryUpdate');
    //list
    Route::get('admin/list', [ListController::class, 'index'])->name('admin#list');
    Route::post('admin/list',[ListController::class,'adminSearchList'])->name('admin#searchList');

    //Post
    Route::get('post', [PostController::class, 'index'])->name('admin#post');
    Route::post('post/create',[PostController::class, 'createPost'])->name('admin#createPost');
    Route::get('post/deletePost/{id}',[PostController::class,'deletePost'])->name('admin#deletePost');
    //Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('admin#profile');
    //Trend
    Route::get('trend', [TrendPostController::class, 'index'])->name('admin#trend');
});
