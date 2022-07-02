<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformationController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('article/{post}', [HomeController::class, 'show'])->name('home.show');

Route::prefix('admin')->group(function () {
  Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/tags', TagController::class)->except(['show', 'edit']);
    Route::resource('/categories', CategoryController::class)->except(['show', 'edit']);
    Route::resource('/posts', PostController::class)->except(['show']);
    Route::resource('/informations', InformationController::class)->except(['show']);
    Route::resource('/images', ImageController::class)->except(['show']);
  });
});
