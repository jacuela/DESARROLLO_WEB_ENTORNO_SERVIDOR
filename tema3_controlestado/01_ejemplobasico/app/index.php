<?php
session_start();

if (isset($_SESSION["usuario"])){
    //Si existe, es porque no hemos legueado correctamente
    header ("Location: bienvenida.php");
    die; //exit();

}

if (isset($_COOKIE["usuario"])){
    $nombre_guardado = $_COOKIE["usuario"];
}
else{
    $nombre_guardado = "";
}
//----> opcion alternativa $nombre_guardado = $_COOKIE['usuario'] ?? "";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login con Cookies y Sesiones</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post" action="procesar-login.php">
        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?= $nombre_guardado ?>" 
                required><br><br>

        <label>Contraseña:</label>
        <input type="password" name="clave" required><br><br>

        <label>
            <input type="checkbox" name="recordar">
            Recordarme
        </label><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>