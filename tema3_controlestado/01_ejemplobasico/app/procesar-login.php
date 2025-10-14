<?php

$usuario_valido = "admin";
$clave_valida = "1234";


//Tratamos el usuario
if (isset($_POST["usuario"])){
    $usuario = $_POST["usuario"];
}
else{
    $usuario = "";
}

//Tratamos el nombre
$clave = $_POST["clave"] ?? "";

//Tratamos recordar
$recordar = isset($_POST['recordar']);

if ($usuario === $usuario_valido && $clave === $clave_valida){

    //Guardamos la COOKIE
    if ($recordar){
        setcookie("usuario", $usuario, time() + (7 * 24 * 60 * 60), "/");
    }
    else{
        setcookie("usuario", "", time() - 3600, "/"); 
        //tiempo en el pasado. La borra
        
    }

    header ("Location: bienvenida.php");
    die;
}
else{
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo "<a href='index.php'>Volver</a>";
}


?>