<?php 

	//Algoritmo de encriptacion por Jx5 para Security-JX

	$clave  = 'sJX5alg0rDeEncriptacionYDesencirptacionEnPhP';

	//Metodo de encriptación
	$method = 'aes-256-cbc';

	// Puedes generar una diferente usando la funcion $getIV()
	$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw");

	 $encriptar = function ($valor) use ($method, $clave, $iv) {
	     return openssl_encrypt ($valor, $method, $clave, false, $iv);
	 };

	 $desencriptar = function ($valor) use ($method, $clave, $iv) {
	     $encrypted_data = base64_decode($valor);
	     return openssl_decrypt($valor, $method, $clave, false, $iv);
	 };
	 

	/*
		funcion de valicaion de formularios de ingreso, registro, contras...
	*/

	function validarCampos()
	{
		$retorno = array('bool' => true, 'msg' => null);

		foreach($_POST as $nombre_campo => $valor){

			/*
				VALIDACIONES
			*/

			//bool = true: caso que no exite error alguno en los campos
			//bool = false: caso que exista error...(tamano, caracteres especiales)

			if(strlen($valor) >= 1){ //no esta vacio

				switch($nombre_campo){

					case 'nombre':

						if(!preg_match("/^[a-zA-Z0-9\_\-]{0,40}\s?[a-zA-Z0-9\_\-]{0,40}?$/", $valor)){

							$retorno['msg'] = 'Verifica los caracteres del nombre';
							$retorno['bool'] = false;
						}

					break;

					case 'email':

						if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9-.]+$/", $valor)){

							$retorno['msg'] = 'Tu correo no es valido';
							$retorno['bool'] = false;
						}

					break;

					case 'password':

						if(!preg_match("/^.{0,12}$/", $valor)){

							$retorno['msg'] = 'Comprueba el limite de caracteres de tu contraseña';
							$retorno['bool'] = false;
						}

					break;

					//validaciones de datos de contras

					case 'nombreContra':

						if(!preg_match("/^.{0,20}$/", $valor)){

							$retorno['msg'] = 'Comprueba el limite de caracteres del nombre de la contraseña';
							$retorno['bool'] = false;
						}

					break;

					case 'contenidoContra':

						if(!preg_match("/^.{0,30}$/", $valor)){

							$retorno['msg'] = 'Comprueba el limite de caracteres de tu contraseña';
							$retorno['bool'] = false;
						}

					break;
				}

			} else{

				$retorno['msg'] = 'Por favor rellena todos los campos';
				$retorno['bool'] = false;
			}
		} 

		return $retorno;
	}

?>