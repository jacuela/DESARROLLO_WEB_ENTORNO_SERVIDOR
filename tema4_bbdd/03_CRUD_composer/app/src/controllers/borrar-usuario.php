<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
else
{

    $id = $_POST["id"];
    $dbInstancia = Basedatos::getInstance(); //por singleton    
    
    $dbInstancia->borrar_usuario($id);
    header ("Location: ../views/listado.php");
    die;    

}