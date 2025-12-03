<?php

require __DIR__ . "/vendor/autoload.php";
use App\models\Basedatos;

$basedatos = new Basedatos();

if ($basedatos->_getConexion()!=null){
    //ConexionOK
    header ('Location: ./src/views/login.php');
    die;
}
else{
    $mensaje = "ERROR en la conexión a al base de datos";
}


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor Incidencias</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body class="centrado">
    <h2><?= $mensaje ?></h2> 
    <div>
    <!-- boton para generar la bbdd -->
    </div> 
</body>
</html>
