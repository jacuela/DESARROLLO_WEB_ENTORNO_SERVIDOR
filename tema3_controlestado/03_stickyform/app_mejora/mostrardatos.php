<?php
session_start();

//Debo comprobar que tengo los datos
if (!isset($_SESSION["nombre"]) || !isset($_SESSION["edad"])){
    header("Location: index.php");
    die; 
}


$nombre = $_SESSION["nombre"];
$edad = $_SESSION["edad"];

$sexo = $_SESSION["sexo"];
$aficiones = $_SESSION["aficiones"];

//Voy a borrar datos por si vuelvo al form.

unset ($_SESSION["nombre"]);
unset ($_SESSION["edad"]);

unset ($_SESSION["sexo"]);
unset ($_SESSION["aficiones"]);

session_destroy();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" title="Color">
    <title>Formulario3</title>
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
        print "Sexo: $sexo" . "<br>";
        print "Aficiones:<br>";
        foreach ($aficiones as $aficion){
            echo ("-$aficion<br>");
        }
        
        ?>


        <p><a href='index.php'>Volver al formulario index</a></p>
        


    </main>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
    </footer>
</body>

</html>