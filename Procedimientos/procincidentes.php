
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
  <title>HelpDesk</title>
  <link rel="icon" type="image/png" href="../Resources/img/favicon.ico" />

  <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="css.css" type="text/css">

</head>


<body onload="mostra_pro(),mostra_img(),mostra_arch();">

    <?php include '../views/header.php';?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- /.Consulta ID-->
        <form class="form-horizontal" id="ID_P">
         <input   type="hidden" id="idp" name="idp" value="<?php echo $_GET['id']; ?>">
         <input   type="hidden" id="tipo" name="tipo" value="<?php echo $_GET['tipo']; ?>">
       </form>
       <!-- /.Consulta ID -->


       <div class="container">
        <table class="table table-bordered text-center">
          <!-- /.Titulo -->   <tr><td colspan = 2><H1>          <?php echo $_GET["nombre"];  ?></H1></td></tr>
          <tr>
            <!-- /.Informacion --><td width=75%>
            <div class="form-group">
             <form class="form-horizontal" id="form_pro_8" >

               <input  type="hidden" id="id_pro_1" name="id_pro_1">
               <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
               <div id="informes"></div>

             </form>
           </div>
         </td>
         <!-- /.Imagenes--><td width=25%>
         <div class="form-group">
           <div id="imagenes"></div>
         </div> </td></tr>
         <tr>
          <td>
        <?php if($_SESSION['m_pro']== 1) { ?>     <button type="button" class="btn btn-primary" data-toggle="modal" onclick="actua_new_pro();"><span class='glyphicon glyphicon-text-background' ></span> Guardar</button><?php } ?>
          </td>
          <td>
         <?php if($_SESSION['m_pro']== 1) { ?>    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevafoto"><span class='glyphicon glyphicon-camera'></span> Subir</button><?php } ?>

          </td>
        </tr>
        <tr><th class='info'>Archivos</th><td> <?php if($_SESSION['m_pro']== 1) { ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaadjunto"><span class='glyphicon glyphicon-floppy-save'></span> Subir</button><?php } ?>  </td></tr>
            <tr>
        <td colspan="2">
            <div id="documento88"></div>
      </td>

      </tr>
      </table>

    </div>



<!-- /.Insertar archivo-->
    <div class="modal fade" id="nuevaadjunto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Subir archivo</h2>
          </div>
          <div class="modal-body">
            <div class="alert alert-success text-center" id="exito997" style="display:none;">
              <span class="glyphicon glyphicon-ok"> </span><span> Archivo subido</span>
            </div>

            <form class="form-horizontal" id="form_arch" enctype="multipart/form-data">

             <div class="form-group">
              <label for="titulo_img" class="control-label col-xs-4">Ingrese archivo:</label>
              <div class="col-xs-5">
                <input  type="hidden" id="id_proce_com" name="id_proce_com" value="<?php echo $_GET['id']; ?>">
                <input  type="hidden" id="boton" name="boton" value="ing_arch">
                <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
           <input type="file" name="archivo" id="archivo"/>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
            <button type="submit" class="btn btn-success" >Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Fin insertar archivo-->
    <!-- /.Insertar imagenes-->
    <div class="modal fade" id="nuevafoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title">Subir foto</h2>
          </div>
          <div class="modal-body">
            <div class="alert alert-success text-center" id="exito997" style="display:none;">
              <span class="glyphicon glyphicon-ok"> </span><span> Imagen subida</span>
            </div>

            <form class="form-horizontal" id="form_img" enctype="multipart/form-data">

             <div class="form-group">
              <label for="titulo_img" class="control-label col-xs-4">Titulo:</label>
              <div class="col-xs-5">
                <input  type="hidden" id="id_proce_com" name="id_proce_com" value="<?php echo $_GET['id']; ?>">
                <input  type="hidden" id="boton" name="boton" value="ing_img">
                <input id="titulo_img" name="titulo_img" type="text" class="form-control" placeholder="Ingrese titulo">
              </div>
            </div>
            <div class="form-group">
              <label for="archivo" class="control-label col-xs-4">Ingrese imagen:</label>
              <div class="col-xs-5">
                <input type="file" name="archivo" id="archivo"/>
              </div>
            </div>
            <div class="form-group">
              <label for="tipo" class="control-label col-xs-4">Ingrese leyenda:</label>
              <div class="col-xs-5">
                <textarea id="Leyenda" name="Leyenda" type="text" class="form-control" placeholder="Ingrese leyenda"></textarea>

              </div>
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
            <button type="submit" class="btn btn-success" >Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Fin insertar imagenes-->


  <!-- /.Expander foto -->
  <div class="modal fade" id="expfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title"> <div id="tituloimg" ></h4>
        </div>
        <div class="modal-body">

          <form class="form-horizontal" id="form_img_8" >
            <input  type="hidden" id="id_img" name="id_img">
            <input  type="hidden" id="id_img_c" name="id_img_c">
            <input  type="hidden" id="n_img" name="n_img">
          </form>
          <div id="fotoimg"></div>
          <div id="leyendaimg"  >
          </div>
          <div class="modal-footer">
  <?php if($_SESSION['m_pro']== 1) { ?><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="eliminar_img();">Eliminar imagen</button> <?php } ?>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /.FIN Expander foto -->



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
