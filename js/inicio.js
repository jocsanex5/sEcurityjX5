(function(){ //inicio

	const iniciar = () =>{

		document.querySelector('.h2-2-ini').style.display = 'none';

		let cont=0, time = setInterval(()=>{ cont++; if(cont==1) clearInterval(time);

			document.querySelector('.h2-1-ini').style.display = 'none';
			document.querySelector('.h2-2-ini').style.display = 'block';
			document.querySelector('.h2-2-ini').style.animation = 'h_nomb 3s';	

		}, 1500); 
	}

	const activar_menu = () =>{ 

		document.getElementById('menu').addEventListener('click', () =>{ 

			Swal.fire({

				showCloseButton : true,
				showConfirmButton : false,
				html : `<nav>
							<ul class="dif_ops">
								<li class="li_ops"><a href="#ayuda" class="a_ops" id="ayuda_ul">Ayuda</a></li>
								<li class="li_ops"><a href="#referencias" class="a_ops">Referencias</a></li>
								<li class="li_ops"><a href="#recomendaciones" class="a_ops" id="recom_ul">Recomendaciones</a></li>
								<li class="li_ops"><a href="salir.php" class="a_ops">Salir</a></li>
							</ul>
						</nav>`
			})
		})
	}

	const actPreguntas = () =>{

		let preguntas = document.querySelectorAll('.ayuda .preguntas ul li');

		preguntas[0].addEventListener('click', ()=>{

			Swal.fire({

				showCloseButton : true,
				showConfirmButton : false,
				title : 'Para almacenar contraseñas...',
				html : `<div class="alm-contras">
							<li class="li-alm">
								<span class="list">
									Debes de ingresar al menu de navegacion
								</span>

								<div>
									<img src="recursos/ops.png" width="200px" alt="">
								</div>
							</li>

							<li class="li-alm">
								<span class="list">
									Selecciona las contraseñas 
								</span>

								<div>
									<img src="recursos/ops-contras.png" width="200px" alt="">
								</div>
							</li>

							<li class="li-alm">
								<span class="list">
									Pulsa el botom de mas y rellena los datos
								</span>

								<div>
									<img src="recursos/aggContra.png" width="200px" alt="">
								</div>
							</li>
						</div>`
			})
		})

		preguntas[1].addEventListener('click', ()=>{

			Swal.fire({

				showCloseButton : true,
				showConfirmButton : false,
				title : 'Sobre mi cuenta...',
				html : `<div class="alm-contras">
							<li class="li-alm">
								<span class="list">
									Para ver las opciones sobre tu cuenta, modificacion, eliminacion,
									solo preciona sobre tu foto de perfil 
								</span>

								<div>
									<img src="recursos/miPerfil.png" width="200px" alt="">
								</div>
							</li>
						</div>`
			})
		})

		preguntas[2].addEventListener('click', ()=>{

			Swal.fire({

				showCloseButton : true,
				showConfirmButton : false,
				title : 'Que es Security-JX...',
				html : `<div class="alm-contras">
							<li class="li-alm">
								<span class="list">
									Security-JX es una app web donde te ofrecemos la libertad de almacenar todas tus contraseñas importantes
									donde solo tu, puedes visualizarlas de manera segura y totalmente confiable!!!
								</span>

								<div>
									<img src="recursos/logo.png" width="200px" alt="">
								</div>
							</li>
						</div>`
			})
		})
	}

	window.addEventListener('load', ()=>{

		document.querySelector('.loader').style.display = 'none';
		document.querySelector('.loader').style.opacity = '0';
	});

		/*
			ejects()
		*/

	iniciar();
	activar_menu();
	actPreguntas();

}())