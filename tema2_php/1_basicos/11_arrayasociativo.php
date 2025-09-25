<?php

//Creamos el array dato a dato
$persona["nombre"] = "Alicia";
$persona["apellidos"] = "Cano Molina";
$persona["edad"] = "24";
$persona["email"] = "alicia@gmail.com";

echo "<pre>";
print_r($persona);
echo "</pre>";


//Datos con una lista
echo "<ul>";
foreach ($persona as $clave => $valor){
    echo "<li>$clave:$valor</li>";
}
echo "</ul>";

//Muestro solo los campos
echo "Lista de campos:<br>";
foreach ($persona as $k => $valor ){
    echo "-$k<br>";
}

//---------------------------
echo "<hr>";

$edades = ["Andres" => 21, "Barbara" => 19, 
            "Camilo" => 15];

 echo "<pre>";
print_r($edades);
echo "</pre>";
           

print "<p>Bárbara tiene $edades[Barbara] años</p>";
print "<p>Camilo tiene {$edades["Camilo"]} años</p>";
print "<p>Andrés tiene " . $edades["Andres"] . " años</p>";

echo "Hay ".count($edades)." personas<br>";

print '<br>';
print "Lista de edades:"."<br>";
foreach ($edades as $valor){
    print "$valor años"."<br>";
}