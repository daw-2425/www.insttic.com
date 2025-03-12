
// MOSTRAR LOS DATOS EN LA TABLA DE ESTUDIANTES

function mostrarUsuarios(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarUsuario.php", true);
    objRequest.addEventListener("load", ()=> {
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablUsario = document.getElementById("tablUsario");
        tablUsario.innerHTML='';

        respuesta.forEach(user => {
            tablUsario.innerHTML +=`

            <tr>
                <td> ${user.nombre} </td>
                <td> ${user.passwd}  </td>
                <td> ${user.id_alumno} </td>
            </tr>
            `;
        });

    });
    objRequest.send();
}
mostrarUsuarios();