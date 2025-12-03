<?php

//=============== AYUDA =====================================
        //--------------cargar json a array asociativo
        //ARRAY_ASOCIATIVO = json_decode(file_get_contents(RUTA), true);
        

        //------------- Para conectar
        //DSN = "mysql:dbname=test;host=127.0.0.1;charset=utf8mb4"
        
        //CONEXION = new PDO(DSN, USUARIO, PASSWORD);
        //CONEXION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Las excepciones se recogen con (PDOException $e) Y para ver el mensaje
        //tenemos el método "getMessage()"

        // -------- ejecutar consultas
        
        // sentencia = conexionPDO->prepare(CADENA CON LA CONSULTAD SQL);
        
        // OPCION1
        // sentencia -> bindParam(":ETIQUETA",VALOR);
        // sentencia -> execute();

        // OPCION2
         // sentencia -> execute([":ETIQUETA" => VALOR, ":ETIQUETA" => VALOR, ... ]);


//=============== AYUDA =====================================

namespace App\models;

use PDO;
use PDOException;
use PDOStatement;

class Basedatos
{
    private PDO|null $conexionPDO;
   

    public function __construct()
    {

        $archivoConfig = __DIR__ . "/../config/config.json";

        $config = json_decode(file_get_contents($archivoConfig), true);

        $motor = $config["dbMotor"];
        $host = $config["mysqlHost"];
        $user = $config["mysqlUser"];
        $password = $config["mysqlPassword"];
        $database = $config["mysqlDatabase"];

        $DSN = "$motor:dbname=$database;host=$host;charset=utf8mb4";
        
        try{
            $this->conexionPDO = new PDO($DSN, $user, $password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $e){
            $this->conexionPDO = null;
            enviar_log($e->getMessage(),"error");
            //echo $e->getMessage(); //@@@@cambiarlo por el log
            //die;
        }
         
    }//fin constructor

    public function _getConexion(){
        return $this->conexionPDO;
    }

    public function get_data(string $sql, array $parametros=[]):PDOStatement | null
    {
        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> execute($parametros);
            return $sentencia;  //esto luego se lee con los fetch
        }
        catch(PDOException $excepcion){
            enviar_log($excepcion->getMessage(),"error");
            return null;
        }
        
    }    






} //fin clase


