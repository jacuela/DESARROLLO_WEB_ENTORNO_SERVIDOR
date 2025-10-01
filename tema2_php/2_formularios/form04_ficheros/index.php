<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //############################## depuracion
    print "<pre>";
    print "Matriz \$_FILES" . "<br>";
    print_r($_FILES);
    print "</pre>\n";
    //#######################################

    if ($_FILES["fichero"]["size"] > 1000000) {
        $mensaje = "Archivo demasiado grande.";
    }
    else{
      //Tamaño adecuado del archivo 
      $ruta_subida = "bbdd/";
      $res = move_uploaded_file($_FILES["fichero"]["tmp_name"], 
                            $ruta_subida . $_FILES["fichero"]["name"]);

     if ($res){
        $mensaje = "Fichero guardado correctamente";
     }             
     else{
        $mensaje = "Error al guardar el fichero";
     }

    }  

}





?>

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
    <h1>Formulario 04 </h1>
    <p class="centrado">Subida de ficheros</p>
    <br><br>
   
  </header>
  <main>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <fieldset>
           <legend>Subida de archivo</legend>
           <p>Tamaño maximo de 1 MB  
            <input type="file" name="fichero"></p>
            <p><button type="submit" name="submit" value="subirimagen">Subir Imagen</button></p>
    </fieldset>        
    </form>

    <?php
       

    ?>



  </main>
  <footer>
    <hr>
    <p>Autor: Juan Antonio Cuello</p>
  </footer>
</body>

</html>