<?php
$numero = 8;
$factorial = 1;
for ($i = 1; $i <= $numero; $i++) {
    $factorial = $factorial * $i;
    //$factorial *= $i;
}
echo "El factorial de $numero es $factorial";
?>

