const siderbar = document.querySelector('.aside');
let btnmover = document.querySelector(".btnmover");

btnmover.addEventListener("click",()=>{
    
    siderbar.classList.toggle("cerrar")
})



/*let miModal = new bootstrap.Modal(document.querySelector("#exampleModal"));
let btnactualizar = document.getElementById("botonActualizar");
btnactualizar.addEventListener('click', function () {
    miModal.show();
    console.log("udthcdhc");
});*/



// function mostrarActas(){
//     let actaN = new XMLHttpRequest();

//     actaN.open("POST","../funciones/obtenerActas.php");

// actaN.addEventListener("readystatechange", e =>{
// if (actaN.status == 200 && actaN.readyState === 4) {
//     let json = JSON.parse(actaN.responseText);
//     json.forEach(element => {
        
//     });
// }

// });

//     actaN.send();

// }
// mostrarActas();

