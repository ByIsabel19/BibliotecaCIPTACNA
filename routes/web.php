<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Autores;
use App\Http\Controllers\Capitulos;
use App\Http\Controllers\Carreras;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\detalle_item;
use App\Http\Controllers\Items;
use App\Http\Controllers\reportes;
use App\Http\Controllers\Universidades;
use App\Http\Controllers\Usuarios;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::middleware("auth")->group(function () {
    Route::get('/home', [Dashboard::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ITEMS
|--------------------------------------------------------------------------
*/

Route::prefix('items')->middleware('auth')->group(function () {
    Route::get('/', [Items::class, 'index'])->name('items');
    Route::get('/create', [Items::class, 'create'])->name('items.create');
    Route::post('/store', [Items::class, 'store'])->name('items.store');
    Route::get('/edit/{id}', [Items::class, 'edit'])->name('items.edit');
    Route::put('/update/{id}', [Items::class, 'update'])->name('items.update');
    Route::get('/show/{id}', [Items::class, 'show'])->name('items.show');
    Route::delete('/destroy/{id}', [Items::class, 'destroy'])->name('items.destroy');
});

/*
|--------------------------------------------------------------------------
| CATEGORIAS
|--------------------------------------------------------------------------
*/

Route::prefix('categorias')->middleware('auth')->group(function () {
    Route::get('/', [Categorias::class, 'index'])->name('categorias');
    Route::get('/create', [Categorias::class, 'create'])->name('categorias.create');
    Route::post('/store', [Categorias::class, 'store'])->name('categorias.store');
    Route::get('/show/{id}', [Categorias::class, 'show'])->name('categorias.show');
    Route::delete('/destroy/{id}', [Categorias::class, 'destroy'])->name('categorias.destroy');
    Route::get('/edit/{id}', [Categorias::class, 'edit'])->name('categorias.edit');
    Route::put('/update/{id}', [Categorias::class, 'update'])->name('categorias.update');
});

/*
|--------------------------------------------------------------------------
| AUTORES
|--------------------------------------------------------------------------
*/

Route::prefix('autores')->middleware('auth')->group(function () {
    Route::get('/', [Autores::class, 'index'])->name('autores');
    Route::get('/create', [Autores::class, 'create'])->name('autores.create');
    Route::post('/store', [Autores::class, 'store'])->name('autores.store');
    Route::get('/show/{id}', [Autores::class, 'show'])->name('autores.show');
    Route::delete('/destroy/{id}', [Autores::class, 'destroy'])->name('autores.destroy');
    Route::get('/edit/{id}', [Autores::class, 'edit'])->name('autores.edit');
    Route::put('/update/{id}', [Autores::class, 'update'])->name('autores.update');
});

/*
|--------------------------------------------------------------------------
| UNIVERSIDADES
|--------------------------------------------------------------------------
*/

Route::prefix('universidades')->middleware('auth')->group(function () {
    Route::get('/', [Universidades::class, 'index'])->name('universidades');
    Route::get('/create', [Universidades::class, 'create'])->name('universidades.create');
    Route::post('/store', [Universidades::class, 'store'])->name('universidades.store');
    Route::get('/show/{id}', [Universidades::class, 'show'])->name('universidades.show');
    Route::delete('/destroy/{id}', [Universidades::class, 'destroy'])->name('universidades.destroy');
    Route::get('/edit/{id}', [Universidades::class, 'edit'])->name('universidades.edit');
    Route::put('/update/{id}', [Universidades::class, 'update'])->name('universidades.update');
});

/*
|--------------------------------------------------------------------------
| CAPITULOS
|--------------------------------------------------------------------------
*/

Route::prefix('capitulos')->middleware('auth')->group(function () {
    Route::get('/', [Capitulos::class, 'index'])->name('capitulos');
    Route::get('/create', [Capitulos::class, 'create'])->name('capitulos.create');
    Route::post('/store', [Capitulos::class, 'store'])->name('capitulos.store');
    Route::get('/show/{id}', [Capitulos::class, 'show'])->name('capitulos.show');
    Route::delete('/destroy/{id}', [Capitulos::class, 'destroy'])->name('capitulos.destroy');
    Route::get('/edit/{id}', [Capitulos::class, 'edit'])->name('capitulos.edit');
    Route::put('/update/{id}', [Capitulos::class, 'update'])->name('capitulos.update');
});

/*
|--------------------------------------------------------------------------
| CARRERAS (CORREGIDO)
|--------------------------------------------------------------------------
*/

Route::prefix('carreras')->middleware('auth')->group(function () {
    Route::get('/', [Carreras::class, 'index'])->name('carreras.index');
    Route::get('/create', [Carreras::class, 'create'])->name('carreras.create');
    Route::post('/store', [Carreras::class, 'store'])->name('carreras.store');
    Route::get('/show/{id}', [Carreras::class, 'show'])->name('carreras.show');
    Route::delete('/destroy/{id}', [Carreras::class, 'destroy'])->name('carreras.destroy');
    Route::get('/edit/{id}', [Carreras::class, 'edit'])->name('carreras.edit');
    Route::put('/update/{id}', [Carreras::class, 'update'])->name('carreras.update');
});

/*
|--------------------------------------------------------------------------
| USUARIOS
|--------------------------------------------------------------------------
*/

Route::prefix('usuarios')->middleware('auth')->group(function () {
    Route::get('/', [Usuarios::class, 'index'])->name('usuarios');
    Route::get('/create', [Usuarios::class, 'create'])->name('usuarios.create');
    Route::post('/store', [Usuarios::class, 'store'])->name('usuarios.store');
    Route::get('/edit/{id}', [Usuarios::class, 'edit'])->name('usuarios.edit');
    Route::put('/update/{id}', [Usuarios::class, 'update'])->name('usuarios.update');
    Route::get('/tbody', [Usuarios::class, 'tbody'])->name('usuarios.tbody');
    Route::get('/cambiar-estado/{id}/{estado}', [Usuarios::class, 'estado'])->name('usuarios.estado');
});

/*
|--------------------------------------------------------------------------
| DETALLE ITEMS
|--------------------------------------------------------------------------
*/

Route::prefix('detalle')->middleware('auth')->group(function () {
    Route::get('/detalle-item', [detalle_item::class, 'index'])->name('detalle-item');
});

/*
|--------------------------------------------------------------------------
| REPORTES
|--------------------------------------------------------------------------
*/

Route::prefix('reportes')->middleware('auth')->group(function () {
    Route::get('/', [reportes::class, 'index'])->name('reportes');
});
