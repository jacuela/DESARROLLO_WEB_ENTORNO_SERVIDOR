<?php
function esPalindromo($palabra) {
    $palabra = strtolower(str_replace(' ', '', $palabra));
    return $palabra === strrev($palabra);
}

echo esPalindromo("Radar") ? "Es palíndromo" : "No es palíndromo";
?>
