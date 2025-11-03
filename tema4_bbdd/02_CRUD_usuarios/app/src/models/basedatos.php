<?php
require_once __DIR__ . "/../config.php";

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

        
        $dsn_conbbdd = "$this->dbmotor:host=$this->host;dbname=$this->database;charset=utf8mb4";
        $dsn_sinbbdd = "$this->dbmotor:host=$this->host;charset=utf8mb4";
        //$usuario = $mysqlUser;
        //$password = $mysqlPassword;

        try {
            //Conecto a una bbdd concreta
            $this->conexionPDO = new PDO($dsn_conbbdd, $this->username, $this->password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //debug echo "<p>Exito en la conexionPDO a la bbdd con PDO</p>";
        }
        catch (PDOException $e){
            $this->conexionPDO = null;
            //debug print "<p>Error: No puede conectarse con la base de datos!!. {$e->getMessage()}</p>\n";

        }

        

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

    
    //Metodo para pedirle datos a la base de datos
    public function get_data($sql, array $parametros=[]):PDOStatement{

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> execute($parametros);
            return $sentencia;

        }
        catch(PDOException $e){
            echo $e->getMessage();
            die;
        }

    }
 







}

