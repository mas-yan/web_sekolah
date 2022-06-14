<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::middleware('auth')->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('/tags', TagController::class)->except(['show', 'edit']);
  Route::resource('/categories', CategoryController::class)->except(['show', 'edit']);
  Route::resource('/posts', PostController::class);
});
