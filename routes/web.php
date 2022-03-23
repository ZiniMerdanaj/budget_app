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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'category_form']);
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'add']);
// Route::delete('/category/{category}', [App\Http\Controllers\CategoryController::class, 'delete']);

Route::post('/add-money', [App\Http\Controllers\CategoryController::class, 'add_money']);
Route::post('/remove-money', [App\Http\Controllers\CategoryController::class, 'remove_money']);

Route::get('/percentages', [App\Http\Controllers\CategoryController::class, 'percentage_edit']);
Route::post('/percentage-edit', [App\Http\Controllers\CategoryController::class, 'percentage_save']);