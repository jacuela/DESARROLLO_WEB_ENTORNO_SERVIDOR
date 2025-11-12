DROP DATABASE IF EXISTS todo_db;

CREATE DATABASE todo_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE todo_db;

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(255) NOT NULL,
    completada BOOLEAN DEFAULT FALSE,
    fecha_creacion DATETIME DEFAULT CURRENT_DATE
);

INSERT INTO tareas (descripcion, completada, fecha_creacion)
VALUES ('tarea de prueba', FALSE, '2000-01-01');