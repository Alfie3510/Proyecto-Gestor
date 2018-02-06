<div class="panel-primary">

 <div class="panel-body">
   <div class="form-group">

    <div class="row form-horizontal">
      <div class="form-group">
        <div class="col-xs-3  text-right">
        </div>
        <div class="col-xs-6">
          <table class="table table-striped"><tr><td>   <label for="buscar" class="control-label">Buscar:</label></td>
            <?php if($_SESSION['m_pro']== 1) { ?> <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="b_incidente(this.value);" placeholder="Ingrese nombre o descripcion"/></td> <?php } ?>   <?php if($_SESSION['a_pro']== 1) { ?>  <td><button onclick="tipos()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrar_incidente"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td><?php } ?>
            <?php if($_SESSION['m_pro']== 0) { ?> <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="b_incidente2(this.value);" placeholder="Ingrese nombre o descripcion"/></td>  <?php } ?>  </tr></table>
          </div>
        </div>
        <div class="alert  text-center" id="imagen_inci" style="display:show;">
         <IMG SRC="../resources/img/inci_tecn.jpg" WIDTH=50% HEIGHT=50% ALT="procedimientos">
         </div>
         <div class="form-group">
          <div id="lista_inci"></div>
        </div>

      </div>
    </div>
  </div>
</div>
