<!-- /.Modificar buses -->

            <div class="modal fade" id="modificar_p_buses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title">Datos del precedimiento.</h2>
                  </div>
                  <div class="modal-header">
             <div class="form-inline">
                  <label for="area" class="control-label ">Actualizado por:</label>

                    <input readonly id="actualizador_bus" name="actualizador_bus" type="text" class="form-control" >
                    <input readonly id="actualizador_fecha_bus" name="actualizador_fecha_bus" type="datetime-local" class="form-control" >


                </div>
            </div>
                  <div class="modal-body">
                    <div class="alert alert-success text-center" id="exito_buses_m" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento modificado</span>
                    </div>
                    <form class="form-horizontal" id="form_buses_m">
                      <div class="form-group">
                        <label for="tipo" class="control-label col-xs-5">Tipo</label>
                        <input  type="hidden" id="id_buses" name="id_buses"/>
                        <div class="col-xs-5">
                          <select id='cargosss_b'  name='cargosss_b' type='text' class='form-control'>
                            <option id='cargo_buses_m'></option>

                          </select>
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="Solicitante" class="control-label col-xs-5">Solicitante:</label>
                        <div class="col-xs-5">
                          <input id="des_buses_m" name="des_buses_m" type="text" class="form-control" placeholder="Ingrese descripcion">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Plantilla" class="control-label col-xs-5">Sintoma:</label>
                        <div class="col-xs-5">
                          <input id="rep_buses_m" name="rep_buses_m"  type="text" class="form-control" placeholder="Ingrese quien reporta incidente">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Resolutor" class="control-label col-xs-5">Plantilla:</label>
                        <div class="col-xs-5">
                          <input id="plan_buses_m" name="plan_buses_m" type="text" class="form-control" placeholder="Ingrese plantilla">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Cierre" class="control-label col-xs-5">Observacion:</label>
                        <div class="col-xs-5">
                          <textarea id="obs_buses_m" name="obs_buses_m" type="text" class="form-control" placeholder="Observacion " ></textarea>
                          <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
                        </div>
                      </div>


                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_buses();">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="modificar_buses();">Guardar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /.FINAL...............Modificar buses -->

              <!-- /.Ingresar buses -->

            <div class="modal fade" id="registrar_rbuses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title">Datos del precedimiento.</h2>
                  </div>
                  <div class="modal-body">
                    <div class="alert alert-success text-center" id="exito_buses" style="display:none;">
                      <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento registrado</span>
                    </div>
                    <form class="form-horizontal" id="form_buses">
                      <div class="form-group">
                        <label for="tipo_b" class="control-label col-xs-5">Tipo</label>

                        <div class="col-xs-5">
                          <div id="lista_tipo1235"></div>
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="Solicitante" class="control-label col-xs-5">Solicitante:</label>
                        <div class="col-xs-5">
                          <input id="Solicitante_b" name="Solicitante_b" type="text" class="form-control" placeholder="Ingrese Solicitante">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="sintoma_b" class="control-label col-xs-5">Sintoma:</label>
                        <div class="col-xs-5">
                          <input id="sintoma_b" name="sintoma_b"  type="text" class="form-control" placeholder="Ingrese sintoma">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="plantilla_b" class="control-label col-xs-5">Plantilla:</label>
                        <div class="col-xs-5">
                          <input id="plantilla_b" name="plantilla_b" type="text" class="form-control" placeholder="Ingrese plantilla">
                        </div>
                      </div>
                   <div class="form-group">
                        <label for="observacion_b" class="control-label col-xs-5">Observacion:</label>
                        <div class="col-xs-5">
                          <textarea id="observacion_b" name="observacion_b" type="text" class="form-control" placeholder="Observacion " ></textarea>
                          <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
                        </div>
                      </div>


                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_buses();">Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="registrar_buses();">Guardar</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /.FINAL...............Ingresar buses -->
