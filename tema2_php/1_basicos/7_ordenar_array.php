<?php
$numeros = [3, 1, 7, 2, 5];

sort($numeros);

foreach ($numeros as $value) {
    echo "$value<br>";
}
print "<pre>";
print_r($numeros);
print "</pre>";

print "<pre>";
var_dump($numeros);
print "</pre>";

?>