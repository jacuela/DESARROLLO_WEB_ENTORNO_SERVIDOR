<?php

class Usuario implements JsonSerializable {
    //Propiedades
    

    //Constructor
    

    
    // Método para verificar una contraseña introducida
    

    // Método adicional: calcular edad
    

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