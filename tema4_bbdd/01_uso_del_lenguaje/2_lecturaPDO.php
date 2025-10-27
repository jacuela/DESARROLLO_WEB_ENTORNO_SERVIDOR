<?php

require_once "funciones.php";

$conexion = conectadDb();

//Consulta sin preparar

$tabla = "personas";    //probar la inyeccion con ;DROP TABLE personas

$sql = "SELECT * FROM $tabla";
//$consulta = "SELECT * FROM personas where id=2";
//$consulta = "SELECT * FROM personas where id=5";

try{
    $sentencia = $conexion->query($sql);
}catch(PDOException $e){
    print "Error: No puede conectarse con la base de datos. {$e->getMessage()}";
    die;
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD01</title>
</head>
<body>
    <h2>CONSULTA</h2>
    <h3>LECTURA DE TODOS LOS REGISTROS</h3>

    <?php if ($sentencia->rowCount() == 0): ?>
            <p>0 registros encontrados</p>
    <?php endif; ?>

    <p><?= $sentencia->rowCount()?> registros encontrados</p>     

    <table>
        <thead>
            <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Apellidos</th>
                 <th>Edad</th>                 
            </tr>
        </thead>


    <?php
    //USANDO FETCHALL. ME GUARDO TODOS LOS DATOS. FETCH YA DEVUELVE 0 TUPLAS.
    print "<hr>";
    print "Usando fetchall";
    $listaPersonas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    foreach ($listaPersonas as $registro) {
        print "      <tr>\n";
        print "        <td>$registro[id]</td>\n";
        print "        <td>$registro[nombre]</td>\n";
        print "        <td>$registro[apellidos]</td>\n";
        print "        <td>$registro[edad]</td>\n";
        print "      </tr>\n";
    }
    print "    </table>\n";

    print("<pre>");
    //print_r($listaPersonas);
    print("</pre");
    
    
    print "<hr>";



    //USANDO UN WHILE CON FETCH. OJO, ES UN CURSO, LUEGO YA NO HAY ACCESO
    // print "Usando while con fetch";
    // while ($registro = $sentencia->fetch()) {
    //     print "      <tr>\n";
    //     print "        <td>$registro[id]</td>\n";
    //     print "        <td>$registro[nombre]</td>\n";
    //     print "        <td>$registro[apellidos]</td>\n";
    //     print "        <td>$registro[edad]</td>\n";
    //     print "      </tr>\n";
    // }
    // print "    </table>\n";



    print "<hr>";
    
    
    
    //OJO, FETCH COLUMN OBTIENE DATO Y AVANZA A LA SIGUIENTE TUPLA
    // print("<p>Listado de edades</p>");
    // print($sentencia->fetchColumn(3) . "<br>");
    // print($sentencia->fetchColumn(3) . "<br>");
    // print($sentencia->fetchColumn(3) . "<br>");


    // $apellido = "Cuello";
    // print("<h3>¿Cuantos tienen de apellido " . $apellido . "</h3>");

    // $sql = "SELECT COUNT(*) FROM personas
    //             WHERE apellidos LIKE '%$apellido%'";


    // try{
    //     $sentencia = $conexion->query($sql);
    //     echo "<p>Se han encontrado {$sentencia->fetchColumn()} registro(s)</p>";
    // }catch(PDOException $e){
    //     print "Error: No puede conectarse con la base de datos. {$e->getMessage()}";
    //     die;
    // }    
    

    

    ?>


    
</body>
</html>

<?php
    
$conexion = null;

?>

