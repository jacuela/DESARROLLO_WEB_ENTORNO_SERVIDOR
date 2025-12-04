<?php
session_start();
require __DIR__ . '/../../vendor/autoload.php';


use App\models\Basedatos;

$id = $_GET["id"];

//Comprobamos error de no añadir texto de resolucion
$error2 = $_SESSION["error-resolucion"] ?? "";
$error2 = "<p class='error-mensaje'>$error2</p>";
unset($_SESSION["error-resolucion"]);



$basedatos = new Basedatos();

$sql = "SELECT * FROM incidencia WHERE id=:id";
$sentencia = $basedatos -> get_data($sql, [":id" => $id]);

$registroINCI = $sentencia->fetch(PDO::FETCH_OBJ);

if ($registroINCI==false){
    $error = "<p class='error-mensaje'>NO existe la incidencia con dicho ID $id</p>";
}
else{
    $error = "";
    //Existe la incidencia
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../public/css/estilos.css">
    <title>Incidencias</title>
</head>
<body>
    <header>
        <h1>GESTOR DE INCIDENCIAS</h1>
    </header>
    
    <main>

         <?=  $error ?>
         <?=  $error2 ?>

        <?php if ($error == false):?>
        <form action="./../controllers/resolver.php" method="POST" class="form-actualizar 
        <?php echo $registroINCI->resuelta ? "fondo-verde" : "fondo-rojo" ?>">

            <!-- ID (solo lectura) -->
            <!-- <label for="id">ID:</label> -->
            <input type="hidden" id="id" name="id" value="<?= $registroINCI->id ?>" readonly>

            <!-- Título -->
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?= $registroINCI->titulo ?>" required>

            <!-- Descripción -->
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="5" required><?= $registroINCI->descripcion ?></textarea>

            <!-- Nivel -->
            <label for="nivel">Nivel:</label>
            <select id="nivel" name="nivel">
                <option value="normal" <?= $registroINCI->nivel === 'normal' ? 'selected' : '' ?>>Normal</option>
                <option value="urgente" <?= $registroINCI->nivel === 'urgente' ? 'selected' : '' ?>>Urgente</option>
            </select>

            <!-- Resolución -->
            <label for="resolucion">Resolución:</label>
            <input type="text" id="resolucion" name="resolucion" 
                value="<?= $registroINCI->resolucion ?>">

            <!-- Usuario -->
            <label for="nombre_usuario"> Usuario de la incidencia:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" 
                value="<?=  nombre_dado_id($registroINCI->id_usuario) ?>" disabled>

            <!-- Botones. Si no estan habilitados, indicar "disabled" -->    
            <button value="resolver" name="boton" type="submit" 
                    <?=  $registroINCI->resuelta ? 'disabled' : '' ?> >Resolver</button>
            <button value="volver" name="boton" type="submit">Volver</button>
            

        </form>
        <?php endif;?>


        <div class="leyenda">
            <span class="color fondo-verde"></span> Resuelta &nbsp;&nbsp;
            <span class="color fondo-rojo"></span> Sin resolver
        </div>
    </main>

</body>
</html>
