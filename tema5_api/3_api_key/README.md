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
Las claves estarán en la bbdd cifradas, mediante hash.  En el ejercicio no hay que crear nuevas claves, están ya creadas.

El lugar de usar `password_hash()` y `password_verify()`, que es no determinista, vamos a usar `hash()` que es determinista y produce el mismo hash cada vez. Esto nos va a ayudar a buscar la key enviada en la cabecera para saber el rol.

```php
//Creamos el hash de la key, con 64 caracteres (256 bits)
$keyHash = hash('sha256', $key);
```


## Obtener libros por título
Hay que llevar cuidado con dos aspectos al intentar obtener libros por un título:
- si el título tiene espacios, el espacio se envía como %20. Hay que depurar esto. Por ejemplo, el endpoint "/api/libros/señor de los"
```php
$titulo = urldecode($titulo); //para que coja bien los espacios
```

- a la hora de usar el LIKE en la consulta SQL, si queremos buscar un patrón en el título, hay que llevar cuidado en como usar los %.
```php
$titulo = "%$titulo%";
$sql = "SELECT * FROM libro WHERE titulo LIKE :titulo";
...
$stmt->execute([":titulo" => $titulo]);
```

