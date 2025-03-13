let formLogin= document.getElementById("loginForm");
formLogin.addEventListener("submit", function(e) {
    e.preventDefault();
    
    let datos = new FormData(formLogin);
    var xhr = new XMLHttpRequest();
    
    xhr.open("POST", "./estudiante/php/iniciarSesion.php", true);
    
    
   xhr.addEventListener('load', ()=>{
    let respuesta = xhr.response;

    console.log(respuesta);
    
    
    if(respuesta == '1'){
        
        window.location.href = './estudiante/index.php';

    }
    
   })
    
    xhr.send(datos);
});