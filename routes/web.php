<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeticioneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::get('/', [PagesController::class, 'home']);
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/users/firmas', [UserController::class, 'peticionesFirmadas'])->middleware('auth');
Route::controller(PeticioneController::class)->group(function () {
    Route::get('peticiones/index', 'index')->name('peticiones.index');
    Route::get('mispeticiones', 'listMine')->name('peticiones.mine');
    Route::get('peticionesfirmadas', 'peticionesFirmadas')->name('peticiones.peticionesfirmadas');
    Route::get('peticiones/{id}', 'show')->name('peticiones.show');
    Route::get('peticion/add', 'create')->name('peticiones.create');
    Route::post('peticion', 'store')->name('peticiones.store');
    Route::delete('peticiones/{id}', 'delete')->name('peticiones.delete');
    Route::put('peticiones/{id}', 'update')->name('peticiones.update');
    Route::post('peticiones/firmar/{id}', 'firmar')->name('peticiones.firmar');
    Route::get('peticiones/edit/{id}', 'edit')->name('peticiones.edit');
});
Route::middleware('admin')->controller(\App\Http\Controllers\Admin\AdminPeticionesController::class)->group(function () {
    Route::get('admin', 'index')->name('admin.home');
Route::get('admin/peticiones/index', 'index')->name('adminpeticiones.index');
Route::get('admin/peticiones/{id}', 'show')->name('adminpeticiones.show');
Route::get('admin/peticion/add', 'create')->name('adminpeticiones.create');
Route::get('admin/peticiones/edit/{id}', 'edit')->name('adminpeticiones.edit');
Route::post('admin/peticiones', 'store')->name('adminpeticiones.store');
Route::delete('admin/peticiones/{id}', 'delete')->name('adminpeticiones.delete');
Route::put('admin/peticiones/{id}', 'update')->name('adminpeticiones.update');
Route::put('admin/peticiones/estado/{id}', 'cambiarEstado')->name('adminpeticiones.estado');
});
Route::middleware('admin')->controller(\App\Http\Controllers\Admin\AdminUsersController::class)->group(function () {
    Route::get('admin/users/index', 'index')->name('adminusers.index');
    Route::delete('admin/users/{id}', 'delete')->name('adminusers.delete');
    Route::get('admin/users/add', 'create')->name('adminusers.create');
    Route::post('admin/users', 'register')->name('adminusers.register');
});
Route::middleware('admin')->controller(\App\Http\Controllers\Admin\AdminCategoriasController::class)->group(function () {
    Route::get('admin/categorias/index', 'index')->name('admincategorias.index');
    Route::delete('admin/categorias/{id}', 'delete')->name('admincategorias.delete');
    Route::get('admin/categorias/add', 'create')->name('admincategorias.create');
    Route::post('admin/categorias', 'store')->name('admincategorias.store');
});

require __DIR__.'/auth.php';
