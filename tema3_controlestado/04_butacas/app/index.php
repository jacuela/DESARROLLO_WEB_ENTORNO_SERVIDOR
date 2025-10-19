<?php

// Duración en segundos (24 horas = 86400 segundos)
$duracion = 86400;

// Ajustar el tiempo de vida de la cookie de sesión
session_set_cookie_params($duracion);

session_start();
require_once 'includes/funciones.php';


// ============== Configuración inicial ==================
$filas = 3;
$columnas = 4;
$precio_total = 0;

// Si la sesión no existe, creamos todas las butacas como libres (0 = libre, 1 = ocupada)
if (!isset($_SESSION['butacas'])) {
    //$_SESSION['butacas'] = array_fill(1, $filas, array_fill(1, $columnas, 0));

    $butacas = [];
    for ($i = 1; $i <= $filas; $i++) {
        for ($j = 1; $j <= $columnas; $j++) {
            $butacas[$i][$j] = 0;
        }
    }
    $_SESSION['butacas'] = $butacas;

}
// ============== FIN Configuración inicial ==================


// Si se ha hecho clic en una butaca, alternamos su estado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//   print ("<pre>");
// print("Butaca pulsada:<br>");
// print_r($_POST);
// print ("</pre>");
// print ("<hr>");


    $fila = $_POST['fila_seleccionada']; // ?? null;
    $columna = $_POST['columna_seleccionada']; // ?? null;

    //Actualizamos sillas marcadas
    //Esto conmuta entre 0/1 el valor de cada butaca
    if ($_SESSION['butacas'][$fila][$columna]==0){
      $_SESSION['butacas'][$fila][$columna] = 1;
    }
    else{
      $_SESSION['butacas'][$fila][$columna] = 0;
    }
    //otra formas mas corta--->$_SESSION['butacas'][$fila][$columna] = $_SESSION['butacas'][$fila][$columna] ? 0 : 1;
    

    //Calculamos precio total
    $precio_total=calcular_precio($_SESSION['butacas']);

}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butacas</title>
    <link rel="stylesheet" href="assets/css/estilos2.css">
</head>
<body>

<h1>🎥 Vista de Butacas del Cine</h1>

<div class="pantalla">PANTALLA</div>

<!-- Formulario único -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="formButacas">
  <input type="hidden" name="fila_seleccionada" id="fila_seleccionada">
  <input type="hidden" name="columna_seleccionada" id="columna_seleccionada">
</form>

<div class="sala">
  <?php
  for ($f = 1; $f <= $filas; $f++) {
      for ($c = 1; $c <= $columnas; $c++) {
          if ($_SESSION["butacas"][$f][$c] == 0 ){ //butaca libre
            echo "
            <div>
              <img src='assets/asiento-libre.png' class='butaca' data-fila='$f' data-columna='$c'>
            </div>
          ";
          }else{ //butaca ocupada
            echo "
            <div>
              <img src='assets/asiento-ocupado.png' class='butaca' data-fila='$f' data-columna='$c'>
            </div>
          ";
          }
          
      }
  }
  ?>
</div>

<script>
// Al hacer clic en una imagen, guarda el número y envía el formulario
document.querySelectorAll('.butaca').forEach(butaca => {
  butaca.addEventListener('click', () => {
    const fila = butaca.dataset.fila;
    const columna = butaca.dataset.columna;

    console.log("fila:"+fila);
    console.log("columna:"+columna);
        
    document.getElementById('fila_seleccionada').value = fila;
    document.getElementById('columna_seleccionada').value = columna;
    document.getElementById('formButacas').submit();
  });
});
</script>

<div class="leyenda">
  <div class="cuadro" style="background-color:red;"></div> Libre
  <div class="cuadro" style="background-color:yellow; margin-left:15px;"></div> Ocupada
</div>

<h2>PRECIO TOTAL: <?= $precio_total?> €</h2>

<?php

  //----depuracion------
   // ("<pre>");
  // // print("Butaca pulsada:<br>");
  // // print_r($_POST); 
  // // print ("<hr>");

  // print_r($_SESSION); 
  // print("</pre>");
  //------fin depura------      
?>


</body>
</html>