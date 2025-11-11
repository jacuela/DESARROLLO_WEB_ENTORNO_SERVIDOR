<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;
use App\models\Usuario;

if (!isset ($_SESSION["conectado"]) || !$_SESSION["conectado"]){
    header ("Location: ../../public/index.php");
die;
}

$id = $_GET["id"];


$dbInstancia = Basedatos::getInstance(); //por singleton
$sql = "SELECT * FROM usuarios WHERE id = :id ";

$parametros = [":id" => $id];  //parametros para el binding de la preparacion
$sentencia = $dbInstancia->get_data($sql, $parametros);

$registro = $sentencia -> fetch (PDO::FETCH_OBJ);

$usuario = new Usuario( 
        $registro->id,
        $registro->nombre,
        $registro->apellidos,
        $registro->usuario,
        $registro->password,
        new DateTime($registro->fecha_nac)
    );



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'menu.php';?>
    <h2>Detalles del usuario</h2>
    <p><b>ID:</b><?= $usuario->id?></p>
    <p><b>Nombre:</b><?= $usuario->nombre?></p>
    <p><b>Apellidos:</b><?= $usuario->apellidos?></p>
    <p><b>Usuario:</b><?= $usuario->usuario?></p>
    <p><b>Fecha nacimiento:</b><?= $usuario->fecha_nac->format('d/m/Y') ?></p>
    <p><b>Edad:</b><?= $usuario->getEdad() ?></p>
    
    
</body>
</html>