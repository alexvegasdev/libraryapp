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


Route::get('/copies', [CopyController::class, 'index']);
Route::post('/copies', [CopyController::class, 'store']);
Route::get('/copies/{id}', [CopyController::class, 'show']);
Route::patch('/copies/{id}', [CopyController::class, 'update']);
Route::delete('/copies/{id}', [CopyController::class, 'destroy']);

Route::get('/books', [BookController::class, 'index']);

Route::post('/genres', [GenreController::class, 'store']);

Route::post('/roles', [RoleController::class, 'store']);

Route::get('/copystatuses', [CopyStatusController::class, 'index']);
Route::post('/copystatuses', [CopyStatusController::class, 'store']);

Route::get('/copies', [CopyController::class, 'index']);


Route::get('/records', [RecordController::class, 'index']);
Route::post('/records', [RecordController::class, 'store']);
Route::delete('/records/{id}', [RecordController::class, 'destroy']);

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