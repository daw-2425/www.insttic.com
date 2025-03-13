function mostrarActas() {
    let actaN = new XMLHttpRequest();

    actaN.open("POST", "../funciones/actasdaws.php");

    actaN.addEventListener("readystatechange", e => {
        if (actaN.status == 200 && actaN.readyState === 4) {
            try {
                // Parsear la respuesta JSON
                let datos = JSON.parse(actaN.responseText);

                let header = document.getElementById("thead_actas");
                let tbody_actas = document.getElementById("tbody_actas");

                let materias = datos.mat; // Materias para el encabezado
                let alumnos = datos.notas; // Alumnos con sus notas

                // Generar el encabezado de la tabla
                let encabezadoHTML = `<tr>
                    <th>Nombre</th>
                    <th>Apellido</th>`;
                materias.forEach((materia) => {
                    encabezadoHTML += `<th>${materia.nombre}</th>`;
                });
                encabezadoHTML += `<th>Nota Media</th>`; // Columna para la nota media
                encabezadoHTML += `</tr>`;
                header.innerHTML = encabezadoHTML;

                // Generar el cuerpo de la tabla
                let cuerpoHTML = "";
                alumnos.forEach((alumno) => {
                    cuerpoHTML += `<tr>
                        <td>${alumno.nombre}</td>
                        <td>${alumno.apellidos}</td>`;
                    materias.forEach((materia) => {
                        // Buscar la nota correspondiente al alumno y materia
                        let notaEncontrada = alumno.notas.find(nota => nota.materia_id === materia.id_materia);
                        cuerpoHTML += `<td>${notaEncontrada ? notaEncontrada.nota : "N/A"}</td>`;
                    });
                    cuerpoHTML += `<td>${alumno.nota_media.toFixed(2)}</td>`; // Mostrar la nota media
                    cuerpoHTML += `</tr>`;
                });

                tbody_actas.innerHTML = cuerpoHTML;

                // Contenedor de tarjetas
                let tarjetasContainer = document.getElementById("tarjetas");
                if (!tarjetasContainer) {
                    console.error("El contenedor de tarjetas no existe en el DOM.");
                    return;
                }

                tarjetasContainer.innerHTML = ""; // Limpiar el contenedor

                // Generar las tarjetas
                alumnos.forEach((alumno) => {
                    let tarjetaHTML = `
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${alumno.nombre} ${alumno.apellidos}</h5>
                                    <p class="card-text"><strong>ID:</strong> ${alumno.id_alumno}</p>
                                    <hr>
                                    <h6 class="card-subtitle mb-2 text-muted">Notas por materia:</h6>
                                    <ul class="list-group list-group-flush">
                                        ${materias.map(materia => {
                                            let notaEncontrada = alumno.notas.find(nota => nota.materia_id === materia.id_materia);
                                            return `
                                                <li class="list-group-item">
                                                    <strong>${materia.nombre}:</strong> ${notaEncontrada ? notaEncontrada.nota : "N/A"}
                                                </li>
                                            `;
                                        }).join("")}
                                    </ul>
                                    <hr>
                                    <p class="card-text"><strong>Nota Media:</strong> ${alumno.nota_media.toFixed(2)}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    tarjetasContainer.innerHTML += tarjetaHTML;
                });
            } catch (error) {
                console.error("Error al procesar los datos:", error);
            }
        }
    });

    actaN.send();
}

mostrarActas();