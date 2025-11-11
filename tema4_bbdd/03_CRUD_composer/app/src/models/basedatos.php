<?php
namespace App\models;

require __DIR__ . '/../../vendor/autoload.php';

use App\models\Usuario; 

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PDO;
use PDOException;
use PDOStatement;

class Basedatos
{
    private ?PDO $conexionPDO;
    private static $instancia; //Singleton patron
    private string $dbmotor;
    private string $host;
    private string $database;
    private string $username;
    private string $password;

    private Logger $log;
    
    //Constructor
    private function __construct(){

        //Manejador de log
        $this->log = new Logger('app');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../../app.log'));
 

        // 🔹 Cargar configuración desde JSON
        $configPath = __DIR__ . '/../config.json';
        $config = json_decode(file_get_contents($configPath), true);

        $this->dbmotor = $config['dbMotor'];
        $this->host  = $config['mysqlHost'];
        $this->database  = $config['mysqlDatabase'];
        $this->username  = $config['mysqlUser'];
        $this->password  = $config['mysqlPassword'];
        
        $dsn_conbbdd = "$this->dbmotor:host=$this->host;dbname=$this->database;charset=utf8mb4";
        $dsn_sinbbdd = "$this->dbmotor:host=$this->host;charset=utf8mb4";
        //$usuario = $mysqlUser;
        //$password = $mysqlPassword;

        try {
            //Conecto a una bbdd concreta
            $this->conexionPDO = new PDO($dsn_conbbdd, $this->username, $this->password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->log->debug("Exito en la conexion a la bbdd");
            //debug echo "<p>Exito en la conexionPDO a la bbdd con PDO</p>";
        }
        catch (PDOException $e){
            $this->conexionPDO = null;
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
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
    public function getConnection()
    {
        return $this->conexionPDO;
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }

    
    //Metodo GENERICO para pedirle datos a la base de datos
    public function get_data(string $sql, array $parametros=[]):PDOStatement | null
    {

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> execute($parametros);
            return $sentencia;

        }
        catch(PDOException $e){
            $this->log->error("Error en GET DATA");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return null;
            //die;
        }

    }


    //Método para insertar un usuario en la bbdd
    public function crear_usuario(Usuario $_usuario){ 

        $nombre = $_usuario->nombre;
        $apellidos = $_usuario->apellidos;
        $usuario = $_usuario->usuario;
        $password = $_usuario->password; 
        $fecha_nac = $_usuario->fecha_nac->format("Y-m-d");

        $sql = "INSERT INTO usuarios (nombre, apellidos, usuario, password, fecha_nac) 
             VALUES (:nombre, :apellidos, :usuario, :password, :fecha_nac)";

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":nombre",$nombre);
            $sentencia -> bindParam(":apellidos",$apellidos);
            $sentencia -> bindParam(":usuario",$usuario);
            $sentencia -> bindParam(":password",$password);
            $sentencia -> bindParam(":fecha_nac",$fecha_nac);
            $sentencia -> execute();
            return true;

        }
        catch(PDOException $e){
            $this->log->error("Error en CREAR USUARIO");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            //die;
        }

    }

    //Método para BORRAR un usuario en la bbdd
    public function borrar_usuario(int $_id){

        $sql = "DELETE FROM usuarios WHERE id = :id";

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$_id);
            $sentencia -> execute();
            return true;

        }
        catch(PDOException $e){
            $this->log->error("Error en BORRAR USUARIO");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            //die;
        }

    }

    //Método para ACTUALIZAR un usuario en la bbdd
    public function actualizar_usuario(Usuario $_usuario){

        

        $id = $_usuario->id;
        $nombre = $_usuario->nombre;
        $apellidos = $_usuario->apellidos;
        $usuario = $_usuario->usuario;
        $password = $_usuario->password; //si es NULL, no queremos actualizarlo
        $fecha_nac = $_usuario->fecha_nac->format("Y-m-d");

        if (is_null($password)){
            //Actualizamos todo menos el password
             $sql = "UPDATE usuarios
                     SET    nombre = :nombre,
                            apellidos = :apellidos,
                            usuario = :usuario,
                            fecha_nac = :fecha_nac
                    WHERE id = :id";

        }
        else{
            //Actualizamos todo
            $sql = "UPDATE usuarios
                    SET     nombre = :nombre,
                            apellidos = :apellidos,
                            usuario = :usuario,
                            password = :password,
                            fecha_nac = :fecha_nac
                    WHERE id = :id";

        }

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$id);
            $sentencia -> bindParam(":nombre",$nombre);
            $sentencia -> bindParam(":apellidos",$apellidos);
            $sentencia -> bindParam(":usuario",$usuario);
            if (!is_null($password)){
                $sentencia -> bindParam(":password",$password);
            }    
            $sentencia -> bindParam(":fecha_nac",$fecha_nac);
            
            var_dump($sentencia->queryString);
            
            $sentencia -> execute();

            return true;

        }
        catch(PDOException $e){
            $this->log->error("Error en ACTUALIZAR USUARIO");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            //die;
        }

    }

}

