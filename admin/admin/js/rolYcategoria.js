

// CATEGORIA
let ModalCategoria= new bootstrap.Modal(document.getElementById("categoria"));
let formulCategoria= document.getElementById("formulCategoria");


// REGISTRAR CATEGORIA
formulCategoria.addEventListener("submit",function (e) {
    e.preventDefault();

    let objFormData = new FormData(formulCategoria);
    let objRequest= new XMLHttpRequest();

    objRequest.open("POST", "../php/registrar/regisCategoria.php");
    objRequest.onreadystatechange = function () {
        if(objRequest.readyState === 4 && objRequest.status === 200){
            
            
            // CODIGO DE LA CATEGORIA
            if(objFormData.get('codigoCat') == ""){
                let errorCodCat = document.getElementById("errorCodCat");
                errorCodCat.style.display= "block";
                errorCodCat.innerHTML="Ingrese el codigo de la Categoria";
                document.getElementById("codigoCat").focus();
                setInterval (function(){
                    errorCodCat.style.display="none";
                }, 5000);
            }
            // TIPO CATEGORIA
            else if(objFormData.get('cat') == ""){
                let errorCat = document.getElementById("errorCat");
                errorCat.style.display= "block";
                errorCat.innerHTML="Ingrese el nombre del empleado";
                errorCat.getElementById("cat").focus();
                setInterval (function(){
                    errorCat.style.display="none";
                }, 5000);
            }
            
            else{
                Swal.fire({
                    title:"Se ha registrado la categoria " +objFormData.get('cat'),
                    icon:"success",
                    draggable: true
                });
                ModalCategoria.reset();
                ModalCategoria.hide();
                setInterval(function () {
                    location.reload();
                }, 3000);
                // 
                }
            }  
        }
    
    objRequest.send(objFormData);
    
});


// MOSTRAR LOS DATOS EN LA TABLA DE LAS CATEGORIAS DE LAS NOTICIAS

function mostrarCategorias(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarCategoria.php", true);
    objRequest.addEventListener("load", ()=> {
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablaCategoria = document.getElementById("tablaCategoria");
        tablaCategoria.innerHTML='';

        respuesta.forEach(cat => {
            tablaCategoria.innerHTML +=`

           <tr>
                <td> <p>${cat.id_categoria}</p> </td>
                <td> <p>${cat.tipo_categoria}</p> </td>
                <td>
                    <button type="button" class="btn btn-primary"> <i class="fa-regular fa-pen-to-square"></i></button>
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
mostrarCategorias();




// ROL
let ModalRol= new bootstrap.Modal(document.getElementById("modalRol"));
let formulRol= document.getElementById("formulRol");


// REGISTRAR ROL
formulRol.addEventListener("submit",function (e) {
    e.preventDefault();

    let objFormData = new FormData(formulRol);
    let objRequest= new XMLHttpRequest();

    objRequest.open("POST", "../php/registrar/regisRol.php");
    objRequest.onreadystatechange = function () {
        if(objRequest.readyState === 4 && objRequest.status === 200){
            
            
            // CODIGO DEL ROL
            if(objFormData.get('codigoRol') == ""){
                let errorCodRol = document.getElementById("errorCodRol");
                errorCodRol.style.display= "block";
                errorCodRol.innerHTML="Ingrese el codigo del Rol";
                document.getElementById("codigoRol").focus();
                setInterval (function(){
                    errorCodRol.style.display="none";
                }, 4000);
            }
            // TIPO ROL
            else if(objFormData.get('rol') == ""){
                let errorRol = document.getElementById("errorRol");
                errorRol.style.display= "block";
                errorRol.innerHTML="Ingrese el nombre del rol";
                errorRol.getElementById("rol").focus();
                setInterval (function(){
                    errorRol.style.display="none";
                }, 4000);
            }else{
                formulRol.reset();
                ModalRol.hide();
                mostrarRol();
                
                Swal.fire({
                    title:"Se ha registrado el rol de " +objFormData.get('rol'),
                    icon:"success",
                    draggable: true
                });
                
              
                // 
                }
            }  
        }
    
    objRequest.send(objFormData);
    
});


// MOSTRAR LOS DATOS EN LA TABLA ROLES

function mostrarRol(){
    let objRequest = new XMLHttpRequest();

    objRequest.open("GET","../php/mostrar/mostrarRol.php", true);
    objRequest.addEventListener("load", ()=> {
        let respuesta = JSON.parse(objRequest.responseText);
        console.log(respuesta);
        

        let tablaRol = document.getElementById("tablaRol");
        tablaRol.innerHTML='';

        respuesta.forEach(rol => {
            tablaRol.innerHTML +=`

           <tr>
                <td> <p>${rol.id_rol}</p> </td>
                <td> <p>${rol.rol}</p> </td>
                <td>
                    <button type="button" class="btn btn-primary"> <i class="fa-regular fa-pen-to-square"></i></button>
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
mostrarRol();