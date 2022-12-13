<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

// Route::resource('todos', TodosController::class);

// Route::get('/アクセスしたいURL', [コントローラー名::class, '関数名(ファンクション名)'])->name('index.blade内のroute名');
Route::middleware('auth')->get('/', [TodosController::class, 'index'])->name('todos.index');
Route::middleware('auth')->prefix('todos')->group(function (){
    Route::post('store', [TodosController::class, 'store'])->name('todos.store');
    Route::get('edit/{id}', [TodosController::class, 'edit'])->name('todos.edit');
    Route::post('destroy/{id}', [TodosController::class, 'destroy'])->name('todos.destroy');
    Route::post('update/{id}', [TodosController::class, 'update'])->name('todos.update');

    // TODO:　削除と更新のroutingを追加する
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
