<?php

//=============== AYUDA ========================================

// // Consultas a realizar
// $sqlTotal = "SELECT COUNT(*) FROM incidencia";
// $sqlResueltas = "SELECT COUNT(*) FROM incidencia WHERE resuelta = 1";
// $sqlSinResolver = "SELECT COUNT(*) FROM incidencia WHERE resuelta = 0";

// //Leer un valor devuelto por una consulta tipo COUNT(*)
// $statement = $db->consulta($sql);
// $valor = $statement->fetchColumn();

// //Tambien se puede concatenar la llamada
// $valor = $db->consulta($sql)->fetchColumn();



//==============================================================


// HTML para el PDF
$html = "
<h1 style='text-align:center;'>Estadísticas de Incidencias</h1>
<hr>

<h3>Total de incidencias: <strong>$total</strong></h3>
<h3>Resueltas: <strong style='color:green;'>$resueltas</strong></h3>
<h3>Sin resolver: <strong style='color:red;'>$sinResolver</strong></h3>

<br><br>
<p>Generado automáticamente por el sistema Gestor de Incidencias.</p>
";


// Crear el PDF
//1.crear al objeto
//2.llamar a writeHTML con el html a generar
//3.mostrar el pdf. Hazo así con estos parámetros
$mpdf->Output("estadisticas_incidencias.pdf", "I"); // I = inline (en el navegador)

