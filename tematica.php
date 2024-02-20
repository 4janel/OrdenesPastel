<?php

$lectura = fopen("ordenes/orden.txt","r");

if (!file_exists('ordenes/orden1.txt')) {
    //Copia por si retrocede
    copy('ordenes/orden.txt', 'ordenes/orden1.txt');
}

//Para leer las lineas de orden.txt
while(!feof($lectura)){
    $linea = fgets($lectura,4096);
}

//Si se pulsa el boton agrega tematica
if (isset($_POST['btnorden'])){

        $seleccion1=$_REQUEST['bizcocho'];
        $seleccion2=$_REQUEST['relleno'];
        $seleccion3=$_REQUEST['aditivo'];
        
        if($seleccion1=="" && $seleccion2=="" && $seleccion3==""){
            echo "<script> alert('Ingrese temática');
            window.location='tematica.php'
            </script>";
        } else {
            copy('ordenes/orden.txt', 'ordenes/orden1.txt');
            $modificacion = fopen("ordenes/orden.txt","a+");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"-------------------------------");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"           TEMÁTICA            ");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"-------------------------------");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Bizcocho: $seleccion1");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Relleno: $seleccion2");
            fwrite($modificacion,"\n");
            fwrite($modificacion,"Aditivo: $seleccion3");
            echo "<script> window.location='orden.php'</script>";
        }         
}

//Se borra orden pero conserva la copia por si acaso.
if (isset($_POST['btnregresar'])){
    unlink("ordenes/orden.txt");
    echo "<script> window.location='categoria.html'</script>";
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
    <!--Centra el contenido-->
    <div class="abs-center">  
        <div class="container w-75 mt-5 rounded shadow">
            <div class="row align-items-center">
                <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                    <!--imagen a la izquierda-->
                    <img src="imgs/pasteles.png" alt="pasteles" width="650" height="650">
                </div>
                <div class="col bg-white p-5 rounded-end">
                    <h1 class="fw-bold text-center py-5"><?php echo $linea?></h1>
                    <!--Formulario-->
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                    <div class="mb-4">
                        <label for="text" class="form-label">Sabor del bizcocho</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Bizcocho</label>
                            </div>
                            <!--Opciones bizcocho-->
                            <div class="form-group">
                                <select class="form-control" id="bizcocho" name="bizcocho">
                                    <option selected disabled>Selecciona...</option>
                                    <option value="Vainilla">Vainilla</option>
                                    <option value="Chocolate">Chocolate</option>
                                    <option value="Fresa">Fresa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4"></div>
                    <label for="text" class="form-label">Sabor de relleno</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Relleno</label>
                        </div>
                        <!--Opciones relleno-->
                        <div class="form-group">
                            <select class="form-control" id="relleno" name="relleno">
                                <option selected disabled>Selecciona...</option>
                                <option value="Mermelada">Mermelada</option>
                                <option value="Crema">Crema</option>
                                <option value="Dulce de leche">Dulce de leche</option>
                                <option value="Crema Batida">Crema batida</option>
                                <option value="Chocolate">Chocolate</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4"></div>
                    <label for="text" class="form-label">Aditivo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Aditivo</label>
                        </div>
                        <!--Opciones aditivo-->
                        <div class="form-group">
                            <select class="form-control" id="aditivo" name="aditivo">
                                <option selected disabled>Selecciona...</option>
                                <option value="Azúcar glass">Azúcar glass</option>
                                <option value="Canela">Canela</option>
                                <option value="Frutas mixtas">Frutas mixtas</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="d-grid">
                        <!--boton avanzar orden-->
                        <input type="submit" class="btn btn-dark " role="button" value="Continuar" name="btnorden"></input>
                    </div><br>
                    <div class="d-grid">
                        <!--regresar-->
                        <input type="submit" class="fw-bold rounded shadow btn btn-block" role="button" value="Regresar" name="btnregresar"></input>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>  

</body>
</html>