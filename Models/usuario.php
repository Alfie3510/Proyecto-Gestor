<?php
	class usuario
	{
       private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		function identificar($email,$password)
		{
			$pass=sha1($password);
			$sql="SELECT `usuarios`.`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `pass_usuario`, `cargo`, `tipo` ,`m_usuario`,`m_procedimiento`,`a_pro`,`m_conta`,`a_conta`,`c_tecno`,`p_tecno`,`escala_tecn`,`mac_t`,`c_buses`,`p_buses`,`configurar_conve`
FROM `usuarios`,`t_usuario`, permisos
WHERE `usuarios`.`cargo`=`t_usuario`.`id`
and `usuarios`.`id_usuario` = `permisos`.`id_usuario`
and email_usuario='$email' && pass_usuario='$pass'";
			$resulatdos = $this->conexion->conexion->query($sql);
			if ($resulatdos->num_rows > 0) {
				$r=$resulatdos->fetch_array();
			}
			else{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();
		}

		function registrar($nombre,$apellido,$email,$password,$cargo){
			$pass= sha1($password);
			$sql="INSERT INTO usuarios VALUES(0,'$nombre','$apellido','$email','$pass','$cargo')";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}


		function ingresar_imp($os,$titulo,$obs,$fecha,$id){

			$sql="			INSERT INTO `importante` (`id_imp`, `os`, `titulo`, `observacion`, `fecha`, `id_usuario`, `vigente`) VALUES (NULL, '$os', '$titulo', '$obs', '$fecha', '$id', 'SI');";

			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else
			{
				return false;
			}
			$this->conexion->cerrar();
		}
function buscar($valor,$valor2,$valor3){

$sql="SELECT `usuarios`.`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `tipo` ,`m_usuario`,`m_procedimiento`,`a_pro`,`m_conta`,`a_conta`,`c_tecno`,`p_tecno`,`escala_tecn`,`mac_t`,`c_buses`,`p_buses`,`cargo`,`configurar_conve`
FROM `usuarios`,`t_usuario`, permisos
WHERE `usuarios`.`cargo`=`t_usuario`.`id`
and `usuarios`.`id_usuario` = `permisos`.`id_usuario`
and (`email_usuario` LIKE '%".$valor."%' or `tipo` LIKE '%".$valor."%' or `apellido_usuario` LIKE '%".$valor."%' or `nombre_usuario` LIKE '%".$valor."%')
AND usuarios.cargo = t_usuario.ID
ORDER BY `tipo` ASC LIMIT $valor2,$valor3
 ";


			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			//print_r($arreglo);
			return $arreglo;
			$this->conexion->cerrar();

		}

		function buscar_paginas($valor,$valor2,$valor3){

		$sql="SELECT `usuarios`.`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `tipo` ,`m_usuario`,`m_procedimiento`,`a_pro`,`m_conta`,`a_conta`,`c_tecno`,`p_tecno`,`escala_tecn`,`mac_t`,`c_buses`,`p_buses`,`cargo`,`configurar_conve`
		FROM `usuarios`,`t_usuario`, permisos
		WHERE `usuarios`.`cargo`=`t_usuario`.`id`
		and `usuarios`.`id_usuario` = `permisos`.`id_usuario`
		and (`email_usuario` LIKE '%".$valor."%' or `tipo` LIKE '%".$valor."%' or `apellido_usuario` LIKE '%".$valor."%' or `nombre_usuario` LIKE '%".$valor."%')
		AND usuarios.cargo = t_usuario.ID
		ORDER BY `tipo` ASC
		 ";


					$this->conexion->conexion->set_charset('utf8');
					$resultados=$this->conexion->conexion->query($sql);
					$arreglo = array();
					while ($re=$resultados->fetch_array(MYSQL_NUM)) {
						$arreglo[]=$re;
					}
					//print_r($arreglo);
					return $arreglo;
					$this->conexion->cerrar();

				}

		 function buscar_imp($valor){
$sql="SELECT * FROM `importante`
where (`os` LIKE '%".$valor."%' or `titulo` LIKE '%".$valor."%' or `observacion` LIKE '%".$valor."%')
and `importante`.`vigente` = 'SI'";
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
			$sql="DELETE FROM usuarios WHERE id_usuario='$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

		function eliminar_imp($id){
				$sql="UPDATE `importante` SET `vigente` = 'NO' WHERE `importante`.`id_imp` = '$id'";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

		function actualizar_pass($idr,$pass){
			$passsha= sha1($pass);
			$sql="UPDATE `usuarios` SET `pass_usuario` = '$passsha' WHERE `usuarios`.`id_usuario` = '$idr';";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}
function cargoso(){
$sql="SELECT id, tipo FROM t_usuario ";


			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}

function perfil($id){
$sql="SELECT `id_usuario`,`nombre_usuario`,`apellido_usuario`,`email_usuario`,`tipo` FROM `usuarios`,`t_usuario` WHERE id_usuario = '$id' AND usuarios.cargo = t_usuario.ID";


			$this->conexion->conexion->set_charset('utf8');
			$resultados=$this->conexion->conexion->query($sql);
			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
			$this->conexion->cerrar();

		}


			function actualizar_usuario($id,$nombres,$apellidos,$email,$cargo)
		{
			$sql="UPDATE `usuarios` SET `nombre_usuario` = '$nombres', `apellido_usuario` = '$apellidos', `email_usuario` = '$email', `cargo` = '$cargo' WHERE `usuarios`.`id_usuario` = $id;";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

			function actualizar_impp($id,$OSOS,$titulom,$ob_88,$fecha,$id_u)
		{
			$sql="UPDATE `importante` SET `os` = '$OSOS', `titulo` = '$titulom', `observacion` = '$ob_88', `fecha` = '$fecha' , `id_usuario` = '$id_u' WHERE `importante`.`id_imp` = $id;";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}


		function actualizar_permiso($id,$mcue,$mpro,$apr,$mcon,$acon,$ctecno,$ptecno,$escatecno,$mac,$cbuses,$pbuses,$configurar_conve)
		{
			$sql="UPDATE `permisos` SET `m_usuario` = $mcue, `m_procedimiento` = $mpro, `a_pro` = $apr, `m_conta` = $mcon, `a_conta` = $acon, `c_tecno` = $ctecno, `p_tecno` = $ptecno, `escala_tecn` = $escatecno, `mac_t` = $mac, `c_buses` = $cbuses, `p_buses` = $pbuses, `configurar_conve` = $configurar_conve WHERE `permisos`.`id_usuario` = $id;";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}
			$this->conexion->cerrar();
		}

				function resetear($id){
			$sql="UPDATE `usuarios` SET `pass_usuario` = '5518e531c77b991b936e8262a5261102b1f03b26' WHERE `usuarios`.`id_usuario` = '$id'";
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
