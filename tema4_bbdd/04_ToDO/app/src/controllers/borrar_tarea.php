<?php
require __DIR__ . '/../../vendor/autoload.php';
use App\models\Basedatos;

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = new Basedatos();
    $db->borrar_tarea($id);
}

header('Location: ../../public/index.php');
exit;
?>
