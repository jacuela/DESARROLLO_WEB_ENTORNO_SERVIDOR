-- Borrar la base de datos si existe para empezar de nuev o
DROP DATABASE IF EXISTS gestorincidencias_db;

-- Crear base de datos
CREATE DATABASE gestorincidencias_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE gestorincidencias_db;

-- -------------------------------------------------
-- TABLA USUARIOS (incluye administrador)
-- -------------------------------------------------
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('usuario', 'admin') NOT NULL DEFAULT 'usuario'
);

-- -------------------------------------------------
-- TABLA INCIDENCIAS
-- -------------------------------------------------
CREATE TABLE incidencia (
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
        ON DELETE CASCADE
);

-- -------------------------------------------------
-- INSERTAR ADMIN (contraseña "toor" encriptada)
-- -------------------------------------------------
INSERT INTO usuario (nombre, email, password, rol)
VALUES (
    'admin',
    'admin@kk.com',
    '$2y$10$Zo0hJoI0LjyUwr.yn3KjNOMvzwNfyPmxPIaht2mhEKr4yHjWdKame',
    'admin'
);

INSERT INTO usuario (nombre, email, password, rol)
VALUES (
    'Son Goku',
    'goku@kk.com',
    '$2y$10$DY/RWCcsDpq6UQxBeX54NOBat8hnX/NqpsQvhzpa47kgb47E03.FG',
    'usuario'
);



-- ALGUNAS INCIDENCIAS

TRUNCATE TABLE incidencia; -- PARA BORRARLAS Y RESETEAR LOS IDS

INSERT INTO incidencia (titulo, descripcion, nivel, id_usuario)
VALUES (
    'Prueba de admin sin resolver',
    'Esta es una indicencia de prueba del usuario administrador sin resolver.',
    'normal',
    '1'
);

INSERT INTO incidencia (titulo, descripcion, nivel, id_usuario)
VALUES (
    'No imprime',
    'La impresora de la sala de profesores no imprime.',
    'urgente',
    '2'
);

INSERT INTO incidencia (titulo, descripcion, nivel,resuelta,resolucion,id_usuario)
VALUES (
    'Prueba de admin resuelta',
    'Esta es una indicencia de prueba del usuario administrador pero resuela.',
    'normal',
    true,
    'se ha resuelto correctamente por el administrador',
    '1'
);


INSERT INTO incidencia (titulo, descripcion, nivel,resuelta,resolucion,id_usuario)
VALUES (
    'Ausencia de corriente A005',
    'No hay corriente en el aula. No se pueden acceder a los ordenadores.',
    'urgente',
    true,
    'Se han subido los automaticos que hay en la sala contigua a aseo de chicas',
    '2'
);

INSERT INTO incidencia (titulo, descripcion, nivel, id_usuario)
VALUES (
    'Ventilador no funciona',
    'El ventilador de la sala profesores no se enciende.',
    'normal',
    '2'
);


