<?php

function numero_ficheros_directorio($ruta){

    // Obtener todos los elementos (archivos + carpetas)
    $elementos = scandir($ruta);

    // Filtrar solo archivos (quitamos "." y "..")
    $ficheros = array_filter($elementos, function($item) use ($ruta) {
        return is_file($ruta . DIRECTORY_SEPARATOR . $item);
    });

    return count($ficheros);

}

