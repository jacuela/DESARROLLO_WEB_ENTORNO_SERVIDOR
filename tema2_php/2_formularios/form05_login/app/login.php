
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" title="Color">
    <title>Form05</title>
</head>

<body>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main>
         <form class="formulario" action="procesar_login.php" method="post">
            <h2>Login</h2>

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email">

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
            
            <button type="submit">Acceder</button>
            
        </form>
        <br>
        <?php
            if (isset($_GET["mensaje"])){
                $mensaje = $_GET["mensaje"];
                echo ("<p class='mensaje fade-in-out'>$mensaje</p>");
            }
        ?>
        <br><br><br><br>
        


    </main>
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->

</body>

</html>

