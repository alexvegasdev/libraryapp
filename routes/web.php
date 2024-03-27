<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\CopyStatusController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RoleController;
use App\Models\Genre;
use App\Models\Record;

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


Route::controller(CopyController::class)->group(function () {
    Route::get('/copies', 'index')->name('copies.index');
    Route::post('/copies', 'store')->name('copies.store');
    Route::get('/copies/{id}', 'show')->name('copies.show');
    Route::patch('/copies/{id}', 'update')->name('copies.update');
    Route::delete('/copies/{id}', 'destroy')->name('copies.destroy');
});


Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('books.index');
    Route::post('/books', 'store')->name('books.store');
    Route::get('/books/{id}', 'show')->name('books.show');
    Route::patch('/books/{id}', 'update')->name('books.update');
    Route::delete('/books/{id}', 'destroy')->name('books.destroy');
});

Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', 'index')->name('genres.index');
    Route::post('/genres', 'store')->name('genres.store');
    Route::get('/genres/{id}', 'show')->name('genres.show');
    Route::patch('/genres/{id}', 'update')->name('genres.update');
    Route::delete('/genres/{id}', 'destroy')->name('genres.destroy');
});

Route::controller(RoleController::class)->group(function () {
    Route::get('/roles', 'index')->name('roles.index');
    Route::post('/roles', 'store')->name('roles.store');
    Route::get('/roles/{id}', 'show')->name('roles.show');
    Route::patch('/roles/{id}', 'update')->name('roles.update');
    Route::delete('/roles/{id}', 'destroy')->name('roles.destroy');
});

Route::controller(CopyStatusController::class)->group(function () {
    Route::get('/copystatuses', 'index')->name('copystatuses.index');
    Route::post('/copystatuses', 'store')->name('copystatuses.store');
    Route::get('/copystatuses/{id}', 'show')->name('copystatuses.show');
    Route::patch('/copystatuses/{id}', 'update')->name('copystatuses.update');
    Route::delete('/copystatuses/{id}', 'destroy')->name('copystatuses.destroy');
});


Route::controller(CopyStatusController::class)->group(function () {
    Route::get('/records', 'index')->name('records.index');
    Route::post('/records', 'store')->name('records.store');
    Route::get('/records/{id}', 'show')->name('records.show');
    Route::patch('/records/{id}', 'update')->name('records.update');
    Route::delete('/records/{id}', 'destroy')->name('records.destroy');
});


Route::post('/records/asociate', [RecordController::class, 'asociate']);






















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



/**csrf */


























// Route::get('/employees', [EmployeeController::class, 'index']);
// Route::get('/employees/where', [EmployeeController::class, 'whereExample']);
// Route::get('/employees/find/{id}', [EmployeeController::class, 'findExample']);
// Route::get('/employees/first', [EmployeeController::class, 'firstExample']);
// Route::post('/employees/create', [EmployeeController::class, 'createExample']);
// Route::put('/employees/update/{id}', [EmployeeController::class, 'updateExample']);

// Route::get('/books', [BookController::class, 'index']);
// Route::get('/books/where', [BookController::class, 'whereExample']);
// Route::get('/books/find/{id}', [BookController::class, 'findExample']);
// Route::get('/books/first', [BookController::class, 'firstExample']);
// Route::post('/books/create', [BookController::class, 'createExample']);
// Route::put('/books/update/{id}', [BookController::class, 'updateExample']);