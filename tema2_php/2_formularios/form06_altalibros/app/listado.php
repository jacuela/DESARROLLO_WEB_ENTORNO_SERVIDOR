<?php 
 
require_once("includes/funciones.php");

$lista_libros = obtenerLibros();

//print("<pre>");var_dump($lista_libros);print("</pre>")

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Form06</title>
</head>

<body>

    <!-- BEGIN menu.php INCLUDE -->
    <?php include "menu.php"; ?>
    <!-- END menu.php INCLUDE -->

    <main>
        
        <table class="tabla">
        <thead>
            <tr>
               <?php
                
                foreach ($lista_libros[0] as $campo => $value){
                    echo "<th>$campo</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($lista_libros as $fila){
                //print_r($fila);echo("<br>");
                echo "<tr>";
                
                //Caratura
                echo "<td>";
                echo "<img width='50px' src='bbdd/portadas/$fila->caratula'>";
                echo "</td>";

                //Titulo
                echo "<td>";
                echo $fila->titulo;
                echo "</td>";

                //Autor
                echo "<td>";
                echo $fila->autor;
                echo "</td>";
                
                //Genero
                echo "<td>";
                if (is_array($fila->generos)){
                    echo "<select id='genero' name='genero'>";
                    foreach ($fila->generos as $ungenero){
                        echo "<option value='$ungenero'>$ungenero</option>";
                    }
                    echo "</select>"; 
                }else{
                    echo $fila->generos;
                }
                echo "</td>";
                echo "</tr>";
            }    
            ?>
        </tbody>
        </table>  
        

    </main>

    <!-- BEGIN FOOTER INCLUDE -->
    <?php include "footer.php"; ?>
    <!-- END FOOTER INCLUDE -->


</body>

</html>