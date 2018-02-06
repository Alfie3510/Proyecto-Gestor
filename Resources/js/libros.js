function lista_libros(valor){

 if( valor.length == 0) {
 	$('#imagen').show();
 	$("#lista").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista").html(error);
		  $('#imagen').hide();
 	   } else {

		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Tipo de requerimiento</th><th>Solicitante</th><th>Plantilla</th><th>Resolutor</th><th>VB°</th><th>2° Resolutor</th><th>VB° de Cierre</th><th>Envio de cierre</th><th>Leer más</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10];
			html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'>"+valores[i][7]+"</td><td bgcolor='#fff'>"+valores[i][8]+"</td><td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='proce_tec_req'><textarea style='display:none;' name='nombre'>"+valores[i][1]+"</textarea><button class='btn btn-primary' type='submit' target='_blank'><span class='glyphicon glyphicon-book'></span></button></form></td><td bgcolor='#fff'><button class='btn btn-warning' data-toggle='modal' data-target='#modallibros' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		  $('#imagen').hide();
		$("#lista").html(html);


	}});
}
}

function lista_libros2(valor){
	if( valor.length == 0) {
 	$('#imagen').show();
 	$("#lista").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
				if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista").html(error);
		  $('#imagen').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class='table table-bordered small text-left '><thead><tr class='info'><th>#</th><th>Tipo de requerimiento</th><th>Solicitante</th><th>Plantilla</th><th>Resolutor</th><th>VB°</th><th>2° Resolutor</th><th>VB° de Cierre</th><th>Envio de cierre</th><th>Leer más</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10];
			html+="<tr><td bgcolor='#fff'>"+(i+1)+"</td><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'>"+valores[i][7]+"</td><td bgcolor='#fff'>"+valores[i][8]+"</td><td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='proce_tec_req'><textarea style='display:none;' name='nombre'>"+valores[i][1]+"</textarea><button class='btn btn-primary' type='submit' target='_blank'><span class='glyphicon glyphicon-book'></span></button></form></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista").html(html);
		document.getElementById('imagen').style.display = 'none';

	}});
}
}
function guardar(){
	var datosform=$("#formLibro").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito').show();
			lista_libros('');
		}
		else{
			alert(resp);
		}

	});

}

function mostrar(datos){
	//alert(datos);
	var d=datos.split("*");
value="2017-12-17T00:00"
  var cadena = d[10];
  año = cadena.substr(0,4);
  mes = cadena.substr(5,2);
  dia = cadena.substr(8,2);
  hora = cadena.substr(11,5);
  var fecha = año+"-"+mes+"-"+dia+"T"+hora;
//  alert(fecha);
	$("#idlib").val(d[0]);
	$("#tipo").val(d[1]);
	$("#Solicitante").val(d[2]);
	$("#Plantilla").val(d[3]);
	$("#Resolutor").val(d[4]);
	$("#vb").val(d[5]);
	$("#Resolutor2").val(d[6]);
	$("#Cierre").val(d[7]);
	$("#Envio").val(d[8]);
	$("#actualizador_req").val(d[9]);
  $("#actualizador_fecha_req").val(fecha);
}
function eliminar(id){
    var r = confirm("Seguro lo quieres eliminar?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'idlib='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		lista_libros('');
	});

}


else {

    }}

function registrarp(){
	var datosform2=$("#formLibrop").serialize();
	//alert(datosform2);
	var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=ingresar"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito_p').show();
			lista_libros('');

		}
		else{
			alert(resp);
		}

	});

}

function b_incidente(valor){
	if( valor.length == 0) {
 	$('#imagen_inci').show();
 	$("#lista_inci").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar_inci'
	}).done(function(resp){
		//alert(resp);
		if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista_inci").html(error);
		  $('#imagen_inci').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Tipo de incidente</th><th>Descripción</th><th>Quien reporta</th><th>Plantilla</th><th>Resolutor</th><th>2° Resolutor</th><th>Observaciones</th><th>Leer más</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9];
			html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'><textarea readonly>"+valores[i][7]+"</textarea></td>      <td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='inc_tecno'><textarea style='display:none;' name='nombre'>"+valores[i][2]+"</textarea><button class='btn btn-primary' type='submit' target='_blank'><span class='glyphicon glyphicon-book'></span></button></form></td><td bgcolor='#fff'><button class='btn btn-warning' data-toggle='modal' data-target='#modificar_incidente' onclick='mostrar_inc("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminar_inc("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_inci").html(html);
		document.getElementById('imagen_inci').style.display = 'none';

	}});
}
}
function b_incidente2(valor){
		if( valor.length == 0) {
 	$('#imagen_inci').show();
 	$("#lista_inci").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar_inci'
	}).done(function(resp){
		//alert(resp);
		if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista_inci").html(error);
		  $('#imagen_inci').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Tipo de incidente</th><th>Descripción</th><th>Quien reporta</th><th>Plantilla</th><th>Resolutor</th><th>2° Resolutor</th><th>Observaciones</th><th>Leer más</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
				html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'><textarea readonly>"+valores[i][7]+"</textarea></td>      <td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='inc_tecno'><textarea style='display:none;' name='nombre'>"+valores[i][2]+"</textarea><button class='btn btn-primary' type='submit'><span class='glyphicon glyphicon-book'></span></button></form></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_inci").html(html);
		document.getElementById('imagen_inci').style.display = 'none';

	}});
}
}
function nagios(){

	// document.getElementById('imagen_nagios').style.display = 'none';
 //	$("#lista_nagios").html("Proximamente");
           var valor=$('#buscar99').val();
            var valor2=$('#buscar299').val();
		if( valor.length == 0 & valor2.length == 0) {
 	$('#imagen_nagios').show();
 	$("#lista_nagios").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&valor2='+valor2+'&boton=buscar_nagios'
	}).done(function(resp){
		// alert(resp);
		if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista_nagios").html(error);
		  $('#imagen_nagios').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Host</th><th>Servicio</th><th>Plantilla</th><th>Resolutor</th><th>2° Resolutor</th><th>Observaciones</th><th>Leer más</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8];
			html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'><textarea readonly>"+valores[i][6]+"</textarea></td>      <td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='nagios'><textarea style='display:none;' name='nombre'>"+valores[i][1]+"</textarea><button class='btn btn-primary' type='submit'><span class='glyphicon glyphicon-book'></span></button></form></td><td bgcolor='#fff'><button class='btn btn-warning' data-toggle='modal' data-target='#modificar_nagios' onclick='mostrar_nagios("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminar_nagios("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_nagios").html(html);
		document.getElementById('imagen_nagios').style.display = 'none';

	}});
}
}
function nagios2(){
 //document.getElementById('imagen_nagios').style.display = 'none';
//$("#lista_nagios").html("Proximamente");
	            var valor9=$('#buscar999').val();
            var valor29=$('#buscar255').val();
			if( valor9.length == 0 & valor29.length == 0) {
 	$('#imagen_nagios').show();
 	$("#lista_nagios").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor9+'&valor2='+valor29+'&boton=buscar_nagios'
	}).done(function(resp){
		// alert(resp);
				if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista_nagios").html(error);
		  $('#imagen_nagios').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Host</th><th>Servicio</th><th>Plantilla</th><th>Resolutor</th><th>2° Resolutor</th><th>Observaciones</th><th>Leer más</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
				html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'><textarea readonly>"+valores[i][6]+"</textarea></td>      <td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='nagios'><textarea style='display:none;' name='nombre'>"+valores[i][1]+"</textarea><button class='btn btn-primary' type='submit'><span class='glyphicon glyphicon-book'></span></button></form></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_nagios").html(html);
		document.getElementById('imagen_nagios').style.display = 'none';

	}});
}
}
function tipo_m(){
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'&boton=tipos'
	}).done(function(resp){
    // alert(resp);
    var valores = eval(resp);


    for(i=0;i<valores.length;i++){

    	var x = document.getElementById("cargosss");
    	var option = document.createElement("option");
    	option.text = valores[i][1] ;
    	x.add(option);

    }


    for(i=0;i<valores.length;i++){

    	var x = document.getElementById("cargosss_b");
    	var option = document.createElement("option");
    	option.text = valores[i][1] ;
    	x.add(option);

    }



});
}

function tipos(){
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'&boton=tipos'
	}).done(function(resp){
    //alert(resp);
    var valores = eval(resp);
    html="<select id='cargo_inc' name='cargo_inc' type='text' class='form-control'>";

    for(i=0;i<valores.length;i++){
    	html+="<option >"+valores[i][1]+"</option>";
    }
    html+="</select>"

    $("#lista_tipo12").html(html);
    $("#lista_tipo1235").html(html);

        html2="<select id='cargo_inc' name='cargo_inc' type='text' class='form-control'>";


    	html2+="<option >INCIDENTE</option>";
    	html2+="<option >INCIDENTE CRITICO</option>";

    html2+="</select>"

    $("#lista_tipo123").html(html2);

});
}


function registrar_inci(){
	var datosform2=$("#form_inci").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=ingresar_inci"
	}).done(function(resp){
		if(resp==='exito_inc'){
			$('#exito_inci').show();
			b_incidente('');

		}
		else{
			alert(resp);
		}

	});

}

function registrar_nagios(){
	var datosform2=$("#form_nagios").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=ingresar_nagios"
	}).done(function(resp){
		if(resp==='exito_inc'){
			$('#exito_nagios').show();
			nagios('');

		}
		else{
			alert(resp);
		}

	});

}

function mostrar_inc(datos){
	//alert(datos);
	var d=datos.split("*");
  value="2017-12-17T00:00"
    var cadena = d[9];
    año = cadena.substr(0,4);
    mes = cadena.substr(5,2);
    dia = cadena.substr(8,2);
    hora = cadena.substr(11,5);
    var fecha = año+"-"+mes+"-"+dia+"T"+hora;
	//alert(d.length);
	$("#id_inc").val(d[0]);
	$("#cargo_inc_m").text(d[1]);
	$("#des_inc_m").val(d[2]);
	$("#rep_inc_m").val(d[3]);
	$("#plan_inc_m").val(d[4]);
	$("#res_1_m").val(d[5]);
	$("#res_2_m").val(d[6]);
	$("#obs_inc_m").val(d[7]);
  $("#actualizador_inc").val(d[8]);
  $("#actualizador_fecha_inc").val(fecha);

}

function mostrar_nagios(datos){
	//alert(datos);
	var d=datos.split("*");
  value="2017-12-17T00:00"
    var cadena = d[8];
    año = cadena.substr(0,4);
    mes = cadena.substr(5,2);
    dia = cadena.substr(8,2);
    hora = cadena.substr(11,5);
    var fecha = año+"-"+mes+"-"+dia+"T"+hora;
	//alert(d.length);
	$("#id_nagios").val(d[0]);
	$("#host_m").val(d[1]);
	$("#servicio_m").val(d[2]);
	$("#pantilla_m").val(d[3]);
	$("#resn_1_m").val(d[4]);
	$("#resn_2_m").val(d[5]);
	$("#obsn_m").val(d[6]);
  $("#actualizador_nag").val(d[7]);
  $("#actualizador_fecha_nag").val(fecha);

}
function mostrar_buses(datos){
	//alert(datos);
	var d=datos.split("*");
  value="2017-12-17T00:00"
    var cadena = d[7];
    año = cadena.substr(0,4);
    mes = cadena.substr(5,2);
    dia = cadena.substr(8,2);
    hora = cadena.substr(11,5);
    var fecha = año+"-"+mes+"-"+dia+"T"+hora;
	//alert(d.length);
	$("#id_buses").val(d[0]);
	$("#cargo_buses_m").text(d[2]);
	$("#des_buses_m").val(d[1]);
	$("#rep_buses_m").val(d[3]);
	$("#plan_buses_m").val(d[4]);
	$("#obs_buses_m").val(d[5]);
  $("#actualizador_bus").val(d[6]);
  $("#actualizador_fecha_bus").val(fecha);

}
function modificar_inci(){
	var datosform2=$("#form_inci_m").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar_inci"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito_inci_m').show();
			b_incidente('');
		}
		else{
			alert(resp);
		}

	});

}

function modificar_nagios(){
	var datosform2=$("#form_nagios_m").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar_nagios"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito_nagios_m').show();
			nagios('');
		}
		else{
			alert(resp);
		}

	});

}

function modificar_buses(){
	var datosform2=$("#form_buses_m").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar_buses"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito_buses_m').show();
			b_proce_buses('');
		}
		else{
			alert(resp);
		}

	});

}

function mostra_pro(){
	var datosform=$("#ID_P").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=m_pro"
	}).done(function(resp){

		//alert(resp);
		var valores = eval(resp);

		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2];
		}
		var d=datos.split("*");
 // alert(d.length);
 $("#id_pro_1").val(d[0])

var valores = eval(resp);
		html="<table class='table small text-left ' ><tbody>";
		for(i=0;i<valores.length;i++){
      //alert (valores[i][3].length);
     if (valores[i][3].length == 0) {
      html+="<tr><td bgcolor='#fff'><textarea   id='informe' name='informe' type='text' style='width: 100%; height:500px;font-size:14px; max-width: 772px; '>"+valores[i][3]+"</textarea></td> </tr>";
      }
     else {
      var cadena = valores[i][5];
      año = cadena.substr(0,4);
      mes = cadena.substr(5,2);
      dia = cadena.substr(8,2);
      hora = cadena.substr(11,5);

			html+="<tr><td bgcolor='#fff'><textarea   id='informe' name='informe' type='text' style='width: 100%; height:500px;font-size:14px; max-width: 772px; '>"+valores[i][3]+"</textarea></td> </tr><tr><td style='text-align: right'>Actualizado por: "+valores[i][4]+" el dia "+dia+"-"+mes+"-"+año+" a las "+hora+"hr</td></tr>";
		}
  }
		html+="</tbody></table>"
		$("#informes").html(html);

});
}

function mostra_img(){
	var datosform=$("#ID_P").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=img_mos"
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered small text-left ' ><thead><tr class='info'><th>Imagenes</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4];
			html+="<tr><td bgcolor='#fff'>"+valores[i][2]+"</td></tr><tr><td bgcolor='#fff'><img src='../Resources/img/Imagenespro/"+valores[i][1]+"/"+valores[i][3]+"'  width='100%' data-toggle='modal' data-target='#expfoto' style='cursor:pointer;' onclick='foto_exp("+'"'+datos+'"'+");'/></td></tr><tr><td bgcolor='#fff'>"+valores[i][4]+"</td> </tr>";
		}
		html+="</tbody></table>"
		$("#imagenes").html(html);

	});
}

function foto_exp(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	$("#id_img").val(d[0]);
  $("#id_img_c").val(d[1]);
	$("#tituloimg").text(d[2]);
    $("#n_img").val(d[3]);
	$("#fotoimg").html("<center><img src='../Resources/img/Imagenespro/"+d[1]+"/"+d[3]+"' width='90%' class='img-thumbnail'></center>");
	$("#leyendaimg").html(d[4]);

}
function eliminar_inc(id){
    var r = confirm("Seguro lo quieres eliminar?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'id_inc='+id+'&boton=eliminar_inc'
	}).done(function(resp){
		alert(resp);
		b_incidente('');
	});

}

else {

    }}

function eliminar_nagios(id){
    var r = confirm("Seguro lo quieres eliminar?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'id_inc='+id+'&boton=eliminar_nagios'
	}).done(function(resp){
		alert(resp);
		nagios('');
	});

}

else {

    }}

function eliminar_buses(id){
    var r = confirm("Seguro lo quieres eliminar?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'id_buses='+id+'&boton=eliminar_buses'
	}).done(function(resp){
		alert(resp);
		b_proce_buses('');
	});

}

else {

    }}
function eliminar_img(){
  var r = confirm("Seguro lo quieres eliminar?");
  if (r == true) {
	var datosform=$("#form_img_8").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=img_eli"
	}).done(function(resp){
		alert(resp);
    mostra_img();

	});
}
}
function actua_new_pro(){
	var datosform=$("#form_pro_8").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar_new_pro"
	}).done(function(resp){
		if(resp==='exito'){
			alert("Se actualiza de forma correcta :)");
			    mostra_pro();
		}
		else{
			alert(resp);
		}

	});

}

$(function(){
        $("#form_img").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("form_img"));

            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "../Controllers/libros.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            }).done(function(resp){
		if(resp==='exito88'){
			$('#exito997').show();
				     mostra_img();
		}
		else{
			alert(resp);
		}

                });
        });
    });
$(function(){
        $("#form_arch").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("form_arch"));

            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            //alert(formData);
            $.ajax({
                url: "../Controllers/libros.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false
            }).done(function(resp){
		if(resp==='exito89'){
			$('#exito997').show();
				     mostra_arch();
		}
		else{
			alert(resp);
		}

                });
        });
    });


function mostra_arch(){
	var datosform=$("#ID_P").serialize();
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=arch_mos"
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
html="<table class='table table-bordered small text-left ' ><th>Ruta</th><th>Usuario</th><th>Fecha de anexo</th><th>Eliminar</th>";
		for(i=0;i<valores.length;i++){
      var cadena = valores[i][4];
      año = cadena.substr(0,4);
      mes = cadena.substr(5,2);
      dia = cadena.substr(8,2);
      hora = cadena.substr(11,5);
			html+="<tr><td bgcolor='#fff'><a href='../Resources/doc/"+valores[i][1]+"/"+valores[i][2]+"' download>"+valores[i][2]+"</a></td><td>"+valores[i][3]+"</td><td>"+dia+"/"+mes+"/"+año+" "+hora+"hr</td><td bgcolor='#fff'><a  onclick='eliminar_doc("+'"'+valores[i][2]+'"'+","+valores[i][1]+")'><span class='glyphicon glyphicon-remove' ></span></a></td></tr>";

		}
			html+="</tbody></table>"
		$("#documento88").html(html);

	});
}
function eliminar_doc(id,cod){
  var r = confirm("Seguro lo quieres eliminar?");
  if (r == true) {
	//alert(id);
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'id='+id+'&cod='+cod+'&boton=eliminar_doc_1'
	}).done(function(resp){
		alert(resp);
		mostra_arch();
	});

}
}
function b_proce_buses(valor){
			if( valor.length == 0) {
 	$('#imagen_bus').show();
 	$("#lista_bus3").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar_buses'
	}).done(function(resp){
		//alert(resp);
				if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista_bus3").html(error);
		  $('#imagen_bus').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Solicitante</th><th>Tipo</th><th>Sintoma</th><th>Plantilla</th><th>Observaciones</th><th>Leer más</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];
			html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'><textarea readonly>"+valores[i][5]+"</textarea></td>      <td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='proce_buses'><textarea style='display:none;' name='nombre'>"+valores[i][3]+"</textarea><button class='btn btn-primary' type='submit'><span class='glyphicon glyphicon-book'></span></button></form></td><td bgcolor='#fff'><button class='btn btn-warning' data-toggle='modal' data-target='#modificar_p_buses' onclick='mostrar_buses("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminar_buses("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_bus3").html(html);
		document.getElementById('imagen_bus').style.display = 'none';

	}});
}
}
function b_proce_buses2(valor){
	if( valor.length == 0) {
 	$('#imagen_bus').show();
 	$("#lista_bus3").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar_buses'
	}).done(function(resp){
		//alert(resp);
		if( resp.length == 2) {
error="<center><label >SIN RESULTADOS</label><center>"
		$("#lista_bus3").html(error);
		  $('#imagen_bus').hide();
 	   } else {
		var valores = eval(resp);
		html="<table class=' table table-bordered small text-left '><thead><tr class='info'><th>Solicitante</th><th>Tipo</th><th>Sintoma</th><th>Plantilla</th><th>Observaciones</th><th>Leer más</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'><textarea readonly>"+valores[i][5]+"</textarea></td> <td bgcolor='#fff'><form name='formulario'method='GET'action='../Procedimientos/Procincidentes.php' target='_blank'><input type='hidden' name='id'value="+valores[i][0]+"><input type='hidden' name='tipo'value='proce_buses'><textarea style='display:none;' name='nombre'>"+valores[i][3]+"</textarea><button class='btn btn-primary' type='submit'><span class='glyphicon glyphicon-book'></span></button></form></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_bus3").html(html);
		document.getElementById('imagen_bus').style.display = 'none';

	}});
}
}
function registrar_buses(){
	var datosform2=$("#form_buses").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/libros.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=ingresar_buses"
	}).done(function(resp){
		if(resp==='exito_inc'){
			$('#exito_buses').show();
			b_proce_buses('');

		}
		else{
			alert(resp);
		}

	});

}
