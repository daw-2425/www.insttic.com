

let ModalInsertar= new bootstrap.Modal(document.getElementById("modalinsert"));

let formulario= document.getElementById("formulario");

// REGISTRAR GENERACION
formulario.addEventListener("submit",function (e) {
    e.preventDefault();

    let objFormData = new FormData(formulario);
    let objRequest= new XMLHttpRequest();

    objRequest.open("POST", "../php/regisGenracion.php");
    objRequest.onreadystatechange = function () {
        if(objRequest.readyState === 4 && objRequest.status === 200){
         
            // NOMBRE
             if(objFormData.get('nom') == ""){
                let errorNombre = document.getElementById("errorNombre");
                errorNombre.style.display= "block";
                errorNombre.innerHTML="Ingrese el nombre de la generacion";
                document.getElementById("nom").focus();
                setInterval (function(){
                    errorNombre.style.display="none";
                }, 5000);
            }
            // FECHA INICIO
            else if(objFormData.get('anInicio') == ""){
                let errorAnInicio = document.getElementById("errorAnInicio");
                errorAnInicio.style.display= "block";
                errorAnInicio.innerHTML="Ingrese la fecha de inicio";
                document.getElementById("anInicio").focus();
                setInterval (function(){
                    errorAnInicio.style.display="none";
                }, 5000);
            }
            // FECHA DE FINALIZACION
            else if(objFormData.get('anFin') == ""){
                let errorAnFin = document.getElementById("errorAnFin");
                errorAnFin.style.display= "block";
                errorAnFin.innerHTML="Ingrese la fecha de Finalizacion";
                document.getElementById("anFin").focus();
                setInterval (function(){
                    errorAnFin.style.display="none";
                }, 5000);
            }
            // SALA
            else if(objFormData.get('sala') == ""){
                let errorSala = document.getElementById("errorSala");
                errorSala.style.display= "block";
                errorSala.innerHTML="Ingrese la sala";
                document.getElementById("sala").focus();
                setInterval (function(){
                    errorSala.style.display="none";
                }, 5000);
            }
            // ESPECIALIDAD
              else if(objFormData.get('esp') == ""){
                let errorEsp = document.getElementById("errorEsp");
                errorEsp.style.display= "block";
                errorEsp.innerHTML="Ingrese la especialidad";
                document.getElementById("esp").focus();
                setInterval (function(){
                    errorEsp.style.display="none";
                }, 5000);
            }
            
            else{
                Swal.fire({
                    title:"Se ha registrado a la " +objFormData.get('nom') + " generacion",
                    icon:"success",
                    draggable: true
                });
                formulario.reset();
                ModalInsertar.hide();
                setInterval(function () {
                    location.reload();
                }, 3000);
                
                }
            }  
        }
    
    objRequest.send(objFormData);
    
});


// MOSTRAR LOS DATOS EN LA TABLA DE EMPLEADOS

function mostrarGeneraciones(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrarGeneracion.php", true);
    objRequest.addEventListener("load", ()=> {
        console.log(objRequest.responseText);

        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        
        let tablaGeneracion = document.getElementById("tablaGeneracion");
        tablaGeneracion.innerHTML='';

        respuesta.forEach(generacion => {
            tablaGeneracion.innerHTML +=`
            <tr>
                <td> ${generacion.nombre} </td>
                <td> ${generacion.año_inicio}  </td>
                <td> ${generacion.año_fin} </td>
                <td> ${generacion.denominacion}</td>
                <td> ${generacion.numero} </td>
                <td>
                    <button class="btn btn-primary" id="btnActualizar" item=${generacion.cod_empleado}  >
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
mostrarGeneraciones();