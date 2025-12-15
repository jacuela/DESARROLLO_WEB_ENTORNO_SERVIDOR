<?php 
namespace App\models;
require __DIR__ . '/../../vendor/autoload.php';

use PDO;
use PDOException;
use PDOStatement;

class Basedatos
{
    private PDO|null $conexionPDO;
    
    public function __construct()
    {
        
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
        }
        catch (PDOException $e){
            $this->conexionPDO = null;
            enviar_log($e->getMessage(),"error");
        }
            
    }//fin constructor

    public function estaConectado(){
        if ($this->conexionPDO == null){
            return false;
        }
        else{
            return true;
        }
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
            enviar_log($e->getMessage(),"error");
            return null;
        }

    }


    //Metodo para añadir elemento a la bbdd INSERT
    public function insertarEmpleado(array $empleadoASOC){

        $sql = "INSERT INTO empleados  (`nombre`, `direccion`, `salario`)
                VALUES (:nombre, :direccion, :salario)";

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":nombre",$empleadoASOC["nombre"]);
            $sentencia -> bindParam(":direccion",$empleadoASOC["direccion"]);
            $sentencia -> bindParam(":salario",$empleadoASOC["salario"]);
            $sentencia -> execute();
            enviar_log("Usuario añadido correctamente","info");
            return true;

        }
        catch(PDOException $e){
            enviar_log($e->getMessage(),"error");
            return false;
        }

    }
    
    //Metodo para borrar un empleado de la bbdd DELETE
    public function borrarEmpleado(int $id_){

        //NOTA: si no existe el id a borrar, no da error. Por log log, puede parecer
        //que se acaba de borrar el empleado.
        //Habria que controlar si se quiere ser mas exacto el resultado de la consulta.

        $sql = "DELETE FROM empleados WHERE id = :id";
        
        
        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$id_);
            $sentencia -> execute();
            enviar_log("Usuario con id $id_ borrado correctamente","info");
            return true;

        }
        catch(PDOException $e){
            enviar_log($e->getMessage(),"error");
            return false;
        }

    }


} //fin clase



