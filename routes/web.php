<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('list');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('add1');
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('add2');
    Route::get('detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('detail');
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('delete');
    Route::get('search', [App\Http\Controllers\ItemController::class, 'search'])->name('search');
});

Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
