

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


// GRAFICO



const datos = {
  labels: ['APROBADOS', 'SUSPENDIDOS'],
  datasets: [{
    data: [75, 23],
    backgroundColor: [
      '#0A2A66',
      'rgb(70, 73, 70)'
      
    ],
    borderWidth: 2
  }],
};

const ctx = document.getElementById('miGrafico').getContext('2d');
const miGrafico = new Chart(ctx, {
  type: 'pie',
  data: datos,
  options: {
    plugins: {
      datalabels: {
        formatter: (value, ctx) => {
          let sum = 0;
          let dataArr = ctx.chart.data.datasets[0].data.reduce(
            (var1, var2)=> var1 + var2, 0 
          );
          let porcentaje = ((value / dataArr) * 100).toFixed(2) + "%";
          return porcentaje;
      },
      color:"#ffffff",
      font:{
        weight: "bold",
        size: 18
      },
      anchor: "center",
      align: "center"
    },
  },
},
plugins:[ChartDataLabels ],

});