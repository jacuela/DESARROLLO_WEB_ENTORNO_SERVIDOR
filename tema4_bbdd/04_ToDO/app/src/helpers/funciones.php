<?php 

/**
 * Limpia un texto de entrada y lo formatea:
 */
function depurarTexto(string $texto): string
{
    // 1️⃣ Elimina etiquetas HTML
    $texto = strip_tags($texto);

    // 2️⃣ Elimina espacios en blanco al principio y al final
    $texto = trim($texto);

    // 3️⃣ Convierte a minúsculas
    $texto = strtolower($texto);

    // 4️⃣ Pone la primera letra en mayúsculas
    $texto = ucfirst($texto);

    // 5️⃣ Convierte caracteres especiales a entidades HTML
    //$texto = htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');

    // 6️⃣ Reemplazar múltiples espacios por uno solo
    $texto = preg_replace('/\s+/', ' ', $texto);

    
    return $texto;
}
