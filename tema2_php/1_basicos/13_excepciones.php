<?php

function dividir($a, $b){
    if($b ==0){
       throw new Exception ("ERROR: Division por cero");
    }
    return $a/$b;
}

$x = 5;
$y = 0;

try{
    echo "$x dividido entre $y es ".number_format(dividir($x,$y),2);
}
catch(Exception $e){
    echo ($e->getMessage());
}

//----------------------------
echo "<hr>";

require_once ("funciones/utilidades.php");

$lista = [2,3,8,"hola",3];

try{
    echo "El mayor es:".mayor_numero($lista)."<br>";
}
catch (Exception $e){
    echo ($e->getMessage());
}