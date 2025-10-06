# EJERCICIO PROPUESTO

# FORMULARIO 6

## Alta y lectura de libros
Hacer una aplicación para dar de alta libros y mostrarlos en una tabla. Los datos se guardarán en formato json dentro de la carpeta `bbdd` y en un archivo `data.json`. Si hubiera una portada del libro, se guardará el nombre de la imagen de la portada el en json y la imagen dentro de la ruta `bbdd/portadas`

La app tendrá dos vistas:
- **alta.php**: mostrará un formulario de alta de un libro. Guardaras el titulo, autor, año, carátula y genero, que puede ser romance, ciencia-ficcion, policiaco, terror, histórico, fantasia. Puede ser de más de un género. La carátura es opcional, y si no se proporciona, se mostrará una imagen genérica.

- **index.php**: mostrará una tabla con los libros de la bbdd, incluida una miniatura de la carátula. Para el género, mostrarlo con un desplegable en la celda de la tabla. 

Ademas, crearas la clase `libro.php` para poder manejar los libros. 


Crearas las siguientes funciones:
- **guardar($libro)**: guarda el objeto libro en la bbdd
- **obtener():$lista_libros**: te devuelve una lista con los libros de la bbdd.


