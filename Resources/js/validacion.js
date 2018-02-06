



 function filtrar_reg(){

  $('#filtro2').hide();
  $('#filtro').show("fast");
  $('#filtro3').show();



}
function filtrar_reg_2(){

  $('#filtro2').show();
  $('#filtro').hide("fast");
  $('#filtro3').hide();



}


$("#tipo").click(function() {

   var tipo=$('#tipo').val();
if (tipo == "Tecno") {

      $('#busesupc').hide();
}
else{
 $('#busesupc').show();
 
}

});



        var fontSize = 1;
 
   
        function zoomIn() {
            fontSize += 0.1;
            document.getElementById('textbuses').style.fontSize = fontSize + "em";
        }
 
        function zoomOut() {
            fontSize -= 0.1;
            document.getElementById('textbuses').style.fontSize = fontSize + "em";
        }



      function limpiartodo(){
    document.getElementById("conversor").reset();
}

function limpiartotem(){
    document.getElementById("totem").reset();
    document.getElementById('exito_totem').style.display = 'none';
        document.getElementById('exito_totem_11').style.display = 'none';

}
function limpiar(){
    document.getElementById("formLibrop").reset();
    document.getElementById("inicioc").reset();
    document.getElementById('exito_p').style.display = 'none';
    document.getElementById('exito').style.display = 'none';
    document.getElementById('exito_c').style.display = 'none';
    document.getElementById('exito_c_m').style.display = 'none';


}
  function limpiar_inci(){
    document.getElementById("form_inci").reset();
    document.getElementById('exito_inci').style.display = 'none';
}

function limpiar_nagios(){
    document.getElementById("form_nagios").reset();
    document.getElementById('exito_nagios').style.display = 'none';
}
 function limpiar_buses(){
    document.getElementById("form_buses").reset();
    document.getElementById('exito_buses').style.display = 'none';
       document.getElementById('exito_buses_m').style.display = 'none';
}

  function limpiar_inci_m(){
    document.getElementById('exito_inci_m').style.display = 'none';
}
  function limpiar_nagios_m(){
    document.getElementById('exito_nagios_m').style.display = 'none';
}

      function limpiar_turno_c(){
    document.getElementById('exito_turno').style.display = 'none';
    

}

      function limpiar_contacto(){
    document.getElementById("formCliente").reset();
    document.getElementById('exito').style.display = 'none';
}

      function limpiar_usuario(){
        document.getElementById('exito112').style.display = 'none';
            document.getElementById('exito113').style.display = 'none';
}
 function limpiar_pass(){
    document.getElementById("password").reset();
            document.getElementById('exito25').style.display = 'none';
}

  function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                alert(resp);
                location.href="../"

            });
        }




        //  coversor buses
    var textaream = document.getElementById("textbuses");
    var answerm = document.getElementById("copyAnswerbuses");
    var copy   = document.getElementById("copyBlockbuses");
    copy.addEventListener('click', function(e) {
       textaream.select();
       try {
           var successful = document.execCommand('copy');
     
           if(successful) answerm.innerHTML = 'Copiado!';
           else answerm.innerHTML = 'Incapaz de copiar!';
       } catch (err) {
           answer.innerHTML = 'Browser no soportado!';
       }
    });



    //  coversor tecno
    var textareab = document.getElementById("mp_tt");
    var answerb = document.getElementById("copyAnswer_tt");
    var copy   = document.getElementById("copyBlock_tt");
    copy.addEventListener('click', function(e) {
       textareab.select();
       try {
           var successful = document.execCommand('copy');
     
           if(successful) answerb.innerHTML = 'Copiado!';
           else answerb.innerHTML = 'Incapaz de copiar!';
       } catch (err) {
           answer.innerHTML = 'Browser no soportado!';
       }
    });
	
	