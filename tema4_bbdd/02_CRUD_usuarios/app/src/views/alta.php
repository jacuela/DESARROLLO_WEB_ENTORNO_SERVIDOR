<?php
session_start();

if (!isset ($_SESSION["conectado"]) || !$_SESSION["conectado"]){
    echo "<a href='../../public/index.php'>Inicio</a>";
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuarios</title>
</head>
<body>

<?php include "menu.php" ?>

<h2>Alta de usuarios</h1>

<form action="alta-usuario.php" method="POST">
    <p>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    </p>
    <p>
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos">
    </p>
    <p>
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario">
    </p>
    <p>
    <label for="password">Password (1234 por defecto):</label>
    <input type="password" id="password" name="password" value="1234">
    </p>
    <p>
    <label for="fecha_nac">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nac" name="fecha_nac" value="1980-01-01">
    </p>
    <button type=submit>Crear usuario</button>
</form>

</body>
</html>
