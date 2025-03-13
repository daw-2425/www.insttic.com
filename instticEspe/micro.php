<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/enlaces.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/micro.css">
    <link rel="stylesheet" href="./css/profesoresDaw.css">
</head>
<body>
<div>
      <?php
        require("../componentes/header.php");
      ?>
    </div> 

        <div class="container-fluid d-flex justify-content-end mt-1">
            <i class="fa-solid fa-microchip text-ico m-1"></i>
            <h5 class="text m-1">Sistemas Micro-informaticos y Redes</h5>
        </div>

        <div class="bannermicro d-flex justify-content-start mt-1">
        <div class="text-bannerD">
            <div class="container-fluid">
            <h1 class="texto mt-3 mx-5 ">TM-SMIR</h1>
            </div>
            <div class="container-fluid">
            <h2 class="text-ciclo mx-5">Técnico Medio en</h2>
            </div>
            <div class="container-fluid">
            <h4 class="text-ciclo mx-5">Sistemas Micro-informaticos y Redes.</h4>
            </div>
            <div class="container info d-flex justify-content-end ">
            <p class="horas m-2">Duración : 20000 horas</p>
            </div>
        </div>
        </div>

        <div class="container d-none d-lg-block">
            <div class="container d-flex justify-content-evenly nav_intermicro">
                <button type="button" onclick="modulomicro()">MODULO</button>
                <button type="button" onclick="profesoresmicro()">PROFESORES</button>
                <button type="button" onclick="salidasmicro()">SALIDAS PROFESIONALES</button>
                <button type="button" onclick="objetivosmicro()">OBJETIVOS</button>
            </div>
        </div>

        <ul class="list-group d-lg-none mt-3 nav_inter">
            <li class="list-group-item text-center"><button type="button" onclick="modulomicro()">MODULO</button></li>
            <li class="list-group-item text-center"><button type="button" onclick="profesoresmicro()">PROFESORES</button></li>
            <li class="list-group-item text-center"><button type="button" onclick="salidasmicro()">SALIDAS PROFESIONALES</button></li>
            <li class="list-group-item text-center"><button type="button" onclick="objetivosmicro()">OBJETIVOS</button></li>
        </ul>

        <div class="container">
            <divc class="container" id="micro">
            </div>
        </div>




        <div class="container-fluid d-flex justify-content-center mt-3 border-light-subtle">
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
        <div class="esp-teleco"> 
            <i class="fa-solid fa-satellite-dish font"></i>
            <h3>STI</h3>
            <p class="text-center mt-1">SISTEMAS DE TELECOMUNICACIONES E INFORMATICOS</p>
            <div class="container-fluid d-flex justify-content-end ">
            <a href="./teleco.php" class="btn-esp "><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="esp-asir">
            <i class="fa-solid fa-swatchbook font"></i>
            <h3>ASIR</h3>
            <p class="text-center mt-1">ADMINISTRACIÓN DE SISTEMAS INFORÁTICOS EN RED</p>
            <div class="container-fluid d-flex justify-content-end ">
            <a href="./asir.php" class="btn-esp "><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
        
        </div>

        <?php include './componentes/script.php'?>
        <?php
        require_once('../componentes/footer.php')
        ?>
</body>
</html>