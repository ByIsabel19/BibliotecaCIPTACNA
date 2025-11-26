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

Route::get('/crear-admin', [AuthController::class, 'crearAdmin']);

Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/logear',[AuthController::class,'logear'])->name('logear');


Route::get('/home',[Dashboard::class,'index'])->name('home');

Route::prefix('items')->group(function(){
    Route::get('/nuevo-item',[Items::class, 'index'])->name('items-nuevo');
});

Route::prefix('detalle')->group(function(){
    Route::get('/detalle-item',[detalle_item::class, 'index'])->name('detalle-item');
});

Route::prefix('categorias')->group(function(){
    Route::get('/',[Categorias::class, 'index'])->name('categorias');
});

Route::prefix('autores')->group(function(){
    Route::get('/',[Autores::class, 'index'])->name('autores');
});

Route::prefix('universidades')->group(function(){
    Route::get('/',[Universidades::class, 'index'])->name('universidades');
});

Route::prefix('capitulos')->group(function(){
    Route::get('/',[Capitulos::class, 'index'])->name('capitulos');
});

Route::prefix('reportes')->group(function(){
    Route::get('/',[reportes::class, 'index'])->name('reportes');
});

Route::prefix('usuarios')->group(function(){
    Route::get('/',[Usuarios::class, 'index'])->name('usuarios');
});