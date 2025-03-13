<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/web.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/fontawesome.min.css">


</head>

<body>

  <div class="general conteiner-fluid d-flex">



  <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/Admin/secretaria/components/aside.php" ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/Admin/secretaria/components/asideResponsive.php" ?>

    <div class="main">
      <div class="container-fluid encabezado d-flex d-lg-none ">
        <header class="encabezado  col-12 d-flex justify-content-between">
          <a class=" logo">
            <img src="../img/logoi.png" alt="">
          </a>
          <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar"
            aria-controls="offcanvasScrolling">
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
           

            <ul class="breadcrumb">

            </ul>
          </div>
          <a href="../funciones/reportessti.php" class="btn btn-dowload">
            <i class="fa-solid fa-print"></i>
            <span class="text">Imprimir</span>
          </a>
        </div>
        <!--fin de subtitulos del main-->


        <!--COMIENZO DEL DISENO TABLA-->


        <h2 class="listas">TS-STI 2023-2025</h2>
        <div class="orde">
          <div class="head">



          </div>

          <div class="scrol-tbod">
            <table class="table tablaNotas orde">
              <thead id="thead_actas">
                
              </thead>
              <tbody id="tbody_actas">
                <!--  -->

              </tbody>
            </table>

          </div>
        </div>

        <!--FIN DE LA TABLA-->

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
  <script src="../js/actasSTI.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/aside.js"></script>
  <script src="../js/all.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>

</html>