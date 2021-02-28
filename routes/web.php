<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('blogs',[\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.list');
//Route::get('blogs/create',[\App\Http\Controllers\BlogController::class, 'create'])->middleware(['auth'])->name('dashboard');
Route::get('blogs/create',[\App\Http\Controllers\BlogController::class, 'create'])->name('blogs.create');
Route::post('/blog/store', [\App\Http\Controllers\BlogController::class, 'store'])->name('blogs.store');

//Route::get('blogs/edit',[\App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
Route::get('blogs/edit', [\App\Http\Controllers\BlogController::class, 'edit'])->middleware(['auth'])->name('blog.edit');

Route::get('blogs/update',[\App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');

//Route::get('blogs/delete',[\App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.delete');
Route::get('blogs/delete',[\App\Http\Controllers\BlogController::class, 'destroy'])->middleware(['auth'])->name('blog.delete');

Route::get('/posts/{blog}', [\App\Http\Controllers\PostController::class,'index'])->name('blog_posts.list');

//Route::get('/posts/{blog}', [\App\Http\Controllers\PostController::class,'index'])->middleware(['auth'])->name('blog_posts.list');

Route::get('/post/{blog}/create', [\App\Http\Controllers\PostController::class,'create'])->name('create.post');
Route::post('/post/{blog}', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

//Route::get('/post/{post}', [\App\Http\Controllers\PostController::class,'show'])->name('posts.show');
Route::get('/post/{post}', [\App\Http\Controllers\PostController::class,'show'])->middleware(['auth'])->name('posts.show');

//Route::post('posts/edit',[\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/edit',[\App\Http\Controllers\PostController::class, 'edit'])->middleware(['auth'])->name('posts.edit');

//Route::post('posts/update',[\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::post('posts/update',[\App\Http\Controllers\PostController::class, 'update'])->middleware(['auth'])->name('post.update');

//Route::post('posts/delete',[\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
Route::post('posts/delete',[\App\Http\Controllers\PostController::class, 'destroy'])->middleware(['auth'])->name('post.delete');

