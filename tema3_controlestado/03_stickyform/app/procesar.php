<?php

session_start();
require_once 'includes/funciones.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") { 
    header ("Location: index.php");
    die;
    
}else{
    //Venios del form
    $nombre = recoge("nombre");
    $edad = recoge("edad");

    $OK = true;

    //Tratar el nombre
    if (is_null($nombre)){
        $OK = false;
        $_SESSION["error"]["nombre"] = "Falta el nombre";
    }
    else{
         $_SESSION["nombre"] = $nombre;
    }

    //Tratamos la edad
    if (is_null($edad)) {
        $_SESSION["error"]["edad"] = "Falta la edad";
        $OK = false;
    } elseif (!is_numeric($edad)) {
        $_SESSION["error"]["edad"] = "Edad debe ser un numero";
        $OK = false;
    }else if ($edad<0){
        $_SESSION["error"]["edad"] = "Edad no puede ser negativa";
        $OK = false;
    }    
    else {
        $_SESSION["edad"] = $edad;
    }

    if ($OK){
        header("Location: mostrardatos.php");
        die;
    }
    else{
        header("Location: index.php");
        die;
    }
}






