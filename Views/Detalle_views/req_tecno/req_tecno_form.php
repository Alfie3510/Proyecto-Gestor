<!-- /.Ingresar requerimientos tecno -->

<div class="modal fade" id="registrar_procedimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h2 class="modal-title">Datos del precedimiento.</h2>
     </div>
     <div class="modal-body">
       <div class="alert alert-success text-center" id="exito_p" style="display:none;">
         <span class="glyphicon glyphicon-ok"> </span><span> Procedimiento registrado</span>
       </div>
       <form class="form-horizontal" id="formLibrop">
         <div class="form-group">
           <label for="tipo" class="control-label col-xs-5">Tipo de requerimiento:</label>
           <div class="col-xs-5">
             <input  type="hidden" id="idlib1" name="idlib1"/>
             <input id="tipo1" name="tipo1" type="text" class="form-control" placeholder="Ingrese tipo de requermiento">
           </div>
         </div>
         <div class="form-group">
           <label for="Solicitante" class="control-label col-xs-5">Solicitante:</label>
           <div class="col-xs-5">
             <input id="Solicitante1" name="Solicitante1" type="text" class="form-control" placeholder="Ingrese Solicitante">
           </div>
         </div>
         <div class="form-group">
           <label for="Plantilla" class="control-label col-xs-5">Plantilla:</label>
           <div class="col-xs-5">
             <input id="Plantilla1" name="Plantilla1"  type="text" class="form-control" placeholder="Ingrese Plantilla">
           </div>
         </div>
         <div class="form-group">
           <label for="Resolutor" class="control-label col-xs-5">Resolutor:</label>
           <div class="col-xs-5">
             <input id="Resolutor1" name="Resolutor1" type="text" class="form-control" placeholder="Ingrese Resolutor">
           </div>
         </div>
         <div class="form-group">
           <label for="vb" class="control-label col-xs-5">vb:</label>
           <div class="col-xs-5">
             <input id="vb1" name="vb1" type="text" class="form-control" placeholder="Ingrese vb°">
           </div>
         </div>
         <div class="form-group">
           <label for="Resolutor2" class="control-label col-xs-5">2° Resolutor:</label>
           <div class="col-xs-5">
             <input id="Resolutor21" name="Resolutor21" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
           </div>
         </div>
         <div class="form-group">
           <label for="Cierre" class="control-label col-xs-5">VB° de Cierre:</label>
           <div class="col-xs-5">
             <input id="Cierre1" name="Cierre1" type="text" class="form-control" placeholder="Ingrese VB° de Cierre">
           </div>
         </div>
         <div class="form-group">
           <label for="Envio" class="control-label col-xs-5">Envio de cierre:</label>
           <div class="col-xs-5">
             <input id="Envio1" name="Envio1" type="text" class="form-control" placeholder="Ingrese a quien se envia cierre">
             <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
           </div>
         </div>

       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
       <button type="button" class="btn btn-success" onclick="registrarp();">Guardar</button>
     </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.FINAL...............Ingresar procedimiento -->

<!-- /.Modificar procedimiento -->
<div class="modal fade" id="modallibros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Datos del precedimiento.</h2>
      </div>
      <div class="modal-header">
 <div class="form-inline">
      <label for="area" class="control-label ">Actualizado por:</label>

        <input readonly id="actualizador_req" name="actualizador_req" type="text" class="form-control" >
        <input readonly id="actualizador_fecha_req" name="actualizador_fecha_req" type="datetime-local" class="form-control" >


    </div>
</div>
      <div class="modal-body">
        <div class="alert alert-success text-center" id="exito" style="display:none;">
          <span class="glyphicon glyphicon-ok"> </span><span> Se modifica procedimiento correctamente :)</span>
        </div>
        <form class="form-horizontal" id="formLibro">
          <div class="form-group">
            <label for="tipo" class="control-label col-xs-5">Tipo de requerimiento:</label>
            <div class="col-xs-5">
              <input  type="hidden" id="idlib" name="idlib"/>
              <input id="tipo" name="tipo" type="text" class="form-control" placeholder="Ingrese tipo de requermiento">
            </div>
          </div>
          <div class="form-group">
            <label for="Solicitante" class="control-label col-xs-5">Solicitante:</label>
            <div class="col-xs-5">
              <input id="Solicitante" name="Solicitante" type="text" class="form-control" placeholder="Ingrese Solicitante">
            </div>
          </div>
          <div class="form-group">
            <label for="Plantilla" class="control-label col-xs-5">Plantilla:</label>
            <div class="col-xs-5">
              <input id="Plantilla" name="Plantilla"  type="text" class="form-control" placeholder="Ingrese Plantilla">
            </div>
          </div>
          <div class="form-group">
            <label for="Resolutor" class="control-label col-xs-5">Resolutor:</label>
            <div class="col-xs-5">
              <input id="Resolutor" name="Resolutor" type="text" class="form-control" placeholder="Ingrese Resolutor">
            </div>
          </div>
          <div class="form-group">
            <label for="vb" class="control-label col-xs-5">vb:</label>
            <div class="col-xs-5">
              <input id="vb" name="vb" type="text" class="form-control" placeholder="Ingrese vb°">
            </div>
          </div>
          <div class="form-group">
            <label for="Resolutor2" class="control-label col-xs-5">2° Resolutor:</label>
            <div class="col-xs-5">
              <input id="Resolutor2" name="Resolutor2" type="text" class="form-control" placeholder="Ingrese 2° Resolutor ">
            </div>
          </div>
          <div class="form-group">
            <label for="Cierre" class="control-label col-xs-5">VB° de Cierre:</label>
            <div class="col-xs-5">
              <input id="Cierre" name="Cierre" type="text" class="form-control" placeholder="Ingrese VB° de Cierre">
            </div>
          </div>
          <div class="form-group">
            <label for="Envio" class="control-label col-xs-5">Envio de cierre:</label>
            <div class="col-xs-5">
              <input id="Envio" name="Envio" type="text" class="form-control" placeholder="Ingrese Ediccion">
              <input  type="hidden" id="usuarioact" name="usuarioact" value="<?php echo $actualiza; ?>">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiar();">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="guardar();">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<!-- /.FINAL.......Modificar procedimiento -->
