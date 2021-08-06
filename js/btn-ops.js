(function(){ //btn-opc

	let btn_ops = document.getElementById('btn-ops');

	btn_ops.onclick = () =>{

		if (btn_ops.className == 'no-active') {

			document.querySelector('header nav ul').style.display = 'block';
			document.querySelector('header nav ul').style.animation = 'nav_ul 1s';
			btn_ops.className = 'active';
		
		} else{

			document.querySelector('header nav ul').style.animation = 'nav_ul_no 1s';
			let cont=0,
			time = setInterval(()=>{ cont++;

					if(cont==1){clearInterval(time);}

				document.querySelector('header nav ul').style.display = 'none';

			}, 1000);

			btn_ops.className = 'no-active';
		}
	}

}())