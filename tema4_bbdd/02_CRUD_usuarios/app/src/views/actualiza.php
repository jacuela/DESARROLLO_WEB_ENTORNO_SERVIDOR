<?php
session_start();

require_once __DIR__ . "/../models/basedatos.php";
require_once __DIR__ . "/../models/usuario.php";

if (!isset ($_SESSION["conectado"]) || !$_SESSION["conectado"]){
    echo "<a href='../../public/index.php'>Inicio</a>";
    die;
}


if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header ("Location: ./listado.php");
    die;
}
else
{

    //Vamos a coger el ID pasado por POST y pedirle a la base de datos
    //dicho usuario
    $id = $_POST["id"];
    $dbInstancia = Basedatos::getInstance(); //por singleton    
    
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $sentencia = $dbInstancia->get_data($sql);

    $registro = $sentencia -> fetch (PDO::FETCH_OBJ);

    $usuario = new Usuario( 
            $registro->id,
            $registro->nombre,
            $registro->apellidos,
            $registro->usuario,
            $registro->password,
            new DateTime($registro->fecha_nac)
        );
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuarios</title>
</head>
<body>

<?php include "menu.php" ?>

<h2>Update de usuario</h1>

<form action="../controllers/actualiza-usuario.php" method="POST">
    
    <input type="hidden" name="id" value="<?=$usuario->id?>"> 
    <p>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= $usuario->nombre ?>">
    </p>
    <p>
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" value="<?= $usuario->apellidos ?>">
    </p>
    <p>
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" value="<?= $usuario->usuario ?>">
    </p>
    <p>
    <label for="password">Update Password (1234 por defecto):</label>
    <input type="password" id="password" name="password" value="1234" disabled>
    <button onclick="alternar()">Activar/Desactivar</button>    
    </p>
    <p>
    <label for="fecha_nac">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nac" name="fecha_nac" value="<?= $usuario->fecha_nac->format("Y-m-d") ?>">
    </p>
    <button type=submit>Actualizar usuario</button>
</form>

<script>
    function alternar() {
        event.preventDefault(); // 🔴 Detiene el envío del formulario
        const campo = document.getElementById("password");
        campo.disabled = !campo.disabled;
    }

</script>

</body>
</html>
