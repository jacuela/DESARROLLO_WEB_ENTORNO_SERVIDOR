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


## Cifrado de claves
Las claves deben guardarse en la bbdd cifradas, mediante hash. El lugar de usar `password_hash()` y `password_verify()`, que es no determinista, vamos a usar `hash()` que es determinista y produce el mismo hash cada vez.

```php
//Creamos el hash de la key, con 64 caracteres (256 bits)
$keyHash = hash('sha256', $key);
```



