<?php
//######## FUNCION RECOGER
//Recoge los datos de los formularios y los depura para no meter código malicioso
//Esta finción no comprueba errores.
//ENTRADA: el nombre del campo a recoger, indicado por el atributo 'name' del formulario
//SALIDA: el valor del campo o null si está vacio
function recoge($var)
{
    if (isset($_REQUEST[$var])) {
        if ($_REQUEST[$var] != "") {
            $tmp = trim(htmlspecialchars(strip_tags($_REQUEST[$var])));
            return $tmp;
        }
    }
    return null;
}


function obtenerLibros(){
    
    $lista_libros = [];
    $file = 'bbdd/data.json';    //la carpeta bbdd debe existir

    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_libros = json_decode($jsonData);

    return $lista_libros;
    
}

function guardar($libro){

    $lista_libros = obtenerLibros();
    array_push($lista_libros,$libro);

    $file = 'bbdd/data.json';    //la carpeta bbdd debe existir
    $jsonData = json_encode($lista_libros, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents($file, $jsonData);
    
}

function existeLibro($titulo){
    $lista_libros = obtenerLibros();
    foreach ($lista_libros as $libro){
        if ($libro->titulo == $titulo){
            return true;
        }
    }
    return false;
}