<?php

function obtener_rol($key){

    $host = '127.0.0.1';
    $db = 'libros_apikey';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $motor = 'mysql';

    $dns = "$motor:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dns,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Si llego aquí, me he conectado a la bbdd

        $keyHash = hash('sha256', $key);

        $sql = "SELECT rol FROM api_keys WHERE api_key = :api_key";
        $statement = $pdo->prepare($sql);
        $statement->execute([':api_key' => $keyHash]);
        $rol = $statement->fetchColumn();
       

    }catch(PDOException $e){
        http_response_code(500);
        //MONLOG--->$e]);
        echo json_encode(['error' => 'Error de conexión a la bbdd']);
        die;
    }


    return $rol;

}
