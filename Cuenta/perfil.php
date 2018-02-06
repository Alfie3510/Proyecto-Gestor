

<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')


  {?>
<?php  $ID = $_SESSION['ID'];   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de servicio</title>


    <script type="text/javascript">
</script>


<link rel="icon" type="image/png" href="../Resources/img/favicon.ico" />
    <link rel="stylesheet" href="../views/css.css" type="text/css">

    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">

</head>
<body onload="perfil();">
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
                        <div class="panel-heading">Perfil</div>
                        <div class="panel-body">

<!-- /. usuario -->

              <div class="modal-header">
                <h2 class="modal-title">Datos de usuario</h2>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" id="moficar_usuario">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                   <div class="col-xs-5">

                     <input  type="hidden" id="idu1" name="idu1"/>
                      <input readonly id="nombres1" name="nombres1" type="text" class="form-control" placeholder="Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input readonly id="apellidos1" name="apellidos1"  type="text" class="form-control" placeholder="Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Email:</label>
                    <div class="col-xs-5">
                        <input readonly id="email21" name="email21" type="email" class="form-control" value="nombre.apellido">
                    </div> </div>
                  <div class="form-group">
                    <label for="cargo1" class="control-label col-xs-5">Cargo:</label>
                    <div class="col-xs-5">
                        <input readonly id="cargo1" name="cargo1" type="text" class="form-control" value="nombre.apellido">
                    </div>



                    </div>

                </form>
              </div>
              <div class="modal-footer">
                <div class="col-md-4">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pass">Cambiar contraseña</button>
</div>

        </div><!-- /.modal -->
<!-- /.FIN... usuario -->

                        </div>
                    </div>
            </div>

    </div>
      </div>


 <form class="form-horizontal" id="ID_U">
                  <div class="form-group">
                   <div class="col-xs-5">

                     <input  type="hidden" id="id" name="id" value="<?php echo $_SESSION['ID']; ?>"/>
                    </div>
                  </div>
                </form>



                <!-- /.Ingresar usuario -->
  <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Modificar contraseña</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito25" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su contraseña ha sido modificada correctamente</span>
                </div>
                <form class="form-horizontal" id="password">
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Nueva contraseña:</label>
                    <div class="col-xs-5">
                   <input  type="hidden" id="idr" name="idr" value="<?php echo $_SESSION['ID']; ?>"/>
                   <input id="pass6" name="pass" type="password" class="form-control" placeholder="Ingrese nueva contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input id="pass26" name="pass2" type="password" class="form-control" placeholder="Repita nueva contraseña">
                    </div>
                  </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_pass();">Cerrar</button>
                <button onclick="passw();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

          <!-- /FIN....Ingresar usuario -->

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
