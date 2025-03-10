let currentStatus = 'pendiente';  //Guardar el estado actual de la pestaña activa

function filterTable(status) {
    currentStatus = status;  // Actualizar el estado activo de la pestaña
    const tableBody = document.getElementById('table-body');
    const tableHeader = document.querySelector('thead'); // Cabecera de la tabla
    const actionsColumnHeader = tableHeader.querySelector('th.actions-column'); // Columna de acciones en la cabecera
    tableBody.innerHTML = '';  // Limpiar la tabla antes de llenarla

    // Resaltar la pestaña activa con borde azul
    document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
    document.querySelector(`.tab.${status}`).classList.add('active');

    // Ocultar la columna de acciones en la cabecera y las filas en "todos" y "regresado"
    if (status === 'todos' || status === 'regresado') {
        if (actionsColumnHeader) actionsColumnHeader.style.display = 'none';
        document.querySelectorAll('.btn-container').forEach(col => col.style.display = 'none');
    } else {
        if (actionsColumnHeader) actionsColumnHeader.style.display = 'table-cell';
        document.querySelectorAll('.btn-container').forEach(col => col.style.display = 'table-cell');
    }

    // Realizar la solicitud AJAX para obtener los permisos
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `./php/OptenerPermiso.php?estado=${status}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const permisos = JSON.parse(xhr.responseText);

            permisos.forEach((permiso) => {
                const insigniaClass = getInsigniaClass(permiso.estado);
                let accionesHTML = ''; // Botones de acción
                let actionsColumn = ''; // Columna de acciones

                // Mostrar botones según el estado y la pestaña seleccionada
                if (status !== 'todos' && status !== 'regresado') {
                    if (permiso.estado === 'pendiente') {
                        accionesHTML = `
                            <button class="btn btn-aceptar" onclick="cambiarEstado(${permiso.id_permiso}, 'aceptado', '${permiso.nombre}', '${permiso.apellidos}')">
                                <i class="fa-regular fa-square-check"></i>
                            </button>
                            <button class="btn btn-denegar" onclick="cambiarEstado(${permiso.id_permiso}, 'denegado', '${permiso.nombre}', '${permiso.apellidos}')">
                                <i class="fa-regular fa-rectangle-xmark"></i>
                            </button>
                        `;
                    } else if (permiso.estado === 'aceptado') {
                        accionesHTML = `
                            <button class="btn btn-denegar" onclick="cambiarEstado(${permiso.id_permiso}, 'denegado', '${permiso.nombre}', '${permiso.apellidos}')">
                                <i class="fa-regular fa-rectangle-xmark"></i>
                            </button>
                        `;
                    } else if (permiso.estado === 'denegado') {
                        accionesHTML = `
                            <button class="btn btn-aceptar" onclick="cambiarEstado(${permiso.id_permiso}, 'aceptado', '${permiso.nombre}', '${permiso.apellidos}')">
                                <i class="fa-regular fa-square-check"></i>
                            </button>
                        `;
                    }
                    actionsColumn = `<td class="btn-container">${accionesHTML}</td>`; // Columna con los botones
                }

                // Ahora se agregan las celdas con el atributo `data-label` para dispositivos pequeños
                const row = `<tr>
                <td><img src="${permiso.foto}" width="40" data-label="Foto"></td>
                <td data-label="Nombre">${permiso.nombre}</td>
                <td data-label="Apellidos">${permiso.apellidos}</td>
                <td data-label="Fecha Entrada">${permiso.fecha_entrada}</td>
                <td data-label="Fecha Salida">${permiso.fecha_salida}</td>
                <td data-label="Motivo">${permiso.motivo}</td>
                <td data-label="Estado"><span class="insignia ${insigniaClass}">${permiso.estado}</span></td>
                <td data-label="Documento"><a href="${permiso.archivo_adjuntado}" target="_blank"><i class="fa-regular fa-eye"></i></a></td>
                ${actionsColumn}  
            </tr>`;

                tableBody.innerHTML += row;
            });
        }
    };
    xhr.send();
}

// Función para cambiar el estado de un permiso
function cambiarEstado(id_permiso, nuevoEstado, nombre, apellidos) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `El estado del permiso de ${nombre} ${apellidos} será actualizado a ${nuevoEstado}`,
        icon: 'warning',
        background: '#0A2A66',  // Establece el fondo a #0A2A66
        color: 'white',  // Cambia el color del texto a blanco
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', './php/OptenerPermiso.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    Swal.fire({
                        title: '¡Hecho!',
                        text: `El permiso de ${nombre} ${apellidos} ha sido actualizado a ${nuevoEstado}`,
                        icon: 'success',
                        background: '#0A2A66',  // Fondo en la ventana de éxito
                        color: 'white',  // Cambia el color del texto a blanco
                    });
                    filterTable(currentStatus);
                }
            };
            xhr.send(`id_permiso=${id_permiso}&nuevo_estado=${nuevoEstado}`);
        } else {
            Swal.fire({
                title: 'Cancelado',
                text: 'La acción ha sido cancelada',
                icon: 'info',
                background: '#0A2A66',  // Fondo en la ventana de cancelación
                color: 'white',  // Cambia el color del texto a blanco
            });
        }
    });
}

// Función para obtener la clase de la insignia según el estado
function getInsigniaClass(estado) {
    switch (estado) {
        case 'pendiente': return 'yellow-text blink'; // Añadir la clase "blink" para el efecto de parpadeo
        case 'aceptado': return 'green-text';
        case 'denegado': return 'red-text';
        case 'regresado': return 'blue-text';
        default: return '';
    }
}

// Cargar la pestaña "Pendientes" al inicio
window.onload = function() {
    filterTable('pendiente');
};
