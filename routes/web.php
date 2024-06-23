<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
use  App\Http\Controllers\PostController;
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

// These are the basics of Routing in a CRUD app.
Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');
Route::post('/product',[ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update',[ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy',[ProductController::class, 'destroy'])->name('product.destroy');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'post'])->name('posts.post');