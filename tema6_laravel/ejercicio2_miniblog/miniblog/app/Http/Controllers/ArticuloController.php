<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    //
    function listar(){

        $articulos = Articulo::all();

        return view('articulos.listado',
                ["articulos" => $articulos]);

    }
}
