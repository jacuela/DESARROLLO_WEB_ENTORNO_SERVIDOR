<?php

require_once ("includes/funciones.php");
require_once ("modelo/usuario.php");



if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;

}
else{
    $mensaje = "";

    $email = recoge("email");
    $password = recoge("password");

    //Comprobaciones
    if ($email == null || $password == null){
        $mensaje = "ERROR: los campos no pueden estar vacios";
        header("Location: login.php?mensaje=$mensaje");
        die;
    }

    //Comprobamos credenciales
    $usuario = checkuser($email, $password); 

    //var_dump($usuario);



    if ($usuario == null) {
        $mensaje = "ERROR:Credenciales inválidas";
        header("Location: login.php?mensaje=$mensaje");
        die;
    } else {
        $mensaje = "Login correcto";
        header("Location: login.php?mensaje=$mensaje");
        die;
    }
    
}