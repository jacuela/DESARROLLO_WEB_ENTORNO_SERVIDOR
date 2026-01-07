# API Libros con apikey
Hacer una api rest para manejar libros (ver el script sql). A la hora de consultar un endpoint, debemos de usar una apikey.
Existen dos roles de apikey:
 - rol *ADMIN*: permite leer y crear libros
 - rol *USUARIO*: permite solo leer libros 

En este ejercicio hay solo dos claves:
 - *clave-usuario*: rol USUARIO
 - *clave-admin*: rol ADMIN


## Endpoint
Para consultar cualquiera de estos 3 endpoint, necesitas clave. Para poder hacer POST, la clave necesita tener el rol de administrador

- GET /api/libros
- GET /api/libros/titulo
- POST /api/libros  

