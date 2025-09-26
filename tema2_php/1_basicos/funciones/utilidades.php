<?php



//Archivo para incluir funciones que seran
//llamadas posteriormente

function matriz_a_tabla_html($matriz)
{
    $s = '<table border="1">';

    //Me creo la cabecera
    $s .= '<thead><tr>';
    foreach ($matriz[0] as $key => $value) {
        //print "$key";
        $s .= "<th>$key</th>";
    }
    $s .= '</tr></thead>';

    //Me creo el cuerpo de la tabla
    foreach ($matriz as $r) {
        $s .= '<tr>';
        foreach ($r as $v) {
            $s .= '<td>' . $v . '</td>';
        }
        $s .= '</tr>';
    }
    $s .= '</table>';
    return $s;
}


function lista_a_tabla_html($lista)
{
    $s = '<table border="1">';

    $s .= '<tr>';
    foreach ($lista as $valor) {
        $s .= '<td>' . $valor . '</td>';
    }
    $s .= '</tr></table>';

    $s .= '</table>';
    return $s;
}



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







