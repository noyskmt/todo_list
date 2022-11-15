<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;


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


// Route::resource('todos', TodosController::class);

Route::get('/todos', [TodosController::class, 'index']);
Route::get('/todos/store', [TodosController::class, 'store'])->name('todos.store');
Route::get('/todos/edit', [TodosController::class, 'edit'])->name('todos.edit');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::post('sample', 'FormController@postValidates');

require __DIR__.'/auth.php';
