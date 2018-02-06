<?php
	class contacto
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function contactos($valor)
		{
$sql="SELECT * FROM contactos WHERE n_resolutor  like '%".$valor."%' or area like '%".$valor."%'or anexo like '%".$valor."%' ORDER BY area ASC";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}
		function actualizarc($id,$nombre,$area,$anexo,$celular1,$celular2,$mail,$usuarioact,$fechaact)
		{
			$sql="UPDATE contactos SET n_resolutor = '$nombre',Area='$area',Anexo='$anexo',Celular_1='$celular1', Celular_2='$celular2', mail='$mail', usuact='$usuarioact', fechaact='$fechaact' WHERE id='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

				function ingtotem($seriet,$mac)
		{
			$sql="INSERT INTO `totem` (`ID_TOTEM`, `numerot`, `macc`) VALUES (NULL, '$seriet', '$mac');";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

						function mtotem($id,$seriet,$mac)
		{
			$sql="UPDATE `totem` SET `numerot` = '$seriet', `macc` = '$mac' WHERE `totem`.`ID_TOTEM` = $id;";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

		function eliminar($id){
			$sql="DELETE FROM contactos WHERE id='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

		function eliminart($id){
			$sql="DELETE FROM totem WHERE ID_TOTEM='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

		function iniciar($nombre1,$area1,$anexo1,$celular11,$celular21,$mail,$usuarioact,$fechaact){
			$sql="INSERT INTO contactos VALUES(0,'$nombre1','$area1','$anexo1','$celular11','$celular21','$mail','$usuarioact','$fechaact')";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}

				function totem($valor)
		{
$sql="SELECT * FROM totem WHERE numerot like '%".$valor."%' or macc like '%".$valor."%'";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}

						function turno($valor)
		{
$sql="SELECT n_resolutor, area_turno, hasta, anexo, celular_1, celular_2, observacion, id_turno , actualizador , fecha FROM turnos, contactos where id_turno = id ORDER BY area_turno ASC";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}

						function area_turno($valor)
		{
$sql="SELECT * FROM `contactos`where `Area`= '$valor' ";
			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}

				function actualizar_turnos($id_area,$id_nombre,$fecha,$obser,$actualiza,$fecha_act)
		{
			$sql="UPDATE `turnos` SET `id_turno` = '$id_nombre', `hasta` = '$fecha', `observacion` = '$obser', `actualizador` = '$actualiza', `fecha` = '$fecha_act' WHERE `area_turno` = '$id_area'";
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
