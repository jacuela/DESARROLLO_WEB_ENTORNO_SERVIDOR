
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Form05</title>
</head>

<body>

    <!-- BEGIN menu.php INCLUDE -->
    <?php include("menu.php"); ?>
    <!-- END menu.php INCLUDE -->

    <main>

        <?php

        $lista_usuarios = [];
        $file = "data.json";

        $jsonData = file_get_contents("./bbdd/$file");
        $lista_usuarios = json_decode($jsonData);
 
        echo "<h2> Usuarios en la bbdd: ".count($lista_usuarios)."</h2>";

        ?>


    </main>

    <!-- BEGIN FOOTER INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END FOOTER INCLUDE -->


</body>

</html>