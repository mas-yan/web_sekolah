<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\ActivityController as FrontendActivityController;
use App\Http\Controllers\Frontend\galeryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InformationController as FrontendInformationController;
use App\Http\Controllers\Frontend\JurusanController as FrontendJurusanController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\JurusanController;
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
Route::get('jurusan/{jurusan}', FrontendJurusanController::class)->name('jurusan');
Route::get('informations', [FrontendInformationController::class, 'index'])->name('information.index');
Route::get('informations/{information}', [FrontendInformationController::class, 'show'])->name('information.show');
Route::get('article', [FrontendPostController::class, 'index'])->name('home.index');
Route::get('article/{post}', [FrontendPostController::class, 'show'])->name('home.show');
Route::get('galery', [galeryController::class, 'index'])->name('galery.index');
Route::get('galery/{image}', [galeryController::class, 'show'])->name('galery.show');
Route::get('activities', [FrontendActivityController::class, 'index'])->name('home.activity.index');
Route::get('activities/{activity}', [FrontendActivityController::class, 'show'])->name('home.activity.show');

Route::prefix('admin')->group(function () {
  Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/tags', TagController::class)->except(['show', 'edit']);
    Route::resource('/categories', CategoryController::class)->except(['show', 'edit']);
    Route::resource('/posts', PostController::class)->except(['show']);
    Route::resource('/informations', InformationController::class)->except(['show']);
    Route::resource('/activities', ActivityController::class)->except(['show']);
    Route::resource('/images', ImageController::class)->except(['edit', 'update']);
    Route::resource('/jurusan', JurusanController::class)->except(['show']);
  });
});
