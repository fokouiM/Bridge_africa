<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    if(isset(Auth::user()->id)){
        if(Auth::user()->statut == 1){
            return view('voyants.Home');

        }elseif(Auth::user()->statut == 0){
            return view('welcome');

        }elseif(Auth::user()->statut == 2){
            return view('Admin.Home');
        }

    }else{

        return view('welcome');
    }
});

Route::get('/login', function () { return view('auth.login'); });
Route::get('/pack', function () { return view('pack'); });
Route::get('/add_users', function () { if(Auth::user()->statut == 2){ return view('from.add_users');} })->name('add_users');
Route::get('/voyants/login', function () { return view('auth.login'); })->name('voyants');
Route::get('/clients', function () { if(Auth::user()->statut == 2){ return view('admin/clients'); } })->name('client');
Route::get('/voyants', function () { if(Auth::user()->statut == 2){ return view('admin/voyants'); } })->name('voyants');

Auth::routes();


    Route::post('/message', [App\Http\Controllers\MessagesController::class, 'index'])->name('message');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\User_infoController::class, 'index'])->name('profile');
    Route::post('/up_profile{id}', [App\Http\Controllers\User_infoController::class, 'update'])->name('up_profile{id}');
    Route::post('/save_users', [App\Http\Controllers\User_infoController::class, 'store'])->name('save_users');
    Route::get('/add_produit', [App\Http\Controllers\ProduitsController::class, 'index'])->name('add_produit');
    Route::post('/save_produit', [App\Http\Controllers\ProduitsController::class, 'store'])->name('save_produit');
    Route::get('/delete{id}', [App\Http\Controllers\ProduitsController::class, 'destroy'])->name('delete{id}');
    Route::get('/update{id}', [App\Http\Controllers\ProduitsController::class, 'show'])->name('update{id}');



