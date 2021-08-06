<?php 

	//--------------------------------------->

		include('archs_php-SJX/CoNeX_DB.php');

	//--------------------------------------->

		/*
			Este archivo contiene las funciones necesarias para el inicio de session

			de la app, y determinar las redirecciones de cada pagina de la estructura web

			by Jx5
		*/

		session_start();

		$_SESSION['cant_contras'] = cant_contras_array(array_contras($conex, $_SESSION['id']));
		$_SESSION['nombre'] = datos_del_usuario('nombre', $conex, $_SESSION['id']);
		$_SESSION['email'] = datos_del_usuario('email', $conex, $_SESSION['id']);


	function datos_del_usuario($dato, $conex, $id)
	{
		$consulta_nombre = "SELECT `$dato` FROM usuarios WHERE id = '$id'";
		$resultado_nombres = mysqli_query($conex, $consulta_nombre);

			while($datos[] = mysqli_fetch_array($resultado_nombres));

			$dato_usu = $datos[0];

		return $dato_usu[0];
	}

	function array_contras($conex, $id)
	{
		$consulta_cant_contras = "

			SELECT nombre FROM `$id`;
		";

				$resultado_cant_contras = mysqli_query($conex, $consulta_cant_contras);

			while($cant_C[] = mysqli_fetch_array($resultado_cant_contras));

		return $cant_C;
	}

	function cant_contras_array($cant_C) //cantidad de contras de cada usuario
	{
		$total = count($cant_C);

		return $total-1; 
	}

	function logout() 
	{     
		session_start();

			session_unset();

		session_destroy();

			header('location: index.php');
	} 

	function validar_sesion() 
	{     
		if(!isset($_SESSION['id'])) {         

			logout();   
		} 
	}
?>