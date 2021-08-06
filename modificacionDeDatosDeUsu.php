<?php  
 
	//--------------------------------------------->

		include('archs_php-SJX/redirecciones.php');
		include('archs_php-SJX/CoNeX_DB.php'); 

		validar_sesion();  
 
	//---------------------------------------------> 



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
					$consulta_nuevos_datos = "UPDATE `usuarios` SET `nombre` = '$nuevo_nombre', `email` = '$nuevo_email' WHERE `usuarios`.`id` = '$id_de_usu'";

						$resultado_nuevos_datos = mysqli_query($conex, $consulta_nuevos_datos);

				if ($resultado_nuevos_datos) {

					?>
						<script>
							msg("ha ocurrido un error", 'success');
						</script>
					<?php
				
				} else{

					?>
						<script>
							msg("ha ocurrido un error", 'error');
						</script>
					<?php
				}
				
			} else{

				?>
					<script>
						msg("Rellena los campos", 'error');
					</script>
				<?php
			} 
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

						$consulta_nueva_contra = "UPDATE `usuarios` SET `password` = '$contra_nueva' WHERE `Usuarios`.`id` = '$id'";

						$resultado_nueva_contra = mysqli_query($conex, $consulta_nueva_contra);

						if($resultado_nueva_contra){

							header('location: index.php');
						
						} else {

							?>
								<script>
									msg("Ah ocurrido un error, intenta de nuevo", 'error');
								</script>
							<?php	
						}
					
					} else {

						?>
							<script>
								msg("Tu nueva Contraseña debe de estar en el rango de 8-20 caracteres", 'error');
							</script>
						<?php
					}

				} else {

					?>
						<script>
							msg('Contraseña Incorrecta', 'error');
						</script>
					<?php
				}
			} 
		}
	}

	function eliminarCuenta($conex, $contra)
	{
		if (isset($_POST['confirmar_elim_cuenta'])) {

			if(md5($_POST['confirmar_contra_elim']) == $contra){

				$id = $_SESSION['id'];

				$consulta_elimn_cuenta = "DELETE FROM `usuarios` WHERE `usuarios`.`id` = '$id'";
					$resultado_elimn_cuenta = mysqli_query($conex, $consulta_elimn_cuenta);

				$consulta2_elimn_cuenta = "DROP TABLE `$id`";
					$resultado_elimn_cuenta2 = mysqli_query($conex, $consulta2_elimn_cuenta);

				if ($resultado_elimn_cuenta && $consulta2_elimn_cuenta) {

					?>
						<script>
							window.location = 'salir.php';
						</script> 
					<?php 
				
				} else { //error en eliminar tablas de la base de datos

					?>
						<script>
							msg("Ha ocurrido un error -errETBD", 'error');
						</script> 
					<?php
				}
			
			} else {

				?>
					<script>
						msg("Contraseña incorrecta", 'error');
					</script>
				<?php
			} 
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
	<link rel="stylesheet" href="css/estilosINI.css">
	<link rel="stylesheet" href="css/estilosINI2.css">
	<link rel="stylesheet" href="css/modal_estilos.css">
	<link rel="stylesheet" href="css/estilosMD.css">
	<link rel="stylesheet" href="css/resp_modifdeDatos.css">
</head>
<body>
	<div class="loader">
		<div class="carga"></div>
		<div class="carga"></div>
		<div class="carga"></div> 
	</div> 
	
	<div class="wrapper">
		<header>
			<div>
				<button class="no-active" id="btn-ops">
					<img src="recursos/menu.png" width="30px" alt="">
				</button>
			</div>
 
			<nav>
				<ul>
					<li><a href="inicio.php">Inicio</a></li>
					<li><a href="conts_usu.php">Contraseñas</a></li>
				</ul>
			</nav>
		</header>

		<div class="cont">
			<div>
				<section class="welcome">
					<article>
						<div>
							<div class="data">
								<form method="get" action="modificacionDeDatosDeUsu.php">
									<div>
										<div class="img-usu">
											<img src="recursos/imglogin.png" width="300px" alt="" id="imagenUsu" title="Mi perfil">
										</div>
									</div>

										<div class="bienvenida-usu" title="Tu nombre de usuraio">
											<div class="h2-2-ini">
												<input type="text" name="nombre" id="noDUMD" placeholder="Nombre" required="">
											</div>
										</div>

										<div class="infor-al-usu">
											<input type="email" name="email" id="emDUMD" placeholder="G-mail" required="">
										</div>

										<div>
											<div>
												<input class="btns-ops confirmar" type="submit" name="confirmar" value="Confirmar nuevos datos">
											</div>
										</div>
								</form>
							</div>

							<div>
								<div class="div-cambiar-contra">
									<div>
										<button id="btn-cambiar-contra" class="btns-ops cambiar">
											Cambiar contraseña
										</button>
									</div>
								</div>
							</div>

							<div>
								<div class="div-elim-cuenta">
									<div>
										<button id="btn_eliminar_cuenta" class="btns-ops eliminar">
											Eliminar cuenta
										</button>
									</div>
								</div>
							</div>
						</div>
					</article>
				</section>
			</div>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/caractersJS.js"></script>
	<script src="js/btn-ops.js"></script>
	<script src="js/nuevos_datos.js"></script>

	<?=cambiarContra($conex);?>
	<?=nuevosDatos($conex);?>
	<?=eliminarCuenta($conex, datos_del_usuario('password', $conex, $_SESSION['id']));?>
</body>
</html>