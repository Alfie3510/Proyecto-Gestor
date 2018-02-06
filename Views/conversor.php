

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
  <?php include 'header.php';?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- FIN... Barra de navegacion -->



        <div class="container">
         <ul class="nav nav-pills">
          <?php if($_SESSION['c_buses']==1) { ?><li class="active"><a data-toggle="pill" href="#home">Conversor buses</a></li><?php } ?>
          <?php if($_SESSION['c_tecno']==1 and $_SESSION['c_buses']==1) { ?><li><a data-toggle="pill" href="#menu1">Conversor tecno</a></li><?php } ?>
          <?php if($_SESSION['c_tecno']==1 and $_SESSION['c_buses']==0) { ?><li class="active"><a data-toggle="pill" href="#menu1">Conversor tecno</a></li><?php } ?>
          <?php if($_SESSION['confi_conve']==1) { ?><li><a data-toggle="pill" href="#menu2">Configurar botones</a></li><?php } ?>



        </ul>
        <br>
        <div class="tab-content">
         <?php if($_SESSION['c_tecno']==1 and $_SESSION['c_buses']==1) { ?><div id="home" class="tab-pane fade in active"><?php } ?>
         <?php if($_SESSION['c_tecno']==0 and $_SESSION['c_buses']==1) { ?><div id="home" class="tab-pane fade in active"><?php } ?>
         <?php if($_SESSION['c_buses']==0) { ?><div id="home" class="tab-pane fade"><?php } ?>

         <div class="panel panel-primary">
          <div class="panel-heading"> Coversor buses  <a href="javascript:window.open('../Views/c_buses.php','','width=700,height=605,left=50,top=50,location=no,directories=no');void 0"><button class='btn btn-primary' ><span class='glyphicon glyphicon-new-window'></span></button></a>  <br /></div>
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
              <td>
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
                <table class="table">    <tr>  <td style="width: 70%; height:180px;font-size:18px;" >

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_MP_t">
                      <div class="form-group">
                       <textarea id="textbuses" name="textbuses" style="width: 100%; height:410px;font-size:18px; " ></textarea>
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



         <div class="row form-horizontal">
          <div class="panel panel-primary">

            <div href="#turno" data-toggle="collapse" class="panel-heading" style="cursor:pointer;" >Registro </div>

            <div id="turno" class="collapse">
              <div class="form-group">
                <br>

                <div  id="filtro2" style="display:show;">
                 <div class="col-xs-10  text-center">
                  <label><h4>Registros de actividades de: <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></h4></label>
                </div>
                <div class="col-xs-2">
                 <button type="button" onclick="filtrar_reg();" class="btn btn-primary" data-toggle="modal" >Filtrar <span class='glyphicon glyphicon-filter'></span></button>
               </div>
             </div>
             <div  id="filtro3" style="display:none;">
               <div class="col-xs-10  text-center">
                <label><h4>Registros de actividades de: <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></h4></label>
              </div>
              <div class="col-xs-2">
               <button type="button" onclick="filtrar_reg_2();" class="btn btn-primary" data-toggle="modal" >Filtrar <span class='glyphicon glyphicon-filter'></span></button>
             </div>
           </div>
           <br>
           <div id="filtro" style="display:none;">


               <form class="form-inline" id="conversor222">
                   <input  type="hidden" id="id" name="id" value="<?php echo $_SESSION['ID']; ?>"/>
                     <div class="col-xs-1">

             </div>
             <div class="col-xs-10">
              <table class="table table-striped"><tr><td>   <label for="buscar" class="control-label">Buscar:</label></td>
                <td><input  type="text" name="buscar" id="buscar" onkeyup="registrofiltro();" class="form-control" placeholder="Ingrese tecnico, Os, patente o glosa"/></td><td><label class="control-label">Desde:</label></td><td><input type='datetime-local' value="<?php echo  $dia  ?>"  id="desde" name="desde" class='form-control'></td><td><label class="control-label">Hasta:</label></td><td><input type='datetime-local' id="hasta" name="hasta" value="<?php echo  $fechaactual2  ?>" class='form-control'></td><td><button type="button" class="btn btn-primary" data-toggle="modal" onclick="registrofiltro();" ><span class='glyphicon glyphicon-search'></span> Buscar</button></td>
              </tr></table>
            </div>
          </form>
          </div>

        </div>

        <div class="panel-body">
         <div class="form-group">
          <div id="registro_67"></div>
        </div></div></div> </div> </div>



      </div>

      <?php if($_SESSION['c_tecno']==1 and $_SESSION['c_buses']==0) { ?><div id="menu1" class="tab-pane fade in active"><?php } ?>
      <?php if($_SESSION['c_tecno']==1 and $_SESSION['c_buses']==1) { ?><div id="menu1" class="tab-pane fade"><?php } ?>
      <?php if($_SESSION['c_tecno']==0) { ?><div id="menu1" class="tab-pane fade"><?php } ?>

      <div class="panel panel-primary">
        <div class="panel-heading"> Coversor tecno</div>
        <div class="panel-body">
          <table class="table">    <tr>  <td style="width: 80%; height:180px;font-size:16px;" >

            <div class="tab-content">
              <div class="tab-pane active" id="tab_MP">
               <textarea id="mp_tt" name="mp_tt" style="width: 100%; height:210px;font-size:16px; " ></textarea>
               <button id="copyBlock_tt" class="btn btn-success" style="width: 200px;" >Guardar y copiar </button> <span id="copyAnswer_tt"></span>

             </div>

           </td><td>
           <div id="botones_OP_t"></div>
         </td></tr></table>
       </div>
     </div>



   </div>

   <div id="menu2" class="tab-pane fade">






     <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu6">Ingresar boton</a></li>
      <li><a data-toggle="tab" href="#menu7">Editar boton</a></li>
    </ul>
    <br>
    <div class="tab-content">
      <div id="menu6" class="tab-pane fade in active">

       <div class="tab-pane" id="tab_contacto">
        <div class="row form-horizontal">
          <div class="panel panel-primary">
            <div class="panel-heading">Ingresar boton</div>
            <div class="panel-body">
              <div class="modal-body">

                <form class="form-horizontal" id="botones">
                  <div class="form-group">
                    <label for="tipo" class="control-label col-xs-5">Conversor :</label>
                    <div class="col-xs-5">

                      <select  id="tipo" name="tipo"  class="form-control" >
                        <option  value="Buses">Buses</option>
                        <option  value="Tecno">Tecno</option>
                      </select>


                  </div>
                  <br>    <br>
 <div  id="busesupc" >
                        <div class="form-group">
                      <label for="b_text" class="control-label col-xs-5">Opciones: </label><label for="b_text
                    " class="control-label col-xs-5"></label>

                    <div class="col-xs-5">
                       <input type="checkbox" name="ppus" id="ppus" onclick='checkbtn()'>Solicitar patente
                        <input type="checkbox" name="agr_txt" id="agr_txt" onclick='checkbtn()'>Agregar al texto
                    </div> </div>
                                <div class="form-group">
                    <label for="b_text" class="control-label col-xs-5">Categoria: </label>
                    <div class="col-xs-5">
                     <select  id="categoria" name="categoria"  class="form-control" >
                        <option value="1">Creacion de OS </option>
                        <option value="2">Inicio</option>
                        <option value="3">Bajada</option>
                      </select>

                    </div> </div>
</div>

<br>

                  <div class="form-group">
                    <label for="b_boton" class="control-label col-xs-5">Nombre :</label>
                    <div class="col-xs-5">
                      <input hidden id="glosa_r" name="glosa_r"   >
                      <input  id="b_boton" name="b_boton"  type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="b_text" class="control-label col-xs-5">Texto:</label>
                    <div class="col-xs-5">
                      <textarea  id="b_text" name="b_text" type="text" class="form-control" ></textarea>
                    </div> </div>

                  </form>

                </div>


                <div class="modal-footer">
                  <button onclick="boton_real(),boton_ingre();" type="button" class="btn btn-success">Guardar</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  </div>



      <div id="menu7" class="tab-pane fade">
       <div class="panel panel-primary">
        <div class="panel-heading">Eliminar boton</div>
        <div class="modal-body">

         <div id="botones_OP_22"></div>
       </div> </div>

     </div>
   </div>         </div>
 </div>
</div>

   <!-- /........Modificar boton -->

                  <div class="modal fade" id="botonem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="row form-horizontal">

            <div class="panel panel-primary">
     <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Modifique boton</h2>
              </div>

            <div class="panel-body">
              <div class="modal-body">

                <form class="form-horizontal" id="botones_m">
                  <div class="form-group">
                    <label for="tipo" class="control-label col-xs-5">Conversor :</label>
                    <div class="col-xs-5">

                      <select  id="tiposm" name="tiposm"  class="form-control" >
                        <option  id="con_act"></option>
                        <option  value="Buses">Buses</option>
                        <option  value="Tecno">Tecno</option>
                      </select>


                  </div>
                  <br>    <br>
 <div  id="busesupc" >
                        <div class="form-group">
                    <label for="b_text" class="control-label col-xs-5">Opciones: </label>
                    <label for="b_text" class="control-label col-xs-5"></label>

                    <div class="col-xs-5">
                       <input type="checkbox" name="ppusm" onclick='checkbtn()' id="ppusm">Solicitar patente
                       <input type="checkbox" name="agr_txt_m" onclick='checkbtn()' id="agr_txt_m">Agregar al texto

                    </div> </div>
                                <div class="form-group">
                    <label for="b_text" class="control-label col-xs-5">Categoria: </label>
                    <div class="col-xs-5">
                     <select  id="categoriam" name="categoriam"  class="form-control" >
                        <option id="cat_act"></option>
                        <option value="1">Creacion de OS </option>
                        <option value="2">Inicio</option>
                        <option value="3">Bajada</option>
                      </select>

                    </div> </div>
</div>

<br>

                  <div class="form-group">
                    <label for="b_boton" class="control-label col-xs-5">Nombre :</label>
                    <div class="col-xs-5">
                      <input hidden id="id_b_m" name="id_b_m">
                      <input hidden id="glosa_r_m" name="glosa_r_m"   >
                      <input  id="b_boton_m" name="b_boton_m"  type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="b_text" class="control-label col-xs-5">Texto:</label>
                    <div class="col-xs-5">
                      <textarea  id="b_text_m" name="b_text_m" type="text" class="form-control" ></textarea>
                    </div> </div>

                  </form>

                </div>


                <div class="modal-footer">
                  <button onclick="boton_real(),boton_ingre_modi();" type="button" class="btn btn-success">Guardar</button>

                </div>
              </div>
            </div>
          </div>
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->


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
