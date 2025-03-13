// document.addEventListener("DOMContentLoaded", function() {
//     const datos = {
//         estudiantes: 100, // 
//         especialidades: 4,
//         fundacion: 2017,
//         profesores: 20
//     };

//     const duracion = 2000; // Duración de la animación en milisegundos
//     const intervalo = 50; // Intervalo de actualización en milisegundos

//     function animarContador(elemento, valorFinal) {
//         let valorInicial = 0;
//         const incremento = Math.ceil(valorFinal / (duracion / intervalo));

//         const contador = setInterval(() => {
//             valorInicial += incremento;
//             if (valorInicial >= valorFinal) {
//                 clearInterval(contador);
//                 valorInicial = valorFinal;
//             }
//             elemento.textContent = valorInicial;
//         }, intervalo);
//     }

//     animarContador(document.getElementById("estudiantes"), datos.estudiantes);
//     animarContador(document.getElementById("especialidades"), datos.especialidades);
//     animarContador(document.getElementById("fundacion"), datos.fundacion);
//     animarContador(document.getElementById("profesores"), datos.profesores);
// });
// 
document.addEventListener("DOMContentLoaded", function () {
    // Datos de cada generación
    const generaciones = {
        actual: {
            estudiantes: 100,
            especialidades: 4,
            fundacion: 2017,
            profesores: 20
        },
        anterior: {
            estudiantes: 80,
            especialidades: 3,
            fundacion: 2017,
            profesores: 15
        },
        primera: {
            estudiantes: 50,
            especialidades: 2,
            fundacion: 2017,
            profesores: 10
        }
    };

    const duracion = 2000; // Duración de la animación en milisegundos
    const intervalo = 50; // Intervalo de actualización en milisegundos

    // Función para animar los contadores
    function animarContador(elemento, valorFinal) {
        let valorInicial = 0;
        const incremento = Math.ceil(valorFinal / (duracion / intervalo));

        const contador = setInterval(() => {
            valorInicial += incremento;
            if (valorInicial >= valorFinal) {
                clearInterval(contador);
                valorInicial = valorFinal;
            }
            elemento.textContent = valorInicial;
        }, intervalo);
    }

    // Función para actualizar los datos según la generación seleccionada
    function actualizarDatos(generacion) {
        const datos = generaciones[generacion];
        animarContador(document.getElementById("estudiantes"), datos.estudiantes);
        animarContador(document.getElementById("especialidades"), datos.especialidades);
        animarContador(document.getElementById("fundacion"), datos.fundacion);
        animarContador(document.getElementById("profesores"), datos.profesores);
    }

    // Establecer la generación actual por defecto
    actualizarDatos("actual");

    // Eventos para los botones de generación
    document.querySelectorAll(".btn-generacion").forEach((boton) => {
        boton.addEventListener("click", function () {
            // Remover la clase "active" de todos los botones
            document.querySelectorAll(".btn-generacion").forEach((btn) => {
                btn.classList.remove("btn-primary");
                btn.classList.add("btn-secondary");
            });

            // Añadir la clase "active" al botón seleccionado
            this.classList.remove("btn-secondary");
            this.classList.add("btn-primary");

            // Obtener la generación seleccionada
            const generacion = this.getAttribute("data-generacion");
            actualizarDatos(generacion);
        });
    });
});
// 
document.addEventListener("DOMContentLoaded", function() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "./json/datos.json", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            const sliderInner = document.getElementById("slider-inner");

            data.slides.forEach((slide, index) => {
                const carouselItem = document.createElement("div");
                carouselItem.classList.add("carousel-item");
                if (index === 0) {
                    carouselItem.classList.add("active");
                }

                const img = document.createElement("img");
                img.src = slide.image;
                img.alt = slide.alt;
                img.classList.add("d-block", "w-100", "animate__animated", "animate__fadeIn");

                const caption = document.createElement("div");
                caption.classList.add("carousel-caption", "d-none", "d-md-block", "animate__animated", "animate__fadeInUp");

                const title = document.createElement("h3");
                title.textContent = slide.titulo;
                caption.appendChild(title);

                const description = document.createElement("p");
                description.textContent = slide.descripcion;
                caption.appendChild(description);

                carouselItem.appendChild(img);
                carouselItem.appendChild(caption);
                sliderInner.appendChild(carouselItem);
            });
        } else {
            console.error("Error al cargar el archivo JSON");
        }
    };
    xhr.onerror = function() {
        console.error("Error de red al intentar cargar el archivo JSON");
    };
    xhr.send();
});

// segundo slider
// document.addEventListener("DOMContentLoaded", function () {
//     const xhr = new XMLHttpRequest();
//     xhr.open("GET", "./php/especialidades.php", true);
//     xhr.onload = function () {
//         if (xhr.status === 200) {
//             const especialidades = JSON.parse(xhr.responseText);
//             const sliderContent = document.getElementById("slider-content");

//             console.log(xhr); 
//             especialidades.forEach((item, index) => {
//                 const activeClass = index === 0 ? "active" : "";
//                 const slide = `
//                     <div class="carousel-item ${activeClass}">
//                         <img src="images/${item.imagen}" class="d-block w-100" alt="${item.denominacion}">
//                         <div class="carousel-caption d-none d-md-block">
//                             <h5>${item.denominacion}</h5>
//                             <p>${item.descripcion}</p>
//                         </div>
//                     </div>
//                 `;
//                 sliderContent.innerHTML += slide;
//             });
//         }
//     };
//     xhr.send();
// });
// segundo slider
// Opcional: Agregar animaciones adicionales con JavaScript
// document.addEventListener('DOMContentLoaded', function () {
//     const carousel = document.querySelector('#newsSlider');
//     carousel.addEventListener('slide.bs.carousel', function (event) {
//       console.log('Cambiando a la slide:', event.to);
//     });
//   });
//   document.addEventListener('DOMContentLoaded', function () {
//     const carousel = document.querySelector('#newsSlider');
  
//     carousel.addEventListener('slide.bs.carousel', function (event) {
//       const captions = document.querySelectorAll('.carousel-caption');
//       captions.forEach(caption => {
//         caption.style.opacity = 0;
//         caption.style.transform = 'translateY(50px)';
//       });
  
//       setTimeout(() => {
//         const activeCaption = document.querySelector('.carousel-item.active .carousel-caption');
//         if (activeCaption) {
//           activeCaption.style.opacity = 1;
//           activeCaption.style.transform = 'translateY(0)';
//         }
//       }, 300); // Retraso para la animación
//     });
//   });