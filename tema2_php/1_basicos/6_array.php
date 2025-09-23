<?php
$nombres = ["Ana", "Luis", "Carlos", "Marta"];

for ($i=0; $i<count($nombres); $i++) {
    echo "Nombre $i: $nombres[$i] <br>";
}

echo "- - - - - -<br>";

foreach ($nombres as $nombre) {
    echo "$nombre<br>";
}


echo "- - - - - -<br>";

//Creamos array vacio y le añadimos valores
$lista = [];
$lista[] = 34;
$lista[] = "hola";


foreach ($lista as $item) {
    echo "$item<br>";
}



?>