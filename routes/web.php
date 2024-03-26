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

Route::get('/home', [App\Http\Controllers\RecipeController::class, 'index'])->name('home');
Route::get('/carts/create/{id}', [App\Http\Controllers\CartController::class, 'create'])->name('carts.createid');
Route::resource('/recipes', App\Http\Controllers\RecipeController::class);
Route::resource('/carts', App\Http\Controllers\CartController::class);
