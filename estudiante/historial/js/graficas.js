// Obtener el contexto del lienzo
const ctx = document.getElementById("myChart").getContext("2d");
const ctx2 = document.getElementById("loadingChart").getContext("2d");
const ctx3 = document.getElementById("barChart").getContext("2d");

// Crear el gráfico de pastel
const myPieChart = new Chart(ctx, {
  type: "pie",
  data: {
    // labels: ['Materias vistas', 'Materias restantes'], // Etiquetas de cada segmento
    datasets: [
      {
        data: [100, 33], // Valores de cada segmento
        backgroundColor: ["#0A2A66", "#0A2A662D"],
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top", // Posición de la leyenda
      },
      datalabels: {
        formatter: (value, ctx) => {
          let total = ctx.chart.data.datasets[0].data.reduce(
            (acc, val) => acc + val,
            0
          );
          let percentage = ((value / total) * 100).toFixed(2) + "%"; // Calcula el porcentaje
          return percentage;
        },
        color: "white", // Color del texto para que contraste con los colores
        font: {
          weight: "bold",
          size: 30, // Tamaño del texto
        },
        anchor: "center", // Ubica el texto en el centro de cada sección
        align: "center", // Asegura que quede bien alineado
      },
    },
  },
  plugins: [ChartDataLabels], // Activar el complemento
});

//Grafica de carga
// Porcentaje de carga
let porcentaje = 75;

// Plugin para mostrar el texto en el centro
const centerText = {
  id: "centerText",
  afterDatasetsDraw(chart) {
    const {
      ctx,
      chartArea: { width, height },
    } = chart;
    ctx.save();
    ctx.font = "bold 30px Arial";
    ctx.fillStyle = "#FFFFFF";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(porcentaje + "%", width / 2, height / 2);
    ctx.restore();
  },
};

// Configuración del gráfico

new Chart(ctx2, {
  type: "doughnut",
  data: {
    datasets: [
      {
        data: [porcentaje, 100 - porcentaje],
        backgroundColor: ["#0A2A66", "#CCCCCC"], // Verde y gris
        hoverBackgroundColor: ["#000000FF", "#FF0000FF"],
        borderWidth: 1,
        borderColor: "#AAA",
      },
    ],
  },
  options: {
    cutout: "75%",
    responsive: true,
    maintainAspectRatio: false,
    animation: {
      animateRotate: true,
      animateScale: true,
    },
    plugins: {
      legend: { display: false }, // Oculta la leyenda
      tooltip: { enabled: false }, // Desactiva tooltip
    },
  },
  plugins: [centerText], // Agregamos el plugin
});

//grafico minimalista

new Chart(ctx3, {
  type: "bar",
  labels: ["Progreso estudiantil"],
  data: {
    labels: [
      "Octubre",
      "Noviembre",
      "Diciembre",
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
    ],
    datasets: [
      {
        data: [15, 20, 25, 30, 35, 40, 45, 50,55], // Datos de las barras
        backgroundColor: ["#0A2A66"],
        borderRadius: 10, // Bordes redondeados en las barras
        barThickness: 30, // Ancho de las barras
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        grid: { display: false }, // Ocultar líneas de la cuadrícula en X
        ticks: { font: { size: 14 }, color: "#333" }, // Fuente y color de etiquetas X
      },
      y: {
        grid: { drawBorder: false, color: "#ddd" }, // Líneas suaves en Y
        ticks: { display: false }, // Ocultar números del eje Y para un diseño más limpio
      },
    },
    plugins: {
      tooltip: { enabled: true, backgroundColor: "#333" }, // Tooltip con fondo oscuro
    },
    animation: {
      duration: 2000,
      easing: "easeOutBounce",
    },
  },
});
