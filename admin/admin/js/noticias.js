let ModalInsertar= new bootstrap.Modal(document.getElementById("modalinsert"));

let formulario= document.getElementById("formulario");

// REGISTRAR NOTICIAS
formulario.addEventListener("submit",function (e) {
    e.preventDefault();

    let objFormData = new FormData(formulario);
    let objRequest= new XMLHttpRequest();

    objRequest.open("POST", "../php/registrar/regisNoticia.php");
    objRequest.onreadystatechange = function () {
        if(objRequest.readyState === 4 && objRequest.status === 200){
            const foto = document.getElementById("foto");
            
            // FOTO
            if(foto.files.length === 0){
                const errorFoto = document.getElementById("errorFoto");
                errorFoto.style.display= "block";
                errorFoto.innerHTML = "Ingrese la foto de la noticia";
                document.getElementById("foto").focus();
                setInterval (function(){
                    errorFoto.style.display="none";
                }, 5000);
            }
            // TITULO
            else if(objFormData.get('tit') == ""){
                let errorTitulo = document.getElementById("errorTitulo");
                errorTitulo.style.display= "block";
                errorTitulo.innerHTML="Ingrese el titulo de la noticia";
                document.getElementById("tit").focus();
                setInterval (function(){
                    errorTitulo.style.display="none";
                }, 5000);
            }
            // DESCRIPCION
            else if(objFormData.get('des') == ""){
                let errorDescripcion = document.getElementById("errorDescripcion");
                errorDescripcion.style.display= "block";
                errorDescripcion.innerHTML="Ingrese la descripcion de la noticia";
                document.getElementById("des").focus();
                setInterval (function(){
                    errorDescripcion.style.display="none";
                }, 5000);
            }
            // FECHA DEL EVENTO
            else if(objFormData.get('fecha') == ""){
                let errorFecha = document.getElementById("errorFecha");
                errorFecha.style.display= "block";
                errorFecha.innerHTML="Ingrese la fecha del evento";
                document.getElementById("fecha").focus();
                setInterval (function(){
                    errorFecha.style.display="none";
                }, 5000);
            }
            // CATEGORIA DE LA NOTICIA
            else if(objFormData.get('cat') == ""){
                let errorCat = document.getElementById("errorCat");
                errorCat.style.display= "block";
                errorCat.innerHTML="Ingrese la categoria de la noticia";
                document.getElementById("cat").focus();
                setInterval (function(){
                    errorCat.style.display="none";
                }, 5000);
            }
          
           
            else{
                Swal.fire({
                    title:"Se ha registrado la noticia con el codigo " +objFormData.get('id_noticia'),
                    icon:"success",
                    draggable: true
                });
                formulario.reset();
                ModalInsertar.hide();
                setInterval(function () {
                    location.reload();
                }, 3000);
                // 
                }
            }  
        }
    
    objRequest.send(objFormData);
    
});


// MOSTRAR LOS DATOS EN LA TABLA DE NOTICIAS

function mostrarNoticia(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarNoticia.php", true);
    objRequest.addEventListener("load", ()=> {
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablaNoticia = document.getElementById("tablaNoticia");
        tablaNoticia.innerHTML='';

        respuesta.forEach(noticia => {
            tablaNoticia.innerHTML +=`

            <tr>
                <td> ${noticia.titulo}</td>
                <td>
                    <img class="rounded-pill" style="width:50px; height:50px" src="../img/noticias/${noticia.imagen}" alt="">
                </td>
                <td> ${noticia.titulo}</td>
                <td> ${noticia.descripcion}  </td>
                <td> ${noticia.fecha_suceso} </td>
                <td> ${noticia.nomCat}</td>
                <td>
                    <button class="btn btn-primary" id="btnActualizar" item=${noticia.id_noticia}  >
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
mostrarNoticia();