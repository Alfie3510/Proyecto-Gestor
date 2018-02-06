

<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')
  {?>

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


<body onload="line_act();" background="../Resources/img/favicon.png">

  <?php include 'header.php';?>
        <br>
        <br>
        <br>
        <br>
        <br>



        <div class="container">
         <ul class="nav nav-pills">

       <?php if($_SESSION['confi_conve']== 1) { ?>   <li><a data-toggle="pill" href="#menu1">Consultar Line</a></li><?php } ?>
          <?php if($_SESSION['confi_conve']== 1) { ?><li  class="active"><a data-toggle="pill" href="#home">Cargar Line</a></li><?php } ?>
           <?php if($_SESSION['confi_conve']== 0) { ?>   <li class="active"><a data-toggle="pill" href="#menu1">Consultar Line</a></li><?php } ?>



        </ul>
        <br>
        <div class="tab-content">
      <?php if($_SESSION['confi_conve']== 1) { ?>     <div id="home" class="tab-pane fade  in active"><?php } ?>
           <?php if($_SESSION['confi_conve']== 0) { ?>     <div id="home" class="tab-pane fade  "><?php } ?>

            <div class="panel panel-primary">
              <div class="panel-heading">Cargar Line table</div>
              <div class="panel-body">

               Selecciona el archivo a cargar:
               <br>
               <form name="importa" method="post" action="line.php" enctype="multipart/form-data" >
                <input type="file" name="excel" /><br>
                <input type='submit' name='enviar'  value="Importar"  /><br>
                <input type="hidden" value="upload" name="action" />
              </form>


              <?php
              date_default_timezone_set("America/Santiago");
              if (isset( $_POST['action'])) {
               $actualiza = $_SESSION['nombre']." ".$_SESSION['apellido'];
               $nombre_line = $_FILES['excel']['name'];
               $fechaactual = getdate();
               $fechaactual2 = " $fechaactual[mday]/$fechaactual[mon]/$fechaactual[year] a las $fechaactual[hours]:$fechaactual[minutes] ";
               $excel = $_FILES['excel']['tmp_name'];
    # conectare la base de datos
               $con=@mysqli_connect("localhost", "root", "", "bd_gestor");
               if(!$con){
                die("imposible conectarse: ".mysqli_error($con));
              }
              if (@mysqli_connect_errno()) {
                die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
              }
              echo '<textarea style="width: 532px; height: 302px; background-color: black; color: green;">';
              mysqli_query($con,"TRUNCATE TABLE line");
              echo " Se eliminan datos anteriores
              ";
    $productos = fopen ("$excel" , "r" );//leo el archivo que contiene los datos del producto

while (($datos =fgetcsv($productos,1000,";")) !== FALSE )//Leo linea por linea del archivo hasta un maximo de 1000 caracteres por linea leida usando coma(;) como delimitador
{
 $linea[]=array('OPID'=>$datos[0],'BusId'=>$datos[1],'PATENTE'=>$datos[2],'U_Negocio'=>$datos[3],'S_equipamiento'=>$datos[4],'T_Bus'=>$datos[5],'T_Flota'=>$datos[6],'GPS'=>$datos[7],'Fecha_Alta'=>$datos[8],'Tipo'=>$datos[9],'Concesionario'=>$datos[10],'Torniquete'=>$datos[11],'Observaciones'=>$datos[12]);//Arreglo Bidimensional para guardar los datos de cada linea leida del archivo
}
fclose ($productos);//Cierra el archivo

$ingresado=0;
$error=0;
$duplicado=0;
foreach($linea as $indice=>$value)
{
  $OPID=$value["OPID"];
  $BusId=$value["BusId"];
  $PATENTE=$value["PATENTE"];
  $U_Negocio=$value["U_Negocio"];
  $S_equipamiento=$value["S_equipamiento"];
  $T_Flota=$value["T_Flota"];
  $T_Bus=$value["T_Bus"];
  $GPS=$value["GPS"];
  $Fecha_Alta=$value["Fecha_Alta"];
  $Tipo=$value["Tipo"];
  $Concesionario=$value["Concesionario"];
  $Torniquete=$value["Torniquete"];
  $Observaciones=$value["Observaciones"];



    $sql=mysqli_query($con,"select * from line where PATENTE='$PATENTE'");//Consulta a la tabla productos
    $num=mysqli_num_rows($sql);//Cuenta el numero de registros devueltos por la consulta
    if ($num==0)//Si es == 0 inserto
    {
      if ($insert=mysqli_query($con," INSERT INTO `line` (`OPID`, `BusId`, `PATENTE`, `U_Negocio`, `S_equipamiento`, `T_Bus`, `T_Flota`, `GPS`, `Fecha_Alta`, `Tipo`, `Concesionario`, `torniquete`, `Observaciones`, `actualizado`, `fecha_ult`, `n_line`) VALUES ('$OPID', '$BusId', '$PATENTE', '$U_Negocio', '$S_equipamiento', '$T_Bus', '$T_Flota', '$GPS', '$Fecha_Alta', '$Tipo', '$Concesionario', '$Torniquete', '$Observaciones', '$actualiza', '$fechaactual2', '$nombre_line');"))
      {
        echo $msj='Patente '.$PATENTE.' Guardado
        ';
        $ingresado+=1;
    }//fin del if que comprueba que se guarden los datos
    else//sino ingresa el producto
    {
      echo $msj='Patente '.$PATENTE.'  NO Guardado '.mysqli_error().'
      ';
      $error+=1;
    }
    }//fin de if que comprueba que no haya en registro duplicado
    else
    {
      $duplicado+=1;
      echo $duplicate='La Patente  '.$PATENTE.' Esta duplicado
      ';
    }
  }
  echo "".number_format($ingresado,2)." Patentes almacenadas con éxito
  ";
  echo "".number_format($duplicado,2)." Patentes duplicadas
  ";
  echo "".number_format($error,2)." Errores de almacenamiento
  ";
  echo '</textarea>';
}
?>

</div>
</div>
</div>




  <?php if($_SESSION['confi_conve']== 1) { ?>   <div id="menu1" class="tab-pane fade "><?php } ?>
    <?php if($_SESSION['confi_conve']== 0) { ?>   <div id="menu1" class="tab-pane fade in active"><?php } ?>



  <div class="row form-horizontal">

    <div class="panel-heading"></div>

    <div class="form-group">
      <div class="col-xs-1  text-right">

      </div>
      <div class="col-xs-5">
        <table class="table table-striped"><tr><td>   <label for="buscar" class="control-label">Buscar:</label></td>

          <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="consultar_line(this.value);" placeholder="Ingrese patente o concesionario o tipo de flota o observacion"/></td>  </tr></table>
        </div>
        <div class="col-xs-6  text-right">

          <div id="infor"></div>

        </div>
      </div>

      <div class="alert  text-center" id="imagen" style="display:show;">
        <IMG SRC="../resources/img/line.jpg" WIDTH=50% HEIGHT=50% ALT="procedimientos">
        </div>

        <div class="form-group">
          <div id="lista"></div>
        </div>



      </div>



    </div>
  </div>
</div>




<script src="../Resources/js/jquery-1.11.2.js"></script>
<script src="../Resources/js/bootstrap.min.js"></script>
<script src="../Resources/js/line.js"></script>
<script src="../Resources/js/validacion.js"></script>




</body>
</html>
<?php

}
else
{
  header("location: ../");
}
?>
