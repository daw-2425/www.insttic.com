






let Formulario_permiso = document.querySelector("#formulario");
// const nombre = document.getElementById('nombre');
// const coreo = document.getElementById('coreo');

Formulario_permiso.addEventListener("submit", (e) => {

    // let errores = false;

    // if(nombre.value === ''){
    //     errorNombre.textContent = 'El nombre es obligatorio.';
    //     errores = true;
    // }else{
    //     errorNombre.textContent = '';
    // }

    // if(coreo.value === ''){
    //     errorCorreo.textContent = 'El email es obligatorio.';
    //     errores = true;
    // }else if(!/^[a-Az-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(coreo.value)){
    //     errorCorreo.textContent = 'El correo no es valido.';
    //     errores = true;
    // }else{
    //     errorCorreo.textContent = '';
    // }

    // if(errores){
    //     e.preventDefault();
    // }



    e.preventDefault();

    let xhr = new XMLHttpRequest();
    let datosform = new FormData(Formulario_permiso);
    xhr.open("POST", "./php/insertar.php", true);
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {

            console.log(xhr.response);
            Cargar();
            Formulario_permiso.reset();

        }
    }
    xhr.send(datosform);
    console.log(Formulario_permiso);
});


function Cargar() {
    let xhr = new XMLHttpRequest();

    xhr.open('GET', './php/mostrar.php', true, xhr.responseType = 'json');


    xhr.onreadystatechange = function () {
        let datosUsuario = xhr.response;
        let mitab = document.getElementById("tabla");
        console.log(datosUsuario);
        mitab.innerHTML = '';
    //    console.log(dato);
        for (let dato of datosUsuario) {
            mitab.innerHTML += `
                <tr>
                    <td>${dato.motivo}</td>
                    <td>${dato.salida}</td>
                    <td>${dato.entrada}</td>
                    <td>${dato.arch_adjuntado}</td>
                    <td>${dato.estado}</td>
                </tr>
            `
        }
        let Usuario = xhr.response;
        let tab = document.getElementById("caja");
        console.log(Usuario);
        tab.innerHTML = '';
        for (let datos of Usuario) {
            tab.innerHTML += `
             <div class="cuerpo">
                <div class="img">
                <img src="../img/perfil/perfil.jpg" id="avatar" alt="Foto">
                <input type="file" name="" id="changeAvatar">
                </div>
                <hr>
                <div class="cuer"><label for="">Nombre: </label>${datos.nombre}</div>
                <!-- <div class="cuer"><label for="">Apellido: </label> Perez Yhoni</div> -->
                <div class="cuer"><label for="">Motivo: </label>${datos.motivo}</div>
                <div class="cuer"><label for="">Fecha Salida: </label>${datos.salida}</div>
                <div class="cuer"><label for="">Fecha Entrada: </label>${datos.entrada}</div>
                <div class="cuer"><label for="">Arch. Adjunt.: </label>${datos.arch_adjuntado}</div>
                <div class="cuer boton"><label for="">Estado: </label>${datos.estado}</div>
            </div>
            `
        }

    }
    xhr.send();
}
Cargar();
let avatar = document.getElementById('avatar');
let changeAvatar = document.getElementById('changeAvatar');
/**Cargar avatar desde localstorage */



avatar.addEventListener('click', () => changeAvatar.click());

changeAvatar.addEventListener('change', (files) => {
    console.log(files)
    const fileUpload = files.target.files[0]
    if (fileUpload) {
        const reader = new FileReader();
        reader.onload = (e) => avatar.src = e.target.result;
        reader.readAsDataURL(fileUpload);
    }
});