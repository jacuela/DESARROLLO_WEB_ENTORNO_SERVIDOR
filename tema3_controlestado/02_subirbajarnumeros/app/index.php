<?php
session_start();

//OPCION 1
// if (!isset($_SESSION["numero"])){
//     $_SESSION["numero"] = 0;
// }

// $numero = $_SESSION["numero"];


//OPCION2
$numero = $_SESSION["numero"] ?? 0;

$pulsaciones = $_COOKIE['pulsaciones'] ?? 0;

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Subir y Bajar</title>
</head>

<body>
    <header>
        <h1>02_Subir y Bajar numero</h1>
    </header>
    <main>

        <form action="procesar.php" method="post">
            <p>Haga clic en los botones para modificar el valor:</p>

            <p>
                <button type="submit" name="accion" value="bajar" style="font-size: 4rem">-</button>

                <?php
                // Mostramos el número, guardado en la sesión
                echo ("<span style='font-size: 4rem'>$numero</span>")
                
                ?>
                <button type="submit" name="accion" value="subir" style="font-size: 4rem">+</button>
            </p>

            <p>
                <button type="submit" name="accion" value="cero" style="font-size: 1.2rem">Poner a cero</button>
            </p>
        </form>
        <?php
            echo ("<h3>Pulsaciones totales: $pulsaciones</h3>");
        ?>

        


    </main>
    <footer>
        <hr>
        <p>Autor: Juan Antonio Cuello</p>
        
    </footer>
</body>

</html>