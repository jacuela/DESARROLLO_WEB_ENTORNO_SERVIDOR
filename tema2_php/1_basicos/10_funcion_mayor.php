<?php

function mayor($lista){
    $mayor = $lista[0];
    //$mayor = 0; //puede ser incorrecto si son todos negativos
    foreach ($lista as $value) {
        if ($value > $mayor){
            $mayor = $value;
        }
    }

    return $mayor;

}

$lista = [3,6,1,8,9];

echo "El mayor valor es: ".mayor($lista);
