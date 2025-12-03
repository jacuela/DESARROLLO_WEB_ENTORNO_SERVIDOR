<?php









//================= Para conectar
        //DSN = "mysql:dbname=test;host=127.0.0.1;charset=utf8mb4"
        
        //CONEXION = new PDO(DSN, USUARIO, PASSWORD);
        //CONEXION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Las excepciones se recogen con (PDOException $e) Y para ver el mensaje
        //tenemos el método "getMessage()"

//================== ejecutar consultas

        
        // sentencia = conexionPDO->prepare(CADENA CON LA CONSULTAD SQL);
        
        // OPCION1
        // sentencia -> bindParam(":ETIQUETA",VALOR);
        // sentencia -> execute();

        // OPCION2
         // sentencia -> execute([":ETIQUETA" => VALOR, ":ETIQUETA" => VALOR, ... ]);


class Basedatos
{
    private PDO|null $conexionPDO;
    
    public function __construct()
    {
        
        global $dbMotor; 
        global $mysqlHost;
        global $mysqlUser;
        global $mysqlPassword; 
        global $mysqlDatabase;

            
    }//fin constructor


} //fin clase

