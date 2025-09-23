<?php
$a = 5;
$b = 10;

echo "Antes del intercambio: a = $a, b = $b<br>";

// Intercambio usando una variable temporal
$temp = $a;
$a = $b;
$b = $temp;

print "Después del intercambio: a = $a, b = $b";

?>