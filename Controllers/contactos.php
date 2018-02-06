<?php
	require_once("../Models/contactos.php");
	$boton= $_POST['boton'];

	date_default_timezone_set("America/Santiago");
	date_default_timezone_set("America/Santiago");
	$fechaact = date("Y-m-d") ." " . date("H:i:s");
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new contacto();
		$r=$inst ->contactos($valor);
		//print_r($r);
		echo json_encode($r);
	}
	if ($boton==='actualizar') {
		$inst = new contacto();
		$id=htmlentities($_POST['id9'],ENT_COMPAT,'UTF-8');
		$nombre=htmlentities($_POST['nombre9'],ENT_COMPAT,'UTF-8');
		$area=htmlentities($_POST['area9'],ENT_COMPAT,'UTF-8');
		$anexo=htmlentities($_POST['anexo9'],ENT_COMPAT,'UTF-8');
		$celular1=htmlentities($_POST['celular19'],ENT_COMPAT,'UTF-8');
		$celular2=htmlentities($_POST['celular29'],ENT_COMPAT,'UTF-8');
		$mail=htmlentities($_POST['mailc'],ENT_COMPAT,'UTF-8');
		$usuarioact=$_POST['usuarioact'];

		if($inst->actualizarc($id,$nombre,$area,$anexo,$celular1,$celular2,$mail,$usuarioact,$fechaact)){
			echo'exito_555';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}
		if($boton==='eliminar')
	{
		$id=$_POST['id'];
		$inst = new contacto();
		if($inst->eliminar($id)){
			echo 'Se elimino correctamente';
		}
		else{
			echo "No se eliminar los datos";
		}
	}
			if($boton==='eliminart')
	{
		$id=$_POST['id'];
		$inst = new contacto();
		if($inst->eliminart($id)){
			echo 'Se elimino correctamente';
		}
		else{
			echo "No se eliminar los datos";
		}
	}
		if ($boton==='iniciar') {
		$inst = new contacto();
		$nombre1=htmlentities($_POST['nombre1'],ENT_COMPAT,'UTF-8');
		$area1=htmlentities($_POST['area1'],ENT_COMPAT,'UTF-8');
		$anexo1=htmlentities($_POST['anexo1'],ENT_COMPAT,'UTF-8');
		$celular11=htmlentities($_POST['celular11'],ENT_COMPAT,'UTF-8');
		$celular21=htmlentities($_POST['celular21'],ENT_COMPAT,'UTF-8');
		$mail=htmlentities($_POST['mailc1'],ENT_COMPAT,'UTF-8');
		$usuarioact=$_POST['usuarioact'];


		if($inst->iniciar($nombre1,$area1,$anexo1,$celular11,$celular21,$mail,$usuarioact,$fechaact)){
			echo'exito_854';

		}
		else{
			echo "No se ingresaron los datos";
		}
	}

	if ($boton==='ingtotem') {
		$inst = new contacto();
		$seriet=htmlentities($_POST['seriet'],ENT_COMPAT,'UTF-8');
		$mac1=htmlentities($_POST['mac1'],ENT_COMPAT,'UTF-8');
		$mac2=htmlentities($_POST['mac2'],ENT_COMPAT,'UTF-8');
		$mac3=htmlentities($_POST['mac3'],ENT_COMPAT,'UTF-8');
		$mac4=htmlentities($_POST['mac4'],ENT_COMPAT,'UTF-8');
		$mac5=htmlentities($_POST['mac5'],ENT_COMPAT,'UTF-8');
		$mac6=htmlentities($_POST['mac6'],ENT_COMPAT,'UTF-8');
		$mac=$mac1."-" .$mac2."-" .$mac3."-" .$mac4."-" .$mac5."-" .$mac6;
		if($inst->ingtotem($seriet,$mac)){
			echo'exito_totem_1';

		}
		else{
			echo "No se ingresaron los datos";
		}
	}

		if ($boton==='mtotem') {
		$inst = new contacto();
		$seriet=htmlentities($_POST['seriet_m'],ENT_COMPAT,'UTF-8');
		$id=htmlentities($_POST['id_totem'],ENT_COMPAT,'UTF-8');
		$mac1=htmlentities($_POST['mac1m'],ENT_COMPAT,'UTF-8');
		$mac2=htmlentities($_POST['mac2m'],ENT_COMPAT,'UTF-8');
		$mac3=htmlentities($_POST['mac3m'],ENT_COMPAT,'UTF-8');
		$mac4=htmlentities($_POST['mac4m'],ENT_COMPAT,'UTF-8');
		$mac5=htmlentities($_POST['mac5m'],ENT_COMPAT,'UTF-8');
		$mac6=htmlentities($_POST['mac6m'],ENT_COMPAT,'UTF-8');
		$mac=$mac1."-" .$mac2."-" .$mac3."-" .$mac4."-" .$mac5."-" .$mac6;
		if($inst->mtotem($id,$seriet,$mac)){
			echo'exito_totem_2';

		}
		else{
			echo "No se ingresaron los datos";
		}
	}

		if($boton==='buscart')
	{
		$valor=$_POST['valor'];
		$inst = new contacto();
		$r=$inst ->totem($valor);
		//print_r($r);
		echo json_encode($r);
	}

	if($boton==='turno')
	{
		$valor=$_POST['valor'];
		$inst = new contacto();
		$r=$inst ->turno($valor);
		//print_r($r);
		echo json_encode($r);
	}

	if($boton==='area_turno')	{
	$valor=$_POST['valor'];
	$inst = new contacto();
		$r=$inst ->area_turno($valor);
		//print_r($r);
		echo json_encode($r);

	}

		if ($boton==='actualizar_t') {
		$inst = new contacto();
		$id_area=htmlentities($_POST['t_area'],ENT_COMPAT,'UTF-8');
		$id_nombre=htmlentities($_POST['idturn'],ENT_COMPAT,'UTF-8');
		$fecha=htmlentities($_POST['t_fecha_fin'],ENT_COMPAT,'UTF-8');
		$obser=htmlentities($_POST['ohbse'],ENT_COMPAT,'UTF-8');
		$actualiza=htmlentities($_POST['actualiza'],ENT_COMPAT,'UTF-8');
		date_default_timezone_set("America/Santiago");
    $fecha_act = date("Y-m-d") ."T" . date("H:i");



		if($inst->actualizar_turnos($id_area,$id_nombre,$fecha,$obser,$actualiza,$fecha_act)){
			echo'exito_cu';
		}
		else{
			echo "No se Actualizo los datos";
		}
	}



?>
