<?php
session_start();

if (!isset($_SESSION["usuario"])){
    header("Location: index.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos.css" title="Color">
    <title>Libros con login</title>
</head>

<body>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "headermenu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main>
       
        <form class="formulario" action="procesar_alta.php" method="post" enctype="multipart/form-data">
            <h2>Alta de libro</h2>

            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" value="Titulo">

            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" value="Autor">

           <p>Selecciona tus géneros favoritos:</p>
           <div class="checkbox-genero">        
           <input type="checkbox" name="generos[]" value="ciencia-ficcion">Ciencia-Ficcion<br />
           <input type="checkbox" name="generos[]" value="historico">Historico<br />
           <input type="checkbox" name="generos[]" value="erotico">Erotico<br />
           <input type="checkbox" name="generos[]" value="thriller">Thriller<br />
           </div>
          
           <p>Carátula del libro <span style="color:green">OPCIONAL</span></p>  
           <input type="file" name="caratula">
           
           <button type="submit">Registrar</button>
            
        </form>
        <br>

        <?php

        if (isset($_GET["mensaje"])) {
            $mensaje = $_GET["mensaje"];
            echo "<p class='mensaje fade-in-out'>$mensaje</p>";
            
        }

        ?>
        <br><br><br>

    </main>
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->
</body>

</html>