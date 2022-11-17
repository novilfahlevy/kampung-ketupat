<?php

use App\Http\Controllers\Backend\ActionController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\GalleryController as BackendGalleryController;
use App\Http\Controllers\Backend\CollaborationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\ReviewController as FrontendReviewController;
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
Route::resource('ulasan', FrontendReviewController::class);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/pengguna', UserController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/ulasan', ReviewController::class);
    Route::resource('/kerjasama', CollaborationController::class);
    Route::group(['as' => 'galeri.'], function() {
        Route::get('/galeri/create-video', 'App\Http\Controllers\Backend\GalleryController@createVideo')->name('create-video');
        Route::get('/galeri/edit-video/{id}', 'App\Http\Controllers\Backend\GalleryController@editVideo')->name('edit-video');
    });
    Route::resource('/galeri', BackendGalleryController::class);
    Route::resource('/blog', BackendBlogController::class);
    Route::resource('/pengaturan', SettingController::class);
    Route::get('/aktifitas', ActionController::class)->name('aktifitas');
});


require __DIR__.'/auth.php';
