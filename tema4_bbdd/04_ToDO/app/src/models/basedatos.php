<?php 
namespace App\models;
require __DIR__ . '/../../vendor/autoload.php';

use PDO;
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
 
        
    
    
    
    }









}


