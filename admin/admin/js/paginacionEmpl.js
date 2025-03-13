
// TABLA CON LA PAINACION

const tabla = document.querySelector('table');
const filas = Array.from(tabla.querySelectorAll('tbody tr'));
const filasPorPagina = 5; // Número de filas por página
let paginaActual = 1;
let totalPaginas = Math.ceil(filas.length / filasPorPagina);

function mostrarPagina(pagina) {
  tabla.querySelector('tbody').innerHTML = ''; // Limpiar la tabla

  const inicio = (pagina - 1) * filasPorPagina;
  const fin = inicio + filasPorPagina;
  const filasPagina = filas.slice(inicio, fin);

  filasPagina.forEach(fila => {
    tabla.querySelector('tbody').appendChild(fila);
  });

  document.getElementById('pagina-actual').textContent = pagina;
}

function actualizarBotones() {
  document.getElementById('anterior').disabled = paginaActual === 1;
  document.getElementById('siguiente').disabled = paginaActual === totalPaginas;
}

document.getElementById('anterior').addEventListener('click', () => {
  if (paginaActual > 1) {
    paginaActual--;
    mostrarPagina(paginaActual);
    actualizarBotones();
  }
});

document.getElementById('siguiente').addEventListener('click', () => {
  if (paginaActual < totalPaginas) {
    paginaActual++;
    mostrarPagina(paginaActual);
    actualizarBotones();
  }
});

mostrarPagina(paginaActual);
actualizarBotones();