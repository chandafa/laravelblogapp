<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{post_slug}', [HomeController::class, 'postDetail']);

Auth::routes();

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Category Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::get('/categories/create', 'create');
        Route::post('/categories', 'store');
        Route::get('/categories/edit/{category}', 'edit');
        Route::put('/categories/{category}', 'update');
        Route::get('/categories/delete/{category_id}', 'destroy');
    });
    // Post Route
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts', 'index');
        Route::get('/posts/create', 'create');
        Route::post('/posts', 'store');
        Route::get('/posts/edit/{post}', 'edit');
        Route::put('/posts/{post}', 'update');
        Route::get('/posts/delete/{post_id}', 'destroy');
    });
});
