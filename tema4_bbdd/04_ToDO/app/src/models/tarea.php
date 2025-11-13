<?php 
namespace App\models;

//require __DIR__ . '/../../vendor/autoload.php';

use DateTime;

class Tarea{
    public int|null $id;
    public string $descripcion;
    public bool $completada;
    public DateTime $fecha_creacion;

    public function __construct(int|null $_id, 
                                string $_descripcion,
                                bool $_completada = false){

           vamos por aqui                         
    }

    
}

