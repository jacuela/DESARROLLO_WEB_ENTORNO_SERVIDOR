<?php
session_start();
require_once("includes/funciones.php");

print("<pre>");print_r($_POST);print("</pre>");


if (!isset($_SESSION["usuario"])){
    header("Location: index.php");
    die;
}


if (!isset($_POST["titulo_a_borrar"])){
    header("Location: listado.php");
    die;
}

$titulo = $_POST["titulo_a_borrar"];

borrarLibro($titulo);
header("Location: listado.php");
die;

