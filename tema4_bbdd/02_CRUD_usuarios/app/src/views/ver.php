<?php
session_start();

require_once "../models/basedatos.php";

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

//var_dump($registro);

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
    <p><b>ID:</b><?= $registro->id?></p>
    <p><b>Nombre:</b><?= $registro->nombre?></p>
    <p><b>Apellidos:</b><?= $registro->apellidos?></p>
    <p><b>Usuario:</b><?= $registro->usuario?></p>
    <p><b>Fecha nacimiento:</b><?php 
                            $fechaDT = new DateTime($registro->fecha_nac);
                            echo $fechaDT->format('d/m/Y');
                        ?></p>
    


    
</body>
</html>