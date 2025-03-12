

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../../css/all.css">
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/estilos.css">
    <link rel="stylesheet" href="./css/estilos1.css">
    <link rel="stylesheet" href="./css/estilos.css">
   
 
   
</head>
<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/Admin/secretaria/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/Admin/secretaria/components/asideResponsive.php" ?>

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
                    <img src="./img/perfil/perfil.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>


          <!-- DASHBOARD DE LA SECRETARIA -->
          <!-- <div class="container text-center mt-5 px-3">
            <div class="row cajaTarjetas text-light">
                <div class="col-4 py-5 tarjeta">

                    <p class="h4"><i class="fa-solid fa-user-graduate text-warning"></i> Estudiantes</p>
                    <p>100</p>
                </div>
                <div class="col-4 py-5 tarjeta">
                    <p class="h4"> <i class="fa-solid fa-user-check text-success"></i> Aprobados</p>
                    <p>70</p>
                </div>
                <div class="col-4 py-5 tarjeta">
                    
                    <p class="h4"><i class="fa-solid fa-user-xmark text-danger"></i> Reprobados</p>
                    <p>30</p>
                </div>
            </div>
        </div> -->
        <div class="col-12" id="historial">

<section id="notasHa" class="mt-5">
            <article id="cajaha">
                <div class="" id="icon">
                    <img src="img/perfil/perfil.jpg" alt="">
                </div>
                <div class="" id="icon2">
                    <article class="text-bg-dark" id="mateha">
                        <label for="">materias totales a ver</label>
                    </article>
                    <article id="mateha1">
                        <label for="">20</label>
                    </article>
                </div>
            </article>

            <article id="cajaha">
                <div class="" id="icon">
                    <img src="img/perfil/perfil.jpg" alt="">
                </div>
                <div class="" id="icon2">
                    <article class="text-bg-dark" id="mateha">
                        <label for="">Materias ya vistas</label>
                    </article>
                    <article id="mateha1">
                        <label for="">15</label>
                    </article>
                </div>
            </article>

            <article id="cajaha">
                <div class="" id="icon">
                    <img src="img/perfil/perfil.jpg" alt="">
                </div>
                <div class="" id="icon2">
                    <article class="text-bg-dark laRes" id="mateha">
                        <label id="" for="">Materias Restantes</label>
                    </article>
                    <article id="mateha1">
                        <label for="">6</label>
                    </article>
                </div>
            </article>


            <article id="cajaha">
                <div class="" id="icon">
                    <img src="img/perfil/perfil.jpg" alt="">
                </div>
                <div class="" id="icon2">
                    <article class="text-bg-dark" id="mateha">
                        <label for="">Materias Suspendidas</label>
                    </article>
                    <article id="mateha1">
                        <label for="">8</label>
                    </article>
                </div>
            </article>


            <article id="cajaha">
                <div class="" id="icon">
                    <img src="img/perfil/perfil.jpg" alt="">
                </div>
                <div class="" id="icon2">
                    <article class="text-bg-dark" id="mateha">
                        <label for="">Media General 2024</label>
                    </article>
                    <article id="mateha1">
                        <label for="">8</label>
                    </article>
                </div>
            </article>






        </section>

    <section class="d-flex flex-column justify-content-center align-content-center" id="estu">
        <h5 class="text-center text-dark">ESTUDIANTE: TARSICIO SANTANDER MORGADES</h5>
    </section>


    <section class="d-flex justify-content-end me-5">
        <a href=""> <i class="fa-solid fa-print fs-4 me-5 mb-2"></i> </a>
        <li class="list-group">
                    <!-- Example split danger button -->
<div class="btn-group">
  <a href="#" class="text-decoration-none text-black"><i class="fa-solid fa-table"></i> <span>2024</span> </a>
  <a type="button" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?= ruta_base;?>/historial/especifico/">2024/2025</a></li>
    <li><a class="dropdown-item" href="<?= ruta_base;?>/historial/especifico/anio1/">2023</a></li>
    
  </ul>
</div>
                    </li>
    </section>

    <section class="d-flex container col-11 align-items-center" id="tabla-sect">
        <div class="table-responsive d-flex col-12" id="tablap">

            <table class="table table-bordered" id="tabla">
                <thead class="">
                    <tr id="">

                        <th>MATERIAS</th>
                        <th>NOTA</th>
                        <th colspan="1" class="text-center"><label class="">APTO</label>/<label
                                class="">NO APTO</label></th>
                        <th class="text-center">ESTADO DE LA MATERIA</th>
                       
                        
                    </tr>
                </thead>

                <tbody id="bodyM">


                    <div class="card col-12" id="cart-papa">

                        <img src="img/perfil/perfil.jpg" class="card-img-top" alt="..." id="img-cart">

                        <div class="card-body">
                            <h5 class="card-title text-center datosE">Datos Del estudiante</h5>

                        </div>

                        <div id="cart">



                        </div>

                    </div>

                </tbody>
            </table>

        </div>

       
        
                
                <div id="porc"  ></div>

            </section>
           


    <section class="mt-3 d-flex flex-column justify-content-center align-items-center">
        <h6 class="">AÑO ACADEMICO:</h6>
        <h3 class="">2024/2025</h3>
    </section>

</div>


    


       
       

    </div>

</div>

<!-- <script src="../js/chart.umd.js"></script>
<script src="../js/chartjs-plugin-datalabels.js"></script> -->
<script src="../../../js/aside.js"></script>
<script src="./js/anio2.js" ></script>
<script src="../../../js/all.js"></script>
<!-- <script src="../js/grafico.js"></script> -->


<script src="../../../js/bootstrap.bundle.min.js"></script>
</body>
</html>