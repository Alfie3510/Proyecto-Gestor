<?php
	require_once("../Models/usuario.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$valor2=$_POST['valor2'];
		$valor3=$_POST['valor3'];
		$inst = new usuario();
		$r=$inst ->buscar($valor,$valor2,$valor3);
		//echo "$r";
		echo json_encode($r);
	}

	if($boton==='buscar_paginas')
	{
		$valor=$_POST['valor'];
		$valor2=$_POST['valor2'];
		$valor3=$_POST['valor3'];
		$inst = new usuario();
		$r=$inst ->buscar_paginas($valor,$valor2,$valor3);
		//echo "$r";
		echo json_encode($r);
	}


		if($boton==='buscar_imp')
	{
		$valor=$_POST['valor'];
		$inst = new usuario();
		$r=$inst ->buscar_imp($valor);
		echo json_encode($r);
	}


	if ($boton==='ingresar_impo') {
	$inst = new usuario();
		$id=htmlentities($_POST['idup'],ENT_COMPAT,'UTF-8');
	$os=htmlentities($_POST['os'],ENT_COMPAT,'UTF-8');
	$titulo=htmlentities($_POST['titulo'],ENT_COMPAT,'UTF-8');
	$obs=htmlentities($_POST['obs'],ENT_COMPAT,'UTF-8');
		date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d") ."T" . date("H:i");
	if($inst->ingresar_imp($os,$titulo,$obs,$fecha,$id)){
		echo 'exito';
	}
	else{
		echo "No se ingresaron los datos";
	}
}



			if($boton==='eliminar')	{
		$id=$_POST['id'];
		$inst = new usuario();
		if($inst->eliminar($id)){
			echo 'Se elimino correctamente';
		}
		else{
			echo "No se eliminar los datos";
		}
	}

				if($boton==='eliminar_imp')	{
		$id=$_POST['id'];
		$inst = new usuario();
		if($inst->eliminar_imp($id)){
			echo 'Se elimino correctamente';
		}
		else{
			echo "No se eliminar los datos";
		}
	}

				if($boton==='cargoso')	{
	$inst = new usuario();
		$r=$inst ->cargoso();
		//print_r($r);
		echo json_encode($r);

	}






		if($boton==='perfil')	{
	$inst = new usuario();
		$id=$_POST['id'];

		$r=$inst ->perfil($id);
		//print_r($r);
		echo json_encode($r);

	}

	if ($boton==='actualizar_pass') {
		$inst = new usuario();
		$idr=htmlentities($_POST['idr'],ENT_COMPAT,'UTF-8');
		$pass=htmlentities($_POST['pass'],ENT_COMPAT,'UTF-8');
		$pass2=htmlentities($_POST['pass2'],ENT_COMPAT,'UTF-8');



		if($inst->actualizar_pass($idr,$pass)){
			echo'exito_556';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}


		if ($boton==='actualizar_usuario') {
		$inst = new usuario();
		$id=htmlentities($_POST['idu1'],ENT_COMPAT,'UTF-8');
		$nombres=htmlentities($_POST['nombres1'],ENT_COMPAT,'UTF-8');
		$apellidos=htmlentities($_POST['apellidos1'],ENT_COMPAT,'UTF-8');
		$email=htmlentities($_POST['email21'],ENT_COMPAT,'UTF-8');
		$cargo=htmlentities($_POST['c1235'],ENT_COMPAT,'UTF-8');


		if($inst->actualizar_usuario($id,$nombres,$apellidos,$email,$cargo)){
			echo'exito_5556';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}

		if ($boton==='actualizar_imp') {
		$inst = new usuario();
				$id_u=htmlentities($_POST['id_impf'],ENT_COMPAT,'UTF-8');
		$id=htmlentities($_POST['idud1'],ENT_COMPAT,'UTF-8');
		$OSOS=htmlentities($_POST['OSOS'],ENT_COMPAT,'UTF-8');
		$titulom=htmlentities($_POST['titulom'],ENT_COMPAT,'UTF-8');
		$ob_88=htmlentities($_POST['ob_88'],ENT_COMPAT,'UTF-8');
		date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d") ."T" . date("H:i");



		if($inst->actualizar_impp($id,$OSOS,$titulom,$ob_88,$fecha,$id_u)){
			echo'exito_5556';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}


			if ($boton==='moficar_per') {
		$inst = new usuario();
		$id=$_POST['idu5'];
		$mcue=$_POST['1401'];
		$mpro=$_POST['1411'];
		$apr=$_POST['1421'];
		$mcon=$_POST['1451'];
		$acon=$_POST['1461'];
		$ctecno=$_POST['1471'];
		$ptecno=$_POST['1481'];
		$escatecno=$_POST['1491'];
		$mac=$_POST['1501'];
		$cbuses=$_POST['1511'];
		$pbuses=$_POST['155'];
		$configurar_conve=$_POST['1461b'];

		if($inst->actualizar_permiso($id,$mcue,$mpro,$apr,$mcon,$acon,$ctecno,$ptecno,$escatecno,$mac,$cbuses,$pbuses,$configurar_conve)){
			echo'exito_5556';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}

	if ($boton==='resetear') {
		$inst = new usuario();
		$id=$_POST['reset'];

		if($inst->resetear($id)){
			echo'exito_5559';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}
