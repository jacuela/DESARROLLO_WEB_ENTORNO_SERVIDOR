<?php 
session_start();
require __DIR__ . '/../vendor/autoload.php';

use App\models\Basedatos;

//Nos conectamos a la base de datos
$db = new Basedatos();

if ($db->estaConectado()){
    //Conexion OK
    $_SESSION["conectado"]=true;
    header('Location: ../src/views/listado.php');
    die;
}
else{
    $mensaje = "ERROR en la conexion a la base de datos";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ToDO</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?= $mensaje ?> 
</body>
</html>
