<?php 
	//-------------------------------------------->

		include('archs_php-SJX/CoNeX_DB.php');
		include('archs_php-SJX/redirecciones.php');
		include('archs_php-SJX/genEraR_COnUsu.php');

		validar_sesion();
	
	//-------------------------------------------->
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
	<link rel="stylesheet" href="css/estilosMstC2.css">
	<link rel="stylesheet" href="css/modal_estilos.css">
	<link rel="stylesheet" href="css/resp_contsUsu.css">
	<link rel="stylesheet" href="css/marcaDeAwua.css">
</head>
<body>
	<div class="loader">
		<div class="carga"></div>
		<div class="carga"></div>
		<div class="carga"></div> 
	</div> 
	
	<div class="wrapper">
		<div>
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
		</div>

		<div class="cont">
			<section class="welcome msg">
				<article>
					<div>
						<h2 class="h2">
							Tus contraseñas aqui!!! 
						</h2>
					</div>

					<div class="F-1-bC0nTs">
						<form method="post" id="form_busc">
							<input type="search" name="cont" id="contBusqueda" required="">
							<input type="submit" value="Buscar" name="buscar" id="buscar">
						</form>
					</div>
				</article>
			</section>

			<section class="herreamientas">
				<div>
					<img id="imgHerramientas" src="recursos/icons/configuraciones.svg" width="100px"  alt="">
				</div>
				<div>
					<div class="btns-herramientas">
						<button class="No-active" id="btn-modifContras" title="modificar contraseña">
							<img src="recursos/modifCont.png" width="50px" alt="">
						</button> 
						<button title="Eliminar contraseña" id="eliminContra">
							<img src="recursos/eliminCont.png" width="50px" alt="">
						</button> 
						<button title="Agregar contraseña" id="aggContra">
							<img src="recursos/mas.png" width="50px" id="AGG-contras" alt="">
						</button>
						<button title="Mostar todo" id="mostTodo">
							<i class="fas fa-reply-all"></i>
						</button>
					</div>
				</div>
			</section>

			<section class="conts">
				<article>
					<div class="contras" id="div-content-Contras">
						<?php
							genConts($conex, $_SESSION['id'], $desencriptar);
						?>
					</div>

					<div class="result-busc"></div>
				</article>
			</section>
		</div>
	</div>

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/caractersJS.js"></script>
	<script src="js/btn-ops.js"></script>
	<script src="js/mostConts.js"></script>

	<?=AggContra($conex, $_SESSION['id'], $encriptar);?>
	<?=eliminarContra($conex, $_SESSION['id'])?>
	<?=modificarContra($conex, $_SESSION['id'], $encriptar) ?>
</body>
</html>