<?php
$apiUrl = "http://localhost/dwes/tema5_api/1_api_empleados/api/empleados";

$empleados = [];

if (isset($_GET['id']) && $_GET['id'] !== '') {
    // Buscar un empleado por ID
    $json = file_get_contents($apiUrl . "/" . $_GET['id']);
    $empleados = json_decode($json, true);
    //var_dump($empleados);

} else {
    // Obtener todos
    $json = file_get_contents($apiUrl);
    $empleados = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empleados - Frontend PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h1>Listado de empleados</h1>

<form method="get">
    <label>ID empleado:</label>
    <input type="number" name="id">
    <button type="submit">Buscar</button>
    <a href="index.php">Ver todos</a>
</form>

<br>

<table>
    <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Salario</th>
    </tr>

    <?php foreach ($empleados as $emp): ?>
        <?php if ($emp): ?>
        <tr>
            <td><?= $emp['nombre'] ?></td>
            <td><?= $emp['direccion'] ?></td>
            <td><?= $emp['salario'] ?></td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

</body>
</html>