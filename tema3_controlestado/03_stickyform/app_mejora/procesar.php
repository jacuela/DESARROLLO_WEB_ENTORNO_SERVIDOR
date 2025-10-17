<?php

session_start();
require_once "includes/funciones.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {    //hemos pulsado
  //if (isset($_POST["submit"])){print("he pulsado");}

  $OK = true;

  //Tratamiendo del nombre
  $nombre = recoge("nombre");
  if (is_null($nombre)) {
    $_SESSION["error"]["nombre"] = "Falta el nombre";
    $OK = false;
  } else {
    $_SESSION["nombre"] = $nombre;
  }

  //Recojo la edad 
  $edad = recoge("edad");
  if (is_null($edad)) {
    $_SESSION["error"]["edad"] = "Falta la edad";
    $OK = false;
  } elseif (!is_numeric($edad)) {
    $_SESSION["error"]["edad"] = "Edad debe ser un numero";
    $OK = false;
  } else {
    $_SESSION["edad"] = $edad;
  }


  //Recojo el sexo
  if (isset($_POST["sexo"]) && $_POST["sexo"] != "") {
      $sexo = $_POST["sexo"];
      $_SESSION["sexo"] = $sexo;

  } else {
      $_SESSION["error"]["sexo"]= "Hay que escoger un sexo";
      $OK = false;
  }


  //Recojo las aficiones
  if (isset($_POST["aficiones"])){
      $aficiones = $_POST["aficiones"]; 
      $_SESSION["aficiones"] = $aficiones;    
  }
  else{
      $aficiones = []; //sin aficiones
      $_SESSION["aficiones"]=$aficiones; //me creo el dato vacio pq es mas fácil de comprobar
                                        //en el formulario

  }


  //Despues de recoger datos, compruebo si todo OK
  if ($OK) {
    //Por seguridad, puedo volver a resetear error
    unset ($_SESSION["error"]); 
    header("Location: mostrardatos.php");
  }
  else{
    header("Location: index.php");
  }
}





