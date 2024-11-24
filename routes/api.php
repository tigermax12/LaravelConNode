<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeticioneController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
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
Route::controller(UserController::class)->group(function(){
    Route::post('register', 'register');
    Route::get('user/{user}', 'show');
});
Route::controller(PeticioneController::class)->group(function () {
    Route::get('peticiones', 'index');
    Route::get('mispeticiones', 'listmine');
    Route::get('peticiones/{id}', 'show');
    Route::delete('peticiones/{id}', 'delete');
    Route::put('peticiones/firmar/{id}', 'firmar');
    Route::put('peticiones/{id}', 'update');
    Route::put('peticiones/estado/{id}', 'cambiarEstado');
    Route::post('peticiones', 'store');
});
Route::controller(CategoriaController::class)->group(function () {
    Route::post('categorias', 'store');
});
