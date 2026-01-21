<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//=======================================
Route::get('/saludo', function(){
    //return 'Hola!!!;
    $nombre = "Alicia Alondra";
    return view('saludo',['nombre'=>$nombre]);    
})->name('saludo');


Route::get('/hola', function () {
    return view('holamundo');
});



Route::get('/', function(){
    return view('home');
})->name('home');





Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/contacto', function(){
    return view('contacto');
})->name('contacto');

Route::get('/mas/curriculo', function(){
    return view('otro.curriculo');
})->name('curriculo');

Route::get('/listado', function(){

   
    $nombre_biblioteca = "FloriBIBLIO";

    $libros = [
            [
                'nombre' => 'Gabriel García Márquez',
                'titulo' => 'Cien años de soledad',
                'genero' => 'Realismo mágico'
            ],
            [
                'nombre' => 'George Orwell',
                'titulo' => '1984',
                'genero' => 'Distopía'
            ],
            [
                'nombre' => 'J.R.R. Tolkien',
                'titulo' => 'El Señor de los Anillos',
                'genero' => 'Fantasía'
            ]
    ];


    return view('libros.listado',["nombre_biblioteca" => $nombre_biblioteca,
                                  "libros" => $libros]);
})->name('listado');




