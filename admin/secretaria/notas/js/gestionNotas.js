//MODALES DE INGRESION DE NOTAS
var mdalNotasDaw = new bootstrap.Modal(document.getElementById('modalNotasDaw'));
var mdalNotasAsir = new bootstrap.Modal(document.getElementById('modalNotasAsir'));
var mdalNotasTlc = new bootstrap.Modal(document.getElementById('modalNotasTlc'));
var mdalNotasMic = new bootstrap.Modal(document.getElementById('modalNotasMic'));
//MODALES PARA VER NOTAS DEL ESTUDIANTE
var modalVerNotasEstDaw = new bootstrap.Modal(document.querySelector('#modalVerNDaw'));
var modalVerNotasEstAsir = new bootstrap.Modal(document.querySelector('#modalVerNAsir'));
var modalVerNotasEstTlc = new bootstrap.Modal(document.querySelector('#modalVerNTlc'));
var modalVerNotasEstMic = new bootstrap.Modal(document.querySelector('#modalVerNMic'));
//BOTONES PARA ABRIR MODAL DE VER NOTAS ESTUDIAL
// var btnverNotaEstDaw = document.getElementById('ver-notaDaw');
// var btnverNotaEstAsir = document.getElementById('ver-notaAsir');
// var btnverNotaEstTlc = document.getElementById('ver-notaTlc');
// var btnverNotaEstMic = document.getElementById('ver-notaMic');
//las funciones de interaccion de los botone y modal para ver las notas del estudiante
// btnverNotaEstDaw.addEventListener('click', function () {
//     console.log('btnvernota daw');
//     modalVerNotasEstDaw.show();
// });
// btnverNotaEstAsir.addEventListener('click', function () {
//     console.log('btnvernota asir');
//     modalVerNotasEstAsir.show();
// });
// btnverNotaEstTlc.addEventListener('click', function () {
//     console.log('btnvernota tlc');
//     modalVerNotasEstTlc.show();
// });
// btnverNotaEstMic.addEventListener('click', function () {
//     console.log('btnvernota mic');
//     modalVerNotasEstMic.show();
// });

//BOTONES PARA ABRIR MODAL DEL INSERCION
// var btnnotaIngresoDaw = document.getElementById('nota-insertarDaw');
// var btnnotaIngresoAsir = document.getElementById('nota-insertarAsir');
// var btnnotaIngresoTlc = document.getElementById('nota-insertarTlc');
// var btnnotaIngresoMic = document.getElementById('nota-insertarMic');
//las funciones de interaccion entre los botones y modales de insercion
// btnnotaIngresoDaw.addEventListener('click', function () {
//     console.log('modal');
//     mdalNotasDaw.show();
// });
// btnnotaIngresoAsir.addEventListener('click', function () {
//     console.log('modal');
//     mdalNotasAsir.show();
// });
// btnnotaIngresoTlc.addEventListener('click', function () {
//     console.log('modal');
//     mdalNotasTlc.show();
// });
// btnnotaIngresoMic.addEventListener('click', function () {
//     console.log('modal');
//     mdalNotasMic.show();
// });
//botones y tablas de cada especialidad
var daw = document.getElementById("btn-daw");

daw.addEventListener('click', () => {
    document.getElementById("daw").classList.toggle("ocultar");
    console.log("boton daw");
    document.getElementById("asir").classList.remove("mostrar");
    document.getElementById("tlc").classList.remove("mostrar");
    document.getElementById("mic").classList.remove("mostrar");
});

var asir = document.getElementById("btn-asir");
asir.addEventListener('click', () => {
    document.getElementById("asir").classList.toggle("mostrar");
    console.log("boton asir");
    document.getElementById("daw").classList.add("ocultar");
    document.getElementById("tlc").classList.remove("mostrar");
    document.getElementById("mic").classList.remove("mostrar");
});

var tlc = document.getElementById("btn-tlc");
tlc.addEventListener('click', () => {
    document.getElementById("tlc").classList.toggle("mostrar");
    console.log("boton tlc");
    document.getElementById("asir").classList.remove("mostrar");
    document.getElementById("daw").classList.add("ocultar");
    document.getElementById("mic").classList.remove("mostrar");
});

var mic = document.getElementById("btn-mic");
mic.addEventListener('click', () => {
    document.getElementById("mic").classList.toggle("mostrar");
    console.log("boton mic");
    document.getElementById("asir").classList.remove("mostrar");
    document.getElementById("tlc").classList.remove("mostrar");
    document.getElementById("daw").classList.add("ocultar");
});

// //modales para actualizar nota o corregir
var modalActualizar = new bootstrap.Modal(document.getElementById('modalNotasActualizarDaw'));
// //boton de actualizar o corregir
// var btnActualizar = document.getElementById('actualizar-notaDaw');
// //funcionalidad para la interraccion de los botones y el modal actualizar
// btnActualizar.addEventListener('click', function () {
//     modalActualizar.show();
// });

//validacion de campos///////////////////////////////////////////////////////////////////////
var DawForm = document.querySelector('#formularioDaw');
var inputsDaw = document.querySelectorAll('#formularioDaw input');

// const exprr = {
//     notaExprr: /^\d{7,14}$/
// }

// const insertarEn = {
//     notaDaw1: false,
//     notaDaw2: false,
//     notaDaw3: false,
//     notaDaw4: false
// }

// const resulInputs = (e) => {
//     switch (e.target.name) {
//         case "notaDaw1":

//             let nota1 = document.getElementById('notaDaw1');

//             if (nota1.value == "") {
//                 nota1.classList.add('Error');
//                 nota1.classList.remove('Correcto');
//                 document.getElementById('errN__Daw1').innerHTML = "Ingresa la nota";
//                 document.getElementById('errN__Daw1').classList.add('Error');
//                 document.getElementById('labelValid1').classList.add('Error');
//                 document.getElementById('labelValid1').classList.remove('Correcto');
//             } else {
//                 nota1.classList.remove('Error');
//                 nota1.classList.add('Correcto');
//                 document.getElementById('errN__Daw1').classList.remove('Error');
//                 document.getElementById('labelValid1').classList.remove('Error');
//                 document.getElementById('labelValid1').classList.add('Correcto');
//             }

//             break;
//         case "notaDaw2":

//             console.log('notaDaw2');
//             let nota2 = document.getElementById('notaDaw2');

//             if (nota2.value == "") {
//                 nota2.classList.add('Error');
//                 nota2.classList.remove('Correcto');
//                 document.getElementById('errN__Daw2').innerHTML = "Ingresa la nota";
//                 document.getElementById('errN__Daw2').classList.add('Error');
//                 document.getElementById('labelValid2').classList.add('Error');
//                 document.getElementById('labelValid2').classList.remove('Correcto');
//             } else {
//                 nota2.classList.remove('Error');
//                 nota2.classList.add('Correcto');
//                 document.getElementById('errN__Daw2').classList.remove('Error');
//                 document.getElementById('labelValid2').classList.remove('Error');
//                 document.getElementById('labelValid2').classList.add('Correcto');
//             }

//             break;
//         case "notaDaw3":
//             console.log('notaDaw3');

//             let nota3 = document.getElementById('notaDaw3');

//             if (nota3.value == "") {
//                 nota3.classList.add('Error');
//                 nota3.classList.remove('Correcto');
//                 document.getElementById('errN__Daw3').innerHTML = "Ingresa la nota";
//                 document.getElementById('errN__Daw3').classList.add('Error');
//                 document.getElementById('labelValid3').classList.add('Error');
//                 document.getElementById('labelValid3').classList.remove('Correcto');
//             } else {
//                 nota3.classList.remove('Error');
//                 nota3.classList.add('Correcto');
//                 document.getElementById('errN__Daw3').classList.remove('Error');
//                 document.getElementById('labelValid3').classList.remove('Error');
//                 document.getElementById('labelValid3').classList.add('Correcto');
//             }

//             break;
//         case "notaDaw4":
//             console.log('notaDaw4');
//             let nota4 = document.getElementById('notaDaw4');

//             if (nota4.value == "") {
//                 nota4.classList.add('Error');
//                 nota4.classList.remove('Correcto');
//                 document.getElementById('errN__Daw4').innerHTML = "Ingresa la nota";
//                 document.getElementById('errN__Daw4').classList.add('Error');
//                 document.getElementById('labelValid4').classList.add('Error');
//                 document.getElementById('labelValid4').classList.remove('Correcto');
//             } else {
//                 nota4.classList.remove('Error');
//                 nota4.classList.add('Correcto');
//                 document.getElementById('errN__Daw4').classList.remove('Error');
//                 document.getElementById('labelValid4').classList.remove('Error');
//                 document.getElementById('labelValid4').classList.add('Correcto');
//             }

//             break;

//         default:
//             break;
//     }
// }



// inputsDaw.forEach((inputnota) => {
//     inputnota.addEventListener('keyup', resulInputs);
//     inputnota.addEventListener('blur', resulInputs);
// });

///////////////////////////////////  MOSTRAR ESTUDIANTES //////////////////////////////////////////////////////////////////////

function CargarEstudiantes() {

    let xhr = new XMLHttpRequest();
    xhr.open('GET', './gestion/alumnos.php', true);
    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {
            let json = JSON.parse(xhr.response);
            let tbody = document.getElementById('tbodydaw');
            console.log(json);

            tbody.innerHTML = '';


            for (let alumno of json) {

                tbody.innerHTML += `
            <div class="tr">
                    <div class="th">${alumno.nombre}</div>
                    <div class="th">${alumno.apellido}</div>
                    <div class="th">${alumno.codigo}</div>
                    <div class="th">
                      <div class="btn nota" style="background-color: #0A2A66;" item="${alumno.id_alumno}" id="nota-insertarDaw"><i
                          style="color: white;" class="fa-solid fa-plus"></i></div>
                      <div class="btn ver-nota" style="background-color: green;" item="${alumno.id_alumno}" id="ver-notaDaw"><i
                          style="color: white;" class="fa-regular fa-eye"></i></div>
                      <div class="btn ver-nota" style="background-color: #3C91E6;" item="${alumno.id_alumno}" id="actualizar-notaDaw"><i
                          style="color: white;" class="fa-solid fa-square-pen"></i></div>
                    </div>
                  </div>
            `

            }

            let btnInserDaw = document.querySelectorAll("#nota-insertarDaw");
            let btnVerNotasDaw = document.querySelectorAll('#ver-notaDaw');
            let btnVerActualizarDaw = document.querySelectorAll('#actualizar-notaDaw');

            for (let a = 0; a < btnVerActualizarDaw.length; a++) {
                btnVerActualizarDaw[a].addEventListener('click', ()=>{
                    let id_alumno = btnVerActualizarDaw[a].getAttribute('item');
                    console.log(id_alumno);
                    modalActualizar.show();
                    notaDawActualizar(id_alumno);
                });
            }

            for (let v = 0; v < btnVerNotasDaw.length; v++) {
                btnVerNotasDaw[v].addEventListener('click', () => {
                    let id_alumno = btnVerNotasDaw[v].getAttribute('item');
                    console.log(id_alumno);
                    modalVerNotasEstDaw.show();
                    MostrarDaw(id_alumno);

                });
            }

            for (let i = 0; i < btnInserDaw.length; i++) {
                btnInserDaw[i].addEventListener('click', () => {
                    let id_alumno = btnInserDaw[i].getAttribute('item');
                    mdalNotasDaw.show();
                    notasDAW(id_alumno);
                    // console.log(notasDAW(id_alumno));
                    
                });
            }

            

        }

    };
    xhr.send();
}

function notasDAW(id_alumno) {

    let ID = id_alumno;
    let Id = document.getElementById('id_alumno').value = ID;

    let asignatura = document.querySelectorAll('#materiadaw');

    let formDaw = document.getElementById('formularioDaw');

    formDaw.addEventListener('submit', (e) => {
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        let datos = new FormData(formDaw);

        xhr.open('POST', './gestion/insertNota.php', true);

        xhr.onreadystatechange = () => {
            if (datos.get(Id) == "") {
                swal.fire(
                    {
                        title: "Se ha producido un Error",
                        icon: "Warning",
                        draggable: true
                    }
                );
            } else if (datos.get('seleccionDaw') == null && datos.get(asignatura) == "") {
                swal.fire(
                    {
                        title: "Tienes Elegir Materia",
                        icon: "Warning",
                        draggable: true
                    }
                );
                formDaw.reset();
                mdalNotasDaw.hide();
            } else if (datos.get('notaDaw') == "") {
                swal.fire(
                    {
                        title: "Tienes que ingresar la nota",
                        text: "Tambien asegurate de leccionar la Materia",
                        icon: "Warning",
                        draggable: true
                    }
                );
                formDaw.reset();
                mdalNotasDaw.hide();
            } else {
                swal.fire(
                    {
                        title: "Se ha registrado la Nota",
                        icon: "success",
                        draggable: true
                    }
                );
                mdalNotasDaw.hide();
                formDaw.reset();
            }
        }
        xhr.send(datos);
    });


}

function MostrarDaw(id_alumno) {

    let ID = id_alumno;

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let json = JSON.parse(xhr.response);
            let modal_body = document.querySelector('#modal-body');
            console.log(json);

            modal_body.innerHTML = "";

            for (let nota of json) {
                modal_body.innerHTML += `
                
                <div class="form-label">
                    <label for="" style="font-size: 12.5px;">${nota.nombre}</label>
                    <div class="form-control nt-2" id="dwes">${nota.nota} <strong>PTS</strong></div>
                </div>

                `
            }
        }
    }
    xhr.open('POST', './gestion/vernotas.php?id_alumno=' + ID, true);
    xhr.send();
}

function notaDawActualizar(id_alumno) {

    let ID = id_alumno;
    let Id = document.getElementById('id_alumno').value = ID;

    let asignatura = document.querySelectorAll('#materiadaw');

    let formDawActualizacion = document.getElementById('formularioDawActualizar');

    formDawActualizacion.addEventListener('submit', (e) => {
        e.preventDefault();

        let xhr = new XMLHttpRequest();
        let datos = new FormData(formDawActualizacion);

        xhr.open('POST', './gestion/ActualizarNotaDAW.php', true);

        xhr.onreadystatechange = () => {
            if (datos.get(Id) == "") {
                swal.fire(
                    {
                        title: "Se ha producido un Error",
                        icon: "Warning",
                        draggable: true
                    }
                );
            } else if (datos.get('seleccionDaw') == null && datos.get(asignatura) == "") {
                swal.fire(
                    {
                        title: "Tienes Elegir Materia",
                        icon: "Warning",
                        draggable: true
                    }
                );
                formDawActualizacion.reset();
                modalActualizar.hide();
            } else if (datos.get('notaDawActualizar') == "") {
                swal.fire(
                    {
                        title: "Tienes que ingresar la nota",
                        text: "Tambien asegurate de leccionar la Materia",
                        icon: "Warning",
                        draggable: true
                    }
                );
                formDawActualizacion.reset();
                modalActualizar.hide();
            } else {
                swal.fire(
                    {
                        title: "Se ha registrado la Nota",
                        icon: "success",
                        draggable: true
                    }
                );
                modalActualizar.hide();
                formDawActualizacion.reset();
                echo ;
            }
        }
        xhr.send(datos);
    });


}




CargarEstudiantes();