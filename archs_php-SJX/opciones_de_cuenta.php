<?php 

	//-------------------------------->

		include('CoNeX_DB.php'); 
		include('redirecciones.php');

		validar_sesion();

	//-------------------------------->


	/*
		ops de la cuenta de usuario
		___________________________
	*/

	function nuevosDatos($conex)
	{
		if (isset($_GET['confirmar'])) {

			if(strlen($_GET['nombre']) >= 1 && strlen($_GET['email']) >= 1){

				$nuevo_nombre = $_GET['nombre']; 
				$nuevo_email = $_GET['email'];

					$id_de_usu =  $_SESSION['id'];

					//consulta la base de datos 
					$consulta_nuevos_datos = "UPDATE `Usuarios` SET `nombre` = '$nuevo_nombre', `email` = '$nuevo_email' WHERE `Usuarios`.`id` = '$id_de_usu'";

						$resultado_nuevos_datos = mysqli_query($conex, $consulta_nuevos_datos);

				if ($resultado_nuevos_datos) {

					return '<span>Se han actualizado los datos correctamente</span><!--Nuevos datos actualizados-->'; #--!!
				
				} else return "ha ocurrido un error";
				
			} else return "Rellena los campos";
		}
	}

	//cambiar contra de usu
	function cambiarContra($conex)
	{
		if(isset($_POST['confirmar_nueva_contra'])){ 

			if(strlen($_POST['contra_usu']) >= 1 && strlen($_POST['nueva_contra']) >= 1){

				$contra_vieja = datos_del_usuario('password', $conex, $_SESSION['id']);
				$contra_confirm = md5($_POST['contra_usu']);
				$contra_nueva = md5($_POST['nueva_contra']);

				$id = $_SESSION['id'];

				if($contra_vieja === $contra_confirm){

					if(strlen($_POST['nueva_contra']) >= 8 && strlen($_POST['nueva_contra']) <= 20){

						$consulta_nueva_contra = "UPDATE `Usuarios` SET `password` = '$contra_nueva' WHERE `Usuarios`.`id` = '$id'";

						$resultado_nueva_contra = mysqli_query($conex, $consulta_nueva_contra);

						if($resultado_nueva_contra){

							return "<span>Contraseña actualizada</span>"; #--!!!
						
						} else return "Ah ocurrido un error, intenta de nuevo";
					
					} else return "Tu nueva Contraseña debe de estar en el rango de 8-20 caracteres";

				} else return "Contraseña incorrecta";
			
			} else return "Por favor, rellena los campos";
		}
	}

	function eliminarCuenta($conex, $contra)
	{
		if (isset($_POST['confirmar_elim_cuenta'])) {

			if(md5($_POST['confirmar_contra_elim']) == $contra){

				$id = $_SESSION['id'];

				$consulta_elimn_cuenta = "DELETE FROM `Usuarios` WHERE `Usuarios`.`id` = '$id'";
					$resultado_elimn_cuenta = mysqli_query($conex, $consulta_elimn_cuenta);

				$consulta2_elimn_cuenta = "DROP TABLE `$id`";
					$resultado_elimn_cuenta2 = mysqli_query($conex, $consulta2_elimn_cuenta);

				if ($resultado_elimn_cuenta && $consulta2_elimn_cuenta) {

					header('location: salir.php'); 
				
				} else return "Ha ocurrido un error -errETBD"; //error en eliminar tablas de la base de datos
			
			} else return "Contraseña incorrecta";
		}
	}

	?>
		<!-- By Jx5 -->
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Security-JX</title> 
			<meta name="keywords" content="Security-JX, aplicacion, seguridad, contraseñas, Jx5">
			<meta name="description" content="Una aplicacion web desarrollada por Jx5 para almacenar contraseñas">
			<link rel="shortcut icon" href="recursos/favicon.png" type="image/x-icon">
			<link rel="stylesheet" href="css/estilosDAT_INV.css">
			<link rel="stylesheet" href="css/modal_estilos.css">
			<link rel="stylesheet" href="css/marcaDeAwua.css">
		</head>
		<body>
			<a href="modificacionDeDatosDeUsu.php">
				<div class="wrapper">
					<div class="msg">
						<div class="loader">
							<span class="circ uno"></span>
							<span class="circ"></span>
							<span class="circ"></span>
						</div>

						<div>
							<h3>
								<?=cambiarContra($conex);?>
								<?=nuevosDatos($conex);?>
								<?=eliminarCuenta($conex, datos_del_usuario('password', $conex, $_SESSION['id']));?>
							</h3>
						</div>

						<div>
							<p>
								Haz click en la pantalla para volver 
							</p>
						</div>
					</div>
				</div>
			</a>			
		</body>
		</html>
	<?php

?>