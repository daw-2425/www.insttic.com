<?php
// session_start();
// if (!isset($_SESSION["id"])) {
//   header("Location: ../index.php");
// }elseif ($_SESSION["rol"]=!'secretaria' ){
//     header("Location: ../index.php");


// }
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
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle p-2 d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./img/perfil/perfil.jpg" alt="" class="perfil">
                        <span class="nombre"><?php if (isset($_SESSION['nombre'])) echo $_SESSION['nombre'] ?> Zabulon Sima</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
            </div>
        </div>

        <div class="container mt-4 d-flex justify-content-center ">

            <div class="row container gap-1 d-flex justify-content-around">
                <div class="col-12 col-lg-2 caja_dash">
                    <p class="h4 text-center">
                        ESPECIALIDAD
                    </p>
                    <p class="h5 text-center"><i class="fa-solid fa-graduation-cap"></i> TS-DAW</p>
                </div>

                <div class="col-12 col-lg-2 caja_dash">
                    <p class="h4 text-center">
                        ESPECIALIDAD
                    </p>
                    <p class="h5 text-center"><i class="fa-solid fa-graduation-cap"></i> TS-DAW</p>
                </div>

                <div class="col-12 col-lg-2 caja_dash">
                    <p class="h4 text-center">
                        ESPECIALIDAD
                    </p>
                    <p class="h5 text-center"><i class="fa-solid fa-graduation-cap"></i> TS-DAW</p>
                </div>

                <div class="col-12 col-lg-2 caja_dash">
                    <p class="h4 text-center">
                        ESPECIALIDAD
                    </p>
                    <p class="h5 text-center"><i class="fa-solid fa-graduation-cap"></i> TS-DAW</p>
                </div>
                <div class="col-12 col-lg-2 caja_dash">
                    <p class="h4 text-center">
                        ESPECIALIDAD
                    </p>
                    <p class="h5 text-center"><i class="fa-solid fa-graduation-cap"></i> TS-DAW</p>
                </div>

                

            </div>
        </div>

        <div class="container">
            <div class="row mt-4 d-flex justify-content-center">
                <p class="h4 text-center" style="color: #0A2A66;">MI HISTORIAL ACADEMICO</p>
                <div class="tabla col-lg-12 col-12 mt-3 d-flex justify-content-center flex-column">
                    <table class="table table-hover ">
                        <thead class="encabezado_tabla">
                            <tr class="text-center">

                                <th>Nombre de la materia</th>
                                <th>Creditos</th>
                                <th>Horas</th>
                                <th>Profesor</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>DAWES</td>
                                <td>8</td>
                                <td>64</td>
                                <td>Fermin Copoboru Loeri</td>

                            </tr>
                            <tr class="text-center">
                                <td>DAWES</td>
                                <td>8</td>
                                <td>64</td>
                                <td>Fermin Copoboru Loeri</td>

                            </tr>
                            <tr class="text-center">
                                <td>DAWES</td>
                                <td>8</td>
                                <td>64</td>
                                <td>Fermin Copoboru Loeri</td>

                            </tr>
                            <tr class="text-center">
                                <td>DAWES</td>
                                <td>8</td>
                                <td>64</td>
                                <td>Fermin Copoboru Loeri</td>

                            </tr>
                            <tr class="text-center">
                                <td>DAWES</td>
                                <td>8</td>
                                <td>64</td>
                                <td>Fermin Copoboru Loeri</td>

                            </tr>
                            <tr class="text-center">
                                <td>DAWES</td>
                                <td>8</td>
                                <td>64</td>
                                <td>Fermin Copoboru Loeri</td>

                            </tr>
                        </tbody>
                    </table>

                
                </div>
            </div>


            <script src="./js/aside.js"></script>
            <script src="./js/all.js"></script>
            <script src="./js/bootstrap.bundle.js"></script>
            <script src="./js/chart.umd.js"></script>
            <script src="./js/chartjs-plugin-datalabels.js"></script>
            <script type="module" src="./js/graficas.js"></script>

</body>

</html>