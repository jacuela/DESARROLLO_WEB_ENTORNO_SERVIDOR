<?php
session_start();

$usuario_valido = "admin";
$clave_valida = "1234";

$usuario = $_POST['usuario'] ?? "";
$clave = $_POST['clave'] ?? "";
$recordar = isset($_POST['recordar']);

if ($usuario === $usuario_valido && $clave === $clave_valida) {
    $_SESSION['usuario'] = $usuario;

    if ($recordar) {
        setcookie("usuario", $usuario, time() + (7 * 24 * 60 * 60), "/");
    } else {
        setcookie("usuario", "", time() - 3600, "/");
    }

    header("Location: bienvenida.php");
    exit();
} else {
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo '<a href="index.php">Volver</a>';
}
?>