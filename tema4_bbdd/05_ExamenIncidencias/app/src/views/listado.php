<?php
session_start();
require __DIR__ . "/../../vendor/autoload.php";


use App\models\Basedatos;
use App\models\Incidencia;

$basedatos = new Basedatos();
 
$rol = $_SESSION["usuario"]["rol"];
$id = $_SESSION["usuario"]["id"];

if ($rol === "admin"){
    $sql = "SELECT * FROM incidencia"; 
    $statement = $basedatos -> get_data($sql);
}
else{
    $sql = "SELECT * FROM incidencia WHERE id_usuario = :id ";
    $parametros = [":id" => $id];
    $statement = $basedatos -> get_data($sql, $parametros);
}

// $todos_los_datos = $statement -> fetchAll();

// print("<pre>");
// print_r($todos_los_datos);
// print("</pre>");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../public/css/estilos.css">
    <title>Incidencias</title>
</head>
<body>
    <header>
        <h1>GESTOR DE INCIDENCIAS</h1>
    </header>
    
    <?php include 'menu.php'; ?>

    <main>
        
        <div class="tabla-contenedor">
        <table border="1" class="tabla">
        <thead>
            <tr>
                <th>TITULO</th>
                <th>NIVEL</th>
                <th>PROPIETARIO</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                while ($registroInc = $statement -> fetch(PDO::FETCH_OBJ)):
                    $incidencia = new Incidencia(
                        $registroInc->id,
                        $registroInc->titulo,
                        $registroInc->descripcion,
                        $registroInc->nivel,
                        $registroInc->resuelta,
                        $registroInc->resolucion,
                        $registroInc->id_usuario
                    );
            ?>

            <?php   
            if ($incidencia->resuelta){
                echo ("<tr class='fondo-verde'>");
            }
            else{
                echo ("<tr class='fondo-rojo'>");
            }
            ?>
    
                <td><?=  $incidencia->titulo ?></td> <!-- campo titulo -->
                <td><?=  $incidencia->nivel ?></td> <!-- campo nivel -->
                <td><?=  nombre_dado_id($incidencia->id_usuario) ?></td> <!-- campo propietario -->
                <!-- campo accion -->
                <td>
                        <!-- BOTON VER -->
                        <a href="ver.php?id=<?= $incidencia->id ?>"><button>VER</button></a> 
                </td>

            </tr>
            <?php endwhile; ?>



        </tbody>
        </table>
        </div> 
        <div class="leyenda">
            <span class="color fondo-verde"></span> Resuelta &nbsp;&nbsp;
            <span class="color fondo-rojo"></span> Sin resolver
        </div>
        
        
            <div class="centrado">
            <br><br>    
            <!-- crea el formulario/enlace, hazlo como quieras con el atributo target="_blank" para que
                 se abra en otra pestaña -->
            <form action="./../controllers/generar_estadisticas.php">
                <button type="submit" 
                    style="background-color:#0275d8; color:white; padding:10px 18px; border:none; border-radius:5px; cursor:pointer;">
                    GENERAR ESTADÍSTICAS EN PDF
                </button> 
            </form>
            </div>
    </main>

    
</body>
</html>