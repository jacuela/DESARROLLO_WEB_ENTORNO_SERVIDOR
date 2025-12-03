<?php

// 🔹 Cargar configuración desde JSON


//DSN ejemplo sin indicar la base datos: 'mysql:host=localhost;charset=utf8mb4'


try{
    $conexionPDO = new PDO($dsn, $user, $password);
    $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexionPDO->exec("DROP DATABASE IF EXISTS $database");

    $conexionPDO->exec("CREATE DATABASE $database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $conexionPDO->exec("USE $database");

    $conexionPDO->exec("CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('usuario', 'admin') NOT NULL DEFAULT 'usuario')"
    );


    $conexionPDO->exec("CREATE TABLE incidencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    nivel ENUM('normal', 'urgente') NOT NULL DEFAULT 'normal',
    resuelta BOOLEAN DEFAULT false,
    resolucion VARCHAR(400) DEFAULT 'sin resolver',
    id_usuario INT NOT NULL,

    CONSTRAINT fk_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuario(id)
        ON DELETE CASCADE)"
    );


    $conexionPDO->exec("INSERT INTO usuario (nombre, email, password, rol)
VALUES (
    'admin',
    'admin@kk.com',
    '$2y$10\$Zo0hJoI0LjyUwr.yn3KjNOMvzwNfyPmxPIaht2mhEKr4yHjWdKame',
    'admin')"
);

    $conexionPDO->exec("INSERT INTO usuario (nombre, email, password, rol)
VALUES (
    'Son Goku',
    'goku@kk.com',
    '$2y$10\$DY/RWCcsDpq6UQxBeX54NOBat8hnX/NqpsQvhzpa47kgb47E03.FG',
    'usuario')"
    );

    $conexionPDO->exec("TRUNCATE TABLE incidencia");

    $conexionPDO->exec("INSERT INTO incidencia (titulo, descripcion, nivel, id_usuario)
VALUES (
    'Prueba de admin sin resolver',
    'Esta es una indicencia de prueba del usuario administrador sin resolver.',
    'normal',
    '1'
)");
    
    $conexionPDO->exec("INSERT INTO incidencia (titulo, descripcion, nivel, id_usuario)
VALUES (
    'No imprime',
    'La impresora de la sala de profesores no imprime.',
    'urgente',
    '2'
)");

$conexionPDO->exec("INSERT INTO incidencia (titulo, descripcion, nivel,resuelta,resolucion,id_usuario)
VALUES (
    'Prueba de admin resuelta',
    'Esta es una indicencia de prueba del usuario administrador pero resuela.',
    'normal',
    true,
    'se ha resuelto correctamente por el administrador',
    '1'
)");

    $conexionPDO->exec("INSERT INTO incidencia (titulo, descripcion, nivel,resuelta,resolucion,id_usuario)
VALUES (
    'Ausencia de corriente A005',
    'No hay corriente en el aula. No se pueden acceder a los ordenadores.',
    'urgente',
    true,
    'Se han subido los automaticos que hay en la sala contigua a aseo de chicas',
    '2'
)");
    $conexionPDO->exec("INSERT INTO incidencia (titulo, descripcion, nivel, id_usuario)
VALUES (
    'Ventilador no funciona.',
    'El ventilador de la sala profesores no se enciende.',
    'normal',
    '2'
)");

    //Log con exito
    

    header("Location: ../../index.php");
    die;
}
catch (PDOException $e){
     //Log con el fallo


}
