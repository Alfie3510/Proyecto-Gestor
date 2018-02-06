<div class="panel-primary">

 <div class="panel-body">
   <div class="form-group">

    <div class="row form-horizontal">

      <div class="panel-heading"></div>
      <div class="form-group">
        <div class="col-xs-1  text-right">
        </div>
        <div class="col-xs-9">
          <table class="table table-striped"><tr>
            <?php if($_SESSION['m_pro']== 1) { ?><td>   <label for="buscar" class="control-label">HOST:</label></td> <td><input  type="text" name="buscar99" id="buscar99" class="form-control" onkeyup="nagios();" placeholder="Ingrese Host"/></td><td>   <label for="buscar" class="control-label">Servicio:</label></td> <td><input  type="text" name="buscar299" id="buscar299" class="form-control" onkeyup="nagios();" placeholder="Ingrese servicio"/></td> <?php } ?>   <?php if($_SESSION['a_pro']== 1) { ?>  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar_nagios"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td><?php } ?>
            <?php if($_SESSION['m_pro']== 0) { ?><td>   <label for="buscar" class="control-label">HOST:</label></td> <td><input  type="text" name="buscar999" id="buscar999" class="form-control" onkeyup="nagios2();" placeholder="Ingrese Host"/></td><td>   <label for="buscar" class="control-label">Servicio:</label></td> <td><input  type="text" name="buscar255" id="buscar255" class="form-control" onkeyup="nagios2();" placeholder="Ingrese servicio"/></td>   <?php } ?>  </tr></table>
          </div>
        </div>
        <div class="alert  text-center" id="imagen_nagios" style="display:show;">
         <IMG SRC="../resources/img/nagios.png" WIDTH=45% HEIGHT=250px ALT="procedimientos">


         </div>
         <div class="form-group">
          <div id="lista_nagios"></div>
        </div>

      </div>
    </div>
  </div>
</div>
