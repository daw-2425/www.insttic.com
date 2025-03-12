<?php
session_start();
if (!isset($_SESSION["id_alumno"])) {
  header("Location: ../index.php");
  exit(); // Importante agregar exit después de redirección
} 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <input id="especialidad" type="text" class="d-none" value="<?php if (isset($_SESSION['especialidad'])) echo $_SESSION['especialidad'] ?>">

    <div class="general conteiner-fluid d-flex">



        <?php include('./components/aside.php') ?>

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
            <div class="main-header container col-12 justify-content-end  p-2 d-flex">
                <div class="perfil col-2 d-none d-lg-flex">
                    <div class="imagen">
                        <img src="./img/perfil/perfil.jpg" alt="">
                    </div>
                    <div class="nombre d-none d-lg-block">
                        <span><?php if (isset($_SESSION['nombre'])) echo $_SESSION['nombre'] ?> </span>
                    </div>
                    <i class="fa-regular fa-bell d-none d-lg-block"></i>
                </div>

            </div>

            <div class="container mt-4 d-flex justify-content-center ">

                <div class="row container gap-1 d-flex justify-content-around">
                    <div class="col-12 col-lg-3 caja_dash">
                        <p class="h4 text-center">
                            ESPECIALIDAD
                        </p>
                        <p class="h5 text-center"><i class="fa-solid fa-graduation-cap"></i><?php if (isset($_SESSION['especialidad'])) echo $_SESSION['especialidad'] ?></p>
                    </div>
                    <div class="col-12 col-lg-3 caja_dash">
                        <p class="h4 text-center">
                            MATERIAS VISTAS  
                        </p>
                        <p class="h5 text-center"><i class="fa-regular fa-book fa"></i> <?php if (isset($_SESSION['total_materias'])) echo $_SESSION['total_materias'] ?></p>
                    </div>
                    <div class="col-12 col-lg-3 caja_dash">
                        <p class="h4 text-center">
                            MATERIAS POR VER
                        </p>
                        <p class="h5 text-center"><i class="fa-regular fa-book fa"></i> 8</p>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="tabla col-lg-8 col-12 mt-5">
                        <table class="table table-hover ">
                            <thead class="encabezado_tabla">
                                <tr class="text-center">
                                    
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Materia</th>


                                </tr>
                            </thead>
                            <tbody id="materias">
                                
                                <!-- <tr class="text-center">
                                    <td>Foto</td>
                                    <td>Fermin</td>
                                    <td>Copoboru Loeri</td>
                                    <td>DAWES</td>


                                </tr> -->
                            </tbody>
                        </table>

                        <!-- <a href="../php/cerrar_sesion.php" class="btn btn-danger">cerrar sesion</a> -->
                    </div>

                    <div class="col-lg-3 col-12 d-flex justify-content-center mt-5">
                        <div class="" style="width: 350px; height: 350px;">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>


                </div>

                <div class="container mt-3">
                    <div class="progreso row d-flex justify-content-center align-items-center gap-2">
                        <div class=" col-lg-3 gap-2 progreso p-3 d-flex justify-content-center align-items-center" style="background-color:#082252FF;">
                            <div class="" style="width: 100px; height: 100px;">
                                <canvas id="loadingChart"></canvas>
                            </div>
                            <div class="tex">
                                <p class="h4 text-center">Progreso anual</p>
                            </div>
                        </div>

                        <div class="col-lg-8 col-12">
                            <div class="container gap-2 d-flex justify-content-center align-items-center">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script src="./js/aside.js"></script>
            <script src="./js/all.js"></script>
            <script src="./js/bootstrap.js"></script>
            <script src="./js/chart.umd.js"></script>
            <script src="./js/chartjs-plugin-datalabels.js"></script>
            <script type="module" src="./js/graficas.js"></script>
            <script src="./js/script.js"></script>

</body>

</html>