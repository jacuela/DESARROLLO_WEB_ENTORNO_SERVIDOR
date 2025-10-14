<?php
session_start();

// print ("<pre>");
// print_r($_POST);
// print ("</pre>");

$accion = $_POST["accion"];

$pulsaciones = $_COOKIE['pulsaciones'] ?? 0;
setcookie("pulsaciones", ++$pulsaciones, time() + (7 * 24 * 60 * 60), "/");

// Dependiendo de la acción recibida, modificamos el número guardado
if ($accion == "cero") {
    $_SESSION["numero"] = 0;

    //Tengo que poner la cookie a cero
    setcookie("pulsaciones", 0, time() + (7 * 24 * 60 * 60), "/");

} elseif ($accion == "subir" and $_SESSION["numero"] < 9) {
    $_SESSION["numero"]++;

} elseif ($accion == "bajar" and $_SESSION["numero"] > 0) {
    $_SESSION["numero"]--;

}

// Volvemos al formulario
header("Location:index.php");

