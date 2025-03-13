

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/dashboard.css">
 
   
</head>
<body>
    
<div class="general conteiner-fluid d-flex">
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/admin/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/admin/admin/components/asideResponsive.php" ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="../img/logo.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </header>
        </div>

        <div class="main-header container pt-4 d-flex">
            <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logoi.png" alt="">
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
                    <img src="../img/profes.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>

        
        <div class="container tablaYgrafico mt-5" style="font-family: cambria">
             <div class="row">
                <!-- TABLA -->
                <div class="container table-responsive w-75 tabla col-lg-12 col-12 d-flex align-items-center flex-column">
                    
                    <table class="table table-responsive text-center align-items-center">
                    <p class="h4 text-center mb-4 fw-bold">ESTUDIANTES DEL INSTTIC GENERACION: 2023-2025</p>
                        <thead>
                            <th>FOTO</th>
                            <th>NOMBRE y APELLIDOS</th>
                            <th>FECHA_NACIMIENTO</th>
                            <th>CONTACTO_EMERGENCIA</th>
                            <th>GENERO</th>
                            <th>ESPECIALIDAD</th>
                        </thead>
                        <tbody id="tablEstudiante">
                            
                           
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
                
             </div>
        </div>
       

    </div>

</div>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/admin/js/script.php";
?>
<script src="../js/estudiantes.js"></script>
</body>
</html>