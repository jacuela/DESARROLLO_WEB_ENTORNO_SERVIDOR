<?php
require __DIR__ . "/../vendor/autoload.php";

use App\models\Basedatos;

function manejarRequest($uri, $requestMethod, $param){

    $bd = new Basedatos();

    if (!$bd->estaConectado()){
        //Error de conexion a la bbdd
        http_response_code(500); //header("HTTP/1.1 500 Internal Server Error");
        $respuesta = ['error' => 'No es posible conectar a la base de datos'];
        echo json_encode($respuesta);
        die;
    }

    $partes = explode('/', $uri);
    //print_r($partes);
    //die;

    if ($partes[4] !== 'api' || $partes[5] != 'empleados'){
        //No existe dicho endpoint
        http_response_code(400);
        $respuesta = ['mensaje' => 'No existe el endpoint'];
        echo json_encode($respuesta);
        die;
    }

    //Miramos si hemos pedido usuario
    $userId = $partes[6] ?? null;

    //Router analizador de petición
    switch ($requestMethod){
        case 'GET':
            //---------------------------
            //endpoint /api/empleados/X
            //---------------------------
            if ($userId !== null && $userId != "" ){
                $sql = "SELECT * FROM empleados WHERE id=:id";
                $statement = $bd->get_data($sql,[":id" => $userId]);
                $respuesta = $statement -> fetchAll(PDO::FETCH_ASSOC);

                //Controlo si el empleado existe
                if ($respuesta==[]){
                    http_response_code(404);
                    echo json_encode(["error" => "No existe el objeto con id $userId"]);
                    die;
                }else{
                    http_response_code(200); //header("HTTP/1.1 200 OK");
                    echo json_encode($respuesta);
                    exit();
                }
               
            }
            else{
            //---------------------------
            //endpoint /api/empleados/
            //---------------------------   
                $sql = "SELECT * FROM empleados";
                $statement = $bd->get_data($sql);
                $respuesta = $statement -> fetchAll(PDO::FETCH_ASSOC);
                http_response_code(200);
                echo json_encode($respuesta);
                die;
            }
            break;

        case 'POST':
            //-------------------------------
            //Endpoint POST /api/empleados/
            //-------------------------------
            $data = json_decode(file_get_contents('php://input'), TRUE);    
            
            //....................
            
            break;


        default:
            header("HTTP/1.1 400 Bad Request");
            $respuesta = ['mensaje' => 'No existe el endpoint'];
            echo json_encode($respuesta);
            die;

    }

}


