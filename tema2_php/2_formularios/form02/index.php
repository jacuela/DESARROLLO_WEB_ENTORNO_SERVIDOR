<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>form_02</title>
</head>

<body>
  <h1>####################Incompleto####################</h1>
  <header>
    <h1>Formulario 02 - el form recibe los datos</h1>
  </header>
  <main>
    
    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="index.php" method="post">
        <fieldset>
          <legend>Envio tipo POST</legend>
          <p>
            <!-- al usar <label> y que coincida con el id del <input> correspondiente, permite que al hacer click 
            en el texto del <label>, el cursor se coloque directamente en el campo asociado -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
          </p>
          <p>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
          </p>
        </fieldset>

          <p>
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
          </p>
    </form>


    
    <br><br>
    <div class="datos-recibidos">
      
    </div>
    

    
  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>