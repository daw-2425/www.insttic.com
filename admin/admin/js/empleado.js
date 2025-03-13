
let ModalInsertar= new bootstrap.Modal(document.getElementById("modalinsert"));

let formulario= document.getElementById("formulario");

// REGISTRAR EMPLEADOS
formulario.addEventListener("submit",function (e) {
    e.preventDefault();

    let objFormData = new FormData(formulario);
    let objRequest= new XMLHttpRequest();

    objRequest.open("POST", "../php/registrar/regisEmpleado.php");
    objRequest.onreadystatechange = function () {
        if(objRequest.readyState === 4 && objRequest.status === 200){
            const foto = document.getElementById("foto");
            
            // FOTO
            if(foto.files.length === 0){
                const errorFoto = document.getElementById("errorFoto");
                errorFoto.style.display= "block";
                errorFoto.innerHTML = "Ingrese la foto de empleado";
                document.getElementById("foto").focus();
                setInterval (function(){
                    errorFoto.style.display="none";
                }, 5000);
            }
            // NOMBRE
            else if(objFormData.get('nom') == ""){
                let errorNombre = document.getElementById("errorNombre");
                errorNombre.style.display= "block";
                errorNombre.innerHTML="Ingrese el nombre del empleado";
                document.getElementById("nom").focus();
                setInterval (function(){
                    errorNombre.style.display="none";
                }, 5000);
            }
            // APELLIDO
            else if(objFormData.get('apel') == ""){
                let errorApellido = document.getElementById("errorApellido");
                errorApellido.style.display= "block";
                errorApellido.innerHTML="Ingrese los apellidos del empleado";
                document.getElementById("apel").focus();
                setInterval (function(){
                    errorApellido.style.display="none";
                }, 5000);
            }
            // TELEFONO
            else if(objFormData.get('tel') == ""){
                let errorTel = document.getElementById("errorTelefono");
                errorTel.style.display= "block";
                errorTel.innerHTML="Ingrese el telefono del empleado";
                document.getElementById("tel").focus();
                setInterval (function(){
                    errorTel.style.display="none";
                }, 5000);
            }
            // CORREO
            else if(objFormData.get('correo') == ""){
                let errorTel = document.getElementById("errorCorreo");
                errorTel.style.display= "block";
                errorTel.innerHTML="Ingrese el correo del empleado";
                document.getElementById("correo").focus();
                setInterval (function(){
                    errorTel.style.display="none";
                }, 5000);
            }
            // GENERO
            //   else if(objFormData.get('fecha') == ""){
            //     let errorFecha = document.getElementById("errorFecha");
            //     errorFecha.style.display= "block";
            //     errorFecha.innerHTML="Ingrese la fecha de Contratacion";
            //     document.getElementById("fecha").focus();
            //     setInterval (function(){
            //         errorFecha.style.display="none";
            //     }, 5000);
            // }
            // ROL
            else if(objFormData.get('rol') == ""){
                let errorRol = document.getElementById("errorRol");
                errorRol.style.display= "block";
                errorRol.innerHTML="Ingrese el genero del empleado";
                document.getElementById("rol").focus();
                setInterval (function(){
                    errorRol.style.display="none";
                }, 5000);
            }
            else{
               let respueta= objRequest.response;
               console.log(respueta);
               
               if (respueta == 1) {
                Swal.fire({
                    title:"Se ha registrado al empleado " +objFormData.get('nom'),
                    icon:"success",
                    draggable: true
                });
                formulario.reset();
                ModalInsertar.hide();
                setInterval(function () {
                    location.reload();
                }, 3000);
               }
                
                // 
                }
            }  
        }
    
    objRequest.send(objFormData);
    
});


// MOSTRAR LOS DATOS EN LA TABLA DE EMPLEADOS

function mostrarEmpleados(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarEmpleado.php", true);
    objRequest.addEventListener("load", ()=> {
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablaEmpleados = document.getElementById("tablaEmpleado");
        tablaEmpleados.innerHTML='';

        respuesta.forEach(empleado => {
        tablaEmpleados.innerHTML +=`

            <tr>
                <td>
                    <img class="rounded-pill" style="width:50px; height:50px" src="../img/empleados/${empleado.foto}" alt="">
                </td>
                <td> ${empleado.nombre}   ${empleado.apellido}</td>
                <td> ${empleado.telefono}  </td>
                <td> ${empleado.correo} </td>
                <td> ${empleado.genero}</td>
                
                <td> ${empleado.nomRol} </td>
                <td>
                    <button class="btn btn-primary" id="btnActualizar" item=${empleado.cod_empleado}  >
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                </td>
            </tr>
            `;
        });

        // RECORRER EL BOTON DE ACTUALIZAR
        // let ModalActualizar= new bootstrap.Modal(document.getElementById("modalActualizar"));
        
        // const btnActualizar = document.querySelectorAll("#btnActualizar");
        // for(let a = 0; a < btnActualizar.length; a++){
        //     btnActualizar[a].addEventListener('click', function() {
        //         let idAct = this.getAttribute('item');
        //         ModalActualizar.show();


                
        //     });
        // }

    });
    objRequest.send();
}
mostrarEmpleados();