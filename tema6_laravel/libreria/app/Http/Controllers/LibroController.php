<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libro;


class LibroController extends Controller
{
    //Listar todos los libros
    public function listar_libros(){
        $nombre_biblioteca = "FloriBIBLIO";

        $libros = Libro::all();
        return view('libros.listado',["nombre_biblioteca" => $nombre_biblioteca,
                                    "libros" => $libros]);

    }

    

}
