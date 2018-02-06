

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
<body             <?php if($_SESSION['cargo']==0) { ?> onload="importantes('');" <?php } ?> >


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
                        <div class="panel-heading">Importantes</div>
                        <div class="panel-body">

   <?php if($_SESSION['cargo']==0) { ?>
                            <div class="form-group">
                                <div class="col-xs-3  text-right">

                                </div>
                                <div class="col-xs-6">

                                    <table class="table table-striped"><tr><td> <label for="buscar" class="control-label">Buscar:</label></td><td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="importantes(this.value);" /></td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingresar_impor"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td></tr></table>

                                </div>
                            </div>
                                <div class="form-group">
                                <div id="lista_importante"></div>
                            </div>
     <?php } ?>


                            <div class="form-group">
                                <div id="lista_importante"></div>
                            </div>

                        </div>
                    </div>
            </div>

    </div>
      </div>


<!-- /.Ingresar usuario -->
  <div class="modal fade" id="ingresar_impor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Importante</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span>Registrado</span>
                </div>
                <form class="form-horizontal" id="importante_regi">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">OS:</label>
                    <div class="col-xs-5">
                      <input  type="hidden" id="idup" name="idup" value="<?php echo $_SESSION['ID']; ?>"/>
                      <input id="os" name="os" type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Titulo:</label>
                    <div class="col-xs-5">
                      <input id="titulo" name="titulo"  type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Observacion:</label>
                    <div class="col-xs-5">
                        <textarea id="obs" name="obs" type="text" class="form-control"></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_contacto();">Cerrar</button>
                <button onclick="registrar_imp();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

          <!-- /FIN....Ingresar usuario -->
<!-- /.Modificar usuario -->
       <div class="modal fade" id="modificar_imppp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Importante</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito112" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Modificada</span>
                </div>

                <form class="form-horizontal" id="moficar_impp">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">OS:</label>
                    <div class="col-xs-5">
                     <input  type="hidden" id="idud1" name="idud1"/>
                      <input id="OSOS" name="OSOS" type="text" class="form-control" >
                       <input  type="hidden" id="id_impf" name="id_impf" value="<?php echo $_SESSION['ID']; ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Titulo :</label>
                    <div class="col-xs-5">
                      <input id="titulom" name="titulom"  type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email2" class="control-label col-xs-5">Observacion:</label>
                    <div class="col-xs-5">
                        <textarea  id="ob_88" name="ob_88"  class="form-control" ></textarea>
                    </div>
                  </div>




                </form>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_usuario();">Cerrar</button>
                <button onclick="modificar_impo();" type="button" class="btn btn-success">Guardar</button>
                <div class="col-md-4">
                  <form class="form-inline"  id="resetear">
               <input  type="hidden" id="reset" name="reset"/>
                </form>



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
