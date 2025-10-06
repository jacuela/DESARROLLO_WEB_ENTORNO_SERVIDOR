# FORMULARIO 6

## Alta y lectura de libros
Hacer una aplicación para dar de alta libros y mostrarlos en una tabla. Los datos se guardarán en formato json en el archivo `data.json`


La app tendrá dos vistas:
- **alta.php**: mostrará un formulario de alta de un libro. Guardaras el titulo, autor, año y  genero, que puede ser romance, ciencia-ficcion, policiaco, terror, histórico, fantasia. Puede ser de más de un género.

- **index.php**: mostrará una tabla con los libros de la bbdd. Para el género, mostrarlo con un desplegable en la celda de la tabla. 

Ademas, crearas la clase `libro.php` para poder crear objetos. 

Crearas las siguientes funciones:
- **guardar($libro)**: guarda el objeto libro en la bbdd
- **obtener():$lista_libros**: te devuelve una lista con los libros de la bbdd.



