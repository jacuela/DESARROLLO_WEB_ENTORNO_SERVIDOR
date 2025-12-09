DROP DATABASE IF EXISTS empleados_api;
CREATE DATABASE empleados_api CHARACTER SET utf8mb4;
USE empleados_api;


CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `salario` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `empleados` (`nombre`, `direccion`, `salario`) VALUES
('Roland Mendel', 'C/ Araquil, 67, Madrid', 5000),
('Victoria Ashworth', '35 King George, London', 6500),
('Perico el pelos','C/ Los depilados', 20000);






