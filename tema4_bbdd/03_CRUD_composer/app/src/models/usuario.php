<?php
namespace App\models;

use DateTime;
use JsonSerializable;

class Usuario implements JsonSerializable {
    //Propiedades
    private int | null $id;            //Puede ser int o null, en PHP7, ?int
    private string $nombre;
    private string $apellidos;
    private string $usuario;
    private string | null $password;   //Se guarda cifrado
    private DateTime $fecha_nac;

    //Constructor
    public function __construct(int | null $id, string $nombre, string $apellidos, string $usuario, string | null $passwordCifrado, DateTime $fecha_nac) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->usuario = $usuario;
        $this->password = $passwordCifrado; 
        $this->fecha_nac = $fecha_nac;
    }   

    //Magic method
    public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Método para verificar una contraseña introducida
    public function verificarPassword(string $passwordPlano): bool {
        return password_verify($passwordPlano, $this->password);
    }

    // Método adicional: calcular edad
    public function getEdad(): int {
        $hoy = new DateTime();
        return $hoy->diff($this->fecha_nac)->y;
    }

    // Implementación de JsonSerializable
    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'usuario' => $this->usuario,
            'fecha_nac' => $this->fecha_nac->format('d/m/Y')
            //'edad' => $this->getEdad()
            //Tampoco metemos el password por seguridad
        ];
    }


} //fin clase Usuario


?>