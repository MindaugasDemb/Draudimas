<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;

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


Route::get('/owners/create', [OwnerController::class,'create'])->name('owners.create');
Route::post('/owners/store', [OwnerController::class, 'store'])->name('owners.store');

Route::get('/owners', [OwnerController::class,'index'])->name('owners.index');

Route::get('/owners/{id}/edit',[OwnerController::class,'edit'])->name('owners.edit');
Route::post('/owners/{id}/save',[OwnerController::class,'save'])->name('owners.save');

Route::get('/owners/{id}/delete', [OwnerController::class, 'delete'])->name('owners.delete');


Route::resource('cars', CarController::class);
