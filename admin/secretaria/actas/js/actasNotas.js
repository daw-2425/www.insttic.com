
function cargarActas() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./funciones/todaActas.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                let json = JSON.parse(xhr.responseText);

                let isMobile = window.innerWidth < 768; // Detecta si el tamaño es de móvil
                
                if (!isMobile) {
                    // Modo tabla
                    let tbody = document.getElementById("tbody_actas");
                    if (!tbody) {
                        console.error("El tbody_actas no existe en el DOM.");
                        return;
                    }
                    tbody.innerHTML = ""; // Limpiar contenido anterior

                    json.forEach(element => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${element.año_inicio} ${element.año_fin}</td>
                                <td>${element.denominacion}</td>
                                <td>${element.nombre}</td>
                            </tr>
                        `;
                    });

                } else {
                    // Modo tarjetas
                    let tarjetasContainer = document.getElementById("tarjetas");
                    if (!tarjetasContainer) {
                        console.error("El contenedor de tarjetas no existe en el DOM.");
                        return;
                    }
                    tarjetasContainer.innerHTML = ""; // Limpiar contenido anterior

                    json.forEach(element => {
                        let tarjetaHTML = `
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">${element.denominacion}</h5>
                                        <p class="card-text">
                                            <strong>Años:</strong> ${element.año_inicio} - ${element.año_fin} <br>
                                            <strong>Nombre:</strong> ${element.nombre}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;
                        tarjetasContainer.innerHTML += tarjetaHTML;
                    });
                }

            } catch (error) {
                console.error("Error al procesar los datos:", error);
            }
        }
    };

    xhr.send();
}

cargarActas();
// document.addEventListener("DOMContentLoaded", function () {
//     cargarActas();
// });

// function cargarActas() {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "../funciones/todasActas.php", true);
    
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             try {
//                 let datos = JSON.parse(xhr.responseText);
//                 let tbody = document.getElementById("tbody_actas");
//                 tbody.innerHTML = ""; 
//                 console.log(datos);
//                 datos.forEach(acta => {
//                     tbody.innerHTML += fila;
//                     let fila = `<tr>
//                         <td>${acta.nombre}</td>
//                         <td>${acta.especialidad}</td>
//                         <td>${acta.generacion}</td>
//                         <td><button class="btn btn-primary">Ver</button></td>
//                     </tr>`;
                  
//                 });

//             } catch (error) {
                
//             }
//         }
//     };

//     //xhr.send();
// }
// cargarActas();

// function cargar() {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "../funciones/todasActas.php", true);
//     xhr.responseType = 'json'; // Establecer el tipo de respuesta JSON

//     xhr.onload = function () {
//         if (xhr.status == 200 && xhr.readyState == 4) {
//             let datos = xhr.response; // Obtener la respuesta JSON
//             if (!Array.isArray(datos)) {
//                 console.error("Error: La respuesta no es un array válido.", datos);
//                 return;
//             }

//             let tabla = document.getElementById('tbody_actas');
//             tabla.innerHTML = ''; // Limpiar la tabla antes de agregar los nuevos datos
            
//             datos.forEach(acta => {
//                 tabla.innerHTML += `
//                 <tr>
//                   <td>${acta.año_inicio} - ${acta.año_fin}</td>
//                   <td>${acta.denominacion}</td>
//                   <td>${acta.nombre}</td>
//                 </tr>`;
//             });
//         }
//     };

//     xhr.onerror = function () {
//         console.error("Error en la petición AJAX");
//     };

//     xhr.send(); // Enviar la petición sin FormData, ya que no se está enviando ningún dato
// }
