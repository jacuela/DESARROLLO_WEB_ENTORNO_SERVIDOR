<?php


function calcular_precio($butacas){
    $preciobutaca=10;   //10€
    $totalbutacas = 0;
    foreach ($butacas as $fila){
        foreach ($fila as $valor){
            if ($valor==1){
                $totalbutacas++;
            }
        }
    }
    //echo ("totalbutacas:$totalbutacas");
    return $totalbutacas*$preciobutaca;



}