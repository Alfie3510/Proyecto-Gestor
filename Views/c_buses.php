

<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')
  {?>

<?php
date_default_timezone_set("America/Santiago");

$actualiza = $_SESSION['nombre']." ".$_SESSION['apellido'];

    date_default_timezone_set("America/Santiago");
        $fechaactual2 = date("Y-m-d") ."T" . date("H:i");
        $dia = date("Y-m-d") ."T" . "00:00";
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de servicio</title>
  <link rel="icon" type="image/png" href="../Resources/img/favicon.ico" />
<link rel="stylesheet" href="css.css" type="text/css">
  <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">

</head>


<body onload="m_boton(),m_boton_t(),m_boton_el(),registro();">

 <div class="panel panel">

          <div class="panel-body">

            <form class="form-inline" id="conversor">
             <table WIDTH="100%" >
              <tr>
                <th colspan=2>Tecnico</th>
                <th>OS</th>
                 <th></th>
                 <th colspan=2>Torniquete</th>
              </tr>
              <tr>
                <td colspan=2>
                  <div class="form-group" >
                    <input type="text" class="form-control" id="tecnico" name="tecnico" style="width:200px">
                    <input  type="hidden" id="id" name="id" value="<?php echo $_SESSION['ID']; ?>"/>
                    <input  type="hidden" id="actualiza" name="actualiza" value="<?php echo $actualiza; ?>"/>
                    <input  type="hidden" id="fecha_tur" name="fecha_tur" value="<?php echo $fechaactual2; ?>"/>
                  </div>
                </td>
                <td>
                 <div class="form-group" >
                  <input type="text" class="form-control" id="OS" name="OS" style="width:100px">
                </div>
              </td>
               <td colspan=2>
                  <div class="form-group" >
                    <input type="text" class="form-control" id="torniquete" name="torniquete" style="width:250px">
                  </div>
                </td>
            </tr>

            <tr ><th><label for="email">Patente</label></th><th><label for="pwd">Esm</label></th><th><label for="pwd">Pst</label><th><label for="pwd">BUSID</label><th><label for="pwd">Tipo de flota</label><th><label for="pwd">OS POD</label></th></tr>


            <tr>
              <td>
                <div class="form-group" >
                  <input type="text" class="form-control" id="patente" name="patente" onkeyup="line_conversor();" style="width:100px">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" id="esm" name="esm" style="width:100px">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" id="pst" name="pst" style="width:150px">
                </div>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" id="bid" name="bid" style="width:100px">
                  </div>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control" id="tflota" name="tflota" style="width:100px">
                    </div>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pod" name="pod" style="width:100%" >
                      </div>
                    </td>
                  </tr>
                </table>

              </div>
              <div class="panel-body">
                <table class="table">    <tr>  <td style="width: 70%; height:180px;font-size:15px;" >

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_MP_t">
                      <div class="form-group">




                       <textarea id="textbuses" name="textbuses" style="width: 100%; height:410px; " ></textarea>
                     </div>
                   </form>
                   <div class="col-xs-3">
                      <p align="right"><strong>ZOOM</strong> <span onclick="zoomIn()" style="cursor:pointer;" class="glyphicon glyphicon-plus"></span> <span onclick="zoomOut()" style="cursor:pointer;" class="glyphicon glyphicon-minus"></span></p>
               </div>
                 <div class="col-xs-4"> <button class="btn btn-primary" style="width: 100px;" onclick="limpiartodo();" >Limpiar</button>
               </div>
                                   <div class="col-xs-2">

                   <button id="copyBlockbuses" class="btn btn-success" style="width: 150px;" onclick="ingresos();" >Guardar y copiar</button> <span id="copyAnswerbuses"></span>
                 </div> </div>


               </td><td>

  <div class="row form-horizontal">
              <div class="panel panel-default">

                <div href="#creacion" data-toggle="collapse" class="panel-heading" style="cursor:pointer;" ><span class="glyphicon glyphicon-chevron-down"></span> Creacion de OS </div>
                <div id="creacion" class="collapse">
                  <div class="panel-body">
                   <div class="form-group">
                   <div id="botones_OP1"></div>
                  </div></div></div> </div> </div>


 <div class="row form-horizontal">
              <div class="panel panel-default">

                <div href="#inicio" data-toggle="collapse" class="panel-heading" style="cursor:pointer;" ><span class="glyphicon glyphicon-chevron-down"></span> Inicio </div>
                <div id="inicio" class="collapse">
                  <div class="panel-body">
                   <div class="form-group">
                    <div id="botones_OP2"></div>
                  </div></div></div> </div> </div>

<div class="row form-horizontal">
              <div class="panel panel-default">

                <div href="#bajada" data-toggle="collapse" class="panel-heading" style="cursor:pointer;" ><span class="glyphicon glyphicon-chevron-down"></span> Bajada </div>
                <div id="bajada" class="collapse">
                  <div class="panel-body">
                   <div class="form-group">
               <div id="botones_OP3"></div>
                  </div></div></div> </div> </div>


             </td></tr></table>
           </div>
         </div>


                  <!-- /.FINAL.......Modificar boton -->




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
