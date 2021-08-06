(function(){ //main const_usu.php -Security-JX

    /*
        Mostrar contras
    */

        //----------------Globales()-------------------

        //todas las contras
        let contras = document.querySelectorAll('.some-cont'),

        //btns de herramientas
        btns_herramientas = document.querySelectorAll('.btns-herramientas button');

        //------------------Functions()-----------------

    const mostContras = () =>{

            //Determinar los estilos a las contras
        document.querySelectorAll('.cont-contra').forEach((cont)=>{

            cont.addEventListener('click', (e)=>{

                if(e.target.type == 'password'){

                    e.target.type = 'text';
                
                } else{

                    e.target.type = 'password';
                }
            })
        })
    } 

    //Algunas funciones que generan los formularios de las herramientas

       /*
            Las herramientas que se muestran determinadamente deacuerdo
            a las necesidades del usuario dentro del app
        */

    const hErramientas = {

        activar : (id)=>{ 

            btns_herramientas.forEach((herr)=>{

                 if(id != herr.id){ 

                    herr.style.background = '#211d1d'; //border reset
                
                } else{

                   herr.style.background = '#8c3737';  //border activ
                }
            })
        },

        desactivar : (h)=>{

            h.style.background = '#211d1d'; //border reset
        }
    }

    /*
        datos y funciones de las contras...
    */
 
    const c0ntrs = {

        activar : (event)=>{

            contras.forEach((contra)=>{

                contra.onclick = ()=>{

                    event({
                        id : contra.id,
                        nombre : document.querySelector(`#${contra.id} #NaMe`).textContent,
                        cont : document.querySelector(`#${contra.id} #C0nt`).value,
                        title : contra.title,
                        cntr : contra 
                    });
                }
            })
        },

        remover : ()=>{

            contras.forEach((contra)=>{

                contra.onclick = null;
            })
        }
    }

    /*
        funcoiones de las contras
    */

    const modificarContras = () =>{ 

        btns_herramientas[0].addEventListener('click', () =>{ 

             hErramientas.activar(btns_herramientas[0].id);

            c0ntrs.activar((datos)=>{ 

                Swal.fire({

                    showCancelButton : false,
                    showConfirmButton : false,
                    showCloseButton : true,
                    html : `<form method="post" action="conts_usu.php" class="formModif">
                                <i class="${datos.title}" id="imgModif"></i>
                                <input style="display: none;" value="${datos.id}" type="text" id="idModif" name="tipo_modif">
                                <input autocomplete="off" type="text" name="nombreContra" id="NOMBRE_contra" value="${datos.nombre}" required="">
                                <input type="text" name="contenidoContra" id="CONT_contra" value="${datos.cont}" required="">
                                <input class="s_agregar" type="submit" value="Modificar" name="s_modificar">
                            </form>`

                }).then((result)=>{

                    if(!result.isConfirmed){

                        hErramientas.desactivar(btns_herramientas[0]);
                        c0ntrs.remover();
                    }
                })
             })
        }) 
    }

    const eliminarContra = () =>{ //Elimnanar x contraseña

        btns_herramientas[1].addEventListener('click', () =>{ 

            hErramientas.activar(btns_herramientas[1].id);

        c0ntrs.activar((datos)=>{ 

                datos.cntr.style.border = '7px solid red';

                Swal.fire({

                    icon : 'warning',
                    title : 'Seguro que quieres eliminar esta contraseña',
                    html : `
                        <form action="conts_usu.php" method="post" class="form-elimn">
                            <label>Esta accion no se puede desacer</label>
                            <input style="display: none" value="${datos.id}" type="text" id="tipoelimn" name="id_elimn">
                            <input type="submit" class="s_elimn" name="confirElimn" value="Aceptar">
                        </form>
                    `,
                    showConfirmButton : false,
                    showCloseButton : true,
                    allowOutsideClick : false,
                    allowEscapeKey : false,
                    allowEnterKey  : false
                
                }).then((result)=>{

                    if(!result.isConfirmed){

                        hErramientas.desactivar(btns_herramientas[1]);
                        datos.cntr.style.border = '5px solid #034c6c';
                        c0ntrs.remover();
                    }
                })
            }) 
        })
    }

    const aggContra = () =>{ 

        btns_herramientas[2].addEventListener('click', ()=>{ 

            hErramientas.activar(btns_herramientas[2].id);

            /*
                mostrar el formulario para obtener el tipo de contra...
            */

            Swal.fire({

                showCancelButton : false,
                showConfirmButton : false,
                showCloseButton : true,
                title : '<span class="tittleAgg">Seleciona el tipo de contraseña</span>',
                html : `<div class="tipos-contras">
                            <i class="iconAgg fas fa-at" id="mail"></i> 
                            <i class="iconAgg fas fa-exclamation-circle" id="dato"></i>
                            <i class="iconAgg fab fa-facebook-square" id="face"></i>
                            <i class="iconAgg fab fa-instagram-square" id="insta"></i>
                            <i class="iconAgg fab fa-twitter-square" id="twirer"></i>
                            <i class="iconAgg fab fa-whatsapp-square" id="whats"></i>
                        </div>`
            }).then((result)=>{

                if(!result.isConfirmed){

                    hErramientas.desactivar(btns_herramientas[2]);
                }
            })

            document.querySelectorAll('.iconAgg').forEach((tipo)=>{

                tipo.addEventListener('click', ()=>{ 

                    Swal.fire({

                        html : `<form method="post" action="conts_usu.php" class="formAgg">
                                    <i class="${tipo.classList}" id="imgAgg"></i>
                                    <input style="display: none" value="${tipo.classList.toString()}" type="text" id="tipoAgg" name="tipo">
                                    <input autocomplete="off" type="text" name="nombreContra" id="NOMBRE_contra" placeholder="Nombre" required="">
                                    <input type="password" name="contenidoContra" id="CONT_contra" placeholder="Contenido" required="">
                                    <input class="s_agregar" type="submit" value="Agregar" name="agregar">
                                </form>`,
                        showConfirmButton : false,
                        showCloseButton : true,
                        allowOutsideClick : false,
                        allowEscapeKey : false,
                        allowEnterKey  : false
                    
                    }).then((result)=>{

                        if(!result.isConfirmed){

                            hErramientas.desactivar(btns_herramientas[2]);
                        }
                    })
                })
            })
        })
    }

    const busqueda = () =>{

        //algoritmo de busqueda

        let form_busc = document.getElementById('form_busc'),
            s_buscar = document.getElementById('buscar'),
            contBusqueda = document.getElementById('contBusqueda'),
            result_busc = document.querySelector('.result-busc'),
            div_content_Contras = document.getElementById('div-content-Contras');

         let datos = {

            nombre : document.querySelectorAll('#NaMe'),
            cont : document.querySelectorAll('#C0nt')
        }

        /*
            ALGORITMO DE BUSQUEDA...
        */

        form_busc.addEventListener('submit', (event)=>{

            event.preventDefault(); //no enviar, porque la busqueda con js

            //resetar la busqueda
            document.querySelectorAll('.conts-result').forEach((contra)=>{

                result_busc.removeChild(contra);
            })

            let expresion = new RegExp(contBusqueda.value, 'gi'); //Expresion regular de la busqueds
            let cantResultados = null; 

            for(let i=0; i<contras.length; i++){ 

                if(expresion.test(datos.nombre[i].textContent)){

                    div_content_Contras.style.display = 'none';
                    contras[i].classList.add('conts-result');
                    result_busc.appendChild(contras[i]); 
                    datos.nombre[i].classList.add('busq');
                    cantResultados++;
                
                } else{

                    if(expresion.test(datos.cont[i].value)){

                        div_content_Contras.style.display = 'none';
                        contras[i].classList.add('conts-result');
                        result_busc.appendChild(contras[i]); 
                        datos.cont[i].classList.add('busq');
                        cantResultados++;
                    
                    }
                } 
            }

            if(cantResultados >= 1){

                msg(`${cantResultados} coincidencias encontradas`, 'success');
            
            } else{

                msg(`0 coincidencias encontradas`, 'error');
            }
        })
    }

    const mostarTodo = () =>{

        btns_herramientas[3].addEventListener('click', ()=>{window.location.reload();});
    }

    window.addEventListener('load', ()=>{

        document.querySelector('.loader').style.display = 'none';
        document.querySelector('.loader').style.opacity = '0';
    });

        //----Main()----

    mostContras();
    aggContra();
    modificarContras();
    eliminarContra();
    busqueda();
    mostarTodo();

}())