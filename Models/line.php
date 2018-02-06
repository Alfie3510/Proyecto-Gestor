<?php 
class line
{
	private $conexion;
	public function __construct()
	{
		require_once('conexion.php');
		$this->conexion= new conexion();
		$this->conexion->conectar();
	}

	function line($valor)
	{
		$sql="SELECT * FROM `line` WHERE (PATENTE like '%".$valor."%' or Concesionario like '%".$valor."%' or t_flota like '%".$valor."%' or Observaciones like '%".$valor."%'or torniquete like '%".$valor."%') ORDER BY `line`.`U_Negocio` ASC  ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
	function info()
	{
		$sql="SELECT * FROM `line` limit 1  ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
	function mostrar_boton()
	{
		$sql="SELECT * FROM `boton` WHERE `tipo_boton` = 'buses' ORDER BY `boton`.`nombre_boton` ASC ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
	function eliminar($id){
		$sql="DELETE FROM boton WHERE id_boton='$id'";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else{
			return false;
		}
		$this->conexion->cerrar();
	}
	
	function mostrar_boton_confi()
	{
		$sql="SELECT * FROM `boton` ORDER BY `boton`.`tipo_boton` ASC ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
		
			function mostrar_boton_t()
	{
		$sql="SELECT * FROM `boton` WHERE `tipo_boton` = 'tecno' ORDER BY `boton`.`nombre_boton` ASC ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
		function buscar_conversor($valor)
	{
		$sql="SELECT * FROM `line` WHERE PATENTE = '".$valor."' limit 1";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}


	function mostrar_registro($id,$desde)
	{
		$sql="SELECT * FROM `registro_conversor` WHERE id_ejecutivo = '$id' and `fecha`>= '$desde'  ORDER BY `registro_conversor`.`id_registro` DESC limit 50 ";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}
		function mostrar_registro_filtro($id,$buscar,$desde,$hasta)
	{
		$sql="SELECT * FROM `registro_conversor` WHERE id_ejecutivo = '$id' and `fecha`>= '$desde' AND `fecha`<= '$hasta'   and (tecnico like '%".$buscar."%' or OS like '%".$buscar."%' or patente like '%".$buscar."%' or glosa like '%".$buscar."%' or fecha like '%".$buscar."%')  ORDER BY `registro_conversor`.`id_registro` DESC";
		$this->conexion->conexion->set_charset('utf8');
		$resultados=$this->conexion->conexion->query($sql);
		$arreglo = array();
		while ($re=$resultados->fetch_array(MYSQL_NUM)) {
			$arreglo[]=$re;
		}
		return $arreglo;
		$this->conexion->cerrar();

	}

	
	function ingresar($tipo,$boton,$texto,$categoria,$check,$check2){
		$sql="INSERT INTO `boton` (`id_boton`, `tipo_boton`, `nombre_boton`, `texto_boton`, `opc_ppu`, `cate_btn`, `agre_txt`) VALUES (NULL, '$tipo', '$boton', '$texto', '$check', '$categoria', '$check2');";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}
	function ingresar_m($id,$tipo,$boton,$texto,$categoria,$check,$check2){
		$sql="UPDATE `boton` SET `tipo_boton` = '$tipo', `nombre_boton` = '$boton', `texto_boton` = '$texto', `opc_ppu` = '$check', `cate_btn` = '$categoria', `agre_txt` = '$check2' WHERE `boton`.`id_boton` = '$id';";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}

		function ingresar_r($id,$actualiza,$fecha_tur,$tecnico,$patente,$OS,$textbuses){
		$sql="INSERT INTO `registro_conversor` (`id_registro`, `tecnico`, `OS`, `patente`, `glosa`, `id_ejecutivo`, `n_ejecutivo`, `fecha`) VALUES (NULL, '$tecnico', '$OS', '$patente', '$textbuses', '$id', '$actualiza', '$fecha_tur');";
		if($this->conexion->conexion->query($sql)){
			return true;
		}
		else
		{
			return false;
		}
		$this->conexion->cerrar();
	}

	
}

?>