<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibroController;

// Route::get('/', function () {
//     return view('welcome');
// });


//=======================================
Route::get('/saludo', function(){
    //return 'Hola!!!;
    $nombre = "Alicia Alondra";
    return view('saludo',['nombre'=>$nombre]);    
})->name('saludo');


// Route::get('/hola', function () {

//     $ciudad = "Murcia";

//     return view('holamundo',[
//         "nombre" => "Pepito",
//         "apellidos" => "Perez",
//         "localidad" => $ciudad
//     ]);
// });



Route::get('/', function(){
    return view('home');
})->name('home');


Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/contacto', function(){
    return view('contacto');
})->name('contacto');



//========= RUTAS DE LIBROS
Route::get('/libros', [LibroController::class, 'listar_libros'])->name('listado');
Route::get('/libros/{id}', [LibroController::class, 'mostrar_libro']); //-> where('id', '[0-9]+');







// Route::get('/mas/curriculo', function(){
//     return view('otro.curriculo');
// })->name('curriculo');


//Vista para pasar un valor por URL
//    /libro/X
// Route::get('/libro/{id?}', function($id = 1){
//     return view('libros.libro',[
//         "id" => $id
//     ]);
// })->name('libro');

// Route::get('/libro', function($id_defecto = 666666){
//     return view('libros.libro',[
//         "id" => request('id',$id_defecto)
//     ]);
// })->name('libro');


// Route::get('/listado', function(){
   
//     $nombre_biblioteca = "FloriBIBLIO";
//     $libros = [
//             [
//                 'nombre' => 'Gabriel García Márquez',
//                 'titulo' => 'Cien años de soledad',
//                 'genero' => 'Realismo mágico'
//             ],
//             [
//                 'nombre' => 'George Orwell',
//                 'titulo' => '1984',
//                 'genero' => 'Distopía'
//             ],
//             [
//                 'nombre' => 'J.R.R. Tolkien',
//                 'titulo' => 'El Señor de los Anillos',
//                 'genero' => 'Fantasía'
//             ]
//     ];

//     return view('libros.listado',["nombre_biblioteca" => $nombre_biblioteca,
//                                   "libros" => $libros]);
// })->name('listado');


