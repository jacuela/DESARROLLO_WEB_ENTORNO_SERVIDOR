<?php

//==============================================
// esta clase esta hecha con el patrón singleton
// tambien se puede hacer sin dicho patron
//===============================================

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
    private ?PDO $conexionPDO;
    private static $instancia; //Singleton patron
    private string $dbmotor;
    private string $host;
    private string $database;
    private string $username;
    private string $password;
    
    //Constructor
    private function __construct(){

        global $dbMotor; 
        global $mysqlHost;
        global $mysqlUser;
        global $mysqlPassword; 
        global $mysqlDatabase;


        $this->dbmotor = $dbMotor;
        $this->host = $mysqlHost;
        $this->database = $mysqlDatabase;
        $this->username = $mysqlUser;
        $this->password = $mysqlPassword;


    }

    //Obtenemos una instancia de la base de datos
    public static function getInstance()
    {
        if(!self::$instancia) // If no instance then make one
        { 
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Get PDO connection
    public function getConnection():PDO
    {
        return $this->conexionPDO;
    }


    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }


}

