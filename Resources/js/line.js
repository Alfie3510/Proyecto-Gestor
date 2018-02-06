

function consultar_line(valor){
	if( valor.length == 0) {
		$('#imagen').show();
		$("#lista").html("");
	} else { 
		$.ajax({
			url:'../Controllers/line.php',
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
			html="<table class='table table-bordered small text-left '><thead><tr class='info'><th>#</th><th>OPID</th><th>BusID</th><th>Patente</th><th>Unidad de negocio</th><th>Status equipamiento</th><th>Tipo de Bus</th><th>Tipo Flota</th><th>GPS</th><th>Fecha Alta</th><th>Tipo(Alta/Instalación)</th><th>Concesionario</th><th>Torniquete</th><th>Observaciones</th></tr></thead><tbody>";
			for(i=0;i<valores.length;i++){
				html+="<tr><td bgcolor='#fff'>"+(i+1)+"</td><td bgcolor='#fff'>"+valores[i][0]+"</td><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'>"+valores[i][4]+"</td><td bgcolor='#fff'>"+valores[i][5]+"</td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'>"+valores[i][7]+"</td><td bgcolor='#fff'>"+valores[i][8]+"</td><td bgcolor='#fff'>"+valores[i][9]+"</td><td bgcolor='#fff'>"+valores[i][10]+"</td><td bgcolor='#fff'>"+valores[i][11]+"</td><td bgcolor='#fff'>"+valores[i][12]+"</td></tr>";
			}
			html+="</tbody></table>"
			$("#lista").html(html);
			document.getElementById('imagen').style.display = 'none';

		}});
}
}
function line_act(){
	$.ajax({
		url:'../Controllers/line.php',
		type:'POST',
		cache:false,
		data:'boton=info'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-striped small text-left '><thead><tr class='success'><th>Actulizo</th><th>Fecha</th><th>version</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td bgcolor='#fff'>"+valores[i][13]+"</td><td bgcolor='#fff'>"+valores[i][14]+"</td><td bgcolor='#fff'>"+valores[i][15]+"</td></tr>";
		}
		html+="</tbody></table>"
		$("#infor").html(html);


	});
}


function m_boton_el(){
	$.ajax({
		url:'../Controllers/line.php',
		type:'POST',
		cache:false,
		data:'boton=mostrar_boton_confi'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-striped small text-left '><thead><tr class='info'><th>Nombre</th><th>Tipo</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6];
			html+="<tr><td bgcolor='#fff'><button type='button'  class='btn btn-default' style='width:100%;'>"+valores[i][2]+"</button></td><td bgcolor='#fff'><label>"+valores[i][1]+"</label></input></td><td bgcolor='#fff'><button class='btn btn-warning' data-toggle='modal' style='width:100%;'  data-target='#botonem' onclick='mostrarb("+'"'+datos+'"'+");'>Modificar</button><button type='button'  class='btn btn-danger' style='width:100%;' onclick='eliminar_b("+'"'+valores[i][0]+'"'+");'>Eliminar</button></td></tr>";
		}
		html+="</tbody></table>"
		$("#botones_OP_22").html(html);
		


	});
}

function mostrarb(datos){
	//alert(datos);
	var d=datos.split("*");
	var glosac = d[3];
	var ppuact = d[4];
	var categ = d[5];
	var letras = d[6];
	//alert(d.length);		
	glosasc = glosac.replace(/blue/g, "\n");
	$("#id_b_m").val(d[0]);
	$("#b_boton_m").val(d[2]);
	$("#b_text_m").val(glosasc);
	$("#con_act").val(d[1]);
	$("#con_act").text(d[1]);
	

if (letras == "true") {
		document.getElementById("agr_txt_m").checked=true;
	}else{
		document.getElementById("agr_txt_m").checked=false;
	};
	if (ppuact == "true") {
		document.getElementById("ppusm").checked=true;
	}else{
		document.getElementById("ppusm").checked=false;
	};
	if(categ == 1){
		$("#cat_act").val(d[5]);
		$("#cat_act").text("Creacion de OS");

	}else if (categ == 2) {

		$("#cat_act").val(d[5]);
		$("#cat_act").text("Inicio");
	}else if (categ == 3) {

		$("#cat_act").val(d[5]);
		$("#cat_act").text("Bajada");
	}else{};

}
function checkbtn(){
 if (document.getElementById('ppus').checked==true){
document.getElementById("agr_txt").checked=false;
  }else if (document.getElementById('agr_txt').checked==true){
document.getElementById("ppus").checked=false;
  }else{

  }

   if (document.getElementById('ppusm').checked==true){
document.getElementById("agr_txt_m").checked=false;
  }else if (document.getElementById('agr_txt_m').checked==true){
document.getElementById("ppusm").checked=false;
  }else{

  }
  }

function eliminar_b(id){
	var r = confirm("Seguro lo quieres eliminar?");
	if (r == true) {
		$.ajax({
			url:'../Controllers/line.php',
			type:'POST',
			cache:false,
			data:'id_b='+id+'&boton=eliminar_b'
		}).done(function(resp){
			alert(resp);
			m_boton_el();
			m_boton();
			m_boton_t();
		});

	}

	else {

	}}


	function m_boton(){
		$.ajax({
			url:'../Controllers/line.php',
			type:'POST',
			cache:false,
			data:'boton=mostrar_boton'
		}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-striped small text-left '><tbody>";
		html2="";
		html3="";
		for(i=0;i<valores.length;i++){
			var  categoria = valores[i][5];
			if(categoria==1){
				html+="<tr><td bgcolor='#fff'><button type='button'  id='glosa24' name='glosa24' class='btn btn-default' value="+'"'+valores[i][3]+'"'+", "+'"'+valores[i][4]+'"'+" style='width:100%;' onclick='pegar("+'"'+valores[i][3]+'"'+","+'"'+valores[i][4]+'"'+","+'"'+valores[i][6]+'"'+");'>"+valores[i][2]+"</button></td></tr>";
			}
			else if(categoria==2){
				html2+="<tr><td bgcolor='#fff'><button type='button'  id='glosa24' name='glosa24' class='btn btn-default' value="+'"'+valores[i][3]+'"'+", "+'"'+valores[i][4]+'"'+" style='width:100%;' onclick='pegar("+'"'+valores[i][3]+'"'+","+'"'+valores[i][4]+'"'+","+'"'+valores[i][6]+'"'+");'>"+valores[i][2]+"</button></td></tr>";
			}
			else {
				html3+="<tr><td bgcolor='#fff'><button type='button'  id='glosa24' name='glosa24' class='btn btn-default' value="+'"'+valores[i][3]+'"'+", "+'"'+valores[i][4]+'"'+" style='width:100%;' onclick='pegar("+'"'+valores[i][3]+'"'+","+'"'+valores[i][4]+'"'+","+'"'+valores[i][6]+'"'+");'>"+valores[i][2]+"</button></td></tr>";
			}

		}
		html3+="</tbody></table>"
		$("#botones_OP1").html(html);
		$("#botones_OP2").html(html2);
		$("#botones_OP3").html(html3);



	});
}

function m_boton_t(){
	$.ajax({
		url:'../Controllers/line.php',
		type:'POST',
		cache:false,
		data:'boton=mostrar_boton_t'
	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-striped small text-left '><tbody>";
		for(i=0;i<valores.length;i++){

			html+="<tr><td bgcolor='#fff'><button type='button'  class='btn btn-default' style='width:100%;' onclick='pegar_t("+'"'+valores[i][3]+'"'+");'>"+valores[i][2]+"</button></tr></td>";
		}
		html+="</tbody></table>"
		$("#botones_OP_t").html(html);


	});
}
function boton_ingre(){
	var datosform2=$("#botones").serialize();
	var datosform = datosform2.replace(/%22|'/g, "");
	var check = document.getElementById("ppus").checked;
	var check2 = document.getElementById("agr_txt").checked;
	$.ajax({
		url:'../Controllers/line.php',
		type:'POST',
		cache:false,
		data:datosform+'&check='+check+'&check2='+check2+'&boton=ingresar'
	}).done(function(resp){
		if(resp==='exito'){
			//$('#exito').show();
			alert("Se ingresa correctamente");
			m_boton();
			m_boton_t();
			m_boton_el();
		}
		
	});
	
}

function boton_ingre_modi(){
	var datosform2=$("#botones_m").serialize();
	var datosform = datosform2.replace(/%22|'/g, "");
	var check = document.getElementById("ppusm").checked;
	var check2 = document.getElementById("agr_txt_m").checked;
	$.ajax({
		url:'../Controllers/line.php',
		type:'POST',
		cache:false,
		data:datosform+'&check='+check+'&check2='+check2+'&boton=ingresar_m'
	}).done(function(resp){
		if(resp==='exito'){
			//$('#exito').show();
			alert("Se modica correctamente");
			m_boton();
			m_boton_t();
			m_boton_el();
		}
		
	});
	
}
function ingresos(){
	var datosform2=$("#conversor").serialize();
	var datosform = datosform2.replace(/%22|'/g, "");
	$.ajax({
		url:'../Controllers/line.php',
		type:'POST',
		cache:false,
		data:datosform+"&boton=ingresar_r"
	}).done(function(resp){
		if(resp==='exito'){
			//$('#exito').show();

			registro();

		}
		
	});
	
}



function pegar(glosa, ppu, txt){
	var ppus = ppu;
	var txts = txt;
	var glosa34d=document.getElementById("patente").value;
	var glosa34dd=document.getElementById("esm").value;
	glosa34d=glosa34d.toUpperCase();
	if(glosa34d === '' && ppus === 'false' && txts === 'false'){
		var glosas = glosa;
		glosas2 = glosas.replace(/blue/g, "\n");
		document.getElementById("textbuses").value= glosas2;

	}else if(glosa34dd === 'undefined' && ppus === 'false' && txts === 'false'){
		var glosas = glosa;
		glosas2 = glosas.replace(/blue/g, "\n");
		document.getElementById("textbuses").value= glosas2;

	}
	else if(glosa34dd !== 'undefined' && ppus === 'false' && txts === 'false'){
		var glosas = glosa;
		glosas2 = glosas.replace(/blue/g, "\n");
		document.getElementById("textbuses").value= glosas2;

	}
	else if(glosa34dd === 'undefined' && ppus === 'true' && txts === 'false'){
		alert("Ingrese patente valida");

	}
	else if(glosa34d === '' && ppus === 'true' && txts === 'false'){
		alert("Ingrese patente valida");

	}else if(txts === 'true' && ppus === 'false'){
var glosas = glosa;
		glosas2 = glosas.replace(/blue/g, "\n");

		document.getElementById("textbuses").value+=("\n")+glosas2;

	}else{

		var glosas = glosa;
		glosas2 = glosas.replace(/blue/g, "\n");
		document.getElementById("textbuses").value=("PPU: ") +glosa34d+("\n");
		document.getElementById("textbuses").value+= glosas2;
	}

}
function pegar_t(glosa){
	var glosas = glosa;
	glosas2 = glosas.replace(/blue/g, "\n");
	document.getElementById("mp_tt").value= glosas2;

}
function boton_real(){
	var espacio = "blue";
	var texto = $('#b_text').val();
	texto = texto.replace(/\n/g, espacio);
	document.getElementById("glosa_r").value= texto;
///aqui empieza la modificacion estimado programador.
	var espacio2 = "blue";
	var texto2 = $('#b_text_m').val();
	texto2 = texto2.replace(/\n/g, espacio2);
	document.getElementById("glosa_r_m").value= texto2;

}


function cambio(){
	if ($(pod).val() === "NEC - Atención Terreno" || $(pod).val() === "SERVCAL - Atención Terreno") {
		$(pod).css("background-color", "green");
		$(pod).css("color", "black");
	}
	else{
		$(pod).css("background-color", "");
	}
}

function cambio2(){
	if ($(tflota).val() === "BUS NO OPERATIVO" || $(tflota).val() === "NO OPERATIVO") {
		$(tflota).css("background-color", "red");
		$(pod).css("background-color", "red");
		$(patente).css("background-color", "red");
	}
	else{
		$(tflota).css("background-color", "");
		$(patente).css("background-color", "");
	}
}
function registro(){
	var datosform2=$("#conversor222").serialize();
	var datosform = datosform2.replace(/%22|'/g, "");
		//alert(datosform);
		$.ajax({
			url:'../Controllers/line.php',
			type:'POST',
			cache:false,
			data:datosform+"&boton=buscar_regis"
		}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered small text-left '><thead><tr class='info'><th>#</th><th>Tecnico</th><th>OS</th><th>Patente</th><th>Glosa</th><th>Asiste</th><th>Fecha</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td bgcolor='#fff'>"+(i+1)+"</td><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'><textarea>"+valores[i][4]+"</textarea></td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'> <input readonly='readonly' type='datetime-local' class='form-control' value="+'"'+valores[i][7]+'"'+" style='width:90%'></td> </tr>";
		}
		html+="</tbody></table>"
		$("#registro_67").html(html);
	});
	}

	function registrofiltro(){
		var datosform2=$("#conversor222").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
		//alert(datosform);
		$.ajax({
			url:'../Controllers/line.php',
			type:'POST',
			cache:false,
			data:datosform+"&boton=buscar_regis_filtro"
		}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);
		html="<table class='table table-bordered small text-left '><thead><tr class='success'><th>#</th><th>Tecnico</th><th>OS</th><th>Patente</th><th>Glosa</th><th>Asiste</th><th>Fecha</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			html+="<tr><td bgcolor='#fff'>"+(i+1)+"</td><td bgcolor='#fff'>"+valores[i][1]+"</td><td bgcolor='#fff'>"+valores[i][2]+"</td><td bgcolor='#fff'>"+valores[i][3]+"</td><td bgcolor='#fff'><textarea>"+valores[i][4]+"</textarea></td><td bgcolor='#fff'>"+valores[i][6]+"</td><td bgcolor='#fff'> <input readonly='readonly' type='datetime-local' class='form-control' value="+'"'+valores[i][7]+'"'+" style='width:90%'></td> </tr>";
		}
		html+="</tbody></table>"
		$("#registro_67").html(html);
	});
	}


	function line_conversor(){
		var datosform2=$("#conversor").serialize();
		var datosform = datosform2.replace(/%22|'/g, "");
		$.ajax({
			url:'../Controllers/line.php',
			type:'POST',
			cache:false,
			data:datosform+'&boton=conversor'
		}).done(function(resp){
    //alert(resp);


    var valores = eval(resp);

    for(i=0;i<valores.length;i++){
    	datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10]+"*"+valores[i][11]+"*"+valores[i][12];
    }
    var d=datos.split("*");
  //alert(d.length);
  $("#pst").val(d[10]);
  $("#bid").val(d[1]);
  $("#tflota").val(d[6]);
  $("#pod").val(d[12]);
  $("#torniquete").val(d[11]);
  document.getElementById("textbuses").value= "PPU: " +d[2]+"\n ";

  if(d[10] ==='U1 - Alsacia'){

  	$("#esm").val('Servcal');

  }
  if(d[10] ==='U2 - Su Bus'){

  	$("#esm").val('Nec');

  }
  if(d[10] ==='U4 - Express'){

  	$("#esm").val('Servcal');

  }
  if(d[10] ==='U3 - Vule'){

  	$("#esm").val('Nec');

  }
  if(d[10] ==='U7 - STP'){

  	$("#esm").val('Siemens');

  }
  if(d[10] ==='U5 - Metropolitana'){

  	$("#esm").val('Siemens');

  }
  if(d[10] ==='U6 - Redbus'){

  	$("#esm").val('Rocca');

  }
  if(d[10] ==='undefined'){

  	$("#esm").val('undefined');

  }

  cambio();
  cambio2();


});
}
