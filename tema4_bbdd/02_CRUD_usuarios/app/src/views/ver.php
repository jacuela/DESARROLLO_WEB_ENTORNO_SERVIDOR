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
    <p>ID:<?= $registro->id?></p>
    <p>Nombre:<?= $registro->nombre?></p>
    <p>Apellidos:<?= $registro->apellidos?></p>
    <p>Usuario:<?= $registro->usuario?></p>
    <p>Fecha nacimiento:<?php 
                            $fechaDT = new DateTime($registro->fecha_nac);
                            echo $fechaDT->format('d/m/Y');
                        ?></p>
    


    
</body>
</html>