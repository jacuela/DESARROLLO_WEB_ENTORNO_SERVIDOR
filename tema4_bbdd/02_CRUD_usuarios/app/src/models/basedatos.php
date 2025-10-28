<?php
require_once __DIR__ . "/../config.php";

class Basedatos
{
    private $conexionPDO;
    private static $instancia; //Singleton patron
    private $dbmotor;
    private $host;
    private $database;
    private $username;
    private $password;
    
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

        
        $dsn_conbbdd = "$this->dbmotor:host=$this->host;dbname=$this->database;charset=utf8mb4";
        $dsn_sinbbdd = "$this->dbmotor:host=$this->host;charset=utf8mb4";
        //$usuario = $mysqlUser;
        //$password = $mysqlPassword;

        try {
            //Conecto a una bbdd concreta
            $this->conexionPDO = new PDO($dsn_conbbdd, $this->username, $this->password);
            echo "<p>Exito en la conexionPDO a la bbdd con PDO</p>";
        }
        catch (PDOException $e){
            print "<p>Error: No puede conectarse con la base de datos!!. {$e->getMessage()}</p>\n";

        }

        $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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














}

