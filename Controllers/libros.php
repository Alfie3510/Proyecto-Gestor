<?php


require_once("../Models/libros.php");
$boton= $_POST['boton'];

date_default_timezone_set("America/Santiago");
date_default_timezone_set("America/Santiago");
$fechaact = date("Y-m-d") ." " . date("H:i:s");
if($boton==='buscar')
{
	$valor=htmlentities($_POST['valor'],ENT_COMPAT,'UTF-8');
	$inst = new libros();
	$r=$inst ->lista_libros($valor);
		//print_r($r);
	echo json_encode($r);
}
if ($boton==='actualizar') {
	$inst = new libros();
	$id=$_POST['idlib'];
	$tipo= htmlentities($_POST['tipo'],ENT_COMPAT,'UTF-8');
	$Solicitante=htmlentities($_POST['Solicitante'],ENT_COMPAT,'UTF-8');
	$Plantilla=htmlentities($_POST['Plantilla'],ENT_COMPAT,'UTF-8');
	$Resolutor=htmlentities($_POST['Resolutor'],ENT_COMPAT,'UTF-8');
	$vb=htmlentities($_POST['vb'],ENT_COMPAT,'UTF-8');
	$Resolutor2=htmlentities($_POST['Resolutor2'],ENT_COMPAT,'UTF-8');
	$Cierre=htmlentities($_POST['Cierre'],ENT_COMPAT,'UTF-8');
	$Envio=htmlentities($_POST['Envio'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];
	//$documento=htmlentities($_POST['documento'],ENT_COMPAT,'UTF-8');

	if($inst->actualizar($id,$tipo,$Solicitante,$Plantilla,$Resolutor,$vb,$Resolutor2,$Cierre,$Envio,$usuarioact,$fechaact)){
		echo 'exito';
	}
	else{
		echo "No se Actualizo los datos";
	}
}
if($boton==='eliminar')
{
	$idlib=$_POST['idlib'];
	$inst = new libros();
	if($inst->eliminar($idlib)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}
if ($boton==='ingresar') {
	$inst = new libros();
	$id=$_POST['idlib1'];
	$tipo2= htmlentities($_POST['tipo1'],ENT_COMPAT,'UTF-8');
	$tipo=str_replace('&quot;','',$tipo2);
	$Solicitante=htmlentities($_POST['Solicitante1'],ENT_COMPAT,'UTF-8');
	$Plantilla=htmlentities($_POST['Plantilla1'],ENT_COMPAT,'UTF-8');
	$Resolutor=htmlentities($_POST['Resolutor1'],ENT_COMPAT,'UTF-8');
	$vb=htmlentities($_POST['vb1'],ENT_COMPAT,'UTF-8');
	$Resolutor2=htmlentities($_POST['Resolutor21'],ENT_COMPAT,'UTF-8');
	$Cierre=htmlentities($_POST['Cierre1'],ENT_COMPAT,'UTF-8');
	$Envio=htmlentities($_POST['Envio1'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];


	if($inst->ingresar($id,$tipo,$Solicitante,$Plantilla,$Resolutor,$vb,$Resolutor2,$Cierre,$Envio,$usuarioact,$fechaact)){
		echo 'exito';
	}
	else{
		echo "No se ingresaron los datos";
	}
}


if($boton==='buscar_buses')
{
	$valor=htmlentities($_POST['valor'],ENT_COMPAT,'UTF-8');
	$inst = new libros();
	$r=$inst ->buscar_buses($valor);
		//print_r($r);
	echo json_encode($r);
}
if($boton==='buscar_inci')
{
	$valor=htmlentities($_POST['valor'],ENT_COMPAT,'UTF-8');
	$inst = new libros();
	$r=$inst ->buscar_inci($valor);
		//print_r($r);
	echo json_encode($r);
}

if($boton==='buscar_nagios')
{
	$valor=htmlentities($_POST['valor'],ENT_COMPAT,'UTF-8');
		$valor2=htmlentities($_POST['valor2'],ENT_COMPAT,'UTF-8');
	$inst = new libros();
	$r=$inst ->buscar_nagios($valor,$valor2);
		//print_r($r);
	echo json_encode($r);
}


if($boton==='tipos')	{
	$inst = new libros();
	$ro=$inst ->tipos();
		//print_r($r);
	echo json_encode($ro);

}

if ($boton==='ingresar_inci') {
	$inst = new libros();
	$tipo= htmlentities($_POST['cargo_inc'],ENT_COMPAT,'UTF-8');
	$descripcion= htmlentities($_POST['des_inc'],ENT_COMPAT,'UTF-8');
	$reporta=htmlentities($_POST['rep_inc'],ENT_COMPAT,'UTF-8');
	$Plantilla=htmlentities($_POST['plan_inc'],ENT_COMPAT,'UTF-8');
	$Resolutor=htmlentities($_POST['res_1'],ENT_COMPAT,'UTF-8');
	$Resolutor2=htmlentities($_POST['res_2'],ENT_COMPAT,'UTF-8');
	$observacion=htmlentities($_POST['obs_inc'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];


	if($inst->ingresar_inc($tipo,$descripcion,$reporta,$Plantilla,$Resolutor,$Resolutor2,$observacion,$usuarioact,$fechaact)){
		echo 'exito_inc';
	}
	else{
		echo "No se ingresaron los datos";
	}
}

if ($boton==='ingresar_nagios') {
	$inst = new libros();
	$host= htmlentities($_POST['host'],ENT_COMPAT,'UTF-8');
	$servicio= htmlentities($_POST['servicio'],ENT_COMPAT,'UTF-8');
	$plantilla=htmlentities($_POST['plantilla'],ENT_COMPAT,'UTF-8');
	$res_1=htmlentities($_POST['res_1'],ENT_COMPAT,'UTF-8');
	$res_2=htmlentities($_POST['res_2'],ENT_COMPAT,'UTF-8');
	$observacion=htmlentities($_POST['observacion'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];


	if($inst->ingresar_nagios($host,$servicio,$plantilla,$res_1,$res_2,$observacion,$usuarioact,$fechaact)){
		echo 'exito_inc';
	}
	else{
		echo "No se ingresaron los datos";
	}
}
if ($boton==='ingresar_buses') {
	$inst = new libros();
	$tipo= htmlentities($_POST['cargo_inc'],ENT_COMPAT,'UTF-8');
	$solicitante= htmlentities($_POST['Solicitante_b'],ENT_COMPAT,'UTF-8');
	$sintoma=htmlentities($_POST['sintoma_b'],ENT_COMPAT,'UTF-8');
	$plantilla_b=htmlentities($_POST['plantilla_b'],ENT_COMPAT,'UTF-8');
	$observacion=htmlentities($_POST['observacion_b'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];

	if($inst->ingresar_buses($tipo,$solicitante,$sintoma,$plantilla_b,$observacion,$usuarioact,$fechaact)){
		echo 'exito_inc';
	}
	else{
		echo "No se ingresaron los datos";
	}
}

if ($boton==='actualizar_inci') {
	$inst = new libros();
	$id=$_POST['id_inc'];
	$tipo= htmlentities($_POST['cargosss'],ENT_COMPAT,'UTF-8');
	$descripcion= htmlentities($_POST['des_inc_m'],ENT_COMPAT,'UTF-8');
	$reporta=htmlentities($_POST['rep_inc_m'],ENT_COMPAT,'UTF-8');
	$Plantilla=htmlentities($_POST['plan_inc_m'],ENT_COMPAT,'UTF-8');
	$Resolutor=htmlentities($_POST['res_1_m'],ENT_COMPAT,'UTF-8');
	$Resolutor2=htmlentities($_POST['res_2_m'],ENT_COMPAT,'UTF-8');
	$observacion=htmlentities($_POST['obs_inc_m'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];

	if($inst->actualizar_inci($id,$tipo,$descripcion,$reporta,$Plantilla,$Resolutor,$Resolutor2,$observacion,$usuarioact,$fechaact)){
		echo 'exito';
	}
	else{
		echo "No se Actualizo los datos";
	}
}
if ($boton==='actualizar_nagios') {
	$inst = new libros();
	$id=$_POST['id_nagios'];
	$host_m= htmlentities($_POST['host_m'],ENT_COMPAT,'UTF-8');
	$servicio_m= htmlentities($_POST['servicio_m'],ENT_COMPAT,'UTF-8');
	$pantilla_m=htmlentities($_POST['pantilla_m'],ENT_COMPAT,'UTF-8');
	$resn_1_m=htmlentities($_POST['resn_1_m'],ENT_COMPAT,'UTF-8');
	$resn_2_m=htmlentities($_POST['resn_2_m'],ENT_COMPAT,'UTF-8');
	$obsn_m=htmlentities($_POST['obsn_m'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];

	if($inst->actualizar_nagios($id,$host_m,$servicio_m,$pantilla_m,$resn_1_m,$resn_2_m,$obsn_m,$usuarioact,$fechaact)){
		echo 'exito';
	}
	else{
		echo "No se Actualizo los datos";
	}
}

if ($boton==='actualizar_buses') {
	$inst = new libros();
	$id=$_POST['id_buses'];
	$tipo= htmlentities($_POST['cargosss_b'],ENT_COMPAT,'UTF-8');
	$solicitante= htmlentities($_POST['des_buses_m'],ENT_COMPAT,'UTF-8');
	$sintoma=htmlentities($_POST['rep_buses_m'],ENT_COMPAT,'UTF-8');
	$Plantilla=htmlentities($_POST['plan_buses_m'],ENT_COMPAT,'UTF-8');
	$observacion=htmlentities($_POST['obs_buses_m'],ENT_COMPAT,'UTF-8');
	$usuarioact=$_POST['usuarioact'];

	if($inst->actualizar_buses($id,$tipo,$solicitante,$sintoma,$Plantilla,$observacion,$usuarioact,$fechaact)){
		echo 'exito';
	}
	else{
		echo "No se Actualizo los datos";
	}
}

if($boton==='eliminar_inc')
{
	$id=$_POST['id_inc'];
	$inst = new libros();
	if($inst->eliminar_inc($id)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}

if($boton==='eliminar_nagios')
{
	$id=$_POST['id_inc'];
	$inst = new libros();
	if($inst->eliminar_nagios($id)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}

if($boton==='eliminar_buses')
{
	$id=$_POST['id_buses'];
	$inst = new libros();
	if($inst->eliminar_buses($id)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}

if($boton==='m_pro')
{
	$inst = new libros();
	$id=$_POST['idp'];
	$tipo=$_POST['tipo'];


	$rock=$inst ->m_pro($id,$tipo);

		//print_r($rock);
	echo json_encode($rock);


}

if($boton==='img_mos')
{
	$inst = new libros();
	$id=$_POST['idp'];


	$img=$inst ->most_imge($id);

		//print_r($img);
	echo json_encode($img);


}
if($boton==='arch_mos')
{
	$inst = new libros();
	$id=$_POST['idp'];

	$arch=$inst ->most_arch($id);

		//print_r($img);
	echo json_encode($arch);


}

if($boton==='img_eli')
{
	$inst = new libros();
	$id=$_POST['id_img'];
	$id_c=$_POST['id_img_c'];
	$nimg=$_POST['n_img'];
	$dire="../Resources/img/Imagenespro/$id_c/$nimg";
	unlink ($dire);
	if($inst->img_eli_5($id)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}

if ($boton==='ing_img')
{
	$inst = new libros();
	$id=$_POST['id_proce_com'];
	$titulo= htmlentities($_POST['titulo_img'],ENT_COMPAT,'UTF-8');
	$archivo=$_FILES['archivo']['tmp_name'];
	$leyenda=htmlentities($_POST['Leyenda'],ENT_COMPAT,'UTF-8');
	$nombre_file = $_FILES['archivo']['name'];
  $vowels = array("$","&", " ");
	$nombre_file = str_replace($vowels, "_", $nombre_file);
	$tipo_archivo = $_FILES['archivo']['type'];
	$tamano_archivo = $_FILES['archivo']['size'];
	$nombre_file_l = str_replace(" ", "_", $nombre_file);
	$origen = $_FILES['archivo']['tmp_name'];
  $destino = "../Resources/img/Imagenespro/$id/$nombre_file_l";

	$carpeta = "../Resources/img/Imagenespro/$id";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
if ($nombre_file_l!="")
{
	if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo  < 50000000)))
        {
            echo "La imagen debe ser de max 5mb y solo se admiten imagenes gif, jpeg y png";
        }
        else{
       move_uploaded_file ($origen, $destino);

	if($inst->ing_img_n($id,$titulo,$leyenda,$nombre_file_l,$destino)){
		echo 'exito88';
	}
	else{
		echo "No se ingresaron los datos";
	}
}
}
else {
	echo "No subio una imagen";
}
}


if ($boton==='ing_arch') {

	$inst = new libros();
	$id=$_POST['id_proce_com'];
	$usuarioact=$_POST['usuarioact'];
	$archivo=$_FILES['archivo']['tmp_name'];
	$nombre_file = $_FILES['archivo']['name'];
	$vowels = array("$","&", " ");
	$nombre_file_l = str_replace($vowels, "_", $nombre_file);
	$origen = $_FILES['archivo']['tmp_name'];
  $destino = "../Resources/doc/$id/$nombre_file_l";

	$carpeta = "../Resources/doc/$id";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
       move_uploaded_file ($origen, $destino);

	if($inst->ing_arch_n($id,$nombre_file_l,$usuarioact,$fechaact)){
		echo 'exito89';
	}
	else{
		echo "No se ingresaron los datos";
	}
}


if ($boton==='actualizar_new_pro') {
	$inst = new libros();
	$id=$_POST['id_pro_1'];
	$usuarioact=$_POST['usuarioact'];
	$inf= htmlentities($_POST['informe'],ENT_COMPAT,'UTF-8');

	if($inst->actualizar_new_p($id,$inf,$usuarioact,$fechaact)){
		echo 'exito';
	}
	else{
		echo "No se Actualizo los datos";
	}
}
if($boton==='eliminar_doc_1')
{
	$id=$_POST['id'];
	$cod=$_POST['cod'];
	$origen = "../Resources/doc/$cod/$id";
	$destino = "../Resources/doc/docold/$id";
	$inst = new libros();
//echo $id;
	rename($origen , $destino);

	if($inst->eliminar_doc_2($id)){
		echo 'Se elimino correctamente';

	}
	else{
		echo "No se eliminar los datos";
	}

}

?>
