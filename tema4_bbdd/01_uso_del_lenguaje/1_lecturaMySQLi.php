<?php

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $base_datos = "personasDB";

    // "SERVIDOR", "USUARIO", "CONTRASEÑA", "BASE DE DATOS"
    try{
        $conexion = new mysqli($servidor,$usuario,$password,$base_datos);
    }catch(mysqli_sql_exception $e){
        // Capturar el error y mostrar mensaje controlado
        echo "❌ Error al conectar a la base de datos: " . $e->getMessage();
        die;
    }
    
    // CONSULTA A LA BASE DE DATOS
    $consulta = "SELECT * FROM `Personas`";
    $listaPersonas = mysqli_query($conexion, $consulta);
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenid@ a MySQL !!</h1>

    <table>
        <thead>
            <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Apellidos</th>
                 <th>Edad</th>                 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaPersonas as $persona): ?>
                <tr>
                    <td> <?=$persona["id"]?> </td>
                    <td> <?=$persona["Nombre"]?> </td>
                    <td> <?=$persona["Apellidos"]?> </td>
                    <td> <?=$persona["Edad"]?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>


</body>
</html>