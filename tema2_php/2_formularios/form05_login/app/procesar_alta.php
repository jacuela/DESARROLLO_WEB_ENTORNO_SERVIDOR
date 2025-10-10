<?php
require_once ("includes/funciones.php");
require_once ("modelo/usuario.php");



if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;

}
else{
    //Vengo del form
    $mensaje = "";

    $nombre = recoge("nombre");
    $email = recoge("email");
    $password1 = recoge("password1");
    $password2 = recoge("password2");
    
    //Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $mensaje = "ERROR: Email invalido";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    //>>>ALUMNO: comprobar si el email ya existe
    if (existeUsuario($email)){
        $mensaje = "ERORR: Email no disponible.";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    

    //Password
    //ojo, '000'=='0000000' --> true
    if ($password1 !== $password2){
        $mensaje = "ERROR: no coninciden los password";
        header("Location: alta.php?mensaje=$mensaje");
        die;
    }

    //Los datos son correctos
    //Recupero la lista de usuarios
    $lista_usuarios = [];
    $file = "bbdd/data.json";

    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    //Me creo el objeto usuario
    $usuario = new Usuario($nombre,$email,$password1);

    array_push($lista_usuarios,$usuario);

    $jsonData = json_encode($lista_usuarios, 
                            JSON_UNESCAPED_UNICODE |
                            JSON_PRETTY_PRINT);
    
    file_put_contents($file,$jsonData);
    $mensaje = "ALTA CORRECTA";
    header("Location: alta.php?mensaje=$mensaje");
    die;
        
}



