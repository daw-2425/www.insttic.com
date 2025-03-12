

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="css/estilosAcacio.css">
    <link rel="stylesheet" href="../css/dashboard.css">
 
   
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
          <div class="container text-center mt-5 px-3">
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
        </div>



        <div class="col-12" id="historial">

                <section class="mt-4 d-flex align-items-center justify-content-center" id="sectAnio">

                    <article class="col-3" id="anio">

                        <select name="" id="select" class="form-select mx-4 mb-2">
                            <option value="2024/2025">AÑO ACADEMICO: 2024/2025</option>
                            <option value="2023/2024">AÑO ACADEMICO: 2023/2024</option>
                            <option value="2022/2023">AÑO ACADEMICO: 2022/2023</option>
                            <option value="2021/2022">AÑO ACADEMICO: 2021/2022</option>
                            <option value="2020/2021">AÑO ACADEMICO: 2020/2021</option>
                            <option value="TODOS LOS AÑOS ACADEMICOS">TODOS LOS AÑOS ACADEMICOS</option>
                        </select>
                    </article>

                    <article class="col-5 mx-4" id="bus">

                        <input type="search" class="form-control mx-4 mb-2" id="buscar"
                            placeholder="Buscar estudiante por nombre, Apellido o  Correo...">

                    </article>


                </section>

                <section class="">
                    <article class="">
                        <h4 class="text-center fw-normal fst-italic" id="histo"></h4>
                    </article>
                </section>

                <section class="d-flex justify-content-end me-5">
                <a href="" > <i class="fa-solid fa-print fs-4 me-5"></i> </a>
                </section>
                <section class="d-flex col-11 container align-items-center mb-5" id="tabla-sect">
                    <div class="table-responsive d-flex flex-column col-12" id="tabla">

                        <table class="table">
                            <thead class="">
                                <tr>

                                    <th>PERFIL</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>CONTACTO</th>
                                    <th>ESPECIALIDAD</th>
                                    <th>TUTOR DE LA ESPECIALIDAD</th>
                                    <th>AÑO ACADEMICO</th>
                                    <th>DIP</th>
                                    <th>AÑOS</th>
                                    <th>FUNCIONES</th>
                                </tr>
                            </thead>

                            <tbody id="body">


                            <div class="card col-12 cart mt-4" id="cart-papa">

                                        

                                       

                                        
                                       
                                    </div>

                            </tbody>
                        </table>

                    </div>
                </section>

               
            </div>


       
       

    </div>

</div>

<!-- <script src="../js/chart.umd.js"></script>
<script src="../js/chartjs-plugin-datalabels.js"></script> -->
<script src="../js/aside.js"></script>
<script src="./js/asides.js" ></script>
<script src="../js/all.js"></script>
<!-- <script src="../js/grafico.js"></script> -->


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>