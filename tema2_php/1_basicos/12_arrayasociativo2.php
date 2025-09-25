<?php

//Creamos el array dato a dato
$persona["nombre"] = "Alicia";
$persona["apellidos"] = "Cano Molina";
$persona["edad"] = "24";
$persona["email"] = ["alicia@gmail.com","alicialajefa@gmail.com"];
$persona["calificaciones"]=["Programacion" => 8,"Bases_de_Datos" => 10, "Sostenibilidad" => 10]; 
$persona["calificaciones_extendidas"]=["DAW1" => ["Programacion"=>6,"BBDD"=>4],
                            "DAW2" => ["Servidor"=>10,"Cliente"=>2]];



echo "<pre>";
print_r($persona);
echo "</pre>";

echo "El segundo email de $persona[nombre] es {$persona["email"][1]}";
echo "<br>";
echo "El segundo email de $persona[nombre] es".$persona["email"][1];
echo "<br>";
echo "La nota de programacion es: ".$persona["calificaciones"]["Programacion"];
echo "<br>";
echo "Lista de materias:<br>";
foreach ($persona["calificaciones"] as $materia => $nota){
    echo "------$materia<br>";
}


