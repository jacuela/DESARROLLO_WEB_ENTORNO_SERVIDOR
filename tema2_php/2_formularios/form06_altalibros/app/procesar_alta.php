<?php
require_once("includes/funciones.php");
require_once("modelo/libro.php");

// print "<pre>";
//     print "Matriz \$_FILES" . "<br>";
//     print_r($_FILES);
//     print_r($_REQUEST);
//     print "</pre>\n";
    

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    die;
}
else{

    $mensaje = "";

    //Procesamos el TITULO
    $titulo = recoge("titulo");
    if (is_null($titulo)) {
            $mensaje = "Titulo no puede estar vacio";
            header("Location: alta-libro.php?mensaje=$mensaje");
            die;
    } 

    //Procesamos el AUTOR
    $autor = recoge("autor");
    if (is_null($autor)) {
        $mensaje = "Autor no puede estar vacio";
        header("Location: alta-libro.php?mensaje=$mensaje");
        die;
    } 

    //Procesamos los GENEROS
    if (isset($_POST["generos"])) {
        $generos = $_POST["generos"];
    }
    else {
      $mensaje = "Debes seleccionar al menos 1 genero";
      header("Location: alta-libro.php?mensaje=$mensaje");
      die;  
    }
  
    //Procesamos la CARATULA
    if ($_FILES["caratula"]["name"]!="") {
        $ruta_subida = "bbdd/portadas/";
        $res = move_uploaded_file($_FILES["caratula"]["tmp_name"], $ruta_subida . $_FILES["caratula"]["name"]);
        
        $caratula = $_FILES["caratula"]["name"];
        
        if (!$res) {
            $mensaje = "Error al guardar fichero<br>";
            echo ($mensaje);
            //header("Location: alta-libro.php?mensaje=$mensaje");
            
        }
    }else{
         $caratula = "generica.png";

    }
    
    //===== DATOS CORRECTOS ==================
       
    $libro = new Libro($caratula,$titulo,$autor,$generos);
    guardar($libro);

    
    header("Location: listado.php");
    die;
}



