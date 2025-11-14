<?php
require __DIR__ . '/../../vendor/autoload.php';
use App\models\Basedatos;
use App\models\Tarea;

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $estado = $_POST['estado'];
    
    
    $db = new Basedatos();
    
    //Le pido a la bbdd la tarea con dicho ID
    // $sql = "SELECT * FROM tareas WHERE id=$id";
    // $sentencia = $db->get_data($sql);

    // $registro = $sentencia->fetch(PDO::FETCH_OBJ);
    // $tarea = new Tarea($registro->id,$registro->descripcion,$registro->completada);
    
    $db->actualizar_tarea($id,$estado);

}

header('Location: ../../public/index.php');
exit;
?>