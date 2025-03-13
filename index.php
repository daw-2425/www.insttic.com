<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./css/enlaces.css">
    <link rel="stylesheet" href="./css/inicio.css">
</head>
<body>
  <div>
  <?php
        require("./componentes/header.php");
      ?>
  </div>
  </div>
<div class="moro mt-1">
        <div id="slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner text-center" id="slider-inner">
                <!-- Las imágenes, títulos y descripciones se cargarán aquí dinámicamente -->
            </div>
            <button class="carousel-control-prev btn btn-warning" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next"> 
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>
  </div>
<style>
  #slider .carousel-inner .carousel-item img {
  width: 100%;            /* Asegura que la imagen ocupe todo el ancho del contenedor */
  height: 100%;           /* Asegura que la imagen cubra el alto completo del contenedor */
  object-fit: cover;      /* Hace que la imagen cubra el área sin distorsionarse */
  object-position: center; /* Centra la imagen dentro del contenedor */
}

</style>

<div class="container d-flex align-items-center justify-content-center "><h3 class="especialidades">ESPECIALIDADES</h3></div>
<br>
<div class="container d-flex flex-wrap" id="contenedor">

    <div class="unom">
        <div class="primero">
            <i class="fa-solid fa-code cod"></i>
            <a href="">DAW</a>
            <p class="text-center pp">DESARROLLO DE APLICACIONES WEB</p>
            <div class="container-fluid d-flex justify-content-end" style="margin-top: 20px;"><a href="./daw.php" class="enlace"><i class="fa-solid fa-chevron-right"></i></a></div>
        </div>
        <div class="primero" id="admin">
            <i class="fa-solid fa-swatchbook cod"></i>
            <a href="">ADMIN</a>
            <p class="text-center pp">ADMINISTRACION DE SISTEMAS INFORMATICOS EN RED</p>
            <div class="container-fluid d-flex justify-content-end" style="margin-top: 20px;"><a href="./asir.php" class="enlace"><i class="fa-solid fa-chevron-right"></i></a></div>
        </div>
        <div class="primero" id="teleco">
            <i class="fa-solid fa-satellite-dish cod"></i>
            <a href="">STI</a>
            <p class="text-center pp">SISTEMAS DE TELECOMUNICACIONES E INFORMATICOS</p>
            <div class="container-fluid d-flex justify-content-end" style="margin-top: 20px;"><a href="./teleco.php" class="enlace"><i class="fa-solid fa-chevron-right"></i></a></div>
        </div>
        <div class="primero" id="micro">
            <i class="fa-solid fa-microchip cod"></i>
            <a href="">SMIR</a>
            <p class="text-center">SISTEMAS MICROINFORMATICOS EN RED</p>
            <div class="container-fluid d-flex justify-content-end" style="margin-top: 20px;"><a href="./micro.php" class="enlace"><i class="fa-solid fa-chevron-right"></i></a></div>
        </div>
    </div>
    <div class="dos">
        <div class="imagen">
            <img src="./img/ana.png" class="img-fluid" alt="Imagen de ejemplo" />
        </div>
        <div class="texto">
            <h4 class="text-center">ESPECIALIDADES DEL INSTTIC</h4>
            <p>
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur vitae eum molestias dolorum voluptatum delectus reprehenderit sed, ad quas atque dolore nemo omnis beatae voluptate, tenetur vero facere est quia? 
            </p>
        </div>
    </div>
</div>
<br>

<div class="container mt-5 mb-3">
    <h3 class="text-center py-4">DATOS DE LA INSTITUCIÓN</h3>
    <!-- Botones para seleccionar la generación -->
    <div class="text-center mb-4">
    <div class="row">
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <button class="btn btn-primary btn-generacion w-90" data-generacion="actual">Generación Actual</button>
        </div>
        <div class="col-12 col-md-4 mb-2 mb-md-0">
            <button class="btn btn-secondary btn-generacion w-80" data-generacion="anterior">Segunda Generacion</button>
        </div>
        <div class="col-12 col-md-4">
            <button class="btn btn-secondary btn-generacion w-90" data-generacion="primera">Primera Generación</button>
        </div>
    </div>
</div>
    <!-- Contadores -->
    <div class="row text-center mt-4">
        <div class="col-md-3">
            <p class="fs-4" id="estudiantes">0</p>
            <p class="h5">Estudiantes</p>
        </div>
        <div class="col-md-3">
            <p class="fs-4" id="especialidades">0</p>
            <p class="h5">Especialidades</p>
        </div>
        <div class="col-md-3">
            <p class="fs-4" id="fundacion">0</p>
            <p class="h5">Año de Fundación</p>
        </div>
        <div class="col-md-3">
            <p class="fs-4" id="profesores">0</p>
            <p class="h5">Profesores</p>
        </div>
    </div>
</div>

<!-- Slider de noticias -->
<div class="container" style="max-width: 96%;">
  <div class="container-fluid p-0">
    <div id="newsSlider" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicadores -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#newsSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#newsSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#newsSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#newsSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <style>
  .carousel-inner .carousel-item img {
  width: 100%;            /* Asegura que la imagen ocupe todo el ancho del contenedor */
  height: 100%;           /* Asegura que la imagen cubra el alto completo del contenedor */
  object-fit: cover;      /*Hace que la imagen cubra el área sin distorsionarse*/
  object-position: center; /* Centra la imagen dentro del contenedor *//* Centra la imagen dentro del contenedor */
}
</style>
      <!-- Contenido del Slider -->
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <img src="./img/daw111.jpg" class="d-block w-100" alt="Noticia 1">
          <div class="carousel-caption d-none d-md-block">
            <h5>DAW</h5>
            <p>Desarrollo de Aplicaciones Web.</p>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
          <img src="./img/admin.jpg" class="d-block w-100" alt="Noticia 2">
          <div class="carousel-caption d-none d-md-block">
            <h5>ADMIN</h5>
            <p>Administracion de Sistemas Informaticos en Red</p>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
          <img src="./img/micro1.jpg" class="d-block w-100" alt="Noticia 3">
          <div class="carousel-caption d-none d-md-block">
            <h5>MICRO</h5>
            <p>Sistemas MicroInformaticos</p>
          </div>
        </div>
        <!-- Slide 4 -->
        <div class="carousel-item">
          <img src="./img/telec.png" class="d-block w-100" alt="Noticia 4">
          <div class="carousel-caption d-none d-md-block">
            <h5>STI</h5>
            <p>Sistemas de Telecomunicaciones E Informatico </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<!-- Patrocinadores -->
<div class="container mt-5">
    <h3 class="text-center mb-4">PATROCINADORES</h3>
    <div class="row text-center">
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="sponsor-box">
                <img src="./img/ft/getes.png" class="img-fluid" alt="Patrocinador 1">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="sponsor-box">
                <img src="./img/ft/conex.png" class="img-fluid" alt="Patrocinador 2">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="sponsor-box">
                <img src="./img/ft/ofitech-r.png" class="img-fluid" alt="Patrocinador 3">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="sponsor-box">
                <img src="./img/ft/mart.png" class="img-fluid" alt="Patrocinador 4">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="sponsor-box">
                <img src="./img/ft/huawe.png" class="img-fluid" alt="Patrocinador 5">
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="sponsor-box">
                <img src="./img/ft/gepe.png" class="img-fluid" alt="Patrocinador 6">
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div>
  <?php
    require("./componentes/footer.php");
  ?>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./js/main.js"></script>
</body>
</html>




