<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Autores;
use App\Http\Controllers\Capitulos;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\detalle_item;
use App\Http\Controllers\Items;
use App\Http\Controllers\reportes;
use App\Http\Controllers\Universidades;
use App\Http\Controllers\Usuarios;
use Illuminate\Support\Facades\Route;

//crear un usuario admin (una sola vez)
//Route::get('/crear-admin', [AuthController::class, 'crearAdmin']);
Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/logear',[AuthController::class,'logear'])->name('logear');

Route::middleware("auth")->group(function(){
    Route::get('/home',[Dashboard::class,'index'])->name('home');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});


Route::prefix('items')->middleware('auth')->group(function(){
    Route::get('/nuevo-item',[Items::class, 'index'])->name('items-nuevo');
});

Route::prefix('detalle')->middleware('auth')->group(function(){
    Route::get('/detalle-item',[detalle_item::class, 'index'])->name('detalle-item');
});

Route::prefix('categorias')->middleware('auth')->group(function(){
    Route::get('/',[Categorias::class, 'index'])->name('categorias');
    Route::get('/create',[Categorias::class, 'create'])->name('categorias.create');
    Route::post('/store', [Categorias::class, 'store'])->name('categorias.store');
    Route::get('/show/{id}', [Categorias::class, 'show'])->name('categorias.show');
    Route::delete('/destroy/{id}',[Categorias::class, 'destroy'])->name('categorias.destroy');
    Route::delete('/edit/{id}',[Categorias::class, 'edit'])->name('categorias.edit');
});

Route::prefix('autores')->middleware('auth')->group(function(){
    Route::get('/',[Autores::class, 'index'])->name('autores');
});

Route::prefix('universidades')->middleware('auth')->group(function(){
    Route::get('/',[Universidades::class, 'index'])->name('universidades');
});

Route::prefix('capitulos')->middleware('auth')->group(function(){
    Route::get('/',[Capitulos::class, 'index'])->name('capitulos');
});

Route::prefix('reportes')->middleware('auth')->group(function(){
    Route::get('/',[reportes::class, 'index'])->name('reportes');
});

Route::prefix('usuarios')->middleware('auth')->group(function(){
    Route::get('/',[Usuarios::class, 'index'])->name('usuarios');
});