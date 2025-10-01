<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    print "<pre>";
    print_r($_POST);
    print "</pre>\n";

    //Compruebo que existe el campo nombre y que no es vacio
    if (isset($_POST["nombre"]) && $_POST["nombre"]!=""){
        $nombre = trim(htmlspecialchars(strip_tags($_POST["nombre"])));
    }
    else{
        $nombreError = "No se ha escrito ningun nombre";
    }

    //Compruebo que existe el campo edad y que no es vacio
    if (isset($_POST["edad"]) && $_POST["edad"]!=""){
        if (is_numeric($_POST["edad"]) && $_POST["edad"]>0 
            && $_POST["edad"]<150 ){
                $edad = $_POST["edad"];
        }else{
                $edadError = "ERROR: la edad debe ser entre 1 y 150";
        }

    }
    else{
        $edadError = "No se ha indicado la edad";
    }

    //Recojo el sexo
    if (isset($_POST["sexo"]) && $_POST["sexo"] != "") {
        $sexo = $_POST["sexo"];
    } else {
        $sexoERROR = "Hay que escoger un sexo";
    }

    //Recojo las aficiones
    if (isset($_POST["aficiones"])){
        $aficiones = $_POST["aficiones"];     
    }
    else{
        $aficiones = []; //sin aficiones
    }

}

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>form_02</title>
</head>

<body>
  
  <header>
    <h1>Formulario 02</h1>
    <p class="centrado"> El propio form recibe los datos</p>
    <br><br>
   
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
          <p>
          <input type="radio" id="sexo_masculino" name="sexo" value="M">
          <label for="sexo_masculino">MASCULINO</label>
          <input type="radio" id="sexo_femenino" name="sexo" value="F">
          <label for="sexo_femenino">FEMENINO</label>
          <input type="radio" id="sexo_otros" name="sexo" value="O">
          <label for="sexo_otros">OTROS</label>
          </p>

          <p>          
           <input type="checkbox" name="aficiones[]" value="musica"> Musica<br />
           <input type="checkbox" name="aficiones[]" value="cine"> Cine<br />
           <input type="checkbox" name="aficiones[]" value="lectura"> Lectura<br />
          </p>


        </fieldset>

          <p>
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
          </p>
    </form>

    <?php
      if (isset($nombreError)) {
        print "<p class='error'>$nombreError</p>";
      }
      if (isset($edadError)) {
        print "<p class='error'>$edadError</p>";
      }
      if (isset($sexoError)){
        print "<p class='error'>$sexoError</p>";
      }


    ?>
    
    <br><br>
    <div class="datos-recibidos">
      <?php
        //Mostramos los datos
        if (isset($nombre) && isset($edad) && isset($sexo)) {
            print " - Nombre: $nombre" . "<br>";
            print " - Edad: $edad" . "<br>";
            echo (" - Sexo: $sexo"."<br>");
            echo (" - Aficiones:");
            echo ("<ul>");
            foreach ($aficiones as $aficion){
              echo ("<li>$aficion</li>");
            }
            echo ("</ul>");

        }
      ?>
    </div>
    

    
  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>