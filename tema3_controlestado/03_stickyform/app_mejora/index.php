<?php

session_start();
require_once('./includes/funciones.php');

// print ("<pre>");
// print_r($_SESSION);
// print("</pre>");

$aficiones = $_SESSION["aficiones"] ?? [];

//var_dump ($aficiones);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css" title="Color">
  <title>03</title>
</head>

<body class="body-tipo1">
  <header>
    <h1>3 Sticky form</h1>
  </header>
  <main>
 
    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="procesar.php" method="post">
      <p>Nombre: <input type="text" name="nombre" value="<?php echo !empty($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>"></p>
      <p>Edad: <input type="text" name="edad" value="<?php echo !empty($_SESSION['edad']) ? $_SESSION['edad'] : ''; ?>"></p>
      </p>
      
        <p>
        <input type="radio" id="sexo_masculino" name="sexo" value="M" <?php echo isset($_SESSION['sexo']) && $_SESSION['sexo']=="M" ? "checked" : ""; ?> >
        <label for="sexo_masculino">MASCULINO</label>
        <input type="radio" id="sexo_femenino" name="sexo" value="F" <?php echo isset($_SESSION['sexo']) && $_SESSION['sexo']=="F" ? "checked" : ""; ?>>
        <label for="sexo_femenino">FEMENINO</label>
        <input type="radio" id="sexo_otros" name="sexo" value="O" <?php echo isset($_SESSION['sexo']) && $_SESSION['sexo']=="O" ? "checked" : ""; ?>>
        <label for="sexo_otros">OTROS</label>
        </p>

        <p>          
        <input type="checkbox" name="aficiones[]" value="musica" <?php if(in_array("musica",$aficiones)) echo "checked"; ?> > Musica<br />
        <input type="checkbox" name="aficiones[]" value="cine" <?php if(in_array("cine",$aficiones)) echo "checked"; ?>> Cine<br />
        <input type="checkbox" name="aficiones[]" value="lectura" <?php if(in_array("lectura",$aficiones)) echo "checked"; ?>> Lectura<br />
        </p>


        <p><input type="submit" name="submit" value="Enviar"></p>

    </form>

    <?php

    if (isset($_SESSION["error"]["nombre"])) {
      print "<p class='error'>".$_SESSION["error"]["nombre"]."</p>";
      
    }
    if (isset($_SESSION["error"]["edad"])) {
      print "<p class='error'>".$_SESSION["error"]["edad"]."</p>";
    }

    if (isset($_SESSION["error"]["sexo"])) {
      print "<p class='error'>".$_SESSION["error"]["sexo"]."</p>";
    }

    //Debemos resetear los errores despues de mostrarlos. Tambien los datos
    unset ($_SESSION["error"]["nombre"]);
    unset ($_SESSION["error"]["edad"]);
    unset ($_SESSION["error"]["sexo"]);

    //-----> mejor esto ---> unset ($_SESSION["error"]);

    //Tambien los datos correctos. Ya los he puesto en el form.
    unset ($_SESSION["nombre"]);
    unset ($_SESSION["edad"]);
    unset ($_SESSION["sexo"]);
    unset ($_SESSION["aficiones"]);
    
    
    ?>

  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>



