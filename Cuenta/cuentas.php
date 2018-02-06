<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES' && $_SESSION['m_cuenta']==1 )


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
    <link rel="stylesheet" href="../views/css.css" type="text/css">

</head>
<body             <?php if($_SESSION['m_cuenta']==1) { ?> onload="b_usuarios('','0','10'),cargoso();" <?php } ?> >
    <?php include '../views/header.php';?>
    <br>
    <br>
    <br>
    <br>
    <br>

 <div class="container">
    <div class="tab-pane" id="tab_contacto">
                <div class="row form-horizontal">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Administrador de cuentas</div>
                        <div class="panel-body">

   <?php if($_SESSION['cargo']==0) { ?>
                            <div class="form-group">
                                <div class="col-xs-3  text-right">

                                </div>
                                <div class="col-xs-6">

                                    <table class="table table-striped"><tr><td> <label for="buscar" class="control-label">Buscar:</label></td><td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="b_usuarios(this.value,'0','10');" placeholder="Ingrese usuario "/></td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresar_usuario"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td></tr></table>

                                </div>
                            </div>
                                <div class="form-group">
                                <div id="lista_usuarios"></div>
                            </div>
     <?php } ?>
      <?php if($_SESSION['cargo']==1) { ?>
                            <div class="form-group">
                                <div class="col-xs-3  text-right">

                                </div>
                                <div class="col-xs-6">

                                    <table class="table table-striped"><tr><td> <label for="buscar" class="control-label">Buscar:</label></td><td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="b_usuarios(this.value,'0','10');" placeholder="Ingrese usuario "/></td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresar_usuario"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td></tr></table>

                                </div>
                            </div>
                                <div class="form-group">
                                <div id="lista_usuarios"></div>
                            </div>
     <?php } ?>

                            <div class="form-group">
                                <div id="lista_usuarios"></div>
                            </div>

                            <div class="form-group">
                                <div id="paginacion"></div>
                            </div>


                        </div>
                    </div>
            </div>

    </div>
      </div>


<!-- /.Ingresar usuario -->
  <div class="modal fade" id="ingresar_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos de Usuario</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <form class="form-horizontal" id="formCliente">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-5">
                      <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input id="apellidos" name="apellidos"  type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Usuario:</label>
                    <div class="col-xs-5">
                        <input id="email2" name="email2" type="email" class="form-control" placeholder="Ingrese su nombre.apellido">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass2" name="pass2" type="password" class="form-control" placeholder="Repita contraseña">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="cargo" class="control-label col-xs-5">Ingrese el cargo:</label>
                    <div class="col-xs-5">

<div id="listacargoso"></div>

                    </div>
                   </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_contacto();">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

          <!-- /FIN....Ingresar usuario -->
<!-- /.Modificar usuario -->
       <div class="modal fade" id="modificar_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos de Usuario</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito112" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido modificada</span>
                </div>
                <div class="alert alert-info text-center" id="exito113" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Password reseteada, nueva contraseña "sonda"</span>
                </div>
                <form class="form-horizontal" id="moficar_usuario">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-5">
                     <input  type="hidden" id="idu1" name="idu1"/>
                      <input id="nombres1" name="nombres1" type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input id="apellidos1" name="apellidos1"  type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Usuario:</label>
                    <div class="col-xs-5">
                        <input readonly id="email21" name="email21" type="email" class="form-control" placeholder="Ingrese su nombre.apellido">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="cargo1" class="control-label col-xs-5">Modificar cargo:</label>
                    <div class="col-xs-5">
                                                                      <input  type="hidden" id="c1235" name="c1235"/>


<div id="listacargoso_m"></div>


                    </div>
                   </div>



                </form>
              </div>

                  <div class="modal-header">

                         <h2 class="modal-title">Permisos</h2>

                           </div>

    <div class="modal-body">

       <form  class="form-group" id="moficar_permiso" name="moficar_permiso">

<table class="table table-bordered"><tr><th colspan="3">
                         <h4 class="modal-title">Supervision</h4>

                       </th></tr>
                       <tr><td>
                       <div  class="form-inline">
                         <label for="140" >Modificar cuentas:</label>
                        <input  type="hidden" id="idu5" name="idu5"/>
                        <input readonly id="140" name="140" type="checkbox" onclick='check()' >
                       <input  type="hidden" id="1401" name="1401"/>


                  </td><td>
                         <label for="141" >Modificar Procedimiento:</label>

                        <input readonly id="141" name="141" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1411" name="1411"/>



</td><td>
                   <label for="142" >Agregar procedimiento:</label>

                        <input readonly id="142" name="142" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1421" name="1421"/>



                  </td></tr><tr><td>
                     <label for="145">Modificar contacto:</label>

                        <input readonly id="145" name="145" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1451" name="1451"/>



</td><td>
                     <label for="146" >Agregar contacto:</label>

                        <input readonly id="146" name="146" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1461" name="1461"/>



                     </td><td>
                     <label for="146" >Configurar conversor:</label>

                        <input readonly id="146b" name="146b" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1461b" name="1461b"/>



                     </td></tr></table>


<br>
                      <table class="table table-bordered"><tr><th colspan="3">
                         <h4 class="modal-title">Tecno</h4>

                       </th></tr>
                       <tr><td>
                       <div  class="form-inline">
                         <label for="147" >Conversor:</label>

                        <input readonly id="147" name="147" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1471" name="1471"/>



                  </td><td>
                         <label for="148" >procedimientos:</label>

                        <input readonly id="148" name="148" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1481" name="1481"/>

                        </td><td>
                         <label for="149" >Escalamiento tecno:</label>

                        <input readonly id="149" name="149" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1491" name="1491"/>

                    </td></tr><tr><td>
                         <label for="150" >Mac Totem:</label>

                        <input readonly id="150" name="150" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1501" name="1501"/>



</td></td></tr></table>


<br>
                     <table class="table table-bordered"><tr><th colspan="3">
                         <h4 class="modal-title">Buses</h4>

                       </th></tr>
                       <tr><td>
             <div  class="form-inline">
                         <label for="151" >Conversor:</label>

                        <input readonly id="151" name="151" type="checkbox" onclick='check()'>
                                               <input  type="hidden" id="1511" name="1511"/>



                  </td><td>
                         <label for="152" >procedimientos:</label>

                        <input readonly id="152" name="152" type="checkbox" onclick='check()' >
                                                <input  type="hidden" id="155" name="155"/>




</td></td></tr></table>


<br>

     </form>



</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_usuario();">Cerrar</button>
                <button onclick="modificar_usuario(),modificar_permiso();" type="button" class="btn btn-success">Guardar</button>
                <div class="col-md-4">
                  <form class="form-inline"  id="resetear">
               <input  type="hidden" id="reset" name="reset"/>
                </form>
                <button onclick="resetear();" type="button" class="btn btn-primary">Resetear contraseña</button>


</div>

              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<!-- /.FIN...Modificar usuario -->







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
