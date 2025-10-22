<?php

session_start();

if (isset($_SESSION["usuario"])){
    header("Location: listado.php");
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST["usuario"]) && isset($_POST["password"])){
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        if (empty($usuario) || empty($password)){
            //No pueden estar en blanco
            $error = "Campos obligatorios";    
        }
        else if ($usuario == "admin" && $password=="1234"){
            $_SESSION["usuario"]=$usuario;
            header("Location: listado.php");
        }
        else{
            //Datos incorrectos
            $error = "Datos incorrectos";
        
        }

    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros con login</title>
    <link rel="stylesheet" href="assets/css/estilosindex.css" title="Color">
</head>
<body>
    <header>
        <h1>LIBROS CON LOGIN</h1>
    </header>
    
    <main>
        <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">

        <button type="submit">Entrar</button>

        <div>
        
        </div>
        </form>
        <br><br>
        <?php
            

            if (isset($error)){
                echo ("<p class='mensaje fade-in-out'>$error</p>");
            }
        ?>

    </main>
    <!-- BEGIN footer.php INCLUDE -->
    <?php //include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->    

    
</body>
</html>