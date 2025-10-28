<?php

require_once "funciones.php";

$conexion = conectaDb();


$nombre    = "Pepito";     // Normalmente estos valores vendrán de un formulario
$apellidos = "Conejo";

$sql = "DELETE FROM personas 
            WHERE nombre = :nombre AND apellidos = :apellidos";

try{
    $resultado = $conexion->prepare($sql);
    $resultado -> bindParam(":nombre",$nombre);
    $resultado -> bindParam(":apellidos",$apellidos);
    $resultado->execute();
    echo "<p>Borrados {$resultado->rowCount()} registros</p>\n";

}
catch (PDOException $e){
    echo e->getMessage(); 
}

