<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DraudimasController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/draudimas/create', [DraudimasController::class,'create'])->name('draudimas.create');
Route::post('/draudimas/store', [DraudimasController::class, 'store'])->name('draudimas.store');

Route::get('/draudimas', [DraudimasController::class,'index'])->name('draudimas.index');

Route::get('/draudimas/{id}/edit',[DraudimasController::class,'edit'])->name('draudimas.edit');
Route::post('/draudimas/{id}/save',[DraudimasController::class,'save'])->name('draudimas.save');

Route::get('/draudimas/{id}/delete', [DraudimasController::class, 'delete'])->name('draudimas.delete');
