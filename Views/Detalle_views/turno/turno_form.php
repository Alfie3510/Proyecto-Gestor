<!-- /.....Contactos -->

<div class="tab-pane active" id="tab_contacto">
<?php if($_SESSION['p_tecno']== 1) { ?>
  <div class="row form-horizontal">
    <div class="panel panel-primary">

      <div href="#turno" data-toggle="collapse" class="panel-heading" style="cursor:pointer;" >Turnos por area &nbsp<span class="glyphicon glyphicon-chevron-down"></span> </div>
      <div id="turno" class="collapse">
        <div class="panel-body">
         <div class="form-group">
          <div id="turno"></div>
        </div></div></div> </div> </div> <?php } ?>


        <!-- /........Modificar turno -->
        <div class="modal fade" id="turnopp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Actualizar turno</h2>
              </div>

              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito_turno" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Turno modificado OK</span>
                </div>
                <form class="form-horizontal" id="for_turno">
                  <div class="form-group">
                    <div class="modal-header">
               <div class="form-inline">
                    <label for="area" class="control-label ">Actualizado por:</label>

                      <input readonly id="actualizador_turn" name="actualizador_turn" type="text" class="form-control" >
                      <input readonly id="actualizador_fecha" name="actualizador_fecha" type="datetime-local" class="form-control" >


                  </div>
              </div>
              <br>
                    <label for="tipo" class="control-label col-xs-5">Area:</label>
                    <div class="col-xs-5">
                      <input readonly id="t_area" name="t_area" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="area" class="control-label col-xs-5">Resolutor de turno:</label>
                    <div class="col-xs-5">
                      <input readonly id="t_resolutor" name="t_resolutor" type="text" class="form-control" >
                      <input  type="hidden" id="idturn" name="idturn"/>
                      <input  type="hidden" id="actualiza" name="actualiza" value="<?php echo $actualiza; ?>"/>
                    </div>
                  </div>

                  <div class="form-group">
                   <label for="cargo1" class="control-label col-xs-5">Modificar Turno:</label>
                   <div class="col-xs-5">
                     <div id="turnosoo"></div>
                   </div>
                 </div>

                 <div class="form-group">
                  <label for="anexo" class="control-label col-xs-5">Fin del turno:</label>
                  <div class="col-xs-5">
                    <input id="t_fecha_fin" name="t_fecha_fin"  type="datetime-local" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="celular1" class="control-label col-xs-5">Observacion:</label>
                  <div class="col-xs-5">
                    <textarea id="ohbse" name="ohbse" type="textarea" class="form-control" ></textarea>
                  </div>
                </div>


              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar_turno_c();">Cerrar</button>
              <button type="button" class="btn btn-success" onclick="guardarc();">Guardar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- /.FINAL.......Modificar turno -->

      <div class="row form-horizontal">
        <div class="panel panel-primary">
          <div class="panel-heading">Contactos Transantiago</div>
          <div class="panel-body">


            <div class="form-group">
              <div class="col-xs-3  text-right">
              </div>
              <div class="col-xs-6">

                <table class="table table-striped"><tr><td> <label for="buscar" class="control-label">Buscar:</label></td>
                  <?php if($_SESSION['m_conta']==1) { ?> <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="contactos(this.value);" placeholder="Ingrese nombre o area"/></td>  <?php } ?>   <?php if($_SESSION['a_conta']==1) { ?>  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactos"><span class='glyphicon glyphicon-plus'></span> Agregar</button></td>   <?php } ?>
                  <?php if($_SESSION['m_conta']==0) { ?> <td><input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="contactos2(this.value);" placeholder="Ingrese nombre o area"/></td> <?php } ?>  </tr></table>
                </div>
              </div>

                <div class="alert  text-center" id="imagen_contacto" style="display:show;">
            <IMG SRC="../resources/img/contacto.jpg" WIDTH=40% HEIGHT=40% ALT="contactos">
           </div>

              <div class="form-group">
                <div id="listac"></div>
              </div>

            </div>
          </div>
        </div>




        <!-- /........Ingresar contactos -->

        <div class="modal fade" id="contactos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Datos del contactos.</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito_c" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Contacto registrado</span>
                </div>
                <form class="form-horizontal" id="inicioc">
                  <div class="form-group">
                    <label for="tipo" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                      <input id="nombre1" name="nombre1" type="text" class="form-control" placeholder="Ingrese nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="area" class="control-label col-xs-5">Area:</label>
                    <div class="col-xs-5">
                      <input id="area1" name="area1" type="text" class="form-control" placeholder="Ingrese area">
                    </div>
                  </div>
                        <div class="form-group">
                    <label for="mailc1" class="control-label col-xs-5">Mail:</label>
                    <div class="col-xs-5">
                      <input id="mailc1" name="mailc1"  type="text" class="form-control" placeholder="Ingrese mail">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="anexo" class="control-label col-xs-5">Anexo:</label>
                    <div class="col-xs-5">
                      <input id="anexo1" name="anexo1"  type="text" class="form-control" placeholder="Ingrese Plantilla">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="celular1" class="control-label col-xs-5">Celular(1):</label>
                    <div class="col-xs-5">
                      <input id="celular11" name="celular11" type="text" class="form-control" placeholder="Ingrese Resolutor">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="celular2" class="control-label col-xs-5">Celular(2):</label>
                    <div class="col-xs-5">
                      <input id="celular21" name="celular21" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
                      <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
                    </div>
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="iniciar();">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- /.FINAL.......Ingresar contactos -->
        <!-- /........Modificar contactos -->
        <div class="modal fade" id="modacontactos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">Datos del contacto.</h2>
              </div>
              <div class="modal-header">
         <div class="form-inline">
              <label for="area" class="control-label ">Actualizado por:</label>

                <input readonly id="actualizador_con" name="actualizador_con" type="text" class="form-control" >
                <input readonly id="actualizador_fecha_con" name="actualizador_fecha_con" type="datetime-local" class="form-control" >


            </div>
        </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito_c_m" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Contacto modificado OK</span>
                </div>
                <form class="form-horizontal" id="formcontactos">
                  <div class="form-group">
                    <label for="tipo" class="control-label col-xs-5">Nombre:</label>
                    <div class="col-xs-5">
                      <input  type="hidden" id="id9" name="id9"/>
                      <input id="nombre9" name="nombre9" type="text" class="form-control" placeholder="Ingrese nombre">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="area" class="control-label col-xs-5">Area:</label>
                    <div class="col-xs-5">
                      <input id="area9" name="area9" type="text" class="form-control" placeholder="Ingrese area">
                    </div>
                  </div>
                      <div class="form-group">
                    <label for="mailc" class="control-label col-xs-5">Mail:</label>
                    <div class="col-xs-5">
                      <input id="mailc" name="mailc" type="text" class="form-control" placeholder="Ingrese mail">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="anexo" class="control-label col-xs-5">Anexo:</label>
                    <div class="col-xs-5">
                      <input id="anexo9" name="anexo9"  type="text" class="form-control" placeholder="Ingrese Plantilla">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="celular1" class="control-label col-xs-5">Celular(1):</label>
                    <div class="col-xs-5">
                      <input id="celular19" name="celular19" type="text" class="form-control" placeholder="Ingrese Resolutor">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="celular2" class="control-label col-xs-5">Celular(2):</label>
                    <div class="col-xs-5">
                      <input id="celular29" name="celular29" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
                      <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
                    </div>
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="guardarcon();">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
      <!-- /.FINAL.......Modificar contactos -->
