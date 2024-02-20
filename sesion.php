<?php
//recibiendo valores de index.html
$codigo=$_POST["codigov"];

//Para verificar el codigo ingresado

switch ($codigo) {
    case "manuel":
        echo "<script> window.location='categoria.html'
        </script>";
    break;
    default:
        echo "<script> alert('Datos Invalidos');
        window.location='index.html'
        </script>";
    break;
} 

?>