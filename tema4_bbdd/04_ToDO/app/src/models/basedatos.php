<?php 
namespace App\models;
require __DIR__ . '/../../vendor/autoload.php';

use PDO;
use PDOException;
use PDOStatement;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Basedatos
{
    private PDO|null $conexionPDO;
    private Logger $log;
    private bool $conectado;

    public function __construct()
    {
        //Manejador de log
        $this->log = new Logger('app');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../../app.log'));
 
        // 🔹 Cargar configuración desde JSON
        $configPath = __DIR__ . '/../config.json';
        $config = json_decode(file_get_contents($configPath), true);

        $dbmotor = $config["dbMotor"];
        $host = $config["mysqlHost"];
        $user = $config["mysqlUser"];
        $password = $config["mysqlPassword"];
        $database = $config["mysqlDatabase"];

        //DSN ejemplo: 'mysql:dbname=test;host=localhost'
        $dsn = "$dbmotor:host=$host;dbname=$database;charset=utf8mb4";

        try{
            $this->conexionPDO = new PDO($dsn, $user, $password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conectado = true;
        }
        catch (PDOException $e){
            $this->conexionPDO = null;
            $this->conectado = false;
            $this->log->error("Fallo en el CONSTRUCTOR creando el objeto PDO");
            $this->log->error($e->getMessage(),['archivo:'=>'basedatos.php']);
        }
            
    }//fin constructor

    public function estaConectado(){
        return $this->conectado;
    }

    //Metodo para consultas SELECT
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
        }

    }

    //Método para insertar un usuario en la bbdd
    public function crear_tarea(Tarea $_tarea){ 

        $sql = "INSERT INTO tareas (descripcion) VALUES (:descripcion)";
        $descripcion = $_tarea->getDescripcion();
        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":descripcion",$descripcion);
            $sentencia -> execute();
            return true;

        }
        catch(PDOException $e){
            $this->log->error("Error en CREAR TAREA");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            
        }

     }

     //Método para BORRAR un usuario en la bbdd
    public function borrar_tarea(int $_id){

        $sql = "DELETE FROM tareas WHERE id = :id";
        $id = $_id;

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$id);
            $sentencia -> execute();  //$sentencia -> execute([":id" => $id]);
            return true;

        }
        catch(PDOException $e){
            $this->log->error("Error en BORRAR TAREA");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            
        }

    }//fin borrar tarea

    //Método para COMPLETAR una tarea
    public function completar_tarea(int $_id){

        $sql = "UPDATE tareas SET completada = TRUE WHERE id = :id";
        $id = $_id;

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$id);
            $sentencia -> execute();
            return true;
        }
        catch(PDOException $e){
            $this->log->error("Error en COMPLETAR TAREA");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            
        }
     
    }//fin completar_tarea


    //Método para ACTUALIZAR una tarea
    public function actualizar_tarea(int $_id, bool $estado){
        
        if ($estado){
            $sql = "UPDATE tareas SET completada = FALSE WHERE id = :id";
        }
        else{
             $sql = "UPDATE tareas SET completada = TRUE WHERE id = :id";
        }

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$_id);
            $sentencia -> execute();
            return true;
        }
        catch(PDOException $e){
            $this->log->error("Error en ACTUALIZAR TAREA");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
            
        }
     
    }//fin completar_tarea



    


} //fin clase



