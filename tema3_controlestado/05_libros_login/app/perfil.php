<?php
    session_start();

    if (!isset($_SESSION["usuario"])){
        header("Location: index.php");
        die;
    }


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
    <main>

    <h1>Hola <?=$_SESSION["usuario"]?></h1>
    <p>En construccion....</p>
    <a href="index.php">Index</a>
    </main>

    
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->

    
</body>
</html>