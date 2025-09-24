# EJERCICIOS BASICOS
🔹 1. Intercambiar valores de dos variables

Escribe un programa que intercambie los valores de dos variables. Muestra los valores antes y después del intercambio.

⸻

🔹 2. Sumar dos números

Crea un programa que defina dos variables numéricas, las sume y muestre el resultado por pantalla.

⸻

🔹 3. Determinar si un número es par o impar

Dado un número, imprime si es par o impar utilizando una estructura condicional if.

⸻

🔹 4. Mostrar los números del 1 al 10

Escribe un programa que imprima los números del 1 al 10 utilizando un bucle for.

⸻

🔹 5. Calcular el factorial de un número

Implementa un programa que calcule el factorial de un número utilizando un bucle.

⸻

🔹 6. Recorrer un array de nombres

Define un array con nombres de personas y recórrelo con un bucle foreach, imprimiendo cada nombre.

Crea un array vacio llamado lista. Posteriormente, añade los valores 34 y "hola". Imprime el array con foreach. 



⸻

🔹 7. Ordenar un array numérico

Crea un array de números desordenados y usa una función nativa de PHP para ordenarlo e imprimir el resultado.

⸻

🔹 8. Crear una función que calcule el cuadrado de un número

Define una función que reciba un número como parámetro y devuelva su cuadrado. Luego, llama a esa función e imprime el resultado.

⸻

🔹 9. Crear una función que determine si una palabra es palíndroma

Haz una función que reciba una palabra y devuelva true si es palíndroma (se lee igual al derecho y al revés), y false si no lo es.

⸻

🔹 10. Crear una función que devuelva el número mayor de un array

Implementa una función que reciba un array de números y devuelva el número más grande del array.

Una vez hecho, mete la función en un archivo llamado utilidades.php dentro de una subcarpeta llamada funciones. Para poder usar la función, debes usar `require_once('funciones/utilidades.php');`


⸻

🔹 11. Almacena en un array asociativo los datos de una persona

Parte1
Guarda el nombre, apellidos, edad y email. Los datos son Alicia Camacho, de 24 años con email alicia.camacho@gmail.com

- Muestra los datos de la persona con una lista sin numerar.
- Muestra solo los campos.

Parte2
Crea un array asociativo con la notación => para almacenar edades de personas. 
Los datos son: Andres de 21 años, Barbara de 19 años y Camilo de 15 años 
Muestra los datos con el siguiente codigo y observa:
 
```php
print "<p>Bárbara tiene $edades[Bárbara] años</p>";
print "<p>Camilo tiene {$edades["Camilo"]} años</p>";
print "<p>Andrés tiene " . $edades["Andrés"] . " años</p>";

```
- Indica cuantas personas tiene el array.
- Muestra solamente la lista de edades.


⸻

🔹 12. Amplia la información de la persona con array de dos dimensiones

Alicia tiene 2 email. El otro es "alicialajefa@gmail.com". El campo email será a su vez un array indexado.

Alicia saca en Programacion un 8 y en Bases de Datos un 10. Guarda la información en un campo llamado calificaciones que será a su vez un array asociativo donde la clave es el nombre de la materia.

Imprime el segundo email de Alicia y una lista con sus calificaciones

Solo para que veas que se puede tener un array de 3 dimensiones. Añade este campo.
```php
$persona["calificaciones_extendidas"]=["DAW1" => ["Programacion"=>6,"BBDD"=>4],
                            "DAW2" => ["Servidor"=>10,"Cliente"=>2]];

```


⸻

🔹 13. Excepciones

Crea una función para dividir dos numeros. Al dividir por cero, creará una nueva excepción. 
Llama a la función y captura la excepción dividendo 5 entre 0. 


⸻

🔹 14. Clases y objetos

Crea la clase personas con los atributos DNI, nombre y apellidos. 
Crea un par de objetos.


⸻

🔹 15. Crear una tabla html

A partir de los datos de un array asociativo de dos dimensiones, crea una tabla con sus datos.

```php
$a = [
    [
        'Nombre' => 'Mauro',
        'Apellido' => 'Chojrin',
        'Correo' => 'mauro.chojrin@leewayweb.com',
    ],
    [
        'Nombre' => 'Alberto',
        'Apellido' => 'Loffatti',
        'Correo' => 'aloffatti@hotmail.com',
    ],
    [
        'Nombre' => 'Foo',
        'Apellido' => 'Bar',
        'Correo' => 'foo_bar@example.com',
    ]
];
```

Para imprimir la cabecera de forma totalmente automática extrayendo el nombre de los campos de los datos:

```php
    //OPCION1
    <?php
        foreach ($a[0] as $key => $value){
            echo "<th>$key</th>";
        }
    ?>
```

```php
    //OPCION 2 que puede que veais
    <?php
        foreach ($a[0] as $key => $value){
    ?>
            <th><?php echo $key ?></th>
    <?php    
        }
    ?>
```


⸻

🔹 16. Crear una tabla html usando una función

Mismo ejercicio que el anterior, pero usando una función. La función la debes definir en un archivo utilidades.php dentro de una subcarpeta llamada funciones. Para poder usar la función, debes usar `require_once('funciones/utilidades.php');`

```php
function matriz_a_tabla_html($matriz)
{
    ...
}
```

Ejemplo para una lista

```php

$lista = [2, 6, 6, 5, 1, 0, 3, 4, 5];
function lista_a_tabla_html($lista)
{
    $s = '<table border="1">';

    $s .= '<tr>';
    foreach ($lista as $valor) {
        $s .= '<td>' . $valor . '</td>';
    }
    $s .= '</tr></table>';

    $s .= '</table>';
    return $s;
}
```
