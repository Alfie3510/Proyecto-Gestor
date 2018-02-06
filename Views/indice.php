

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
  <link rel="stylesheet" href="../views/css.css" type="text/css">
</head>


<body onload="turno(''),tipos(),tipo_m(),actualizaReloj();" background="../Resources/img/favicon.png">

  <?php include 'header.php';?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
         <div class="row form-horizontal">
          <ul class="nav nav-pills ">
   <?php if($_SESSION['p_tecno']== 1 || $_SESSION['p_buses']== 1) { ?><li ><a href="#tab_consultar" data-toggle="tab">Intructivos</a></li><?php } ?>
            <li class="active"><a href="#tab_contacto" data-toggle="tab">Contactos</a></li>
  <?php if($_SESSION['escala_tecn']== 1) { ?><li><a href="#tab_escalamiento" data-toggle="tab">Escalamiento</a></li><?php } ?>
     <?php if($_SESSION['mac_t']== 1) { ?><li><a href="#tab_totem" data-toggle="tab">MAC totem</a></li>  <?php } ?>
            <?php if($_SESSION['cargo']==0) { ?>
            <li><a href="#tab_prueba" data-toggle="tab">Prueba</a></li>
            <?php } ?>
          </ul>
        </div>
      </br>

      <!-- /.....Procedimientos -->

      <div class="tab-content">
        <div class="tab-pane " id="tab_consultar">

         <div class="row form-horizontal">
          <ul class="nav nav-tabs ">
            <?php if($_SESSION['p_tecno']== 1) { ?><li class="active"><a href="#requerimientotecno" data-toggle="tab">Requerimientos tecno</a></li>
            <li><a href="#incidentetecno" data-toggle="tab">Incidentes tecno</a></li>
             <li><a href="#nagios" data-toggle="tab">Alarmas Nagios</a></li>       <?php } ?>
            <?php if($_SESSION['p_buses']== 1) { ?><?php if($_SESSION['p_tecno']== 1) { ?><li ><?php } ?><?php if($_SESSION['p_tecno']== 0) { ?><li class="active"><?php } ?> <a href="#requermientobuses" data-toggle="tab">Procedimientos buses</a></li>      <?php } ?>

          </ul>
        </div>
      </br>

      <div class="container">

        <div class="tab-content">

      <!-- /.....requermiento tecno -->
           <?php if($_SESSION['p_tecno']== 1) { ?>
                 <?php if($_SESSION['p_tecno']== 1) { ?> <div id="requerimientotecno" class="tab-pane active"><?php } ?>
              <?php if($_SESSION['p_tecno']== 0) { ?> <div id="requerimientotecno" class="tab-pane fade"><?php } ?>
                <?php include 'Detalle_views\req_tecno\req_tecno_views.php';?>
              </div>
  <!-- /.....requermiento tecno fin -->
  <!-- /.....Incidentes tecno -->
              <div id="incidentetecno" class="tab-pane fade ">
              <?php include 'Detalle_views\inc_tecno\inc_tecno_views.php';?>
              </div>
  <!-- /.....incidentes tecno fin -->
    <!-- /.....nagios tecno -->
               <div id="nagios" class="tab-pane fade ">
                <?php include 'Detalle_views\nag_tecno\nag_tecno_views.php';?>
              </div>
  <!-- /.....nagios tecno fin-->
    <!-- /.....requerimiento buses -->
    <?php } ?>
                <?php if($_SESSION['p_buses']== 1) { ?>
       <?php if($_SESSION['p_tecno']== 1) { ?><div id="requermientobuses" class="tab-pane fade"><?php } ?>
              <?php if($_SESSION['p_tecno']== 0) { ?><div id="requermientobuses" class="tab-pane active"><?php } ?>

        <?php include 'Detalle_views\req_buses\req_buses_views.php';?>

                 </div>
        <?php } ?>
               </div>
             </div>
 <!-- /.Irequerimiento buses fin -->

 <!-- /.llamar...............formulario de buses -->
         <?php include 'Detalle_views\req_buses\req_buses_form.php';?>
<!-- /.llamar...............formulario de buses -->

            <!-- /.llamar...............formulario de nagios -->
                    <?php include 'Detalle_views\nag_tecno\nag_tecno_form.php';?>
           <!-- /.llamar...............formulario de nagios -->

           <!-- /.llamar...............formulario de requermiento -->
                   <?php include 'Detalle_views\req_tecno\req_tecno_form.php';?>
          <!-- /.llamar...............formulario de requermiento -->

            <!-- /.llamar...............formulario de incidentes -->
                    <?php include 'Detalle_views\inc_tecno\inc_tecno_form.php';?>
           <!-- /.llamar...............formulario de incidentes -->
           <!-- /................formulario de turno -->
                   <?php include 'Detalle_views\turno\turno_form.php';?>
          <!-- /.fin...............formulario de turno -->


                              <!-- /.......Totem -->

                <div class="tab-pane" id="tab_totem">


  <div class="row form-horizontal">
                  <div class="panel panel-primary">
                    <div class="panel-heading">>MAC totem</div>
                    <div class="panel-body">


                      <div class="form-group">
                        <div class="col-xs-3  text-right">
                        </div>
                        <div class="col-xs-6">

                          <table class="table table-striped"><tr><td> <label for="buscar" class="control-label">Buscar:</label></td>
                            <?php if($_SESSION['m_conta']==1) { ?> <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="totem(this.value);" placeholder="Ingrese numero de totem o MAC"/></td>  <?php } ?>   <?php if($_SESSION['a_conta']==1) { ?>  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#totem1"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td>   <?php } ?>
                            <?php if($_SESSION['m_conta']==0) { ?> <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="totem2(this.value);" placeholder="Ingrese numero de totem o MAC"/></td> <?php } ?>  </tr></table>
                          </div>
                        </div>

                          <div class="alert  text-center" id="imagen2" style="display:show;">
                      <IMG SRC="../resources/img/totem.png" WIDTH=40% HEIGHT=40% ALT="totem">
                     </div>

                        <div class="form-group">
                          <div id="listat"></div>
                        </div>

                      </div>
                    </div>
                  </div>



                </div>


                <!-- /.FINAL.......Totem -->



                 <!-- /........Ingresar totem -->

                  <div class="modal fade" id="totem1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title">Datos de totem.</h2>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-success text-center" id="exito_totem" style="display:none;">
                            <span class="glyphicon glyphicon-ok"> </span><span> Totem ingresado</span>
                          </div>
                          <form class="form-horizontal" id="totem">
                            <div class="form-group">
                              <label for="tipo" class="control-label col-xs-5">N° de serie:</label>
                              <div class="col-xs-5">
                                <input id="seriet" name="seriet" type="text" class="form-control" placeholder="Ingrese serie">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="area" class="control-label col-xs-5">MACC:</label>
                               <div class="col-xs-5">
                                <input id="mac1" name="mac1" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac2.focus()"  style="width:25px" > - <input id="mac2" name="mac2" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac3.focus()"  style="width:25px" > - <input id="mac3" name="mac3" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac4.focus()"  style="width:25px" > - <input id="mac4" name="mac4" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac5.focus()"  style="width:25px" > - <input id="mac5" name="mac5" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac6.focus()"  style="width:25px" > - <input id="mac6" name="mac6" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) boton_t.focus()"  style="width:25px" >
                             </div>
                            </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiartotem();">Cerrar</button>
                          <button type="button" id="boton_t" class="btn btn-success" onclick="ingtotem();">Guardar</button>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->


                  <!-- /.FINAL.......Ingresar totem -->
                  <!-- /........Modificar totem -->
                  <div class="modal fade" id="modatotem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title">Datos del totem.</h2>
                        </div>
            <div class="modal-body">
                          <div class="alert alert-success text-center" id="exito_totem_11" style="display:none;">
                            <span class="glyphicon glyphicon-ok"> </span><span> Totem ingresado</span>
                          </div>
                          <form class="form-horizontal" id="totemm">
                            <div class="form-group">
                              <label for="tipo" class="control-label col-xs-5">N° de serie:</label>
                              <div class="col-xs-5">
                                <input  type="hidden" id="id_totem" name="id_totem"/>
                                <input id="seriet_m" name="seriet_m" type="text" class="form-control" placeholder="Ingrese serie">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="area" class="control-label col-xs-5">MACC:</label>
                               <div class="col-xs-5">
                                <input id="mac1m" name="mac1m" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac2m.focus()"  style="width:25px" > - <input id="mac2m" name="mac2m" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac3m.focus()"  style="width:25px" > - <input id="mac3m" name="mac3m" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac4m.focus()"  style="width:25px" > - <input id="mac4m" name="mac4m" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac5m.focus()"  style="width:25px" > - <input id="mac5m" name="mac5m" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) mac6m.focus()"  style="width:25px" > - <input id="mac6m" name="mac6m" type="text" maxlength="2" onkeyup="if (this.value.length == this.getAttribute('maxlength')) boton_t_m.focus()"  style="width:25px" >
                             </div>
                            </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiartotem();">Cerrar</button>
                          <button type="button" id="boton_t_m" class="btn btn-success" onclick="mtotem();">Guardar</button>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                <!-- /.FINAL.......Modificar totem -->
  <div class="tab-pane" id="tab_escalamiento">
                                      <div class="panel panel-primary">
                    <div class="panel-heading">Tabla de escalamiento <a href="../Resources/escalamiento/tabla.htm" target="_blank"><button class='btn btn-primary' ><span class='glyphicon glyphicon-new-window'></span></button></a></div>
                    <div class="panel-body">
<iframe  width=100% height="700"  src="../Resources/escalamiento/tabla.htm"></iframe>
                      </div>
                    </div>
</div>



<div class="tab-pane" id="tab_prueba">

PRUEBA

</div>
</div><!-- tab content -->



</div>
<script src="../Resources/js/jquery-1.11.2.js"></script>
<script src="../Resources/js/bootstrap.min.js"></script>
<script src="../Resources/js/libros.js"></script>
<script src="../Resources/js/contactos.js"></script>
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
