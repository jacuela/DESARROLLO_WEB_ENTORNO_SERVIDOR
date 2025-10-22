<?php 
session_start();

if (!isset($_SESSION["usuario"])){
    header("Location: index.php");
    die;
}

require_once("includes/funciones.php");

$lista_libros = obtenerLibros();

//print("<pre>");var_dump($lista_libros);print("</pre>")

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Libros con login</title>
</head>

<body>

    <!-- BEGIN menu.php INCLUDE -->
    <?php include "headermenu.php"; ?>
    <!-- END menu.php INCLUDE -->

    <main>
        
        <div class="tabla-contenedor">
        <table class="tabla">
        <thead>
            <tr>
               <?php
                
                foreach ($lista_libros[0] as $campo => $value){
                    echo "<th>$campo</th>";
                }
                ?>
                 <th>ACCION</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($lista_libros as $libro): ?>

                <tr>
                
                <td> <img width='50px' src='bbdd/portadas/<?=$libro->caratula?>'>  </td>
                <td> <?=$libro->titulo?> </td>
                <td> <?=$libro->autor?> </td>
                <td>
                <select id='genero' name='genero'>

                <?php foreach ($libro->generos as $ungenero): ?>
                    <option value='<?= $ungenero ?>'><?=$ungenero?></option>
                <?php endforeach; ?>
                </select>
                </td>
                
                <td>
                    <!-- necesito un form por cada registro pq en name del input es el mismo y ebvia el value del ultimo -->
                    <div class="accion"> 
                    <a class="ver-enlace" href="ver.php?titulo=<?= $libro->titulo?>">VER</a> 
                    <form action="borrar.php" method="POST">
                    <input type="hidden" name="titulo_a_borrar" value="<?=$libro->titulo?>"> 
                    <button class="borrar-boton" type="submit">BORRAR</button>
                    </form> 
                    </div>
                </td>
            
                </tr>
            <?php endforeach; ?>

        </tbody>
        </table>
        </div> 
        
        

    </main>

    <!-- BEGIN FOOTER INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END FOOTER INCLUDE -->


</body>

</html>