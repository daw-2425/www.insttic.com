
// MOSTRAR LOS DATOS EN LA TABLA DE ESTUDIANTES

function mostrarUsuarios(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarUsuario.php", true);
    objRequest.addEventListener("load", ()=> {
        console.log(objRequest.response);
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablUsario = document.getElementById("tablUsario");
        tablUsario.innerHTML='';

        

        respuesta.forEach(user => {
            tablUsario.innerHTML +=`

            <tr>
                <td> ${user.correo} </td>
                <td> ${user.rol} </td>
            </tr>
            `;
        });

    });
    objRequest.send();
}
mostrarUsuarios();