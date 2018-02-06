<?php
class libros
{
	private $conexion;
	public function __construct()
	{
		require_once('conexion.php');
		$this->conexion= new conexion();
		$this->conexion->conectar();
	}

	function lista_libros($valor)
	{
		$sql="SELECT * FROM libros WHERE tipo_req like '%".$valor."%' or usu_soli like '%".$valor."%' or plantilla like '%".$valor."%' or resolutor like '%".$valor."%' or vb like '%".$valor."%' or 2resolutor like '%".$valor."%' or vbcierre like '%".$valor."%' ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
	function actualizar($idlib,$tipo,$Solicitante,$Plantilla,$Resolutor,$vb,$Resolutor2,$Cierre,$Envio,$usuarioact,$fechaact)
	{
		$sql="UPDATE libros SET tipo_req = '$tipo',usu_soli='$Solicitante',plantilla='$Plantilla',resolutor='$Resolutor', vb='$vb', 2resolutor='$Resolutor2',vbcierre='$Cierre',Envio_del_cierre='$Envio',usuact='$usuarioact',fechaact='$fechaact' WHERE id_libro='$idlib'";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}
	function eliminar($id){
		$sql="DELETE FROM libros WHERE id_libro='$id'";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}

	function ingresar($id,$tipo,$Solicitante,$Plantilla,$Resolutor,$vb,$Resolutor2,$Cierre,$Envio,$usuarioact,$fechaact){
		$sql="INSERT INTO libros VALUES(0,'$tipo','$Solicitante','$Plantilla','$Resolutor','$vb','$Resolutor2','$Cierre','$Envio','$usuarioact','$fechaact')";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}


	function buscar_inci($valor)
	{
		$sql="SELECT *
		FROM `pro_tec_inc`
		where  incidente like '%".$valor."%' or t_incidente like '%".$valor."%' or quien_reporta like '%".$valor."%' or plantilla like '%".$valor."%' ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}

	function buscar_nagios($valor,$valor2)
	{
		$sql="SELECT *
		FROM `nagios`
		where  host like '%".$valor."%' and servicio like '%".$valor2."%' LIMIT 100";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
		function buscar_buses($valor)
	{
		$sql="SELECT *
		FROM `proce_buses`
		where  sintoma like '%".$valor."%'";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}

	function tipos(){
		$sql="SELECT * FROM tipoos ";


		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
	function ingresar_inc($tipo,$descripcion,$reporta,$Plantilla,$Resolutor,$Resolutor2,$observacion,$usuarioact,$fechaact){
		$sql="INSERT INTO pro_tec_inc VALUES(0,'$tipo','$descripcion','$reporta','$Plantilla','$Resolutor','$Resolutor2','$observacion','$usuarioact','$fechaact')";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}

	function ingresar_nagios($host,$servicio,$plantilla,$res_1,$res_2,$observacion,$usuarioact,$fechaact){
		$sql="INSERT INTO nagios VALUES(0,'$host','$servicio','$plantilla','$res_1','$res_2','$observacion','$usuarioact','$fechaact')";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}

		function ingresar_buses($tipo,$solicitante,$sintoma,$plantilla_b,$observacion,$usuarioact,$fechaact){
		$sql="INSERT INTO proce_buses VALUES(0,'$solicitante','$tipo','$sintoma','$plantilla_b','$observacion','$usuarioact','$fechaact')";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}
	function actualizar_inci($id,$tipo,$descripcion,$reporta,$Plantilla,$Resolutor,$Resolutor2,$observacion,$usuarioact,$fechaact)
	{
		$sql="UPDATE `pro_tec_inc` SET `t_incidente` = '$tipo', `incidente` = '$descripcion', `quien_reporta` = '$reporta', `plantilla` = '$Plantilla', `resolutor` = '$Resolutor', `2Resolutor` = '$Resolutor2', `observaciones` = '$observacion',usuact='$usuarioact',fechaact='$fechaact' WHERE `pro_tec_inc`.`id_inc_tec` = $id";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}

	function actualizar_nagios($id,$host_m,$servicio_m,$pantilla_m,$resn_1_m,$resn_2_m,$obsn_m,$usuarioact,$fechaact)
	{
		$sql="UPDATE `nagios` SET `host` = '$host_m', `servicio` = '$servicio_m', `plantilla` = '$pantilla_m', `resolutor` = '$resn_1_m', `2resolutor` = '$resn_2_m', `observaciones` = '$obsn_m',usuact='$usuarioact',fechaact='$fechaact' WHERE `nagios`.`id_nagios` = '$id'";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}
	function actualizar_buses($id,$tipo,$solicitante,$sintoma,$Plantilla,$observacion,$usuarioact,$fechaact)
	{
		$sql="UPDATE `proce_buses` SET `solicitante` = '$solicitante', `tipo_bus` = '$tipo', `sintoma` = '$sintoma', `plantilla` = '$Plantilla', `observacion_b` = '$observacion',usuact='$usuarioact',fechaact='$fechaact' WHERE `proce_buses`.`id_proce_bus` = $id;";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}

	function eliminar_buses($id){
		$sql="DELETE FROM `proce_buses` WHERE `id_proce_bus` = $id;";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}
	function eliminar_inc($id){
		$sql="DELETE FROM `pro_tec_inc` WHERE `id_inc_tec` = $id;";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}

		function eliminar_nagios($id){
		$sql="DELETE FROM `nagios` WHERE `id_nagios` = $id;";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}

	function m_pro($id,$tipo){
		$sql="SELECT * FROM `proce_inci_completo` WHERE id_proce = '$id' and tipo = '$tipo'";


		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
function most_imge($id){
		$sql="SELECT * FROM `foto` WHERE id_foto_pro = '$id'";


		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
	function most_arch($id){
		$sql="SELECT * FROM `documento` WHERE od_doc_pro = '$id' order by fechaact desc";


		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}

	function ing_img_n($id,$titulo,$leyenda,$nombre_file,$destino){


		$sql="INSERT INTO foto VALUES(0,'$id','$titulo','$nombre_file','$leyenda')";


		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}
		function ing_arch_n($id,$nombre_file,$usuarioact,$fechaact){


		$sql="INSERT INTO documento VALUES(0,'$id','$nombre_file','$usuarioact','$fechaact')";


		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}

function img_eli_5($id){
		$sql="DELETE FROM `foto` WHERE `id_foto` = $id;";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}
	function actualizar_new_p($id,$inf,$usuarioact,$fechaact)
	{
		$sql="UPDATE `proce_inci_completo` SET `contenido` = '$inf', `usuarioact` = '$usuarioact', `fechaact` = '$fechaact' WHERE `proce_inci_completo`.`id_pro_com` = '$id';";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}
	function eliminar_doc_2($id){
		$sql="DELETE FROM `documento` WHERE `ducmento` = '$id';";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}

}

?>
