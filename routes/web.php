<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

Route::get('/', [TodosController::class, 'index'])->name('posts.index');
Route::get('/create', [TodosController::class, 'create'])->name('posts.create');
Route::post('/store', [TodosController::class, 'store'])->name('posts.store');
Route::get('/{todo}/edit', [TodosController::class, 'edit'])->name('posts.edit');
    Route::get('/update/{todo}', [TodosController::class, 'update'])->name('posts.update');

Route::delete('/delete/{todo}', [TodosController::class, 'destroy'])->name('posts.destroy');



