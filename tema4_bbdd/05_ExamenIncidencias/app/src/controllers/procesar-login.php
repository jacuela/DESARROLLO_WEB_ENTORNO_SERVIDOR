<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';

use App\models\Basedatos;



if ($_SERVER["REQUEST_METHOD"]!="POST"){
    header ("Location: ./../../index.php");
    die;
}


$todoOK = true;

//------ 1º - compruebo que los campos no estén vacios
//Opcion con isset
if (isset($_POST["email"])){
    $email = $_POST["email"];

    if ($email === ""){
        //ERROR. El email no puede estar vacio
        $_SESSION["error"]["email"] = "El email no puede estar vacio";
        $todoOK = false;
    }
}

//Opcion con ??
$password = $_POST["password"] ?? "";

if ($password === ""){
    //ERROR. El password no puede estar vacio
    $_SESSION["error"]["password"] = "El password no puede estar vacio";
    $todoOK = false;
}

if (!$todoOK){
    header ("Location: ./../views/login.php");
    die;
}

//------ 2º - me traigo de la bbdd el usuario con dicho email
$basedatos = new Basedatos();

$sql = "SELECT * FROM usuario WHERE email = :email";

//$parametros = ["" => "","" => "",...];
$parametros = [":email" => $email];

$sentencia = $basedatos -> get_data($sql, $parametros);

if ($sentencia != null){

    $registroUsuario = $sentencia->fetch(PDO::FETCH_OBJ);

    if ($registroUsuario === false){
        //No hay tuplas. Ni existe el usuario
         $_SESSION["error"]["login"] = "Error de login";
         enviar_log("Usuario $email intenta logueo. No existe dicho ususario.","info");
         header("Location: ./../views/login.php");
         die;
    }
    else{
        //Vamos a comprobar la contraseña
        if (password_verify($password, $registroUsuario->password)){
            //Login OK
            $_SESSION["usuario"]["nombre"] = $registroUsuario->nombre;
            $_SESSION["usuario"]["rol"] = $registroUsuario->rol;
            $_SESSION["usuario"]["id"] = $registroUsuario->id;
            enviar_log("Usuario $email logueado correctamente","info");
            header("Location: ./../views/listado.php");
            die;

        }
        else{
            //Error de login. Password incorrecto
            $_SESSION["error"]["login"] = "Error de login";
            enviar_log("Error de login. Password incorrecto para $email","info");
            header("Location: ./../views/login.php");
            die;
        }

    }

}










