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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\User_infoController::class, 'index'])->name('profile');
Route::post('/up_profile', [App\Http\Controllers\User_infoController::class, 'store'])->name('up_profile');
Route::get('/add_produit', [App\Http\Controllers\ProduitsController::class, 'index'])->name('add_produit');
Route::post('/save_produit', [App\Http\Controllers\ProduitsController::class, 'store'])->name('save_produit');
Route::get('/delete{id}', [App\Http\Controllers\ProduitsController::class, 'destroy'])->name('delete{id}');
Route::get('/update{id}', [App\Http\Controllers\ProduitsController::class, 'show'])->name('update{id}');
Route::post('/save_update_produit{id}', [App\Http\Controllers\ProduitsController::class, 'update'])->name('save_update_produit{id}');

