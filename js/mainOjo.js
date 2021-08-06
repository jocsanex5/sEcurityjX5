(function(){ //main ojo.js

	let logo = document.getElementById('logo'),
		ojo = document.getElementById('_ojo');


	const animacion = (e) =>{

		let xraton = e.clientX,
			yraton = e.clientY,
			n = 10, //calculo para la equivalencia 

		mitadPantallaWidth = window.screen.width / 2,
		mitadPantallaHeigth = window.screen.height / 2, 
		limitePantallaWidth = window.screen.width / 300 * n,
		limitePantallaheigth = window.screen.height / 300 * n;

		/*
			Dispositivos moviles
			_____________________
		*/

		if(window.screen.width <= 800){ n = 30; }

		/*
			Eventos de movimiento
			______________________
		*/

		let	posX = xraton / 300 * n,
			posY = yraton / 300 * n,

			moverX = 0, moverY = 0; //pixeles de movimiento

			// X

		if(xraton < mitadPantallaWidth){

			moverX = limitePantallaWidth - posX + 10;

			ojo.style.left = `${moverX * -1}px`;
		
		} else{

			moverX = posX + 10;

			ojo.style.left = `${moverX}px`;
		} 

			// Y

		if(yraton < mitadPantallaHeigth){

			moverY = limitePantallaheigth - posY;

			ojo.style.top = `${moverY * -1}px`;
		
		} else{

			moverY = posY;

			ojo.style.top = `${moverY}px`;
		} 
	}

	const parpadear = () =>{

		if(logo.className == '_pA'){

			ojo.style.animation = 'ojoA 1s';
			logo.className = '_pB';
		
		} else{

			ojo.style.animation = 'ojoB 1s';
			logo.className = '_pA';
		}
	}

	window.addEventListener('mousemove', animacion);
	logo.addEventListener('click', parpadear);

}())