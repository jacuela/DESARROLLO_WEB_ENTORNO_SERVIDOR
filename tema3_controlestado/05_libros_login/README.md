# LISTADO DE LIBROS CON LOGIN  

Vamos a modificar el ejercicio de la lista de libros (tema2/formularios/form06). Introduciremos nuevas mejoras:

- Hay que loguearse en la app para poder acceder a su operativa, es decir, poder ver el listado y poder incluir un nuevo libro. 
- Al loguearnos, en el menú aparecerá el nombre del usuario logueado y tendremos una opción de CERRAR SESIÓN.
- Vamos a incluir en el listado un botón en cada libro para BORRAR el libro y otro botón para mostrar en grande los datos del libro, la portada. 


## LOGIN
Usaremos sesiones para saber si estamos o no logueados. Guardaremos el usuario logueado en `$_SESSION["usuario"]`. Para simplificar el ejercicio, supondremos que solo hay unas credenciales y son **admin/1234**. Si se intenta acceder a cualquier parte de la app sin estar logueado, nos redirigirá a la pantalla de login.

![menu_sin_login](./imagenes/login.png)


## MENU
Queremos que el menú sea algo parecido a esto. Las opciones de la izquierda podrían ser dos: Listado y Alta. En este ejercicio, solo hay un tipo de menú, puesto que si no estamos logueados, nunca lo veremos. En otras apps, dependiendo de si estamos logueados o de si tenemos un rol u otro, vemos unas u otras opciones. 

```html
<?php if (isset($_SESSION['usuario'])): ?>
      <!-- opciones si estamos logueados --> 
      <li>...</li>
      <li>...</li>
    
<?php endif; ?>
```

![menu_con_login](./imagenes/menu.png)

Podemos dejar la pagina del perfil mínima, en construcción.

![menu_con_login](./imagenes/perfil.png)


## OPCIONAL
Programar tambien una alta de usuarios. 

## BOTON BORRAR
...

## ARCHIVO DE CONFIGURACION
...



## VISTAS

