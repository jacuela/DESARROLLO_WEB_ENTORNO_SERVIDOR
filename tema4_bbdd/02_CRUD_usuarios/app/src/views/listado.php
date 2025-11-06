<?php
session_start();

require_once __DIR__ . "/../models/basedatos.php";
require_once __DIR__ . "/../models/usuario.php";


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
                <th>EDAD</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registroPDO = $sentencia -> fetch(PDO::FETCH_OBJ)): 
                    $usuario = new Usuario(
                        $registroPDO->id,
                        $registroPDO->nombre,
                        $registroPDO->apellidos,
                        $registroPDO->usuario,
                        $registroPDO->password,
                        new DateTime($registroPDO->fecha_nac));
            ?>
                
            <tr>
                <td><?=$usuario->nombre ?></td>
                <td><?=$usuario->apellidos?></td>
                <td><?=$usuario->usuario?></td>
                <td><?=$usuario->fecha_nac->format('d/m/Y')?></td>
                <td><?=$usuario->getEdad()?></td>
                
                <td>
                        <!-- BOTON VER -->
                        <a href="ver.php?id=<?= $usuario->id?>"><button>VER</button></a> 
                        
                        <!-- BOTON BORRAR -->
                        <form action="../controllers/borrar-usuario.php" method="POST">
                        <input type="hidden" name="id" value="<?=$usuario->id?>"> 
                        <button type="submit">BORRAR</button>
                        </form>

                        <!-- BOTON ACTUALIZAR -->
                        <form action="./actualiza.php" method="POST">
                        <input type="hidden" name="id" value="<?=$usuario->id?>"> 
                        <button type="submit">ACTUALIZAR</button>
                        </form>


                   </td>

            </tr>
            <?php endwhile; ?>    
        </tbody>






    </table>



    
</body>
</html>