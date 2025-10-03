<?php

$jsonobj = '{ "Marca":"Volvo",
              "Modelo":"XC60",
              "Año":2020
            }';

//====================================================            
//Me creo un array a partir del json
$personasArray = json_decode($jsonobj,true);
print_r ($personasArray);
echo ("<br>El modelo de mi coche es " .$personasArray["Modelo"]);


echo ("<hr>"); //======================================

//Me creo un objeto a partir del json
$personasObj = json_decode($jsonobj);
print_r ($personasObj);
echo ("<br>El modelo de mi coche es " .$personasObj->Modelo);

echo ("<hr>"); //======================================


