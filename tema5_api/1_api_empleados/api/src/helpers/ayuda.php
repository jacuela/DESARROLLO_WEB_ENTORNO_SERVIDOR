<?php

require __DIR__ . "/../../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


//Funcion para meter mensajes en el log
// enviar_log("messaje de error", "error")
// enviar_log("messaje de info", "info")
function enviar_log($mensaje,$tipo){
    $log = new Logger('API');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../../app.log'));   

    if ($tipo === "error"){
        $log->error($mensaje);
    }
    if ($tipo === "info"){
         $log->info($mensaje);
    }

}


