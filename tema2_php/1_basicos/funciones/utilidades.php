<?php

//Archivo para incluir funciones que seran
//llamadas posteriormente

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





