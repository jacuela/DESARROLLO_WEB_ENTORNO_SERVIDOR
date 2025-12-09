<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: text/plain; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //estraigo solo el path de la URI
$param = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); //estraigo solo los parametros
$requestMethod = $_SERVER["REQUEST_METHOD"];

//echo ($uri);echo ("\n");
//echo ($param);echo ("\n");
//echo ($requestMethod);echo ("\n");

$partes = explode('/', $uri);
//print_r($partes);


if ($partes[4] !== 'api' || $partes[5] != 'empleados'){
    //No existe dicho endpoint
    header("HTTP/1.1 400 Bad Request");
    $respuesta = ['mensaje' => 'No existe el endpoint'];
    echo json_encode($respuesta);
    die;
}

//Miramos si hemos pedido usuario
$userId = $partes[6] ?? null;

// if ($userId == null){
//     echo "no he metido usuario";
// }else{
//     echo ("he pedido el usuario con id $userId");
// }


//Router analizador de petición
switch ($requestMethod){
    case 'GET':
        


    break;

    default:







}




