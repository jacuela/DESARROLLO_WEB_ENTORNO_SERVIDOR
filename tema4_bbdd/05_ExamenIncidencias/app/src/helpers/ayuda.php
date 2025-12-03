<?php 
require __DIR__ . "/../../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\models\Basedatos;


function nombre_dado_id($id){
    $db = new Basedatos();
    $sql = "SELECT nombre FROM usuario WHERE id=:id";
    $stmt_nombre = $db->get_data($sql, [":id" => $id]);

    $registro = $stmt_nombre -> fetch(PDO::FETCH_OBJ);
    return $registro->nombre;
 
}

//Funcion para meter mensajes en el log
// enviar_log("messaje de error", "error")
// enviar_log("messaje de info", "info")
function enviar_log($mensaje,$tipo){
    $log = new Logger('app');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../../app.log'));   

    if ($tipo === "error"){
        $log->error($mensaje);
    }
    if ($tipo === "info"){
         $log->info($mensaje);
    }

}


