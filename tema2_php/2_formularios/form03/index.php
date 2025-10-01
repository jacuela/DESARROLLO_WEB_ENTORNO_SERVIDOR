
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>form_03</title>
</head>

<body>
  <header>
    <h1>Formulario 03 </h1>
    <p class="centrado">Saber que botón he pulsado | Enviar valor oculto</p>
    <br><br>
   
  </header>
  <main>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <fieldset>
          <legend>Datos</legend>
          <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
          </p>
          <p>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
          </p>
          <!-- envio un valor oculto que puede ser util para mi, por ejemplo: 
            - id de un producto
            - estado de un proceso
            - etc
            El valor no es realmente secreto, es oculto: cualquiera puede inspeccionarlo y modificarlo antes de enviar.
            Lo comprobamos mirando el html y mirando la pestaña network -> index.php -> payload -> formdata
          -->
          <input type="hidden" name="valoroculto" value="secreto">
        </fieldset>

          <p>
            <button type="submit" name="boton" value="tipo1">Alta tipo1 </button>
            <button type="submit" name="boton" value="tipo2">Alta tipo2</button>
          </p>
    </form>

    <br><br>
    <!-- aqui voy a indicar que botón he pulsado y muestro el valor oculto -->
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      print "<pre>";
      print_r($_POST);
      print "</pre>\n";

      //Indico boton pulsado
      if ($_POST["boton"] == "tipo1") {
        print "<p>He pulsado <strong>Boton Valor1</strong></p>";
      }
      if ($_POST["boton"] == "tipo2") {
        print "<p>He pulsado <strong>Boton Valor2</strong></p>";
      }

    }


    ?>
    
    
  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>