
// MOSTRAR LOS DATOS EN LA TABLA DE ESTUDIANTES

function mostrarEstudiantes(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","./mostrarEstudiante.php", true);
    objRequest.addEventListener("load", ()=> {
        console.log(objRequest.responseText);
        let respuesta = JSON.parse(objRequest.responseText);
       
        

        let tablEstudiante = document.getElementById("tablEstudiante");
        tablEstudiante.innerHTML='';

        respuesta.forEach(estud => {
            tablEstudiante.innerHTML +=`

            <tr>
                <td>
                    <img class="rounded-pill" style="width:50px; height:50px" src="./img/prof1.jpg" alt="">
                </td>
                <td> ${estud.nombre} </td>
                <td> ${estud.apellidos}</td>
                <td> ${estud.contacto_emergencia} </td>
                
            </tr>
            `;
        });


    });
    objRequest.send();
}
mostrarEstudiantes();