<?php

session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;
use App\models\Usuario;

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
    
    $dbInstancia = Basedatos::getInstance(); //por singleton    
    
    $dbInstancia->crear_usuario($usuario);

    header ("Location: ../views/listado.php");
    die;    
}
        

