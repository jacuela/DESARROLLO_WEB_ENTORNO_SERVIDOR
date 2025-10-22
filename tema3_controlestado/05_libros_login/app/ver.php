<?php
    session_start();
    require_once("includes/funciones.php");


    if (!isset($_SESSION["usuario"])){
        header("Location: index.php");
        die;
    }

    $titulo = $_GET["titulo"];
    $libro = obtenerLibro($titulo);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>Libros con login</title>
</head>
<body>
     <!-- BEGIN menu.php INCLUDE -->
    <?php include "headermenu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main style="text-align:center">

    <h1>DATOS DE LA PELICULA</h1>
    <p>TITULO: <?= $libro->titulo ?></p>
    <p>AUTOR: <?= $libro->autor ?></p>
    <p><img width='250px' src='bbdd/portadas/<?=$libro->caratula?>'></p>
    <a class="ver-enlace" href="listado.php">VOLVER</a>
    </main>

    
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->

    
</body>
</html>