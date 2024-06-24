<?php

use App\Http\Controllers\ProfileController;
use  App\Http\Controllers\PostController;
use  App\Http\Controllers\CommentController;
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
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'post'])->name('posts.post');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}', [PostController::class, 'detail'])->name('posts.detail');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::put('/posts/{post}/vote', [PostController::class, 'vote'])->name('posts.vote');
    Route::put('/posts/{post}/unvote', [PostController::class, 'unvote'])->name('posts.unvote');

    Route::post('/posts/{post}/comment', [CommentController::class, 'comment'])->name('posts.comment');
    Route::get('/posts/{post}/{commentId}/edit', [CommentController::class, 'edit'])->name('posts.comment.edit');
    Route::put('/posts/{post}/{commentId}/udpate', [CommentController::class, 'update'])->name('posts.comment.update');
    Route::delete('/posts/{post}/{commentId}/destroy', [CommentController::class, 'destroy'])->name('posts.comment.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
