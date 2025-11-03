<?php 
session_start();

require_once __DIR__ . "/../src/models/basedatos.php";

//Nos conectamos a la base de datos
$dbInstancia = Basedatos::getInstance(); //singleton

if ($dbInstancia->getConnection()!=null){
    //Hemos conectado bien. 
    $_SESSION["conectado"]=true;
    header ("Location: ../src/views/listado.php");
}else{
    echo "ERROR en la conexion a la base de datos.";
    die;
}

?>

