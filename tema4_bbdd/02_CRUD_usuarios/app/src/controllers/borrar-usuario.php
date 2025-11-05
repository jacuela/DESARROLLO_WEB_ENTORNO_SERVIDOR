<?php

session_start();
require_once __DIR__ . "/../models/basedatos.php";
//require_once __DIR__ . "/../models/usuario.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
else
{

    $id = $_POST["id"];
    $dbInstancia = Basedatos::getInstance(); //por singleton    
    
    $dbInstancia->borrar_usuario($id);
    header ("Location: ../views/listado.php");
    die;    

}