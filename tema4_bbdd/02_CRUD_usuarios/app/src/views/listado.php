<?php
session_start();

require_once "../models/basedatos.php";

if (!isset ($_SESSION["conectado"]) || !$_SESSION["conectado"]){
   header ("Location: ../../public/index.php");
   die;
}

$dbInstancia = Basedatos::getInstance(); //por singleton
$sql = "SELECT * FROM usuarios";
$sentencia = $dbInstancia->get_data($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuarios</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <?php include 'menu.php';?>
    <h2>Listado de usuarios</h2>

    <table border="1" class="tabla">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>USUARIO</th>
                <th>FECHA_NAC</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registroPDO = $sentencia -> fetch(PDO::FETCH_OBJ)): ?>
            <tr>
                <td><?= $registroPDO->nombre ?></td>
                <td><?=$registroPDO->apellidos?></td>
                <td><?=$registroPDO->usuario?></td>
                <td><?=$registroPDO->fecha_nac?></td>
                
                
                <td>
                        <!-- BOTON VER -->
                        <a href="ver.php?id=<?= $registroPDO->id?>"><button>VER</button></a> 
                        
                        <!-- BOTON BORRAR -->
                        <form action="../controllers/borrar.php" method="POST">
                        <input type="hidden" name="id" value="<?=$registroPDO->id?>"> 
                        <button type="submit">BORRAR</button>
                        </form>

                        <!-- BOTON ACTUALIZAR -->
                        <form action="../controllers/actualizar.php" method="POST">
                        <input type="hidden" name="id" value="<?=$registroPDO->id?>"> 
                        <button type="submit">ACTUALIZAR</button>
                        </form>


                   </td>

            </tr>
            <?php endwhile; ?>    
        </tbody>






    </table>



    
</body>
</html>