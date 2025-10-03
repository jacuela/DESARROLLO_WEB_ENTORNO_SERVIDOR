<?php

//Crear JSON a partir de array asociativo unidimensional

$edades = array("Peter" => 35,
                "Zaida" => 38,
                "Joe" => 13);

$json =  json_encode($edades);
echo $json;

echo "<hr>"; //##########################################

// Array de productos en PHP. Array bidimensional.
$productos = [
    ["id" => 1, "nombre" => "Laptop", "precio" => 1200],
    ["id" => 2, "nombre" => "Mouse", "precio" => 20],
    ["id" => 3, "nombre" => "Teclado", "precio" => 50]
];

$json =  json_encode($productos, JSON_PRETTY_PRINT);
//header('Content-Type: application/json');
echo $json;

echo "<hr>"; //##########################################

//Un objeto tambien lo podemos convertie en json
class Persona {
    public $nombre;
    public $apellidos;

    // Constructor
    public function __construct($nombre, $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }
}
// Crear un objeto de tipo Persona
$persona1 = new Persona("Juan", "Marcos Rubio");

// Convertir el objeto a JSON
$json = json_encode($persona1);
echo $json;


echo "<hr>"; //##########################################

//Con atributos privados, json_encode no funciona
class Coche implements JsonSerializable {
    private $marca;
    private $modelo;
    private $year;

    // Constructor
    public function __construct($marca, $modelo, $year) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->year = $year;
    }    

    public function jsonSerialize(): mixed
    {
        //Decidimos como convertimos en json el objeto
        return [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'año' => $this->year
        ];
    }
        
}

$coche1 = new Coche("volvo","xc60",2018);
$json = json_encode($coche1, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
echo $json;


echo "<hr>"; //##########################################



