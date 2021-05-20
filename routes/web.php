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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostsController::class, 'getPosts']);

Route::get('/posts/edit', [PostsController::class, 'getEditPostView'])->name('edit_post_view');

Route::post('/posts/edit', [PostsController::class, 'editPost'])->name('edit_post');

Route::delete('/post', [PostsController::class, 'deletePost'])->name('delete_post');

Route::get('/posts/export', [PostsController::class, 'export'])->name('export');
