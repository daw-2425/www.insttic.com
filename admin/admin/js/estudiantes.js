
// MOSTRAR LOS DATOS EN LA TABLA DE ESTUDIANTES

function mostrarEstudiantes(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarEstudiante.php", true);
    objRequest.addEventListener("load", ()=> {
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablEstudiante = document.getElementById("tablEstudiante");
        tablEstudiante.innerHTML='';

        respuesta.forEach(estud => {
            tablEstudiante.innerHTML +=`

            <tr>
                <td>
                    <img class="rounded-pill" style="width:50px; height:50px" src="../." alt="">
                </td>
                <td> ${estud.nombre}   ${estud.apellidos}</td>
                <td> ${estud.fecha_nacimiento}  </td>
                <td> ${estud.contacto_emergencia} </td>
                <td> ${estud.genero}</td>
                
               
                <td>
                    <button class="btn btn-primary" id="btnActualizar" item=${estud.cod_empleado}  >
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                </td>
            </tr>
            `;
        });

      

    });
    objRequest.send();
}
mostrarEstudiantes();