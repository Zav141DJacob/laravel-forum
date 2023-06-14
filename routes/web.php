<?php

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

Route::post('subscribe', \App\Http\Controllers\NewsletterController::class);

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show']);

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', \App\Http\Controllers\AdminPostController::class)->except('show');
//    Route::get('admin/posts/create', [\App\Http\Controllers\AdminPostController::class, 'create'])->name('admin-post-create');
//    Route::get('admin/posts/{post:id}/edit', [\App\Http\Controllers\AdminPostController::class, 'edit'])->name('admin-post-edit');
//    Route::patch('admin/posts/{post:id}', [\App\Http\Controllers\AdminPostController::class, 'update'])->name('admin-post-update');
//    Route::delete('admin/posts/{post:id}', [\App\Http\Controllers\AdminPostController::class, 'destroy'])->name('admin-post-destroy');
//    Route::get('admin/posts', [\App\Http\Controllers\AdminPostController::class, 'index'])->name('admin-posts-index');
//    Route::post('admin/posts', [\App\Http\Controllers\AdminPostController::class, 'store'])->name('admin-posts-store');

});

Route::get('register', [\App\Http\Controllers\RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [\App\Http\Controllers\RegisterController::class, 'store'])->middleware('guest');


Route::post('posts/{post:slug}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->middleware('auth');//->middleware('auth');

Route::get('login', [\App\Http\Controllers\SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [\App\Http\Controllers\SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [\App\Http\Controllers\SessionController::class, 'destroy'])->middleware('auth');
