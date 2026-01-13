<?php

function conectarBBDD(){
    $host = 'localhost';
    $db   = 'libros_apikey';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode([
            'error' => 'Error de conexión a la base de datos'
        ]);
        exit;
    }

}



//======
// Devuelve el rol de la KEY mandada.
// Hay dos tipos: "ADMIN" y "USUARIO".
// Si mandamos una key invalida, devuelve false;
function obtener_rol($key){
    
    // $host = 'localhost';
    // $db   = 'libros_apikey';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // try {
    //     $pdo = new PDO($dsn, $user, $pass);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // } catch (PDOException $e) {
    //     http_response_code(500);
    //     echo json_encode([
    //         'error' => 'Error de conexión a la base de datos'
    //     ]);
    //     exit;
    // }

    $pdo = conectarBBDD();

    $keyHash = hash('sha256', $key);
  
    $sql = "SELECT rol FROM api_keys WHERE api_key = :api_key";
    
    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
        ':api_key' => $keyHash
        ]);
        $rol = $stmt->fetchColumn();
    
        return $rol;
    }
    catch (PDOException $e){
        //Interesante guardar la excepcion en el log
        http_response_code(500);
        echo json_encode([
            'error' => 'Error de conexión a la base de datos'
        ]);
        exit;
    }
}


function obtenerLibros(){
    
    $pdo = conectarBBDD();

    $sql = "SELECT * FROM libro";

    try{
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $libros;

    }
    catch(PDOException $e){
        //Interesante guardar la excepcion en el log
        http_response_code(500);
        echo json_encode([
            'error' => 'Error de conexión a la base de datos'
        ]);
        exit;
    }

}





