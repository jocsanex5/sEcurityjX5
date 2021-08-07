<?php 

	//-------------------------------------->
		include('archs_php-SJX/CoNeX_DB.php');
	//-------------------------------------->

	session_start(); //para determinar las variabls globales a usar...

		$msg = '';

	function ingresarAlSistema($conex)
	{ 
		if(isset($_POST['ingresar'])){ //===IMPORTANTE!===== se confirmaran los datos

			$consulta_usu = "SELECT nombre , password FROM usuarios";

				$resul_usu = mysqli_query($conex, $consulta_usu); 

				while($usuarios[] = mysqli_fetch_array($resul_usu)); //traer los datos de la DB


					#se evaluan los datos de secion del usuario
			function acceso($u, $conex)
			{
				foreach ($u as $key) { 

					if($_POST['nombre'] == $key['nombre'] ){ 

						if( md5($_POST['password']) === $key['password'] ){ 

							$nombreusu = $key['nombre'];

							$consulta_id = "SELECT id FROM usuarios WHERE nombre = '$nombreusu'"; 

								$resultado_id = mysqli_query($conex, $consulta_id);

								while($ids[] = mysqli_fetch_array($resultado_id));;
	 
						 	if($resultado_id){

						 		return $ids[0]['id']; //---!!! id del usuario logueado
						 	} 
						} 

					} 
				}

				return 'errDI'; //error datos invalidos
			}


				#dependiendo del retorno de la funcioon vamos a redirijir
			if(acceso($usuarios, $conex) != 'errDI'){

					/*
						Tiene acceso al sistema, son correctos sus datos...
					*/

					// setcookie('id', acceso($usuarios, $conex), time() + (3600 * 24 * 1));
					// setcookie('login_date', time(), time() + (3600 * 24 * 1));

					$_SESSION['id'] = acceso($usuarios, $conex);
					$_SESSION['login_date'] = time();

					echo $_SESSION['id'];

				header('location: inicio.php');
			
			} else {

				$msg = 'Datos invalidos';

				?>
					<script>
						msg("<?=$msg;?>", 'error');
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
	<link rel="stylesheet" href="css/estilosSJX.css"> 
	<link rel="stylesheet" href="css/resp_index.css">
</head>  
<body>  
	<div class="loader">
		<div class="carga"></div>
		<div class="carga"></div>
		<div class="carga"></div> 
	</div> 

	<div class="wrapper">
		<div>
			<div class="presentme">
				<h2>Bienvenido a Segurity-JX!!!</h2>

				<p>
					Tus contraseñas totalmente aseguradas donde solo tu eres el unico
					en poder visualizarlas.
				</p>
			</div>
		</div>

		<div class="login">
			<div>
				<h3>Ingresa tus datos correspondientes</h3>
			</div>

			<div class="dat">
				<form method="post" action="index.php">

					<span><img src="recursos/imglogin.png" width="200px" alt=""></span>

					<div class="dat-usu">
						<input autocomplete="off" type="text" name="nombre" id="nombre" placeholder="Nombre" required="">

							<span><br></span>

						<input autocomplete="off" type="password" name="password" id="pass" placeholder="Contraseña" required="">

						<span><br></span>
					</div>

					<div>
						<input type="submit" value="Ingresar" name="ingresar" id="ingresar"> 
					</div>

					<div class="opc">
						<span><a href="crear_new_usu.php">Crear cuenta</a></span>
					</div>
				</form>
			</div> 
		</div>
	</div>
 

		<div class="butt">
			<button id="btn-menu">
				<img src="recursos/menu.png" width="30px" alt="">
			</button>
		</div>

	<div class="redes">
		<div>
			<a href="httpd://www.facebook.com/joc.ex5">
				<i class="iconAgg fab fa-facebook-square" id="face"></i>
			</a>
		</div>

			<div>
				<a href="https://www.instagram.com/jocsanex5?r=nametag">
					<i class="iconAgg fab fa-instagram-square" id="insta"></i>
				</a>
			</div>

			<div>
				<a href="https://wa.me/qr/ASNZNNUYE6QKK1">
					<i class="iconAgg fab fa-whatsapp-square" id="whats"></i>
				</a>
			</div>

		<div>
			<a href="https://github.com/jocsanex5">
				<i class="fab fa-github"></i>
			</a>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="js/caractersJS.js"></script>
	<script src="js/main_index_S-JX.js"></script>

	<?php ingresarAlSistema($conex); ?>
</body>
</html>