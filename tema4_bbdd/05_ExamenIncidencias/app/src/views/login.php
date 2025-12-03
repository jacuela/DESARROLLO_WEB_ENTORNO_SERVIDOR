<?php
session_start();


$errorEmail = $_SESSION['error']['email'] ?? "";
$errorPassword = $_SESSION['error']['password'] ?? "";

$errorLogin = $_SESSION['error']['login'] ?? "";

//Borro errores una vez recogidos
unset ($_SESSION['error']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incidencias</title>
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>
    
    <div class="form-login">
        <p style="font-size: 1rem">Administrador:    admin@kk.com / toor</p>
        <p style="font-size: 1rem">Usuario:    goku@kk.com / 1234</p>
        <form action="./../controllers/procesar-login.php" method="POST">
        <input type="email" size="30" name="email" placeholder="Email" ><br>
        <input type="password" size="30" name="password" placeholder="Contraseña" ><br>
        <button type="submit">Entrar</button>
        </form>

        <?php
            //Muestro errores. Si no hay, la variable estará en blanco
            echo "<p style='color:red'>$errorEmail</p>";
            echo "<p style='color:red'>$errorPassword</p>";  
            echo "<p style='color:red'>$errorLogin</p>";  
                              
        ?>


    </div>
    
</body>
</html>