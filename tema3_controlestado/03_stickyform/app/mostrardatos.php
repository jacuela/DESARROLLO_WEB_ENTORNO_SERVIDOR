<?php
    session_start();
    $nombre = $_SESSION["nombre"];
    $edad = $_SESSION["edad"];

    unset ($_SESSION["nombre"]);
    unset ($_SESSION["edad"]);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>MOSTRANDO DATOS</h1>
    </header>
    <main>
        <h3>Datos recibidos:</h3>
        <?php
        print "Nombre: $nombre" . "<br>";
        print "Edad: $edad" . "<br>";
        ?>
        <p><a href='index.php'>Volver al formulario index</a></p>

    </main>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
    </footer>

    
</body>
</html>