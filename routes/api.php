<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookPhotoController;
use App\Http\Controllers\Api\CopyController;
use App\Http\Controllers\Api\CopyStatusController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\RecordController;
use App\Models\CopyStatus;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'auth:sanctum'
], static function () {
    Route::apiResource('books', BookController::class);
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('records', RecordController::class);
    Route::apiResource('copies', CopyController::class);
    Route::apiResource('genres', GenreController::class);
    Route::apiResource('copystatuses', CopyStatusController::class);
});


Route::group([
    'controller' => BookPhotoController::class,
    'as' => 'books.photo.',
], static function () {
    Route::post('book/photo/file', 'storeFile')->name('file.store');
    Route::post('book/photo/base64', 'storeBase64')->name('base64.store');
});


