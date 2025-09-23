<?php
$mysqli = new mysqli("mysql", "myuser", "mypass", "myapp");

if ($mysqli->connect_error) {
    echo "Error de conexión: " . $mysqli->connect_error;
} else {
    echo "✅ Conexión a MySQL exitosa desde PHP";
}
?>