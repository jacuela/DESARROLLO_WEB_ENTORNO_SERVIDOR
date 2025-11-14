<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;
use App\models\Tarea;

if (!empty($_POST['descripcion'])) {
    $desc = $_POST['descripcion'];

    $desc=depurarTexto($desc);
    
    $tarea = new Tarea(null, $desc);

    $bd = new Basedatos();
    $bd->crear_tarea($tarea);

}

header('Location: ../views/listado.php');
exit;
?>