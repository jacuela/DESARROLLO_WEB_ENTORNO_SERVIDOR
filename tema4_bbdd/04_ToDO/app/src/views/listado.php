<?php 
session_start();
require __DIR__ . '/../../vendor/autoload.php';
use App\models\Basedatos;
use App\models\Tarea;

if (!$_SESSION["conectado"]){
    header ("Location: ../../public/index.php");
    die;
}

//Conectamos con la base de datos para trear la lista de tareas
$db = new Basedatos();

$sql = "SELECT * FROM tareas";
$sentencia = $db->get_data($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDO</title>
     <link rel="stylesheet" href="./../../public/css/styles.css">
</head>
<body>
    <h1>LISTADO DE TAREAS</h1>

    <form action="../controllers/add_tarea.php" method="POST" class="form-add">
        <input type="text" name="descripcion" placeholder="Nueva tarea..." required>
        <button type="submit">Añadir</button>
    </form>

    <ul class="task-list">

        <?php 
            //Voy recorriendo las taras
            while ($registro = $sentencia -> fetch(PDO::FETCH_OBJ)):
                $t = new Tarea($registro->id, $registro->descripcion, $registro->completada);
                
                //Para usar la fecha de la base de datos
                $t->fecha_creacion = new DateTime($registro->fecha_creacion);
        ?>        

        <li class="<?= $t->completada ? 'done' : '' ?>">
            <?= ($t->descripcion) ?>
            <?= ($t->fecha_creacion->format("d/m/Y")) ?>

            <!-- BOTON COMPLETAR -->
            <?php //if (!$t->completada): ?>
                <!-- <form action="../controllers/completar_tarea.php" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $t->id ?>">
                    <button type="submit">✔</button>
                </form> -->
            <?php //endif; ?>

             <!-- BOTON ACTUALIZAR -->
            
                <form action="../controllers/actualizar_tarea.php" method="POST" class="inline">
                    <input type="hidden" name="id" value="<?= $t->id ?>">
                    <input type="hidden" name="estado" value="<?= $t->completada ?>">
                    <button type="submit">✔</button>
                </form>
            

            <!-- BOTON BORRAR -->
            <form action="../controllers/borrar_tarea.php" method="POST" class="inline">
                <input type="hidden" name="id" value="<?= $t->id ?>">
                <button type="submit">🗑️</button>
            </form>
        </li>

        <?php endwhile; ?>
   
    </ul>
    
</body>
</html>
