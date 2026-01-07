DROP DATABASE IF EXISTS libros_apikey;
CREATE DATABASE libros_apikey CHARACTER SET utf8mb4;
USE libros_apikey;

CREATE TABLE libro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL
);


CREATE TABLE api_keys (
    api_key CHAR(64) PRIMARY KEY,   -- hash SHA-256
    rol ENUM('ADMIN', 'USUARIO') NOT NULL,
    creada_en DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO libro (titulo, autor, genero) VALUES
('1984', 'George Orwell', 'Distopía'),
('El Quijote', 'Miguel de Cervantes', 'Novela'),
('Cien años de soledad', 'Gabriel García Márquez', 'Realismo mágico'),
('La sombra del viento', 'Carlos Ruiz Zafón', 'Misterio'),
('El señor de los anillos', 'J. R. R. Tolkien', 'Fantasía');


INSERT INTO api_keys (api_key, rol) VALUES
(SHA2('clave-admin', 256), 'ADMIN'),
(SHA2('clave-usuario', 256), 'USUARIO');




