let formulario = document.getElementById('form');
let error = document.getElementById('error');
error.style.display = 'none';

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    let formData = new FormData(formulario);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', './php/login.php', true);
    xhr.onload = function(){
        if(xhr.status === 200){
            let respuesta = xhr.response;

            console.log(respuesta);
            
            if(respuesta== '1'){

                window.location='./secretaria';
            }else if(respuesta=== '2'){
                window.location='./estudiante';
            }else if(respuesta=== '3'){
                
            }else if(respuesta=== '4'){
                
            }else if(respuesta=== '5'){
                
            }else if(respuesta=== '6'){
                error.style.display = 'block';
                error.classList.add('alert-danger');
                error.innerHTML = 'Datos incorrectos';
            }
        }
    }
    xhr.send(formData);
});

