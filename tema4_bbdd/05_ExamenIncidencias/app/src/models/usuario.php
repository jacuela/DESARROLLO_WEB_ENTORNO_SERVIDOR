<?php 

class Usuario{
    public int $id;
    public $nombre;
    public $email;
    public $password;
    public $rol;

    public function __construct(int $id, $nombre, $email, $password, $rol){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->id = $rol;
    }

}


