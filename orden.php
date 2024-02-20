<?php

if (isset($_POST['btnfin'])){

    //recoge datos

        $seleccion1=$_REQUEST['ocasion'];
        $seleccion2=$_POST['disenio'];
        $seleccion3=$_POST['leyenda'];
        $seleccion4=$_POST['nota'];
        
//Verifica si no esta vacio

        if($seleccion1=="" && $seleccion2=="" && $seleccion3=="" && $seleccion4==""){
            echo "<script> alert('Llene los campos');
            window.location='orden.php'
            </script>";
        } else {
            //AGREGAR ADICIONALES

            $modificacion = fopen("ordenes/orden.txt","a+");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"-------------------------------");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"          ADICIONALES          ");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"-------------------------------");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Ocasión: $seleccion1");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Diseño: $seleccion2");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Leyenda: $seleccion3");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Nota: $seleccion4");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"-------------------------------");
            unlink("ordenes/orden1.txt");
            echo "<script> window.location='fin.php'</script>";
        }         
}

if (isset($_POST['btnregresar'])){
    //guarda copia
    fopen("ordenes/orden.txt","w+");
    copy('ordenes/orden1.txt', 'ordenes/orden.txt');
    echo "<script> window.location='tematica.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <style>
    
    .body {
        background: #ffe259;
        background: linear-gradient(to right, #ffa751, #ffe259);
    }
    .bg{
        background-image: url(imgs/fondo.jpg);
        background-position: center center;
    }
    .abs-center{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 95vh;
    }
    </style>

    <title>Pasteleria</title>
</head>
<body>
    <!--Centra contenido-->
    <div class="abs-center">
        <div class="container w-75 mt-5 rounded shadow">
            <div class="row align-items-center">
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 p-5 rounded">
                    <!--Imagen a la izquierda-->
                    <img src="imgs/ocasiones.png" alt="pasteles" width="600" height="800">
                </div>
                <div class="col bg-white p-5 rounded-end">
                    <h1 class="fw-bold text-center py-5">Adicionales</h1>
                    <!--Formulario-->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <div class="mb-4">
                        <!--Opciones ocasion-->
                        <div class="form-floating">
                            <select class="form-select" name="ocasion" id="ocasion">
                                <option selected disabled>Seleccionar...</option>
                                <option value="Cumpleaños">Cumpleaños</option>
                                <option value="Boda">Boda</option>
                                <option value="Aniversario">Aniversario</option>
                                <option value="Tradicional">Tradicional</option>
                            </select>
                            <label for="floatingSelect">Ocasión</label>
                        </div>
                    </div>
                    <div class="mb-4"></div>
                    <!--Area observaciones-->
                    <label for="text" class="form-label">Observaciones del pedido</label>
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Describa el diseño (opcional)" id="disenio" name="disenio" style="height: 75px"></textarea>
                            <label for="TextDiseño">Diseño</label>
                        </div>
                    </div>
                    <div class="mb-4"></div>
                     <!--Area leyenda-->
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Escriba una leyenda para el pastel (opcional)" id="leyenda" name="leyenda" style="height: 75px"></textarea>
                            <label for="Textleyenda">Leyenda</label>
                        </div>
                    </div>
                    <div class="mb-4"></div>
                     <!--Area Nota-->
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Escriba una nota adicional (opcional)" id="nota" name="nota" style="height: 75px"></textarea>
                            <label for="TextNota">Nota</label>
                        </div>
                    </div><br>
                    <div class="d-grid">
                         <!--Boton para finalizar orden-->
                        <input type="submit" class="btn btn-dark" role="button" value="Terminar Orden" name="btnfin"></input>
                    </div><br>
                    <div class="d-grid">
                         <!--Regresar-->
                        <input type="submit" class="fw-bold rounded shadow btn btn-block" role="button" value="Regresar" name="btnregresar"></input>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>

</body>
</html>