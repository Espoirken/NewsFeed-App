<?php

use App\Http\Controllers\NewsController;
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

Auth::routes();

Route::get('', [NewsController::class, 'index'])->name('news');
Route::get('news/create', [NewsController::class, 'create'])->name('news.create')->middleware('role:admin');
Route::post('news/create', [NewsController::class, 'store'])->name('news.store')->middleware('role:admin');
Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
Route::post('news/edit/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/delete/{news}', [NewsController::class, 'destroy'])->name('news.delete')->middleware('role:admin');
