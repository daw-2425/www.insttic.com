<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/enlaces.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/teleco.css">
    <link rel="stylesheet" href="./css/profesoresDaw.css">
</head>
<body>

    <?php 
        require("../componentes/header.php");
      ?>
    </div>

    <div class="container-fluid d-flex justify-content-end mt-1">
        <i class="fa-solid fa-satellite-dish text-ico m-1"></i>
        <h5 class="text m-1">Telecomunicaciones</h5>
    </div>

    <div class="banner d-flex justify-content-start mt-1">
      <div class="text-bannerteleco">
        <div class="container-fluid">
          <h1 class="texto mt-3 mx-5">TS-STI</h1>
        </div>
        <div class="container-fluid">
          <h2 class="mx-5 text-ciclot">Técnico superior en</h2>
        </div>
        <div class="container-fluid">
          <h4 class="mx-5 text-ciclot">Sistemas de Telecomunicaciones e informatica.</h4>
        </div>
        <div class="container info d-flex justify-content-end">
          <p class="horas m-2">Duracion : 20000 horas</p>
        </div>
      </div>
    </div>

    <div class="container d-none d-lg-block">
      <div class="container d-flex justify-content-evenly nav_interteleco">
        <button type="button" onclick="moduloteleco()">MODULO</button>
        <button type="button" onclick="profesoresteleco()">PROFESORES</button>
        <button type="button" onclick="salidasteleco()">SALIDAS PROFESIONALES</button>
        <button type="button" onclick="objetivosteleco()">OBJETIVOS</button>
      </div>
    </div>

    <ul class="list-group d-lg-none mt-3 nav_interteleco">
      <li class="list-group-item text-center"><button type="button" onclick="moduloteleco()">MODULO</button></li>
      <li class="list-group-item text-center"><button type="button" onclick="profesores()">PROFESORES</button></li>
      <li class="list-group-item text-center"><button type="button" onclick="salidasteleco()">SALIDAS PROFESIONALES</button></li>
      <li class="list-group-item text-center"><button type="button" onclick="objetivosteleco()">OBJETIVOS</button></li>
    </ul>


    <div class="container" id="telecos">

    </div>


    <div class="container-fluid d-flex justify-content-center mt-3">
      <h2>Otros ciclos formativos</h2>
    </div>

    <div class="container-fluid d-flex justify-content-around p-3 mt-2 otras-esp">
      <div class="esp-daw">
        <i class="fa-solid fa-code font"></i>
        <h3>DAW</h3>
        <p class="text-center mt-1">DESARROLLO DE APLICACIONES WEB.</p>
        <div class="container-fluid d-flex justify-content-end ">
          <a href="./index.php" class="btn-esp "><i class="fa-solid fa-chevron-right"></i></a>
        </div>
      </div>
      <div class="esp-micro">
        <i class="fa-solid fa-microchip font"></i>
        <h3 href="#">SMIR</h3>
        <p class="text-center mt-1">SISTEMAS MICRO-INFORMÁTICOS Y REDES</p>
        <div class="container-fluid d-flex justify-content-end ">
          <a href="./micro.php" class="btn-esp "><i class="fa-solid fa-chevron-right"></i></a>
        </div>
      </div>
      <div class="esp-asir">
        <i class="fa-solid fa-headphones-simple font"></i>
        <h3 href="#">ASIR</h3>
        <p class="text-center mt-1">ADMINISTRACIÓN DE SISTEMAS INFORÁTICOS EN RED</p>
        <div class="container-fluid d-flex justify-content-end ">
          <a href="./asir.php" class="btn-esp "><i class="fa-solid fa-chevron-right"></i></a>
        </div>
      </div>

    </div>

    <?php
      require("../componentes/footer.php");
    ?>

    <?php include './componentes/script.php'?>
</body>
</html>