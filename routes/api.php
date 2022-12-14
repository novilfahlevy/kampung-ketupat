<?php

use App\Http\Controllers\Backend\ImageUploadController;
use App\Http\Controllers\Frontend\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/ulasan', ReviewController::class)->name('send-review');
Route::post('/image-upload', ImageUploadController::class)->name('image-upload');