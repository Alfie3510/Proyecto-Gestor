<?php 


require_once("../Models/line.php");
$boton= $_POST['boton'];
if($boton==='buscar')
{
	$valor=htmlentities($_POST['valor'],ENT_COMPAT,'UTF-8');
	$inst = new line();
	$r=$inst ->line($valor);
		//print_r($r);
	echo json_encode($r);
}
if($boton==='info')
{

	$inst = new line();
	$r=$inst ->info();
		//print_r($r);
	echo json_encode($r);
}
if($boton==='mostrar_boton')
{

	$inst = new line();
	$r=$inst ->mostrar_boton();
		//print_r($r);
	echo json_encode($r);
}

if($boton==='eliminar_b')
{
	$id=$_POST['id_b'];
	$inst = new line();
	if($inst->eliminar($id)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}
if($boton==='mostrar_boton_confi')
{

	$inst = new line();
	$r=$inst ->mostrar_boton_confi();
		//print_r($r);
	echo json_encode($r);
}
if($boton==='mostrar_boton_t')
{

	$inst = new line();
	$r=$inst ->mostrar_boton_t();
		//print_r($r);
	echo json_encode($r);
}



if($boton==='buscar_regis')
{
$id=htmlentities($_POST['id'],ENT_COMPAT,'UTF-8');
    date_default_timezone_set("America/Santiago"); 
        $desde = date("Y-m-d") ."T" . "00:00";

	$inst = new line();
	$r=$inst ->mostrar_registro($id,$desde);
		//print_r($r);
	echo json_encode($r);
}
if($boton==='buscar_regis_filtro')
{
$id=htmlentities($_POST['id'],ENT_COMPAT,'UTF-8');
$buscar=htmlentities($_POST['buscar'],ENT_COMPAT,'UTF-8');
$desde=htmlentities($_POST['desde'],ENT_COMPAT,'UTF-8');
$hasta=htmlentities($_POST['hasta'],ENT_COMPAT,'UTF-8');
	$inst = new line();
	$r=$inst ->mostrar_registro_filtro($id,$buscar,$desde,$hasta);
		//print_r($r);
	echo json_encode($r);
}




if($boton==='conversor')
	{
		$valor=$_POST['patente'];
		$inst = new line();
		$f='nop';		
		$r=$inst ->buscar_conversor($valor);
		//print_r($r);
if(count($r)==0) { 
	echo json_encode($f);
}else{ 
		echo json_encode($r);
}  


	}

	if ($boton==='ingresar') {
	$inst = new line();
	$tipo=htmlentities($_POST['tipo'],ENT_COMPAT,'UTF-8');
	$check=htmlentities($_POST['check'],ENT_COMPAT,'UTF-8');
	$check2=htmlentities($_POST['check2'],ENT_COMPAT,'UTF-8');
	$categoria=htmlentities($_POST['categoria'],ENT_COMPAT,'UTF-8');
	$boton=htmlentities($_POST['b_boton'],ENT_COMPAT,'UTF-8');
	$texto=htmlentities($_POST['glosa_r'],ENT_COMPAT,'UTF-8');

	if($inst->ingresar($tipo,$boton,$texto,$categoria,$check,$check2)){
		echo 'exito';
	}
	else{
		echo "No se ingresaron los datos";
	}
}

	if ($boton==='ingresar_m') {
	$inst = new line();
	$id=htmlentities($_POST['id_b_m'],ENT_COMPAT,'UTF-8');
	$tipo=htmlentities($_POST['tiposm'],ENT_COMPAT,'UTF-8');
	$check=htmlentities($_POST['check'],ENT_COMPAT,'UTF-8');
	$check2=htmlentities($_POST['check2'],ENT_COMPAT,'UTF-8');
	$categoria=htmlentities($_POST['categoriam'],ENT_COMPAT,'UTF-8');
	$boton=htmlentities($_POST['b_boton_m'],ENT_COMPAT,'UTF-8');
	$texto=htmlentities($_POST['glosa_r_m'],ENT_COMPAT,'UTF-8');

	if($inst->ingresar_m($id,$tipo,$boton,$texto,$categoria,$check,$check2)){
		echo 'exito';
	}
	else{
		echo "No se ingresaron los datos";
	}
}

	if ($boton==='ingresar_r') {
	$inst = new line();
	$id=htmlentities($_POST['id'],ENT_COMPAT,'UTF-8');
	$actualiza=htmlentities($_POST['actualiza'],ENT_COMPAT,'UTF-8');
		date_default_timezone_set("America/Santiago"); 
        $fecha_tur = date("Y-m-d") ."T" . date("H:i");
	$tecnico=htmlentities($_POST['tecnico'],ENT_COMPAT,'UTF-8');
	$patente=htmlentities($_POST['patente'],ENT_COMPAT,'UTF-8');
	$OS=htmlentities($_POST['OS'],ENT_COMPAT,'UTF-8');
	$textbuses=htmlentities($_POST['textbuses'],ENT_COMPAT,'UTF-8');

	if($inst->ingresar_r($id,$actualiza,$fecha_tur,$tecnico,$patente,$OS,$textbuses)){
		echo 'exito';
	}
	else{
		echo "No se ingresaron los datos";
	}
}


?>