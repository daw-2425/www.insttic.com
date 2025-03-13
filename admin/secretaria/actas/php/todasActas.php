<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="../css/all.css">-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/todasActas.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">

 
</head>
<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <div class="aside d-none d-lg-block">
        <header class="header">
            <a class=" logo">
                <img src="../img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">

     
            
       

               <!-- <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
-->

        </nav>

    </div>

    <?php include('../components/asideResponsive.php') ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class=" logo">
                        <img src="../img/logoi.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars micro"></i>
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
                    <img src="../img/perfil/perfil.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>

        <main>
            <!--SUBTITULOS DEL MAIN-->
 <div class="head-title">
          <div class="left">
          <div class="dropdown ">
  <button class="btn btn dropdown-toggle especialidades" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Especialidades
  </button>
  <ul class="dropdown-menu dropdown-menu-dark">
    <li><a class="dropdown-item active" href="../php/web.php">TS-DWEB</a></li>
    <li><a class="dropdown-item" href="../php/asir.php">TS-ASIR</a></li>
    <li><a class="dropdown-item" href="../php/teleco.php">TS-STI</a></li>
    <li><a class="dropdown-item" href="../php/tmedio.php">TM-SMIR</a></li>
    
  </ul>
</div>

 <ul class="breadcrumb">
             
            </ul>
          </div>
          <a href="../funciones/reporteTodasActas.php" class="btn btn-dowload">
          <i class="fa-solid fa-print"></i>
            <span class="text">Imprimir</span>
          </a>
        </div>
            <!--fin de subtitulos del main-->


            <!--COMIENZO DEL DISENO TABLA-->
            

            <h2 class="listas">Lista general de actas</h2>        
          <div class="orde">
            <div class="head">
            
            
           
            </div>

           <div class="scrol-tbod">
           <table class="table caja-tabla" id="tablaActas" >
            <thead>
              <tr>
                
                <th scope="col">FECHA DE REGISTRO</th>
                <th scope="col">ESPECIALIDAD</th>
                <th scope="col">GENERACION</th>
                
              </tr>
            </thead>

            

            <tbody id="tbody_actas">
            
              <!-- los datos se carga aqui mediante java script-->             
              
            </tbody>
           
          </table>

        </div>
            <!--FIN DEL DISENO DE LAS TARJETAS-->

           <!--COMIENZO DISENO PARA VISTA MOBIL-->

        <div class="card card-respon responsivo" style="width: 21rem;">
          <div class="card-body" id="tarjetas">
            <div class="card-title id-acciones">
              <h5 class="card-title  d-flex">ID: DM23DE</h5>



            </div>


          </div>
        </div>

        
        <!--FIN DISENO PARA VISTA MOBIL-->
</main>


      

    </div>

</div>
<script src="../js/actasNotas.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../js/aside.js"></script>
<script src="../js/all.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>