

<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')
  {?>

<?php

$actualiza = $_SESSION['nombre']." ".$_SESSION['apellido'];

?>



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de servicio</title>
<link rel="icon" type="image/png" href="../Resources/img/favicon.ico" />

    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="css.css" type="text/css">

</head>

<body>
  <?php include 'header.php';?>
 <br>
    <br>
    <br>
    <br>
    <br>
<!-- FIN... Barra de navegacion -->

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Bienvenido: <?php echo $actualiza; ?> !!</div>
                    <div class="panel-body">

                     <IMG SRC="../resources/img/procedimientos.jpg" WIDTH=100% HEIGHT=90% ALT="procedimientos">

                    </div>
                  </div>
            </div>
        </div>
    </div>
    <script src="../Resources/js/jquery-1.11.2.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script src="../Resources/js/libros.js"></script>
    <script src="../Resources/js/contactos.js"></script>
    <script src="../Resources/js/validacion.js"></script>
    <script src="../Resources/js/usuario.js"></script>




</body>
</html>

<?php

  }
  else
  {
    header("location: ../");
  }
 ?>
