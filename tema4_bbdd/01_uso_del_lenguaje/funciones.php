<?php

require_once "config.php";

function hola(){
    echo "hola";
}


//Función que me devuelve la conexión a la bbdd
function conectaDb(){

    global $mysqlUser;
    global $mysqlHost; 
    global $mysqlPassword; 
    global $mysqlDatabase; 

    $dsn_conbbdd = "mysql:host=$mysqlHost;dbname=$mysqlDatabase;charset=utf8mb4";
    $dsn_sinbbdd = "mysql:host=$mysqlHost;charset=utf8mb4";
    $usuario = $mysqlUser;
    $password = $mysqlPassword;

    try{
        //Conecto a una bbdd concreta
        $conexion = new PDO($dsn_conbbdd,$usuario,$password);
    }
    catch(PDOException $e){
        echo "<p>ERROR: No puede conectarse con la base de datos. {$e->getMessage()}</p>";
        try{
            print "<p>Pruebo a conectar sin indicar la bbdd</p>";
            $conexion = new PDO($dsn_sinbbdd,$usuario,$password);
        }
        catch(PDOException $e){
            echo "<p>ERROR: No puede conectarse con la base de datos. {$e->getMessage()}</p>";
            die;
        }
       
    }

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //$conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);  //no traer a memoria todos los datos
                                                                           // ojo, hay que hacer fetch para ir traiendo datos
                                                                           // rowcount da 0 de inicio aunque haya datos 
    return $conexion;
    
}

