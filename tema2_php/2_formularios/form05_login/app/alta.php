
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" title="Color">
    <title>Form5</title>
</head>

<body>
    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->
    <main>
       
        <form class="formulario" action="procesar_alta.php" method="post">
            <h2>Registro</h2>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo electrónico</label>
            <input type="text" id="email" name="email" required>

            <label for="password1">Contraseña</label>
            <input type="password" id="password1" name="password1" required>
            
            <label for="password2">Repite Contraseña</label>
            <input type="password" id="password2" name="password2" required>

            
            <button type="submit">Registrar</button>
            
        </form>
        <br>
        <?php
            if (isset($_GET["mensaje"])){
                $mensaje = $_GET["mensaje"];
                echo ("<p class='mensaje fade-in-out'>$mensaje</p>");
            }
        ?>
        
        <br><br><br><br><br>

    </main>
    <!-- BEGIN footer.php INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END footer.php INCLUDE -->
</body>

</html>