<?php 

	//----------------------------------->
		include('CoNeX_DB.php'); 
		include('algoritmoEncrip.php');
	//----------------------------------->  

	function genConts($conex, $id, $desencriptar) //generar contras (funcion directamente el el archivo conts_usu.php)
	{
		$consulta_contras = "SELECT id, nombre, cont, tipo FROM `$id`";
		$resultado_contras = mysqli_query($conex, $consulta_contras);

		while($conts[] = mysqli_fetch_array($resultado_contras));

		if($_SESSION['cant_contras'] < 1){ //no hay contras para mostrar

			?>
				<div class="no_hay_contras">
					<div>
						<h2 class="AgG_ConTras">Agrega contraseñas para visualizarlas</h2>
					</div>
				</div>
			<?php
		
		} else{

			for ($i=0; $i < $_SESSION['cant_contras']; $i++) { 

				?>
					<div class="Alg-cont">
						<div class="some-cont" id="<?=$conts[$i]['id']?>" title="<?=$conts[$i]['tipo']?>">
							<div>
								 <i class="<?=$conts[$i]['tipo']?>" id="mail"></i> 
							</div>
							<div id="dat-imp-cont">
								<div class="name-contra" id="NaMe"><?=$conts[$i]['nombre']?></div>
								<input type="password" class="cont-contra" id="C0nt" value="<?=$desencriptar($conts[$i]['cont'])?>" readonly=""></input>
							</div>
						</div>	
					</div>
				<?php
			}
		}
	}

	/*
		Procesos importantes en la app -conts_usu.php
		_____________________________________________
	*/


	/*
		Se agregaran las contras mediante la siguiente funcion que hace la conexion y la 
		consulta a la base de datos directamente a MYSQL desde la app
		_________________________________________________________________________________
	*/

	function AggContra($conex, $id_usu, $encriptar)
	{
		if(isset($_POST['agregar'])){ 

			$mSg = null;
			$tIpo = null;

			if(validarCampos()['bool']){

				$id = 'cIJX' . substr(md5(time()), 0, 5);
				$nombre = $_POST['nombreContra'];
				$cont = $encriptar($_POST['contenidoContra']);
				$tipo = $_POST['tipo'];

				$consulta_AGG_contra02 = "INSERT INTO $id_usu(id, nombre, cont, tipo) VALUES ('$id', '$nombre', '$cont', '$tipo')";
				$resultado_AGG_contra = mysqli_query($conex, $consulta_AGG_contra02);

				if($resultado_AGG_contra){ 

					?>
					<script>

						Swal.fire({
							showConfirmButton : false,
							title : 'Espere un momento...'
						})

						window.location = 'conts_usu.php';
					</script>
					<?php
				
				} else $mSg = 'Ha ocurrido un error!'; $tIpo = 'error';
				
			} else $mSg = validarCampos()['msg']; $tIpo = 'error';

			return "<script>msg('" .$mSg. "', '" .$tIpo."');</script>";
		}
	}
 
	function modificarContra($conex, $id, $encriptar) 
	{
		if(isset($_POST['s_modificar'])) {  

			$mSg = null;
			$tIpo = null;

			if(validarCampos()['bool']){

				//realizar la consulta
				$nuevo_nombre = $_POST['nombreContra'];
				$nuevo_cont = $encriptar($_POST['contenidoContra']);
				$id_de_cont = $_POST['tipo_modif'];

				$consulta_modif = "UPDATE $id SET nombre = '$nuevo_nombre', cont = '$nuevo_cont' WHERE `$id`.id = '$id_de_cont'";

					$resultado_modif = mysqli_query($conex, $consulta_modif);

				if($resultado_modif){

					?><script>
						Swal.fire({
							showConfirmButton : false,
							title : 'Espere un momento...'
						})

						window.location = 'conts_usu.php';
					</script><?php

				} else $mSg = 'Ha ocurrido un error!!!'; $tIpo = 'error';

			} else $mSg = validarCampos()['msg']; $tIpo = 'error';

			return "<script>msg('" .$mSg. "', '" .$tIpo."');</script>";
		}
	}

	function eliminarContra($conex, $id)
	{
		if(isset($_POST['confirElimn'])){

			//eliminar la contra de la base de datos

			$id_contra = $_POST['id_elimn'];
			$consulta_elim = "DELETE FROM `$id` WHERE `$id`.id = '$id_contra'";
			$resultado_elim = mysqli_query($conex, $consulta_elim);

			if(!$resultado_elim){

				return "<script>msg('Ha ocurrido un error al eliminar la contraseña', 'error');</script>";
			
			} else{
				?>
				<script>

					Swal.fire({
						showConfirmButton : false,
						title : 'Espere un momento...'
					})

					window.location = 'conts_usu.php';
				</script>
				<?php
			} 
		}

	}

?>