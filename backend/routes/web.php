<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/','TodosController@index');
use App\Http\Controllers\TodosController;
Route::get('/', [TodosController::class, 'index'])->name('Todos');
// Route::resource('todos','TodosController');
Route::resource('todoos', TodosController::class);

Route::get('/test', function() {
    return view('test');
});
