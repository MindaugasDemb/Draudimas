<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ShortCodeController;

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

Route::middleware(['auth'])->group(function ()
{
    Route::resource('cars', CarController::class)->only(['index']);
    Route::resource('cars', CarController::class)->middleware('admin')->except(['index']);
    //Route::resource('cars', CarController::class);
    Route::get('/owners/create', [OwnerController::class,'create'])->name('owners.create')->middleware('admin');;
    Route::post('/owners/store', [OwnerController::class, 'store'])->name('owners.store')->middleware('admin');

    Route::get('/owners/{id}/edit',[OwnerController::class,'edit'])->name('owners.edit')->middleware('admin');
    Route::post('/owners/{id}/save',[OwnerController::class,'save'])->name('owners.save')->middleware('admin');

    Route::get('/owners/{id}/delete', [OwnerController::class, 'delete'])->name('owners.delete')->middleware('admin');

    Route::get('/shortcodes', [ShortCodeController::class,'index'])->name('shortcodes.index');
    Route::get('/shortcodes/create', [ShortCodeController::class,'create'])->name('shortcodes.create')->middleware('admin');;
    Route::post('/shortcodes/store', [ShortCodeController::class, 'store'])->name('shortcodes.store')->middleware('admin');

    Route::get('/shortcodes/{id}/edit',[ShortCodeController::class,'edit'])->name('shortcodes.edit')->middleware('admin');
    Route::post('/shortcodes/{id}/save',[ShortCodeController::class,'save'])->name('shortcodes.save')->middleware('admin');

    Route::get('/shortcodes/{id}/delete', [ShortCodeController::class, 'delete'])->name('shortcodes.delete')->middleware('admin');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/owners', [OwnerController::class,'index'])->name('owners.index');

Route::get('setlanguage/{lang}', [\App\Http\Controllers\LangController::class,'setLanguage'])->name('setLanguage');
