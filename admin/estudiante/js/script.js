


function tablaMaterias() {

let xhr = new XMLHttpRequest();
let especialidad = document.getElementById('especialidad');
let dato = new FormData();

dato.append('especialidad', especialidad.value);

xhr.open('POST', './php/obtenerMterias.php', true);
xhr.addEventListener('load', ()=>{
    let materias = JSON.parse(xhr.response);
    let tabla = document.getElementById('materias');
    tabla.innerHTML = '';
    

    for(let materia of materias){
        tabla.innerHTML += `
        <tr class='text-center'>
            <td>Foto</td>
            <td>${materia.materia}</td>
            <td>${materia.nombre}</td>
            <td>${materia.apellido}</td>
        </tr>
        `;
    }
    


})

xhr.send(dato);
    
}

tablaMaterias();