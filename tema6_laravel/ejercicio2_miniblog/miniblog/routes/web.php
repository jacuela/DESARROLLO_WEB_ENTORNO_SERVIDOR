<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

//Ruta para ver el listado
Route::get('/', [ArticuloController::class, 'listar'])->name('listar');

//Ruta para ver el formulario de alta de artículos
Route::get('/alta', [ArticuloController::class, 'alta'])->name('alta');

//Ruta post para meter en la bbdd el articulo
Route::post('/articulo', [ArticuloController::class, 'store'])->name('store');

//Ruta detalle para ver un artículo
Route::get('/articulo/{id}', [ArticuloController::class, 'ver'])->name('ver'); //-> where('id', '[0-9]+');



