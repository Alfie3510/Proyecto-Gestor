<?php
	
		require_once('../Models/usuario.php');


		$boton=$_POST['boton'];

		switch ($boton) {
			case 'cerrar':
					session_start();
					session_destroy();
					echo 'Adios ;)';

                 exit;
				break;
			case 'ingresar':
					$email = $_POST['email'];
					$password = $_POST['password'];

					$ins = new usuario();
					$array=$ins->identificar($email,$password);
					if ($array[0]==0) 
					{
						echo '0';
					}
					else
					{
						session_start();
						$_SESSION['ingreso']='YES';
					    $_SESSION['ID']=$array[0];
						$_SESSION['nombre']=$array[1];
						$_SESSION['apellido']=$array[2];
						$_SESSION['cargo']=$array[5];
						$_SESSION['cargotipo']=$array[6];
						$_SESSION['m_cuenta']=$array[7];
						$_SESSION['m_pro']=$array[8];
						$_SESSION['a_pro']=$array[9];
						$_SESSION['m_conta']=$array[10];
						$_SESSION['a_conta']=$array[11];
						$_SESSION['c_tecno']=$array[12];
						$_SESSION['p_tecno']=$array[13];
						$_SESSION['escala_tecn']=$array[14];
						$_SESSION['mac_t']=$array[15];
						$_SESSION['c_buses']=$array[16];
						$_SESSION['p_buses']=$array[17];
						$_SESSION['confi_conve']=$array[18];

					}
				break;
			case 'registrar':
					
					$nombres = $_POST['nombres'];
					$apellidos = $_POST['apellidos'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$cargo = $_POST['cargo'];

					$instancia = new usuario();
					if($instancia->registrar($nombres,$apellidos,$email,$password,$cargo))
					{
						echo "exito";
					}
					else{
						echo "Usuario Ya existe";
					}
				break;
	        	default:
				# code...
				break;
		}

		
?>