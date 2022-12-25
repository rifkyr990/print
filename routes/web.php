<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('download/{id}', [App\Http\Controllers\OrderController::class, 'download'])->name('download');

Route::get('create', [App\Http\Controllers\OrderController::class, 'create'])->name('create');
Route::get('show/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('show');
Route::get('edit/{order}', [App\Http\Controllers\OrderController::class, 'edit'])->name('edit');
Route::put('edit/{order}', [App\Http\Controllers\OrderController::class, 'update'])->name('update');
Route::delete('/{order}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('destroy');

Route::get('create', [App\Http\Controllers\JenisController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\OrderController::class, 'store'])->name('store');