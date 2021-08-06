(function(){ //Main index S-JX

	//eventos()

		document.getElementById('btn-menu').onclick = () =>{

			Swal.fire({

				showCloseButton : true,
				showConfirmButton : false,
				title : 'Que es?',
				html : `
				<div class="img-logo">
					<img src="recursos/logo.png" width="300px" alt="">
				</div>
				<p>
					Security-JX es una app web donde te ofrecemos la libertad de almacenar todas tus contraseñas importantes
					donde solo tu, puedes visualizarlas de manera segura y totalmente confiable!!!
					que esperas inicia sesion o registrate 
				</p>
				`
			});
		}

		window.addEventListener('load', ()=>{

			document.querySelector('.loader').style.display = 'none';
			document.querySelector('.loader').style.opacity = '0';
		});

}())