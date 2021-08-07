<?php  
	//-------------------------------------------->

		include('archs_php-SJX/CoNeX_DB.php'); 
		include('archs_php-SJX/redirecciones.php');

	//-------------------------------------------->

		validar_sesion();
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
	<link rel="stylesheet" href="css/resp_ini.css">
</head>
<body> 
	<div class="loader">
		<div class="carga"></div>
		<div class="carga"></div>
		<div class="carga"></div> 
	</div> 
	
	<div class="wrapper" id="page-inicio">
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
					<li><a href="#" id="menu">Menu</a></li>
				</ul>
			</nav>
		</header>

		<div class="cont">
			<div>
				<section class="welcome">
					<article>
						<div>
							<div class="img-usu">
								<a href="modificacionDeDatosDeUsu.php">
									<img src="recursos/imglogin.png" width="300px" alt="" id="imagenUsu" title="Mi perfil">
								</a>
							<div>
						</div>

							<div class="bienvenida-usu" title="Tu nombre de usuraio">
								<div class="h2-1-ini">
									<h2>
										Bienvenido
									</h2>
								</div>
								<div class="h2-2-ini">
									<h2>
										<?=datos_del_usuario('nombre', $conex, $_SESSION['id']);?>	
									</h2>
								</div>
							</div>

							<div class="infor-al-usu">
								<span class="hola">Hola!!!</span> 
								Tienes contraseña <?=$_SESSION['cant_contras']?>
								almacenadas 

									<br>

								id = <?=$_SESSION['id'];?>
							</div>
						</div>
					</article>
				</section>
			</div>

			<div class="some-dat">
				<section class="dat-vent">
					<article>
						<div class="vent-JX">
							<h3>Ventajas de usar <i>Security-JX</i></h3>
						</div>

						<div>
							<ul>
								<li>
									Te ofrecemos la libertad de almacenar todas las contraseñas que tu
									quieras.
								</li>

									<li>
										Totalmente en tiempo real podras visualizarlas en cualquier dispositivo!!!
									</li>

								<li>
									Basta con recordar tu sesion de usuario y las demas contraseñas seran
									visibles
								</li>

									<li>
										Contamos con un algortimo de encriptacion que guarda tus datos y contraseñas
										de manera mas segura contra cualquier ataque de seguridad
									</li>
							</ul>
						</div>
					</article>
				</section>

				<section class="dat-vent reCom" id="recomendaciones">
					<article>
						<div class="vent-JX">
							<h3>Algunas recomendaciones</h3>
						</div>

						<div class="alg_recom">
							<ul>
								<li>							
									La contraseña debe contener por lo menos 8 caracteres máximo 128 caracteres	
									(en <b>Security-Jx</b> te permitimos 8-25)						
								</li>

								<li>
									Debe incluir signos diferentes como también signos especiales y letras en 
									mayúscula y minúscula
								</li>

								<li>
									No debe contener datos personales
								</li>

								<li>
									La contraseña no debe ser la misma que el nombre de usuario
								</li>

								<li>
									No debe ser fácilmente reconocible al introducirla
								</li>

								<li>
									Buenas contraseñas contienen letras mayúsculas y minúsculas, contienen 
									números y signos especiales, son fáciles de memorizar para no tener que anotarlas
								</li>

								<li>
									Muchas veces es dificil recordar muchas contraseñas, por esa
									razon te recomendamos usar un gestor donde tu puedas visualizarlas
									de manera segura. En este caso estas usando Security-JX que funciona de la 
									misma manera para que te sienras seguro tu y tus datos importantes
								</li>
							</ul>
						</div>
					</article>
				</section>

				<section class="dibuj">
					<article>
						<div class="seja"></div>

						<div class="_pA" id="logo">
							<div class="ojo" id="_ojo"></div>
						</div>
					</article>
				</section>

				<section class="ayuda" id="ayuda">
					<article>
						<div class="ayu-JX">
							<h3>Necesitas ayuda?</h3>
						</div>

						<div class="preguntas">
							<ul>
								<li>
									Como almacenar contraseñas
								</li>

									<li>
										Sobre mi cuenta
									</li>

								<li>
									Que es Security-JX
								</li>
							</ul>
						</div>
					</article>
				</section>

				<section class="ayuda referencias" id="referencias">
					<article>
						<div class="ayu-JX">
							<h3>Mas de Jx5</h3>
						</div>

						<div class="proyec">
							<div>
								<h4 class="vent-JX h4">Acorpi</h4>
							</div>

								<div>
									<a href="https://jocsanex5.github.io/Acorpi/">jocsanex5/Acorpi</a>
								</div>

							<div>
								<img src="recursos/AcorPi.png" width="300px" alt="">
							</div>
						</div>

								<div class="proyec">
									<div>
										<h4 class="vent-JX h4">DADA</h4>
									</div> 

										<div>
											<a target="_blank" href="https://jocsanex5.github.io/DADA/">jocsanex5/DADA</a>
										</div>

									<div>
										<img src="recursos/DADA.png" width="300px" alt="">
									</div>
								</div>

						<div class="proyec">
							<div>
								<h4 class="vent-JX h4">CartesianApp</h4>
							</div>

								<div>
									<a target="_blank" href="https://jocsanex5.github.io/CartesiaApp/">jocsanex5/CartesianApp</a>
								</div>

							<div>
								<img src="recursos/CartesianApp.png" width="300px" alt="">
							</div>
						</div>

							<div class="proyec">
								<div>
									<h4 class="vent-JX h4">Circle Game</h4>
								</div>

									<div>
										<a target="_blank" href="https://jocsanex5.github.io/CircleGame1.3.1/">jocsanex5/CircleGame</a>
									</div>

								<div>
									<img src="recursos/CG.png" width="300px" alt="">
								</div>
							</div>

						<div class="proyec">
							<div>
								<h4 class="vent-JX h4">Do-Note</h4>
							</div>

								<div>
									<a target="_blank" href="https://jocsanex5.github.io/doNote_LV/index.html">jocsanex5/doNote_LV</a>
								</div>

							<div>
								<img src="https://raw.githubusercontent.com/jocsanex5/doNote_LV/master/recursos/logo.png" width="300px" alt="">
							</div>
						</div>

						<div class="proyec">
							<div>
								<h4 class="vent-JX h4">Para ver mas...</h4>
							</div>

								<div>
									<a target="_blank" href="https://github.com/jocsanex5/">visita mi perfil de Git-hub</a>
								</div>

							<div>
								<i class="fab fa-github"></i>
							</div>
						</div>
					</article>
				</section>
			</div>
		</div>
	</div>

		<!-- js -->

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/mainOjo.js"></script>
	<script src="js/btn-ops.js"></script>
	<script src="js/inicio.js"></script>
</body>
</html>