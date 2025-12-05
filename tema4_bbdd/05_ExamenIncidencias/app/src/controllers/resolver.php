<?php 
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;

if ($_SERVER["REQUEST_METHOD"]!="POST"){
    die;
}

$id = $_POST["id"];
$resolucion = $_POST["resolucion"];
$boton = $_POST["boton"];

if ($boton === "volver"){
    header ("Location: ./../views/listado.php");
    die;
}



if ($resolucion === "sin resolver"){
    $_SESSION["error-resolucion"]="Debes indicar una resolucion";
    header ("Location: ./../views/ver.php?id=$id");
    die;
}



if ($boton !== "volver"){
    $db = new Basedatos();
    if ($db->resolver_incidencia($id, $resolucion)){
         enviar_log("Incidencia con id=$id resuelta","info");
    }
   
}

header ("Location: ./../views/listado.php");
die;










