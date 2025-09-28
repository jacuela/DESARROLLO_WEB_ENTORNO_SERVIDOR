<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hola Severo Ochoa</title>
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 80%;
            }
        </style>
    </head>
    <body>
        <h1><?php echo "Hola Mundo con MySQL"; ?></h1>
        <p>
        <?php
            echo "Hoy estamos a " . date("d/m/Y");
        ?>
        </p>
        <img src="hello.gif" alt="Hola" class="center">
    </body>
</html>