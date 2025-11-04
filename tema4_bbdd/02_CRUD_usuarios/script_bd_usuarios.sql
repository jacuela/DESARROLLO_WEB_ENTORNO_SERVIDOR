DROP DATABASE IF EXISTS usuariosDB;
CREATE DATABASE usuariosDB CHARACTER SET utf8mb4;
USE usuariosDB;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT "no-password",
  `fecha_nac` datetime NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO usuarios (nombre, apellidos, usuario, fecha_nac) VALUES
('María', 'Gómez Ruiz', 'm.gomez', '1990-03-12'),
('Carlos', 'Fernández López', 'c.fernandez', '1985-07-25'),
('Lucía', 'Martínez Díaz', 'l.martinez', '1992-11-08'),
('Andrés', 'Sánchez Ortega', 'a.sanchez', '1998-04-17'),
('Elena', 'Torres Navarro', 'e.torres', '2000-01-30');

