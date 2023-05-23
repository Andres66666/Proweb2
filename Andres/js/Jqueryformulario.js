/* codigo formulario validado 3*JQuery*/
'use strict'  
window.addEventListener('load',function(){  
    console.log("DOM cargado");  
       var formulario=document.querySelector(".formularios");  
       var box_dashed=document.querySelector(".dashed");  
       box_dashed.style.display="none";  
       formulario.addEventListener('submit',function(){  
        console.log("Evento submit capturado"); 

            var ID_EMPLEADO=document.querySelector('#ID_EMPLEADO').value; 
            var NOMBRE=document.querySelector('#NOMBRE').value;  
            var APELLIDO_PAT=document.querySelector('#APELLIDO_PAT').value;  
            var APELLIDO_MAT=parseInt(document.querySelector('#APELLIDO_MAT').value); 
            //const fechaInput =document.querySelector('#fecha').value; 
            var F_CONTRATACION=document.querySelector('#F_CONTRATACION').value; 
            var SEXO=document.querySelector('#SEXO').value; 
            var ESPECIALIDAD=document.querySelector('#ESPECIALIDAD').value; 
            var TELEFONO=document.querySelector('#TELEFONO').value; 
            var E_MAIL=document.querySelector('#E_MAIL').value; 

            



            var error_ID_EMPLEADO=document.querySelector('#error_ID_EMPLEADO');
            var error_NOMBRE=document.querySelector('#error_NOMBRE');
            var error_APELLIDO_PAT=document.querySelector('#error_APELLIDO_PAT');
            var error_APELLIDO_MAT=document.querySelector('#error_APELLIDO_MAT');             
            //const error_fecha=document.querySelector('#error_fecha');
            var error_F_CONTRATACION=document.querySelector('#error_F_CONTRATACION');
            var error_SEXO=document.querySelector('#error_SEXO');
            var error_ESPECIALIDAD=document.querySelector('#error_ESPECIALIDAD');
            var error_TELEFONO=document.querySelector('#error_TELEFONO');
            var error_E_MAIL=document.querySelector('#error_E_MAIL');
  

                    if(ID_EMPLEADO.trim()==null || ID_EMPLEADO.trim().length==0){  
                        alert("El id no es válido");  
                        error_ID_EMPLEADO.innerHTML="<span id='error_ID_EMPLEADO'> Error⚠</span>";  
                        error_ID_EMPLEADO.style.color="red";  
                            return false;  
                    }else{  
                        error_ID_EMPLEADO.innerHTML="<span id='error_ID_EMPLEADO'></span>";  
                    }  
                    if(NOMBRE.trim()==null || NOMBRE.trim().length==0){  
                        alert("Los Nombres no son válidos");  
                        error_NOMBRE.innerHTML="<span id='error_NOMBRE'> Error⚠</span>";  
                        error_NOMBRE.style.color="red";  
                            return false;  
                    }else{  
                        error_NOMBRE.innerHTML="<span id='error_NOMBRE'></span>";  
                    }  

                    if(APELLIDO_PAT.trim()==null || APELLIDO_PAT.trim().length==0){  
                        alert("Los apellido no válido");  
                        error_APELLIDO_PAT.innerHTML="<span id='error_APELLIDO_PAT'> Error⚠</span>";  
                        error_APELLIDO_PAT.style.color="red";  
                            return false;  
                    }else{  
                        error_APELLIDO_PAT.innerHTML="<span id='error_APELLIDO_PAT'></span>";  
                    }  
                    if(APELLIDO_MAT.trim()==null || APELLIDO_MAT.trim().length==0){  
                        alert("Los apellido no válido");  
                        error_APELLIDO_MAT.innerHTML="<span id='error_APELLIDO_MAT'> Error⚠</span>";  
                        error_APELLIDO_MAT.style.color="red";  
                            return false;  
                    }else{  
                        error_APELLIDO_MAT.innerHTML="<span id='error_APELLIDO_MAT'></span>";  
                    }  
                    

                    if(F_CONTRATACION.trim() === ''){  
                        alert("La fecha esta vacia ");  
                        error_F_CONTRATACION.innerHTML="<span id='error_F_CONTRATACION'> Error⚠</span>";
                        error_F_CONTRATACION.style.color="red";  
                        return false;  
                    }else{  
                        error_F_CONTRATACION.innerHTML="<span id='error_F_CONTRATACION'></span>";  
                    }  


                    if(SEXO.trim() === 'Vacio'){  
                        alert("Seleccione su sexo");  
                        error_SEXO.innerHTML="<span id='error_SEXO'> Error⚠</span>";
                        error_SEXO.style.color="red";  
                        return false;  
                    }else{  
                        error_SEXO.innerHTML="<span id='error_SEXO'></span>";  
                    } 

                    if(ESPECIALIDAD.trim() === 'Vacio'){  
                        alert("Seleccione  la especialidad ");  
                        error_ESPECIALIDAD.innerHTML="<span id='error_ESPECIALIDAD'> Error⚠</span>";
                        error_ESPECIALIDAD.style.color="red";  
                        return false;  
                    }else{  
                        error_ESPECIALIDAD.innerHTML="<span id='error_ESPECIALIDAD'></span>";  
                    } 

                    if (TELEFONO.trim() === '') {
                        alert("El campo de número de celular no puede estar vacío.");
                        error_TELEFONO.innerHTML="<span id='error_TELEFONO'> Error⚠</span>";
                        error_TELEFONO.style.color="red";  
                        return false;  
                    } else if (TELEFONO.length !== 8 || isNaN(TELEFONO)) {
                        alert("El número de celular no es válido. Debe tener 8 dígitos.");
                        error_TELEFONO.innerHTML="<span id='error_TELEFONO'>Error⚠</span>";
                        error_TELEFONO.style.color= "red";
                        return false;
                    } else {
                        error_TELEFONO.innerHTML="<span id='error_TELEFONO'></span>";
                    }

                  
                    var correoRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if (!correoRegex.test(E_MAIL)) {
                        alert("El correo electrónico no es válido.");
                        error_E_MAIL.innerHTML="<span id='error_E_MAIL'> Error⚠</span>";
                        error_E_MAIL.style.color="red";  
                        return false;
                    } else {
                        error_E_MAIL.innerHTML="<span id='error_E_MAIL'></span>";  
                    }                   
        });  
    });  


