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

function mayor_numero($lista){
    
    $mayor = $lista[0];
    //$mayor = 0; //puede ser incorrecto si son todos negativos
    foreach ($lista as $value) {
        
        //Compruebo primero que es un numero. Sino, excepcion
        if (!is_integer($value)){
            throw new Exception ("$value NO es un numero entero");
        }
        if ($value > $mayor){
            $mayor = $value;
        }
    }

    return $mayor;

}







