<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarAPIController;
use App\Http\Controllers\OwnerAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/cars", [CarAPIController::class, 'cars']);
Route::get("/cars/{id}", [CarAPIController::class, 'car']);

Route::post("/cars", [CarAPIController::class, 'store']);
Route::put("/cars/{id}", [CarAPIController::class, 'update']);
Route::delete("/cars/{id}/delete", [CarAPIController::class, 'destroy']);

Route::get("/owners", [OwnerAPIController::class, 'owners']);
Route::get("/owners/{id}", [OwnerAPIController::class, 'owner']);

Route::post("/owners", [OwnerAPIController::class, 'store']);
Route::put("/owners/{id}", [OwnerAPIController::class, 'update']);
Route::delete("/owners/{id}/delete", [OwnerAPIController::class, 'destroy']);
/*Route::post("/car/{id}/store", function (Request $request)
{
   $car=new \App\Models\Car();
   $car->nane=$request->name;
   $car->surnane=$request->surname;
   $car->save();
   return $car;

});

Route::put("car/{id}/edit", function (Request $request, $id)
{
    $car=\App\Models\Car::find($id);
    $car->nane=$request->name;
    $car->surnane=$request->surname;
    $car->save();
    return $car;
});

Route::delete("car/{id}", function (Request $request, $id)
{
    $car=\App\Models\Car::find($id);
    $car->destroy();
    return true;
});*/

