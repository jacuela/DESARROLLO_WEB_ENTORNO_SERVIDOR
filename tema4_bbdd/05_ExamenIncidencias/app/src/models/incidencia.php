<?php 
namespace App\models;

class Incidencia{
    public int $id;
    public string $titulo;
    public string $descripcion;
    public string $nivel;
    public bool $resuelta;
    public string $resolucion;
    public int $id_usuario;

    public function __construct(int $id, $titulo, $descripcion, $nivel, $resuelta, $resolucion, $id_usuario){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->nivel = $nivel;
        $this->resuelta = $resuelta;
        $this->resolucion = $resolucion;
        $this->id_usuario = $id_usuario;
    }


}


