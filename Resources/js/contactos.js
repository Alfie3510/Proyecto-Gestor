function contactos(valor){
	if( valor.length == 0) {
 	$('#imagen_contacto').show();
 	$("#listac").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre</th><th>Area</th><th>Mail</th><th>Anexo</th><th>Celular(1)</th><th>Celular(2)</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8];
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modacontactos' onclick='mostrarc("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminarc("+'"'+valores[i][0]+'"'+","+'"'+valores[i][1]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html+="</tbody></table>"
	    $('#imagen_contacto').hide();
		$("#listac").html(html);
	});
}
}
function contactos2(valor){
		if( valor.length == 0) {
 	$('#imagen_contacto').show();
 	$("#listac").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>Nombre</th><th>Area</th><th>Mail</th><th>Anexo</th><th>Celular(1)</th><th>Celular(2)</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7];
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][6]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td></tr>";
		}
		html+="</tbody></table>"
		$('#imagen_contacto').hide();
		$("#listac").html(html);
	});
}
}

function mostrarc(datos){
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
	$("#id9").val(d[0]);
	$("#nombre9").val(d[1]);
	$("#area9").val(d[2]);
	$("#anexo9").val(d[3]);
	$("#celular19").val(d[4]);
	$("#celular29").val(d[5]);
	$("#mailc").val(d[6]);
	$("#actualizador_con").val(d[7]);
	$("#actualizador_fecha_con").val(fecha);

}


function guardarcon(){
	var datosform2=$("#formcontactos").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar"
}).done(function(resp){
		if(resp==='exito_555'){
			$('#exito_c_m').show();
				contactos('');
		}
		else{
			alert(resp);
		}

	});

}

function eliminarc(id,nombre){
    var r = confirm("se eliminara a "+nombre+" ¿estas seguro?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'id='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		contactos('');
	});

}else {

    }}

function eliminart(id,nombre){
    var r = confirm("se eliminara a "+nombre+" ¿estas seguro?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'id='+id+'&boton=eliminart'
	}).done(function(resp){
		alert(resp);
		totem('');
	});

}else {

    }}


function iniciar(){
	var datosform2=$("#inicioc").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=iniciar"
	}).done(function(resp){
		if(resp==='exito_854'){
			$('#exito_c').show();
				contactos('');

		}
		else{
			alert(resp);
		}
	});

}



function totem(valor){
	if( valor.length == 0) {
 	$('#imagen2').show();
 	$("#listat").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscart'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>Totem</th><th>MAC</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2];
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modatotem' onclick='m_totem("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button><button class='btn btn-danger' onclick='eliminart("+'"'+valores[i][0]+'"'+","+'"'+valores[i][1]+'"'+")'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		$("#listat").html(html);
			  document.getElementById('imagen2').style.display = 'none';

	});
}
}
function totem2(valor){
	if( valor.length == 0) {
 	$('#imagen2').show();
 	$("#listat").html("");
 	   } else {
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=buscart'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered'><thead><tr><th>#</th><th>Totem</th><th>MAC</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2];
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td></tr>";
		}
		html+="</tbody></table>"
		$("#listat").html(html);
			  document.getElementById('imagen2').style.display = 'none';

	});
}
}
function m_totem(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	$("#id_totem").val(d[0]);
	$("#seriet_m").val(d[1]);

	var variable=d[2];
		var macc=variable.split("-");
	 	$("#mac1m").val(macc[0]);
	 	$("#mac2m").val(macc[1]);
	 	$("#mac3m").val(macc[2]);
	 	$("#mac4m").val(macc[3]);
	 	$("#mac5m").val(macc[4]);
	 	$("#mac6m").val(macc[5]);
	 	$("#mac7m").val(macc[6]);


}

function mtotem(){
	var datosform2=$("#totemm").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=mtotem"
}).done(function(resp){
		if(resp==='exito_totem_2'){
			$('#exito_totem_11').show();
totem('');
		}
		else{
			alert(resp);
		}

	});

}

function ingtotem(){
	var datosform2=$("#totem").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=ingtotem"
}).done(function(resp){
		if(resp==='exito_totem_1'){
			$('#exito_totem').show();
totem('');
		}
		else{
			alert(resp);
		}

	});

}
function turno(valor){
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:'valor='+valor+'&boton=turno'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<div class='container-fluid'> <div class='row'><div class='col-md-12'><table class='table'><thead><tr><th>Nombre</th><th>Area</th><th>Fin del turno</th><th>Estado</th><th>Anexo</th><th>Telefono 1</th><th>Telefono 2</th><th>Observacion</th><th>Modificar</th></tr></thead><tbody>";



		for(i=0;i<valores.length;i++){

//hora actual fin
			/* Capturamos la Hora, los minutos y los segundos */
			marcacion = new Date()
			/* Capturamos la Hora */
			Hora = marcacion.getHours()
			/* Capturamos los Minutos */
			Minutos = marcacion.getMinutes()
			/* Capturamos los Segundos */
			Segundos = marcacion.getSeconds()
			/*variable para el apóstrofe de am o pm*/
			if (Hora == 0)
			Hora = 12
			/* Si la Hora, los Minutos o los Segundos son Menores o igual a 9, le añadimos un 0 */
			if (Hora <= 9) Hora = "0" + Hora
			if (Minutos <= 9) Minutos = "0" + Minutos
			/* Termina el Script del Reloj */

			/*Script de la Fecha */

			var Dia = new Array("00","01", "02", "03", "04", "05", "06", "07", "08", "09","10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
			var Mes = new Array("01", "02", "03", "04", "05", "06", "07", "08", "09","10", "11", "12");
			var Hoy = new Date();
			var Anio = Hoy.getFullYear();
			var Fecha = Anio + "-" + Mes[Hoy.getMonth()] + "-" + Dia[Hoy.getDate()] + "T";

			/* Termina el script de la Fecha */

			/* Creamos 2 variables para darle formato a nuestro Script */
			var Script, Total

			/* En Reloj le indicamos la Hora, los Minutos y los Segundos */
			Script = Fecha + Hora + ":" + Minutos

			/* En total Finalizamos el Reloj uniendo las variables */
			Total = Script

			/* Capturamos una celda para mostrar el Reloj */

//hora actual fin


			if (valores[i][2] <= Total) {
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9];
			html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td> <input readonly='readonly' id='t_fecha' name='t_fecha'  type='datetime-local' class='form-control' value="+'"'+valores[i][2]+'"'+" style='width:90%'></td><td><div id='circulor'><p></p> </div></td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td><textarea readonly >"+valores[i][6]+"</textarea></td> <td><button class='btn btn-warning' data-toggle='modal' data-target='#turnopp' onclick='m_turno("+'"'+datos+'"'+");a_turno("+'"'+valores[i][1]+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td></tr>";
		}
		  else {
				datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9];
				html+="<tr><td>"+valores[i][0]+"</td><td>"+valores[i][1]+"</td><td> <input readonly='readonly' id='t_fecha' name='t_fecha'  type='datetime-local' class='form-control' value="+'"'+valores[i][2]+'"'+" style='width:90%'></td><td><div id='circulov'><p></p> </div></td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td>"+valores[i][5]+"</td><td><textarea readonly >"+valores[i][6]+"</textarea></td> <td><button class='btn btn-warning' data-toggle='modal' data-target='#turnopp' onclick='m_turno("+'"'+datos+'"'+");a_turno("+'"'+valores[i][1]+'"'+");'><span class='glyphicon glyphicon-pencil'></span></button></td></tr>";
		  }
		}
		html+="</tbody></table></div></div></div>"
		$("#turno").html(html);
setTimeout("turno()", 60000)
	});
}


function m_turno(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);
	$("#t_area").val(d[1]);
	$("#t_resolutor").val(d[0]);
	$("#t_fecha_fin").val(d[2]);
	$("#ohbse").val(d[6]);
	$("#idturn").val(d[7]);
	$("#actualizador_turn").val(d[8]);
	$("#actualizador_fecha").val(d[9]);


}

function a_turno(valor){
	//alert(valor);
  $.ajax({
	url:'../Controllers/contactos.php',
    type:'POST',
    cache:false,
    data:'valor='+valor+'&boton=area_turno'
  }).done(function(resp){
    //alert(resp);
    var valores = eval(resp);
    html="<select id='cargo' onchange='mostrarturno(this.value);' name='cargo' type='text' class='form-control'><option value='3'>Ingrese personal de turno...</option>";

    for(i=0;i<valores.length;i++){
      html+="<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
    }
    html+="</select>"
    $("#turnosoo").html(html);
        $("#turnosoo").html(html);


  });
}

var mostrarturno = function(x){
document.getElementById('idturn').value=x;
}

function guardarc(){

var datosform2=$("#for_turno").serialize();
var datosform3 = datosform2.replace(/%22|'/g, "");
var datosform = datosform3.replace(/%0D%0A/g, " ");
//alert(datosform2);
//alert(datosform);
	$.ajax({
		url:'../Controllers/contactos.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=actualizar_t"
}).done(function(resp){
		if(resp==='exito_cu'){
			$('#exito_turno').show();
				turno('');
		}
		else{
			alert(resp);
		}

	});

}
