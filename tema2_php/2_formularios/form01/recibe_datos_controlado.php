<?php

## Recogemos los datos con POST, y solo permitimos POST

if ($_SERVER["REQUEST_METHOD"] != "POST"){
    
    echo ("⚠️ Petición no válida (Hay que pasar por el formlario)");
    //Volvemos al formulario
    print "<p><a href='index.html'>Formulario</a></p>";

}
else{
    
    //Compruebo que existe el campo nombre y que no es vacio
    if (isset($_POST["nombre"]) && $_POST["nombre"]!=""){
        //$nombre = $_POST["nombre"];
        $nombre = trim(htmlspecialchars(strip_tags($_POST["nombre"])));
    }
    else{
        $nombreError = "No se ha escrito ningun nombre";
    }

    //Compruebo que existe el campo edad y que no es vacio
    if (isset($_POST["edad"]) && $_POST["edad"]!=""){
        //$edad = $_POST["edad"];
        if (is_numeric($_POST["edad"]) && $_POST["edad"]>0 
            && $_POST["edad"]<150 ){
                $edad = $_POST["edad"];

        }else{
                $edadError = "ERROR: la edad debe ser entre 1 y 150";
        }

        //======= opcion con un patron ========
        //Podria comprobar si es una edad valida, por ejemplo, mayor de 0 y menor de 150
        //con condicionales o con patrones incluso
        //PATRONES PARA 1 o 2 digitos: preg_match("/^[0-9]{1,2}$/", $edad)
        // if (preg_match("/^[0-9]{1,2}$/", $_POST["edad"])){
        //     echo ("regex valido");
        //     $edad = $_POST["edad"]; //aquí no hago comprobación
        // }
        // else {
        //     $edadError = "Formato de edad no valido. Solo dos digitos.";
        // }
        //=====================================

    }
    else{
        $edadError = "No se ha indicado la edad";
    }

    //Muestro datos
    //Primero el nombre
    if (isset($nombre)){
        echo ("Nombre: $nombre <br>");  
    }
    else{
        echo ("ERROR: $nombreError <br>");  
    }

    //Luego la edad
    if (isset($edad)){
        echo ("Edad: $edad <br>");  
    }
    else{
        echo ("ERROR: $edadError <br>");  
    }

    
    //Volvemos al formulario. No seria necesario. Es solo por volver facilmente
    print "<p><a href='index.html'>Formulario</a></p>";














}

