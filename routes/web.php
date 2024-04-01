<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CopyController;
use App\Http\Controllers\Api\CopyStatusController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\RecordController;
use App\Http\Controllers\Api\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::controller(CopyController::class)->group(function () {
//     Route::get('/copies', 'index')->name('copies.index');
//     Route::post('/copies', 'store')->name('copies.store');
//     Route::get('/copies/{id}', 'show')->name('copies.show');
//     Route::patch('/copies/{id}', 'update')->name('copies.update');
//     Route::delete('/copies/{id}', 'destroy')->name('copies.destroy');
// });

// Route::controller(AuthorController::class)->group(function () {
//     Route::get('/authors', 'index')->name('authors.index');
//     Route::post('/authors', 'store')->name('authors.store');
//     Route::get('/authors/{id}', 'show')->name('authors.show');
//     Route::patch('/authors/{id}', 'update')->name('authors.update');
//     Route::delete('/authors/{id}', 'destroy')->name('authors.destroy');
// });


// Route::controller(BookController::class)->group(function () {
//     Route::get('/books', 'index')->name('books.index');
//     Route::post('/books', 'store')->name('books.store');
//     Route::get('/books/{id}', 'show')->name('books.show');
//     Route::patch('/books/{id}', 'update')->name('books.update');
//     Route::delete('/books/{id}', 'destroy')->name('books.destroy');
// });

// Route::controller(GenreController::class)->group(function () {
//     Route::get('/genres', 'index')->name('genres.index');
//     Route::post('/genres', 'store')->name('genres.store');
//     Route::get('/genres/{id}', 'show')->name('genres.show');
// });

// Route::controller(RoleController::class)->group(function () {
//     Route::get('/roles', 'index')->name('roles.index');
//     Route::post('/roles', 'store')->name('roles.store');
//     Route::get('/roles/{id}', 'show')->name('roles.show');
//     Route::patch('/roles/{id}', 'update')->name('roles.update');
//     Route::delete('/roles/{id}', 'destroy')->name('roles.destroy');
// });

// Route::controller(CopyStatusController::class)->group(function () {
//     Route::get('/copystatuses', 'index')->name('copystatuses.index');
//     Route::post('/copystatuses', 'store')->name('copystatuses.store');
//     Route::get('/copystatuses/{id}', 'show')->name('copystatuses.show');
//     Route::patch('/copystatuses/{id}', 'update')->name('copystatuses.update');
//     Route::delete('/copystatuses/{id}', 'destroy')->name('copystatuses.destroy');
// });


// Route::controller(RecordController::class)->group(function () {
//     Route::get('/records', 'index')->name('records.index');
//     Route::post('/records', 'store')->name('records.store');
//     Route::get('/records/{id}', 'show')->name('records.show');
//     Route::patch('/records/{id}', 'update')->name('records.update');
//     Route::delete('/records/{id}', 'destroy')->name('records.destroy');
// });



// Route::get('/authors', [AuthorController::class, 'index']);
// Route::post('/authors/create', [AuthorController::class, 'createAuthor']);
// Route::put('/authors/update/{id}', [AuthorController::class, 'updateAuthor']);


// Route::get('/authors', function () {
//     return Author::all();
// });

// Route::get('/authors/{id}', function ($id) {
//     return Author::find($id);
// });

// Route::patch('/authors', function(){
//     return Author::where('name','Gabriel García Márquez')->update(['name'=> 'Leo Tolstoy']);
// });

// Route::post('/authors', function(){
//     return Author::create([
//         'name'=> 'Jane Austen'
//     ]);
// });

// Route::get('/authors', function(){
//     return Author::where('name','Leo Tolstoy')->get();
// });

// Route::get('/authors', function(){
//     return Author::whereIn('id',[2,4])->get();
// });

// Route::get('/authors', function(){
//     return Author::whereNotIn('id',[2,4])->get();
// });
