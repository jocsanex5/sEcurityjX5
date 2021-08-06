<?php 

	//---------------------------------------------->
		include('archs_php-SJX/CoNeX_DB.php');
		include('archs_php-SJX/algoritmoEncrip.php');
	//---------------------------------------------->

		session_start();

	function exist($conex)
	{
		/*
			COMPROBACIONES de datos existentes
		*/

			//bool = true: caso que no hay un  datos similares
			//bool = false: caso que exista algun dato repetido...(dentro de la base de datos)

		$retorno = array('msg' => null, 'bool' => true);

		$consulta_dat = "SELECT nombre, email, password FROM usuarios";

			$result_dat = mysqli_query($conex, $consulta_dat);

		while ($datos[] = mysqli_fetch_array($result_dat));

		foreach($_POST as $nombre_campo => $valor){

			foreach ($datos as $key) {

				if($valor == $key['nombre']){

					$retorno['msg'] = 'Ya existe un usuario con ese nombre';
					$retorno['bool'] = false;
				
				} elseif($valor == $key['email']){

					$retorno['msg'] = 'Ya existe una cuenta con ese correo';
					$retorno['bool'] = false;
				
				} elseif($valor == $key['password']){

					$retorno['msg'] = 'Intenta elegir otra contraseña';
					$retorno['bool'] = false;
				}
			}
		}

		return $retorno;
	}

	function registrarUsuario($conex)
	{
		$mSg = null;
		$tIpo = null;

		if (isset($_POST['registrar'])){

			if(validarCampos()['bool']){

				if(exist($conex)['bool']){

					if($_POST['password'] == $_POST['password-confir']){

						$id = session_create_id('USJX5');
						$nombre = $_POST['nombre'];
						$email = $_POST['email'];

						/* 
							Encriptacion -hash MD5() 
						*/

						$password = $_POST['password'];
						$pass_encrip = md5($password);

							//consultar la base datos
							$consulta = "INSERT INTO usuarios(id, nombre, email, password) VALUES ('$id', '$nombre', '$email', '$pass_encrip')";

						$resultado = mysqli_query($conex, $consulta);

						if($resultado){ //

							$consulta_new_tab = " 

								CREATE TABLE `$id`(
									id varchar(50) NOT NULL PRIMARY KEY,
									nombre varchar(100) NOT NULL,
									cont varchar(150) NOT NULL,
									tipo varchar(100) NOT NULL 
								)
							";

							$resultado_new_tab = mysqli_query($conex, $consulta_new_tab);

	    					$mSg = "Usuario Creado!!!";
							$tIpo = 'success';						
						} 			
					
					} else{

						$mSg = "Las contraseñas no coinciden";
						$tIpo = "error";
					}
				} else{

					$mSg = exist($conex)['msg'];
					$tIpo = 'error';
				}
			
			} else{

				$mSg = validarCampos()['msg'];
				$tIpo = 'error';
			}

			return "<script>msg('" .$mSg. "', '" .$tIpo."');</script>";
		}
	}
?>

<!-- by Jx5 -->
<!DOCTYPE html>
<html lang="en">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Segurity-JX</title>
	<meta name="keywords" content="Security-JX, aplicacion, seguridad, contraseñas, Jx5">
	<meta name="description" content="Una aplicacion web desarrollada por Jx5 para almacenar contraseñas">
	<link rel="shortcut icon" href="recursos/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/estilosSJX.css"> 
	<link rel="stylesheet" href="css/resp_crearUsu.css">
</head>
<body> 
	<div class="wrapper">
		<?php 

			exist($conex);

		?>

		<div class="enc">
			<section class="inf">
				<article>
						<h2>Eres nuevo?</h2>

					<p>
						No te preocupes, crea tu cuenta en <b>Security-JX</b> totalmente gratis;
						solo debes de ingresar los siguientes datos y podras ser un nuevo
						usuario dentro :), ten en cuenta lo siguiente: <i>"Por que recordar muchas contraseñas si
						con una basta!!!"</i>
					</p>
				</article>
			</section>

			<section class="data">
				<article>
					<h2>Comienza ahora!!!</h2>

					<form method="post" action="crear_new_usu.php">
						<label for="dat" class="label-title">Tus datos de usuario...</label>

						<div class="dat" name="dat">
							<span><br></span>

								<input autocomplete="off" type="text" name="nombre" id="nom" placeholder="Nombre" required="">

								<span><br></span>

									<input autocomplete="off" type="email" name="email" id="mail" placeholder="Gmail" required="">

									<span><br></span>

										<label for="password">
											Define una contraseña de 8 caracteres
										</label> <br>

											<input type="password" name="password" id="pass" required="">

								<span><br></span>
									<label for="password-confir">
										Repite la contraseña
									</label> <br>

									<input type="password" name="password-confir" id="conf" required="">

							<span><br></span>

								<input type="submit" value="Registrarse" id="reg" name="registrar" required="">

								<span><br></span>

							<div>
								<a id="ir-a-inicio" href="index.php">iniciar secion</a>
							</div>
						</div>
					</form>
				</article>
			</section>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/caractersJS.js"></script>

	<?=registrarUsuario($conex);?>
</body>
</html>