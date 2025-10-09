<?php

//Si quiero poder convertir a json el objeto con json_encode puedo:
//- hacer atributos publicos. Sencillo, pero no profesional
//- si los atributos son privados, debo implementar la interfaz JsonSerializable

class Libro implements JsonSerializable
{
    private $caratula;
    private $titulo;
    private $autor;
    private $generos;
    
    public function __construct($caratula, $titulo, $autor, $generos)
    {
        $this->caratula=$caratula;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->generos = $generos;
    }

    //>>>>>>faltan getter and setter
    

    //Método requerido por JsonSerializable
    public function jsonSerialize():mixed {
        return [
            'caratula' => $this->caratula,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'generos' => $this->generos
        ];
    }

}

