<?php

//Si quiero poder convertir a json el objeto con json_encode puedo:
//- hacer atributos publicos. Sencillo, pero no profesional
//- si los atributos son privados, debo implementar la interfaz JsonSerializable

class Usuario implements JsonSerializable 
{
    private $nombre;
    private $email;
    private $password; //guardaré un hash

    public function __construct($nombre,$email,$password){
        $this->nombre = $nombre;
        $this->email = $email;

        //Password lo guardo codificado
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $passwordHash;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setPassword($password){
        //El password lo guardo codificado
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $passwordHash;
    }

    // Método requerido por JsonSerializable
    public function jsonSerialize():mixed {
        return [
            'nombre' => $this->nombre,
            'email' => $this->email,
            'password' => $this->password
        ];
    }





    
        
    





    
}

