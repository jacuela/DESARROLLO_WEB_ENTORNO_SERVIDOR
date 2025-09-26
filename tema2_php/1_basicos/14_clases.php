<?php

class Persona {
    private $DNI;
    private $nombre;
    private $apellidos;

    function __construct($DNI,$nombre,$apellidos){
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function __toString()
    {
       return "Persona: $this->nombre $this->apellidos &nbsp&nbsp[DNI:$this->DNI]";  
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getApellidos(){
        return $this->apellidos;
    }

    public function getDNI(){
        return $this->DNI;
    }
}

//Me creo una persona
$per = new Persona("11111111A","Ana","Maluca");
echo ($per)."<br>";

$per->setNombre("Manolo");
echo ($per)."<br>";

print("<pre>"); 
print_r($per);

