<?php
require_once __DIR__ . "/includes/funciones.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header("Content-Type: text/plain; charset=UTF-8");

header("Access-Control-Allow-Methods: GET,POST,DELETE");
header("Access-Control-Max-Age: 3400");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //estraigo solo el path de la URI
$param = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); //estraigo solo los parametros
$requestMethod = $_SERVER["REQUEST_METHOD"];

$headers = apache_request_headers(); //un alias: getallheaders()

$keyRecibida = $headers["x-API-key"] ?? ""; //recoger la api key

$rol = obtener_rol($keyRecibida);

if (!$rol){
    http_response_code(401);
    echo json_encode(['error' => 'API Key no válida']);
    exit;
}

/////// ----- RUTEO ------
$partes = explode ('/', $uri);

if ($partes[4] !== 'api' || $partes[5] != 'libros'){
    //No existe dicho enpoint
    http_response_code(400);
    $respuesta = ['mensaje' => 'No existe el endpoint'];
    echo json_encode($respuesta);
    die;
}

//Miramos si hemos pedido usuario
$titulo = $partes[6] ?? null;
$titulo = urldecode($titulo); //la usamosa para que coja bien los espacios


var_dump($titulo);
die;


switch ($requestMethod){
    case 'GET':
        if ($titulo == null){
            //endpoint GET /api/libros
            $libros = obtenerLibros();
            http_response_code(200);
            echo json_encode($libros);
            die;
        }
        else{
          //endpoint GET /api/libros/titulo  

        }

        break;
    case 'POST':
        if ($rol === "ADMIN"){
            //endpoint POST /api/libros/
            $data = json_decode(file_get_contents('php://input'), TRUE);  
            if (insertarLibro($data)){
                $respuesta = ['mensaje' => "Libro añadido."];
                http_response_code(201);
                echo json_encode($respuesta);
            }
        }
        else{
            $respuesta = ['error' => 'No tienes permiso para añadir libro. Peinate socio!'];
            http_response_code(400);
            echo json_encode($respuesta);
            exit();
        }
        break;    
}    

