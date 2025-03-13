

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
    
<div class="general conteiner-fluid d-flex">
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/secretaria/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/admin/secretaria/components/asideResponsive.php" ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado bg-success col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="./img/logo.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </header>
        </div>

        <div class="main-header container pt-4 d-flex">
            <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logo.png" alt="">
                </a>
                
            </header> -->
            <div class="buscardor col-lg-9 d-none d-lg-block">
                <!-- <div class="lupa">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar...">
                </div> -->
            </div>
            <div class="perfil col-2 d-none d-lg-flex">
                <div class="imagen">
                    <img src="./img/prof1.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>secretaria</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>


        <!-- DASHBOARD DE LA SECRETARIA -->
        <div class="container text-center mt-5 px-3">
            <div class="row cajaTarjetas text-light">
                <div class="col-4 py-5 tarjeta">

                    <p class="h4"> <i class="fa-solid fa-user-graduate text-warning"></i> Estudiantes</p>
                    <p>100</p>
                </div>
                <div class="col-4 py-5 tarjeta">
                    <p class="h4"> <i class="fa-solid fa-user-check text-success"></i> Aprobados</p>
                    <p>76</p>
                </div>
                <div class="col-4 py-5 tarjeta">
                    
                    <p class="h4"><i class="fa-solid fa-user-xmark text-danger"></i> Reprobados</p>
                    <p>24</p>
                </div>
            </div>
        </div>

        
        <div class="container tablaYgrafico mt-5" style="font-family: cambria">
             <div class=" row">
                <!-- TABLA -->
                <div class="container tabla col-lg-9 col-12 d-flex align-items-center flex-column">
                    
                    <table class="table table-responsive text-center align-items-center w-75">
                    <p class="h4 text-center mb-4 fw-bold">MEJORES ESTUDIANTES DE LA GENERACION</p>
                        <thead >
                            <th style="background-color: #0A2A66; color: white; font-weight: normal">FOTO</th>
                            <th style="background-color: #0A2A66; color: white; font-weight: normal">NOMBRE</th>
                            <th style="background-color: #0A2A66; color: white; font-weight: normal">APELLIDOS</th>
                            <th style="background-color: #0A2A66; color: white; font-weight: normal">CONTACTO_EMERGENCIA</th>
                        </thead>
                        <tbody id="tablEstudiante">
                            <!-- <tr>
                                <td> <img class="rounded-pill" src="../../img/balon.jpg" alt="" style="width: 30px; height:30px"> </td>
                                <td> <p>ANASTASIA TRINIDAD MAYE BOKUY MANGUE</p> </td>
                                <td> <p>DAW</p> </td>
                            </tr> -->
                            
                            
                        </tbody>

                    </table>

                        <div id="paginacion">
                            <button class="btn btn-danger me-5" id="anterior">
                            <i class="fa-solid fa-left-long"></i>
                            </button>
                                <span id="pagina-actual">1</span>
                            <button class="btn btn-primary ms-5" id="siguiente">
                                <i class="fa-solid fa-right-long"></i>
                            </button>
                        </div>
                        
                </div>
          <!-- GRAFICo -->
                <div class="container grafico col-lg-3 col-10">
                    
                        <canvas class="miGrafico mt-5" id="miGrafico"></canvas>
                </div>
             </div>
        </div>
       

    </div>

</div>

<script src="./js/chart.umd.js"></script>
<script src="./js/chartjs-plugin-datalabels.js"></script>
<script src="./js/aside.js"></script>
<script src="./js/all.js"></script>
<script src="./js/grafico.js"></script>
<script src="./js/estudiantes.js"></script>
<script src="./js/bootstrap.js"></script>
</body>
</html>