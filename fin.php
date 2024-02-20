<?php

  //HORA PARA NOMBRE ARCHIVO
  date_default_timezone_set('America/Guatemala');    
  $hora = date('j-m-Y G;i;s', time());  

    //CÓDIGO PARA MOSTRAR EL CONTENIDO
    $abrirlectura= fopen("ordenes/orden.txt","r");
    $mostrarcontenido= fread($abrirlectura,filesize("ordenes/orden.txt"));

    if(isset($_POST['generar'])){

      $nombre=$_POST['nombre'];
      
      //Si no se ingresó nombre
      if($nombre==""){
        echo "<script> alert('Ingrese un nombre para la orden');
        </script>";
      } else {

        //Dar nombre con fecha
        $generado=$nombre." ".$hora;

        if(!file_exists("$generado")){
          $fuente="ordenes/orden.txt";
          $folder="ordenes/";
          $nuevo=$generado.".txt";
          touch($folder.$nuevo);
          copy($fuente,$folder.$nuevo);
          unlink("ordenes/orden.txt");
          echo "<script> alert('Se ha guardado la orden.');
          window.location='categoria.html'
          </script>";
        }

      }
    }

    //Opcion salir sin guardar
    if(isset($_POST['btnotra'])){
      unlink("ordenes/orden.txt");
      echo "<script> alert('Ha cerrado sesión.');
          window.location='index.html'
          </script>";
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
    <title>Pastelería</title>
</head>
<body>

<section>
<!--Contenedor gris-->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <!--Texto orden lista-->
          <h1 class="my-5 display-3 fw-bold ls-tight">¡La orden está<br/>
            <span class="text-primary">lista!</span>
          </h1>
          <h2 style="color: hsl(217, 10%, 50.8%)">Observa el resumen de la orden a continuación:</h2>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <!--Formulario-->
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <!-- Se muestra el resumen en textarea -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Resumen:</label>
                    <textarea class="form-control" name="contenido" id="contenido" cols="80" rows="15">
                    <?php 
                        global $mostrarcontenido;
                        if(!empty($mostrarcontenido)){
                            echo $mostrarcontenido;
                        }
                    ?>
                </textarea>
                </div>
                <div class="input-group mb-3">
                  <div class="form-floating">
                    <!--Nombre para la orden-->
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre para la orden">
                    <label for="floatingInput">Nombre de la orden</label>
                  </div>
                  <!--Boton guardar orden-->
                  <input type="submit" class="btn btn-success" role="button" value="Guardar orden" name="generar"></input>
                </div>
                <!-- Boton salir sin guardar -->
                <input type="submit" class="btn btn-dark" role="button" value="Salir sin guardar" name="btnotra"></input>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><br><br>
<img src="imgs/inicio.png" class="img-fluid" alt="Imagen de inicio">
</body>
</html>