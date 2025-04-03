let modal = new bootstrap.Modal(document.getElementById('exampleModal'));
let formulario = document.getElementById('formAmonestacion');


formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = new FormData(formulario);
    let xml = new XMLHttpRequest();

    xml.onload = function () {

        formulario.reset();
        modal.hide();
        MostrarDatos();

        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: 'Amonestación registrada correctamente',
            timer: 1500
        });


    }
    let url = "./php/NuevaAmones.php";
    xml.open("POST", url, true);
    xml.send(data);


});

function MostrarDatos() {
    let xml = new XMLHttpRequest();

    xml.onload = function () {
        try {
            let amonestaciones = JSON.parse(this.responseText);

            // Verificar que tenemos datos válidos
            if (amonestaciones.status === 'success' && Array.isArray(amonestaciones.data)) {
                const tabla = document.getElementById('table-body');
                tabla.innerHTML = ''; // Limpiar tabla existente

                // Iterar sobre el array de datos
                amonestaciones.data.forEach(amonestacion => {
                    tabla.innerHTML += `
                        <tr>
                            <td>
                                <img src="../../estudiante/img/${amonestacion.foto || 'default.jpg'}" 
                                     alt="Foto ${amonestacion.nombre}"
                                     style="width: 50px; height: 50px; border-radius: 50%;">
                            </td>
                            <td>${amonestacion.nombre} ${amonestacion.apellidos}</td>
                            <td>${amonestacion.motivo}</td>
                            <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                ${amonestacion.descripcion}
                            </td>
                            <td>${amonestacion.fecha}</td>
                           <td>
                                <a href="./reportes/amonestacion_pdf.php?id=${amonestacion.id_amonestacion}" 
                                 class="btn btn-warning btn-sm" 
                                target="_blank">
                                <i class="fas fa-file-pdf"></i>
                              </a>
                            </td>
                        </tr>
                    `;
                });
            } else {
                throw new Error('Formato de datos inválido');
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error al cargar las amonestaciones'
            });
        }
    };



    let url = "./php/MostrarAmonestaciones.php";
    xml.open("GET", url, true);
    xml.send();
}






// Llamar a la función cuando se carga la página
document.addEventListener('DOMContentLoaded', MostrarDatos);