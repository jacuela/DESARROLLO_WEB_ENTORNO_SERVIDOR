<?php


function manejarRequest($uri, $requestMethod, $param){

    $partes = explode('/', $uri);
    print_r($partes);
    die;

    if ($partes[4] !== 'api' || $partes[5] != 'empleados'){
        //No existe dicho endpoint
        header("HTTP/1.1 400 Bad Request");
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
            if ($userId !== null){

                header("HTTP/1.1 200 OK");
                $respuesta = ["mensaje" => "Mando al empleado $userId"];
                echo json_encode($respuesta);
                die;
            }
            else{
            //---------------------------
            //endpoint /api/empleados/
            //---------------------------   
                header("HTTP/1.1 200 OK");
                $respuesta = ["mensaje" => "Mando todos los empleados"];
                echo json_encode($respuesta);
                die;
            }
            break;

        default:
            header("HTTP/1.1 400 Bad Request");
            $respuesta = ['mensaje' => 'No existe el endpoint'];
            echo json_encode($respuesta);
            die;

    }

}


