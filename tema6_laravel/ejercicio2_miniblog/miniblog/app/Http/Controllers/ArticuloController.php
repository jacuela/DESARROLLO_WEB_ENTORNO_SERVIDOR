<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    //
    public function listar(){

        $articulos = Articulo::all();

        return view('articulos.listado',
                ["articulos" => $articulos]);
    }

    public function alta(){
        return view('articulos.alta');

    }

    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string'
        ]);



        Articulo::create($request->all());

        return redirect()->route('listar')
                         ->with('success', 'Articulo creado correctamente');

    }

    public function ver(int $id){
        $articulo = Articulo::findOrFail($id); //si no existe, lanza 404    

        return view('articulos.ver',['articulo'=>$articulo]);

    }
    
    public function borrar (int $id){
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();

        return redirect()->route('listar')
                     ->with('exito', 'Artículo eliminado correctamente');


    }


}


