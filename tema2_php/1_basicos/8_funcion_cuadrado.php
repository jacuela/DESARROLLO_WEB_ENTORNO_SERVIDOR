<?php

$valor = 5;
echo "El cuadrado de $valor es ".cuadrado($valor);


function cuadrado ($numero){
    return $numero * $numero;
}

function cuadrado2 (int $numero):int{
    return $numero * $numero;
}


echo "<br>";

echo "El cuadrado de $valor es ".cuadrado2($valor);

