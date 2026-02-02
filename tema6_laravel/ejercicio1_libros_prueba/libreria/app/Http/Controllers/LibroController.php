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

    //Mostrar el formulario de alta
    public function alta_libro()
    {
        return view('libros.alta');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string',
            'anio'   => 'required|integer|min:1500|max:' . date('Y'),
            'sinopsis' => 'nullable|string',
        ]);

        Libro::create($request->all());

        return redirect()->route('listado')
                         ->with('success', 'Libro creado correctamente');
    }




    

}
