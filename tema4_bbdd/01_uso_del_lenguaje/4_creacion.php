<?php

require_once "funciones.php";

$conexion = conectaDb();


try{

    //BORRO LA BBDD
    $sql = "DROP DATABASE IF EXISTS personas_prueba";
    $conexion->query($sql);    //$conexion->exec($sql);   
    
    //CREO LA BBDD
    $sql = "CREATE DATABASE personas_prueba
             CHARACTER SET utf8mb4
             COLLATE utf8mb4_unicode_ci";
    $conexion->query($sql);
    print "    <p>Base de datos creada correctamente.</p>\n";

    $sql = "USE personas_prueba";
    $conexion->query($sql);
    print "<p>Base de datos seleccionada correctamente.</p>\n";

    $sql = "CREATE TABLE personas (
        id INTEGER UNSIGNED AUTO_INCREMENT,
        nombre VARCHAR(255),
        apellidos VARCHAR(255),
        edad INT UNSIGNED,
        PRIMARY KEY(id)
        )";
    $conexion->exec($sql);    
     print "    <p>Tabla creada correctamente.</p>\n";   



}catch(PDOException $e){
    $e->getMessage();
    die;
}


