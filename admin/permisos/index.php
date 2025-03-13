<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluir SweetAlert -->
    
</head>
<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="./img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">     
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Inicio</span> </a></li>
                <li><a href="./salidas.php"><i class="fa-solid fa-person-walking-arrow-right"></i></i> <span>Detalles</span> </a></li>
               <li><a href="./bbb/index.php"><i class="fa-solid fa-door-closed"></i> <span> Puerta</span> </a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></li>
                <li><a href=""></a></li>
        </nav>

    </div>

    <?php include('./components/asideResponsive.php') ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="./img/logoi.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </header>
        </div>

        <div class="main-header conteiner  p-2 d-flex">
            <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logoi.png" alt="">
                </a>
                
            </header> -->
            <div class="buscardor  col-5 p-2 col-lg-9 d-none d-lg-block">
                <div class="lupa">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar...">
                <i class="fa-solid fa-microphone"></i>

                </div>
            </div>
            <div class="perfil col-2 d-none d-lg-flex">
                <div class="imagen">
                    <img src="./img/perfil/perfil.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>

        
    <h2 class="text-center">Permisos por dias </h2>
    
    

    <div class="container">
    <div class="tab-container">
    <button class="tab gray todos" onclick="filterTable('todos')">Todos</button>
    <button class="tab yellow pendiente" onclick="filterTable('pendiente')">Pendientes</button>
    <button class="tab green aprobado" onclick="filterTable('aprobado')">Aceptados</button>
    <button class="tab red denegado" onclick="filterTable('denegado')">Denegados</button>
    <button class="tab blue regresado" onclick="filterTable('regresado')">Regresados</button>
   </div>


<!-- Contenedor de la tabla con la clase responsive de Bootstrap -->
<div class="table-responsive">
    <table class="table ">
        <thead>
            <tr>
                <th >Foto</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Salida</th>
                <th>Fecha Regreaso </th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Documento </th>
                <th class="actions-column">Acciones</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <!-- Las filas serán llenadas dinámicamente con JavaScript -->
        </tbody>
    </table>
</div>





    </div>

         </div>
         </div>
     

  


<script src="./js/aside.js"></script>
<script src="./js/all.js"></script>
<script src="../recursos/bootstrap.bundle.min.js"></script>
<script src="./js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.6/dist/sweetalert2.all.min.js"></script>
</body>
</html>