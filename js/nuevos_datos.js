(function(){

	//modificacion de la contra

	const cambiarContra = () =>{

		document.getElementById('btn-cambiar-contra').addEventListener('click', ()=>{

			Swal.fire({

				showConfirmButton : false,
				showCloseButton : true,
				icon : 'warning',
				html : `<form  method="post" action="modificacionDeDatosDeUsu.php">
							<div class="inPut-nC">
								<input type="password" name="contra_usu" id="c0ntra-usu" placeholder="Contraseña actual" required="">
								<input type="password" name="nueva_contra" id="c0ontra-nueva" placeholder="Nueva contraseña" required="">
							</div>

							<div class="btns-confirm">
								<input type="submit" name="confirmar_nueva_contra" id="confir-nC" value="Confirmar">
							</div>
						</form>`
			})
		})
	}

	const eliminarCuenta = () =>{

		document.getElementById('btn_eliminar_cuenta').addEventListener('click', ()=>{

			Swal.fire({

				showConfirmButton : false,
				showCloseButton : true,
				html : `<form  method="post" action="modificacionDeDatosDeUsu.php">
							<div class="imgA">
								<img class="imgAlerta" src="recursos/logo.png" width="300px" alt="">
							</div>

							<div class="cont-elimCuenta">
								<div class="clec">
									con la eliminacion de cuenta:
								</div>

								<div>
									<ul>
										<li>Perderas tu perfil dentro de la app</li>
										<li>Se borraran tus datos (informacion de usuario, contraseñas....)</li>
										<li>Se cerrara la sesion de cualquier otro dispositivo donde hayas entrado</li>
									</ul>
								</div>
							</div>

							<div class="div-cofirm-contra">
								<input type="password" name="confirmar_contra_elim" id="c0ontra-nueva" placeholder="Contraseña" required="">
							</div>

							<div class="btns-confirm">
								<input type="submit" name="confirmar_elim_cuenta" id="confir-nC" value="Confirmar">
							</div>
						</form>`
			})
		})
	}

	window.addEventListener('load', ()=>{

        document.querySelector('.loader').style.display = 'none';
        document.querySelector('.loader').style.opacity = '0';
    });

	cambiarContra();
	eliminarCuenta();

}())