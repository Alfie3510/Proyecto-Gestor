<!-- /.Ingresar incidente -->

<div class="modal fade" id="registrar_incidente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Datos del precedimiento.</h2>
      </div>
      <div class="modal-body">
        <div class="alert alert-success text-center" id="exito_inci" style="display:none;">
          <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento registrado</span>
        </div>
        <form class="form-horizontal" id="form_inci">
          <div class="form-group">
            <label for="tipo" class="control-label col-xs-5">Tipo</label>

            <div class="col-xs-5">
              <div id="lista_tipo123"></div>
            </div>

          </div>
          <div class="form-group">
            <label for="Solicitante" class="control-label col-xs-5">Descripción:</label>
            <div class="col-xs-5">
              <input id="des_inc" name="des_inc" type="text" class="form-control" placeholder="Ingrese descripcion">
            </div>
          </div>
          <div class="form-group">
            <label for="Plantilla" class="control-label col-xs-5">Quien reporta:</label>
            <div class="col-xs-5">
              <input id="rep_inc" name="rep_inc"  type="text" class="form-control" placeholder="Ingrese quien reporta incidente">
            </div>
          </div>
          <div class="form-group">
            <label for="Resolutor" class="control-label col-xs-5">Plantilla:</label>
            <div class="col-xs-5">
              <input id="plan_inc" name="plan_inc" type="text" class="form-control" placeholder="Ingrese plantilla">
            </div>
          </div>
          <div class="form-group">
            <label for="vb" class="control-label col-xs-5">Resolutor 1°:</label>
            <div class="col-xs-5">
              <input id="res_1" name="res_1" type="text" class="form-control" placeholder="Ingrese resolutor">
            </div>
          </div>
          <div class="form-group">
            <label for="Resolutor2" class="control-label col-xs-5">Resolutor 2°:</label>
            <div class="col-xs-5">
              <input id="res_2" name="res_2" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
            </div>
          </div>
          <div class="form-group">
            <label for="Cierre" class="control-label col-xs-5">Observacion:</label>
            <div class="col-xs-5">
              <textarea id="obs_inc" name="obs_inc" type="text" class="form-control" placeholder="Observacion " ></textarea>
              <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
            </div>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_inci();">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="registrar_inci();">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.FINAL...............Ingresar incidente -->

<!-- /.Modificar incidente -->

<div class="modal fade" id="modificar_incidente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Datos del precedimiento.</h2>
      </div>
      <div class="modal-header">
 <div class="form-inline">
      <label for="area" class="control-label ">Actualizado por:</label>

        <input readonly id="actualizador_inc" name="actualizador_inc" type="text" class="form-control" >
        <input readonly id="actualizador_fecha_inc" name="actualizador_fecha_inc" type="datetime-local" class="form-control" >


    </div>
</div>
      <div class="modal-body">
        <div class="alert alert-success text-center" id="exito_inci_m" style="display:none;">
          <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento modificado</span>
        </div>
        <form class="form-horizontal" id="form_inci_m">
          <div class="form-group">
            <label for="tipo" class="control-label col-xs-5">Tipo</label>
            <input  type="hidden" id="id_inc" name="id_inc"/>
            <div class="col-xs-5">
              <select id='cargosss'  name='cargosss' type='text' class='form-control'>
                <option id='cargo_inc_m'></option>

              </select>
            </div>

          </div>
          <div class="form-group">
            <label for="Solicitante" class="control-label col-xs-5">Descripción:</label>
            <div class="col-xs-5">
              <input id="des_inc_m" name="des_inc_m" type="text" class="form-control" placeholder="Ingrese descripcion">
            </div>
          </div>
          <div class="form-group">
            <label for="Plantilla" class="control-label col-xs-5">Quien reporta:</label>
            <div class="col-xs-5">
              <input id="rep_inc_m" name="rep_inc_m"  type="text" class="form-control" placeholder="Ingrese quien reporta incidente">
            </div>
          </div>
          <div class="form-group">
            <label for="Resolutor" class="control-label col-xs-5">Plantilla:</label>
            <div class="col-xs-5">
              <input id="plan_inc_m" name="plan_inc_m" type="text" class="form-control" placeholder="Ingrese plantilla">
            </div>
          </div>
          <div class="form-group">
            <label for="vb" class="control-label col-xs-5">Resolutor 1°:</label>
            <div class="col-xs-5">
              <input id="res_1_m" name="res_1_m" type="text" class="form-control" placeholder="Ingrese resolutor">
            </div>
          </div>
          <div class="form-group">
            <label for="Resolutor2" class="control-label col-xs-5">Resolutor 2°:</label>
            <div class="col-xs-5">
              <input id="res_2_m" name="res_2_m" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
            </div>
          </div>
          <div class="form-group">
            <label for="Cierre" class="control-label col-xs-5">Observacion:</label>
            <div class="col-xs-5">
              <textarea id="obs_inc_m" name="obs_inc_m" type="text" class="form-control" placeholder="Observacion " ></textarea>
              <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
            </div>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_inci_m();">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="modificar_inci();">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.FINAL...............Modificar incidente -->
