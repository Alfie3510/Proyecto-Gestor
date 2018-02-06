
  <!-- /................Ingresar nagios -->
            <div class="modal fade" id="registrar_nagios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title">Datos del precedimiento.</h2>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-success text-center" id="exito_nagios" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento registrado</span>
                    </div>
                    <form class="form-horizontal" id="form_nagios">
                      <div class="form-group">
                        <label for="tipo" class="control-label col-xs-5">Host</label>

                        <div class="col-xs-5">
                          <input id="host" name="host"  type="text" class="form-control" placeholder="Ingrese nombre del HOST">
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="Solicitante" class="control-label col-xs-5">Servicio:</label>
                        <div class="col-xs-5">
                          <input id="servicio" name="servicio" type="text" class="form-control" placeholder="Ingrese servicio afectado">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Plantilla" class="control-label col-xs-5">Plantilla:</label>
                        <div class="col-xs-5">
                          <input id="plantilla" name="plantilla"  type="text" class="form-control" placeholder="Ingrese plantilla">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Resolutor" class="control-label col-xs-5">Resolutor 1°:</label>
                        <div class="col-xs-5">
                          <input id="res_1" name="res_1" type="text" class="form-control" placeholder="Ingrese resolutor">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="vb" class="control-label col-xs-5">Resolutor 2°:</label>
                        <div class="col-xs-5">
                          <input id="res_2" name="res_2" type="text" class="form-control" placeholder="Ingrese resolutor">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="Cierre" class="control-label col-xs-5">Observacion:</label>
                        <div class="col-xs-5">
                          <textarea id="observacion" name="observacion" type="text" class="form-control" placeholder="Observacion " ></textarea>
                          <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
                        </div>
                      </div>


                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_nagios();">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="registrar_nagios();">Guardar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /.FINAL...............Ingresar nagios -->

            <!-- /.Modificar nagios -->

            <div class="modal fade" id="modificar_nagios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title">Datos del precedimiento.</h2>
                  </div>
                  <div class="modal-header">
             <div class="form-inline">
                  <label for="area" class="control-label ">Actualizado por:</label>

                    <input readonly id="actualizador_nag" name="actualizador_nag" type="text" class="form-control" >
                    <input readonly id="actualizador_fecha_nag" name="actualizador_fecha_nag" type="datetime-local" class="form-control" >


                </div>
            </div>
                  <div class="modal-body">
                    <div class="alert alert-success text-center" id="exito_nagios_m" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento modificado</span>
                    </div>
                    <form class="form-horizontal" id="form_nagios_m">

                      <div class="form-group">
                        <label for="Solicitante" class="control-label col-xs-5">Host:</label>
                        <div class="col-xs-5">
                          <input id="host_m" name="host_m" type="text" class="form-control" placeholder="Ingrese descripcion">
                        <input  type="hidden" id="id_nagios" name="id_nagios"/>

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Plantilla" class="control-label col-xs-5">Servicio:</label>
                        <div class="col-xs-5">
                          <input id="servicio_m" name="servicio_m"  type="text" class="form-control" placeholder="Ingrese quien reporta incidente">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Resolutor" class="control-label col-xs-5">Plantilla:</label>
                        <div class="col-xs-5">
                          <input id="pantilla_m" name="pantilla_m" type="text" class="form-control" placeholder="Ingrese plantilla">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="vb" class="control-label col-xs-5">Resolutor 1°:</label>
                        <div class="col-xs-5">
                          <input id="resn_1_m" name="resn_1_m" type="text" class="form-control" placeholder="Ingrese resolutor">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Resolutor2" class="control-label col-xs-5">Resolutor 2°:</label>
                        <div class="col-xs-5">
                          <input id="resn_2_m" name="resn_2_m" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Cierre" class="control-label col-xs-5">Observacion:</label>
                        <div class="col-xs-5">
                          <textarea id="obsn_m" name="obsn_m" type="text" class="form-control" placeholder="Observacion " ></textarea>
                          <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
                        </div>
                      </div>


                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_nagios_m();">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="modificar_nagios();">Guardar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /.FINAL...............Modificar nagios -->
