<?php

$seleccion=$_REQUEST['tema'];

//Verificar si no está vacio

if($seleccion==""){
    echo "<script> alert('Ingrese temática');
    window.location='categoria.html'
    </script>";
} else {
    
    //Tres pisos
    
    if(isset($_POST['trespisos'])){
        $crear1= fopen("ordenes/orden.txt","a") or die ("No se puede crear el archivo.");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"           CATEGORÍA           ");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"Tres pisos");
        fwrite($crear1,"\n");
        fwrite($crear1,"$seleccion");
        echo "<script> window.location='tematica.php'</script>";
    }
    
    //Dos pisos
    
    if(isset($_POST['dospisos'])){
        $crear1= fopen("ordenes/orden.txt","a") or die ("No se puede crear el archivo.");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"           CATEGORÍA           ");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"Dos pisos");
        fwrite($crear1,"\n");
        fwrite($crear1,"$seleccion");
        echo "<script> window.location='tematica.php'</script>";
    }
    
    //Número tres

    if(isset($_POST['numtres'])){
        $crear1= fopen("ordenes/orden.txt","a") or die ("No se puede crear el archivo.");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"           CATEGORÍA           ");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"Número tres");
        fwrite($crear1,"\n");
        fwrite($crear1,"$seleccion");
        echo "<script> window.location='tematica.php'</script>";
    }
    
    //Número dos
    if(isset($_POST['numdos'])){
        $crear1= fopen("ordenes/orden.txt","a") or die ("No se puede crear el archivo.");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"           CATEGORÍA           ");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"Número dos");
        fwrite($crear1,"\n");
        fwrite($crear1,"$seleccion");
        echo "<script> window.location='tematica.php'</script>";
    }
    
    //Cuadrado
    if(isset($_POST['cuadrado'])){
        $crear1= fopen("ordenes/orden.txt","a") or die ("No se puede crear el archivo.");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"           CATEGORÍA           ");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"Cuadrado");
        fwrite($crear1,"\n");
        fwrite($crear1,"$seleccion");
        echo "<script> window.location='tematica.php'</script>";
    }
    
    //Medio cuadrado
    if(isset($_POST['medcuadro'])){
        $crear1= fopen("ordenes/orden.txt","a") or die ("No se puede crear el archivo.");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"           CATEGORÍA           ");
        fwrite($crear1,"\n");
        fwrite($crear1,"-------------------------------");
        fwrite($crear1,"\n");
        fwrite($crear1,"Medio cuadrado");
        fwrite($crear1,"\n");
        fwrite($crear1,"$seleccion");
        echo "<script> window.location='tematica.php'</script>";
    }

}
?>