<?php

use App\Http\Controllers\Backend\CollaborationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\GalleryController;

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

Route::get('/', HomeController::class);
Route::resource('blog', BlogController::class);
Route::resource('galeri', GalleryController::class);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/pengguna', UserController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/ulasan', ReviewController::class);
    Route::resource('/kerjasama', CollaborationController::class);
});


require __DIR__.'/auth.php';
