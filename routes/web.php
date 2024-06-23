<?php

use App\Http\Controllers\ProfileController;
use  App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

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
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
