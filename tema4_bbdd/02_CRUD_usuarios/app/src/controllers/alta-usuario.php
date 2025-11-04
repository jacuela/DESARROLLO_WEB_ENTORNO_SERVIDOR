<?php

session_start();
require_once "../models/basedatos.php";
require_once "../models/usuario.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
else
{
    
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $usuario = $_POST["usuario"];
    $passwordClaro = $_POST["password"];
    $passwordCifrado = password_hash($passwordClaro, PASSWORD_DEFAULT);
    $fecha_nac = $_POST["fecha_nac"];
    
    
    $usuario = new Usuario (
        null,
        $nombre,
        $apellidos,
        $usuario,
        $passwordCifrado,
        new DateTime($fecha_nac));
    

        
}
        

