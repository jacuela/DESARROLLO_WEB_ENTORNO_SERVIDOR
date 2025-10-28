<?php

require_once "funciones.php";

$conexion = conectaDb();

try{

    //Lista de parametros
    $id = "2";
    $nombre = "Alicia"; //;drop table personas";

    //Consulta preparada usando ?   El orden sí importa
    // $consulta_preparada1 = "SELECT * FROM personas WHERE id = ? AND nombre = ?";
    // $sentencia = $conexion->prepare($consulta_preparada1);
    // $sentencia -> bindParam(1,$id);
    // $sentencia -> bindParam(2,$nombre);
    // $sentencia -> execute();
    
    // OPCIONAL SIN METODO BINDPARAM -------> 
    //$sentencia->execute([$id, $nombre]);


    //Consulta preparada usando :valor   El orden no importa
    $consulta_preparada2 = "SELECT * FROM Personas WHERE id = :valor1 AND nombre = :valor2";

    $sentencia = $conexion->prepare($consulta_preparada2);
    $sentencia -> bindParam(":valor2",$nombre);
    $sentencia -> bindParam(":valor1",$id);
    $sentencia -> execute();

    //OPCIONAL------> $sentencia->execute([":valor2" => $nombre, ":valor1" => $id]);

    //Consulta con like
    // $nombre_like = "%Alicia%";
    // $consulta_preparada3 = "SELECT * FROM Personas WHERE nombre LIKE :valor1";
    // $sentencia = $conexion->prepare($consulta_preparada3);
    // $sentencia -> bindParam(":valor1",$nombre_like);    
    // $sentencia -> execute();



}catch(PDOException $e){
    echo  $e->getMessage();
    die;
}


print "<h2>CONSULTA PREPARADA</h2>";
print "<h3>REGISTROS CON ID:{$id} y NOMBRE:{$nombre}</h3>";

if ($sentencia->rowCount() == 0) {
    print "<p>0 registros encontrados</p>";
} else {

    print "<p>" . $sentencia->rowCount() . " registros encontrados</p>";
    print "    <table>";
    print "      <thead>";
    print "        <tr>";
    print "          <th>ID</th>";
    print "          <th>Nombre</th>";
    print "          <th>Apellidos</th>";
    print "          <th>Edad</th>";
    print "        </tr>";
    print "      </thead>";

    //USANDO UN FOREACH
    //OJO, EL BUCLE RECORRE LAS TUPLAS RESULTADO. LUEGO YA NO LAS TENDRÍAMOS
    while ($registro = $sentencia -> fetch(PDO::FETCH_ASSOC)) {
        print "      <tr>\n";
        print "        <td>$registro[id]</td>\n";
        print "        <td>$registro[nombre]</td>\n";
        print "        <td>$registro[apellidos]</td>\n";
        print "        <td>$registro[edad]</td>\n";
        print "      </tr>\n";
    }
    print "    </table>\n";
}


$conexion = null;
