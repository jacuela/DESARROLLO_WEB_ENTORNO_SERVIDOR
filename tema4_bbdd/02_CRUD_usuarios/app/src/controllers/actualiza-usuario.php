<?php

session_start();
require_once __DIR__ . "/../models/basedatos.php";
//require_once __DIR__ . "/../models/usuario.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
else
{

    //print("<pre>");print_r($_POST);
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $usuario = $_POST["usuario"];
    $passwordClaro = $_POST["password"] ?? "";
    if (!empty($passwordClaro)){
        $passwordCifrado = password_hash($passwordClaro, PASSWORD_DEFAULT);
    }else{
        $passwordCifrado = null;
    }
    $fecha_nac = $_POST["fecha_nac"];
    

    $usuario = new Usuario (
        $id,
        $nombre,
        $apellidos,
        $usuario,
        $passwordCifrado,
        new DateTime($fecha_nac));
    
    $dbInstancia = Basedatos::getInstance(); //por singleton    
    $dbInstancia->actualizar_usuario($usuario);

    header ("Location: ../views/listado.php");
    die;    

    

}