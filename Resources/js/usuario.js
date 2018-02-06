function b_usuarios(valor,valor2,valor3){
	//alert(valor2);
	$.ajax({
		url:'../Controllers/ADM_USER.php',
		type:'POST',
	  cache:false,
    data:'valor='+valor+'&valor2='+valor2+'&valor3='+valor3+'&boton=buscar'
	}).done(function(resp){
		//alert(resp);
		//alert(resp.length);
	var valores = eval(resp);
	//alert(valores.length);
var cantidadporpagina = valor3;
var cantidadregistros = Math.ceil(valores.length/cantidadporpagina);
//alert (cantidadregistros);
		html="<table class='table'><thead><tr><th>#</th><th>Nombres</th><th>Apellidos</th><th>Usuario</th><th>Cargo</th><th>Accion</th></tr></thead><tbody>";
		for(i=0;i<valores.length;i++){
			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10]+"*"+valores[i][11]+"*"+valores[i][12]+"*"+valores[i][13]+"*"+valores[i][14]+"*"+valores[i][15]+"*"+valores[i][16]+"*"+valores[i][17];
			html+="<tr><td>"+(i+1)+"</td><td>"+valores[i][1]+"</td><td>"+valores[i][2]+"</td><td>"+valores[i][3]+"</td><td>"+valores[i][4]+"</td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modificar_usuario' onclick='mostrar_usuario("+'"'+datos+'"'+");cargoso();'><span class='glyphicon glyphicon-user'></span><span class='glyphicon glyphicon-cog'></span></button><button class='btn btn-danger' onclick='eliminar_usuario("+'"'+valores[i][0]+'"'+","+'"'+valores[i][3]+'"'+")'><span class='glyphicon glyphicon-user'></span><span class='glyphicon glyphicon-trash'></span></button></td></tr>";
		}
		html+="</tbody></table>"
		$("#lista_usuarios").html(html);
paginacion(valor,valor2,valor3);
	});
}

function paginacion(valor,valor2,valor3){

	$.ajax({
		url:'../Controllers/ADM_USER.php',
		type:'POST',
	  cache:false,
    data:'valor='+valor+'&valor2='+valor2+'&valor3='+valor3+'&boton=buscar_paginas'
	}).done(function(resp){
		//alert(resp);
		//alert(resp.length);
	var valores = eval(resp);
	//alert(valores.length);
var cantidadporpagina = valor3;
var cantidadregistros = Math.ceil(valores.length/cantidadporpagina);

var pageNum = Math.ceil(valor2/cantidadporpagina);
var total_paginas = cantidadregistros;
var pagdes = parseInt(valor2);
var pagant = parseInt(valor2);
		//alert(pageNum);
		//alert(total_paginas);
var pag=0;
if (pageNum == 0) {
	html="<ul class='pager'><li class='previus disabled'><a>&larr; Anterior</a></li>";
}
else {
	pagant = pagant - 10;
	html="<ul class='pager'><li class='previus'><a style='CURSOR: pointer' onclick='b_usuarios("+'"'+valor+'"'+","+'"'+pagant+'"'+","+'"'+valor3+'"'+")'>&larr; Anterior</a></li>";
}
		for(i=0;i<total_paginas;i++){

			if (pageNum == i) {
				html+="<li class='disabled'><a>"+(i+1)+"</a></li>"
			}
			else {
				html+="<li style='CURSOR: pointer'><a onclick='b_usuarios("+'"'+valor+'"'+","+'"'+pag+'"'+","+'"'+valor3+'"'+")'>"+(i+1)+"</a></li>"
			}
						pag = pag + 10;
			}
			if (total_paginas == (pageNum + 1)) {
				html+="<li class='disabled'><a>Siguiente &rarr;</a></li></ul>"
			}
			else {
				pagdes = pagdes + 10;
					html+="<li><a style='CURSOR: pointer' onclick='b_usuarios("+'"'+valor+'"'+","+'"'+pagdes+'"'+","+'"'+valor3+'"'+")'>Siguiente &rarr;</a></li></ul>"
			}

		$("#paginacion").html(html);
});
}

/*
<?php
$total_paginas = 8;
$pageNum = 2;
 if ($total_paginas > 1) {

																	 echo '<ul class="pagination">';
																			 if ($pageNum != 1)
																							 echo '<li><a data="'.($pageNum-1).'">Anterior</a></li>';
																				for ($i=1;$i<=$total_paginas;$i++) {
																							 if ($pageNum == $i)
																											 //si muestro el índice de la página actual, no coloco enlace
																											 echo '<li class="active"><a>'.$i.'</a></li>';
																							 else
																											 //si el índice no corresponde con la página mostrada actualmente,
																											 //coloco el enlace para ir a esa página
																											 echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
																			 }
																			 if ($pageNum != $total_paginas)
																							 echo '<li><a class="paginate" data="'.($pageNum+1).'">Siguiente</a></li>';
																	echo '</ul>';

															 }
?>
*/
function importantes(valor){
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:'valor='+valor+'&boton=buscar_imp'
  }).done(function(resp){
    //alert(resp.length);
    var valores = eval(resp);
    html="<table class='table'><thead><tr><th>#</th><th>OS</th><th>Titulo</th><th>Observacion</th><th>Fecha</th><th>Accion</th></tr></thead><tbody>";
    for(i=0;i<valores.length;i++){
      datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3];
      html+="<tr><td>"+(i+1)+"</td><td><label>"+valores[i][1]+"</label></td><td><label>"+valores[i][2]+"</label></td><td><textarea style='width:100%'>"+valores[i][3]+"</textarea></td><td style='width:20%'><input  type='datetime-local' class='form-control' value="+'"'+valores[i][4]+'"'+" style='width:100%'></td>  </td><td><button class='btn btn-warning' data-toggle='modal' data-target='#modificar_imppp' onclick='mostrar_importante("+'"'+datos+'"'+");'></span><span class='glyphicon glyphicon-cog'></span></button><button class='btn btn-danger' onclick='eliminar_imp("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-trash'></span></button></td></tr>";
    }
    html+="</tbody></table>"
    $("#lista_importante").html(html);
  });
}

function mostrar_importante(datos){
  //alert(datos);
  var d=datos.split("*");
  //alert(d.length);
  $("#idud1").val(d[0]);
  $("#OSOS").val(d[1]);
  $("#titulom").val(d[2]);
  $("#ob_88").val(d[3]);

}

function eliminar_imp(id){
    var r = confirm("¿Estas seguro?");
    if (r == true) {
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:'id='+id+'&boton=eliminar_imp'
  }).done(function(resp){
    alert(resp);
     importantes('');
  });

}
else {

    }}

function registrar_imp(){
  var datosform2=$("#importante_regi").serialize();
    var datosform = datosform2.replace(/%22|'/g, "");
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=ingresar_impo"
  }).done(function(resp){
    if(resp==='exito'){
      //$('#exito').show();

     importantes('');

    }

  });

}


function cargoso(){
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:'&boton=cargoso'
  }).done(function(resp){
    //alert(resp);
    var valores = eval(resp);
    html="<select id='cargo' onchange='mostrarValor(this.value);' name='cargo' type='text' class='form-control'><option value='3'>Ingrese nuevo cargo...</option>";

    for(i=0;i<valores.length;i++){
      html+="<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
    }
    html+="</select>"
    $("#listacargoso").html(html);
        $("#listacargoso_m").html(html);


  });
}



var mostrarValor = function(x){
document.getElementById('c1235').value=x;
}




function perfil(){
var datosform=$("#ID_U").serialize();
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=perfil"
  }).done(function(resp){
    //alert(resp);
    var valores = eval(resp);

    for(i=0;i<valores.length;i++){
      datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4];
    }
   var d=datos.split("*");
  //alert(d.length);
  $("#idu1").val(d[0]);
  $("#nombres1").val(d[1]);
  $("#apellidos1").val(d[2]);
  $("#email21").val(d[3]);
  $("#cargo1").val(d[4]);
  $("#reset").val(d[0]);



  });
}

 function validarPassword2()
      {
        valor = document.getElementById("pass6").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar Passwordss');
          return false;
          } else {
          valor2 = document.getElementById("pass26").value;

          if(valor == valor2) { return true; }
          else { alert('Las contraseña no coinciden'); return false;}
        }
      }

function passw(){

var datosform=$("#password").serialize();


        if(validarPassword2()){


  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=actualizar_pass"
}).done(function(resp){
    if(resp==='exito_556'){
      $('#exito25').show();
        b_usuarios('');
    }
    else{
      alert(resp);
    }

  });}

}

function modificar_usuario(){
  var datosform2=$("#moficar_usuario").serialize();
    var datosform = datosform2.replace(/%22|'/g, "");
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=actualizar_usuario"
}).done(function(resp){
    if(resp==='exito_5556'){
      $('#exito112').show();
        b_usuarios('','0','10');
    }
    else{
      alert(resp);
    }

  });

}
function modificar_impo(){
  var datosform2=$("#moficar_impp").serialize();
    var datosform = datosform2.replace(/%22|'/g, "");
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=actualizar_imp"
}).done(function(resp){
    if(resp==='exito_5556'){
      $('#exito112').show();
     importantes('');
    }
    else{
      alert(resp);
    }

  });

}

function modificar_permiso(){
  var datosform=$("#moficar_permiso").serialize();
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=moficar_per"
}).done(function(resp){
    if(resp==='exito_5556'){
      $('#exito112').show();
        b_usuarios('','0','10');
    }
    else{
      alert(resp);
    }

  });

}
function resetear(){
  var datosform=$("#resetear").serialize();
  $.ajax({
    url:'../Controllers/ADM_USER.php',
    type:'POST',
     cache:false,
    data:datosform+"&boton=resetear"
}).done(function(resp){
    if(resp==='exito_5559'){
      $('#exito113').show();
        b_usuarios('','0','10');
    }
    else{
      alert(resp);
    }

  });

}


function mostrar_usuario(datos){
	//alert(datos);
	var d=datos.split("*");
	//alert(d.length);


	$("#idu1").val(d[0]);
  $("#idu5").val(d[0]);
	$("#nombres1").val(d[1]);
	$("#apellidos1").val(d[2]);
	$("#email21").val(d[3]);
	$("#c1235").val(d[16]);
  $("#reset").val(d[0]);

if(d[5]==='1'){

document.getElementById("140").checked=true;
document.getElementById('1401').value= "1";


}
    else{
document.getElementById("140").checked=false;
document.getElementById('1401').value= "0";

}
if(d[6]==='1'){

document.getElementById("141").checked=true;
document.getElementById('1411').value= "1";

}
    else{
document.getElementById("141").checked=false;
document.getElementById('1411').value= "0";

}
if(d[7]==='1'){

document.getElementById("142").checked=true;
document.getElementById('1421').value= "1";

}
    else{
document.getElementById("142").checked=false;
document.getElementById('1421').value= "0";
}
if(d[8]==='1'){

document.getElementById("145").checked=true;
document.getElementById('1451').value= "1";


}
    else{
document.getElementById("145").checked=false;
document.getElementById('1451').value= "0";

}
if(d[9]==='1'){

document.getElementById("146").checked=true;
document.getElementById('1461').value= "1";


}
    else{
document.getElementById("146").checked=false;
document.getElementById('1461').value= "0";

}
if(d[10]==='1'){

document.getElementById("147").checked=true;
document.getElementById('1471').value= "1";


}
    else{
document.getElementById("147").checked=false;
document.getElementById('1471').value= "0";

}
if(d[11]==='1'){

document.getElementById("148").checked=true;
document.getElementById('1481').value= "1";


}
    else{
document.getElementById("148").checked=false;
document.getElementById('1481').value= "0";

}
if(d[12]==='1'){

document.getElementById("149").checked=true;
document.getElementById('1491').value= "1";


}
    else{
document.getElementById("149").checked=false;
document.getElementById('1491').value= "0";

}
if(d[13]==='1'){

document.getElementById("150").checked=true;
document.getElementById('1501').value= "1";


}
    else{
document.getElementById("150").checked=false;
document.getElementById('1501').value= "0";

}
if(d[14]==='1'){

document.getElementById("151").checked=true;
document.getElementById('1511').value= "1";


}
    else{
document.getElementById("151").checked=false;
document.getElementById('1511').value= "0";

}
if(d[15]==='1'){

document.getElementById("152").checked=true;
document.getElementById('155').value= "1";


}
    else{
document.getElementById("152").checked=false;
document.getElementById('155').value= "0";

}
if(d[17]==='1'){

document.getElementById("146b").checked=true;
document.getElementById('1461b').value= "1";


}
    else{
document.getElementById("146b").checked=false;
document.getElementById('1461b').value= "0";

}


}

function check(){
 if (document.getElementById('140').checked==true){
  document.getElementById('1401').value=1;
  }else{
  document.getElementById('1401').value=0;
  }
  if (document.getElementById('141').checked==true){
  document.getElementById('1411').value=1;
  }else{
  document.getElementById('1411').value=0;
  }
    if (document.getElementById('142').checked==true){
  document.getElementById('1421').value=1;
  }else{
  document.getElementById('1421').value=0;
  }
   if (document.getElementById('145').checked==true){
  document.getElementById('1451').value=1;
  }else{
  document.getElementById('1451').value=0;
  }
    if (document.getElementById('146').checked==true){
  document.getElementById('1461').value=1;
  }else{
  document.getElementById('1461').value=0;
  }
    if (document.getElementById('147').checked==true){
  document.getElementById('1471').value=1;
  }else{
  document.getElementById('1471').value=0;
  }
   if (document.getElementById('148').checked==true){
  document.getElementById('1481').value=1;
  }else{
  document.getElementById('1481').value=0;
  }
   if (document.getElementById('149').checked==true){
  document.getElementById('1491').value=1;
  }else{
  document.getElementById('1491').value=0;
  }
   if (document.getElementById('150').checked==true){
  document.getElementById('1501').value=1;
  }else{
  document.getElementById('1501').value=0;
  }
   if (document.getElementById('151').checked==true){
  document.getElementById('1511').value=1;
  }else{
  document.getElementById('1511').value=0;
  }
   if (document.getElementById('152').checked==true){
  document.getElementById('155').value=1;
  }else{
  document.getElementById('155').value=0;
  }
     if (document.getElementById('146b').checked==true){
  document.getElementById('1461b').value=1;
  }else{
  document.getElementById('1461b').value=0;
  }
 }



function validarNombre()
      {
        valor = document.getElementById("nombres").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar Nombre');
          return false;
        } else { return true;}
      }

      function validarApellido()
      {
        valor = document.getElementById("apellidos").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar apellido');
          return false;
        } else { return true;}
      } function validarEmail()
      {
        valor = document.getElementById("email2").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar mail');
          return false;
        } else { return true;}
      }

      function validarPassword()
      {
        valor = document.getElementById("pass").value;
        if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
          alert('Falta Llenar Password');
          return false;
          } else {
          valor2 = document.getElementById("pass2").value;

          if(valor == valor2) { return true; }
          else { alert('Las contraseña no coinciden'); return false;}
        }
      }

      function validarTipocargo()
      {
        indice = document.getElementById("cargo").selectedIndex;
        if( indice == null || indice==0 ) {
          alert('Seleccione tipo de cargo');
          return false;
        } else { return true;}
      }

      function registrar()
      {

            var nombres=$('#nombres').val();
            var apellidos=$('#apellidos').val();
            var email=$('#email2').val();
            var password=$('#pass').val();
            var password2=$('#pass2').val();
            var cargo=$('#cargo').val();


        if(validarNombre() && validarApellido() && validarEmail() && validarPassword() && validarTipocargo())
        {
                 $.ajax({
                    url:'../Controllers/usuario.php',
                    type:'POST',
                     cache:false,
                    data:'nombres='+nombres+'&apellidos='+apellidos+'&email='+email+'&password='+password+'&cargo='+cargo+'&boton=registrar'
                }).done(function(respuesta){
                    if (respuesta=='exito') {
                        $('#exito').show();
                         b_usuarios('','0','10');                 }
                    else{
                        alert(respuesta);
                    }

                });
        }

 else
 {
                alert('Algo salio MAL');
            }

      }
      function eliminar_usuario(id,nombre){
    var r = confirm("se eliminara a "+nombre+" ¿estas seguro?");
    if (r == true) {
	$.ajax({
		url:'../Controllers/ADM_USER.php',
		type:'POST',
	  cache:false,
    data:'id='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
        b_usuarios('','0','10');
	});

}
else {

    }}
