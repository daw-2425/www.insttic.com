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

    
    
    <div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="../img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">

            
                <li><a href="../php/web.php"><i class="fa-solid fa-user-graduate"></i> <span> TS-DWEB</span> </a></li>
                <li><a href="../php/genracionAno.php"><i class="fa-solid fa-user-graduate"></i> <span> Ano academico</span> </a></li>
                <li><a href="../php/teleco.php"><i class="fa-solid fa-user-graduate"></i> <span> enlace</span> </a></li>
                <li><a href="../php/tmedio.php"><i class="fa-solid fa-user-graduate"></i> <span> enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>


        </nav>

    </div>

    <?php include('../components/asideResponsive.php') ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="../img/logoi.png" alt="">
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
          <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Ano academico
  </button>
  <ul class="dropdown-menu dropdown-menu-dark">
    <li><a class="dropdown-item active" href="../php/genracionAno.php">2017-2020</a></li>
    <li><a class="dropdown-item" href="../php/genracionAno.php">2020-2023</a></li>
    <li><a class="dropdown-item" href="../php/genracionAno.php">2023-2025</a></li>
    
  </ul>
</div>

            <ul class="breadcrumb">
             
            </ul>
          </div>
          <a href="" class="btn-dowload">
            <i class="fa-regular fa-circle-down"></i>
            <span class="text">Download</span>
          </a>
        </div>
            <!--fin de subtitulos del main-->


            <!--COMIENZO DEL DISENO TABLA-->

        <div class="table-dat tabla">
          <div class="orde">
            <div class="head">
            <a href="../php/todasActas.php" class="btn btn-outline-info" style="color:white; background-color:#3C91E6;"><i class="fa-solid fa-arrow-rotate-left"> </i> Atras</a>
            
            <h5 >TS-DWEB</h5>
            </div>

           <div class="scrol-tbod">
           <table class="table orde">
              <thead>
                <tr>
                  <th scope="col">IMAGEN</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">APELLIDOS</th>
                  <th scope="col">CODIGO</th>
                  <th scope="col">TUTOR</th>
                  <th scope="col">TELEFONO</th>
                  <th colspan="3">ACCIONES</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">
                    <img src="../img/logo.png" alt="" width="50px" height="50px">
                    
                  </td>
                  <td>Bibiana </td>
                  <td>Abang Nguema</td>
                  <td>TSD123</td>
                  <td>Asuncion</td>
                  <td><span class="status completed">222 653456</span></td>
                  <td>
                    <a href=""
                     class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                    <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
                </tr>

                <tr>
                  <td scope="row">
                    <img src="../img/logo.png" alt="" width="50px" height="50px">
                    
                  </td>
                  <td>Bibiana </td>
                  <td>Abang Nguema</td>
                  <td>TSD123</td>
                  <td>Asuncion</td>
                  <td><span class="status completed">222 653456</span></td>
                  <td>
                    <a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                    <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
                </tr>

                <tr>
                  <td scope="row">
                    <img src="../img/logo.png" alt="" width="50px" height="50px">
                    
                  </td>
                  <td>Bibiana </td>
                  <td>Abang Nguema</td>
                  <td>TSD123</td>
                  <td>Asuncion</td>
                  <td><span class="status completed">222 653456</span></td>
                  <td>
                  <a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a>
                  <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                    <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
                </tr>

                <tr>
                  <td scope="row">
                    <img src="../img/logo.png" alt="" width="50px" height="50px">
                    
                  </td>
                  <td>Bibiana </td>
                  <td>Abang Nguema</td>
                  <td>TSD123</td>
                  <td>Asuncion</td>
                  <td><span class="status completed">222 653456</span></td>
                  <td>
                  <a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
                  <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                    <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
                </tr>

                <tr>
                  <td scope="row">
                    <img src="../img/logo.png" alt="" width="50px" height="50px">
                    
                  </td>
                  <td>Bibiana </td>
                  <td>Abang Nguema</td>
                  <td>TSD123</td>
                  <td>Asuncion</td>
                  <td><span class="status completed">222 653456</span></td>
                  <td>
                  <button class="btn btn-outline-info" id="actualizar"><i class="fa-regular fa-pen-to-square"></i></i></button>
                    <a href="../php/vistaRegistro.php" class="btn btn-outline-success" ><i class="fa-solid fa-eye"></i></a>
                    <button class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>

           </div>
        </div>      
        </div>
        <!--FIN DE LA TABLA-->

        <!--COMIENZO DISENO PARA VISTA MOBIL-->

<div class="card card-respon" style="width: 21rem;">
  <img src="../img/logo.png" class="card-img-top" alt="..." width="50px" height="50px">
  <div class="card-body">
    <div class="card-title id-acciones">
    <h5 class="card-title  d-flex">ID: DM23DE</h5>
    <a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
    
    </div>
    
    <p class="card-text">Nombre: Bibiana</p>
    <p class="card-text">Apellidos: Abang</p>
    <p class="card-text">Tutor: Asuncion </p>
    <p class="card-text">Telefono: 222235456</p>
    <button class="btn btn-danger w-100">Eliminar</button>
  </div>
</div>

<div class="card card-respon" style="width: 21rem;">
  <img src="../img/logo.png" class="card-img-top" alt="..." width="50px" height="50px">
  <div class="card-body">
    <div class="card-title id-acciones">
    <h5 class="card-title  d-flex">ID: DM23DE</h5>
    <a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
    
    </div>
    
    <p class="card-text">Nombre: Bibiana</p>
    <p class="card-text">Apellidos: Abang</p>
    <p class="card-text">Tutor: Asuncion </p>
    <p class="card-text">Telefono: 222235456</p>
    <button class="btn btn-danger w-100">Eliminar</button>
  </div>
</div>

<div class="card card-respon" style="width: 21rem;">
  <img src="../img/logo.png" class="card-img-top" alt="..." width="50px" height="50px">
  <div class="card-body">
    <div class="card-title id-acciones">
    <h5 class="card-title  d-flex">ID: DM23DE</h5>
    <a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
    
    </div>
    
    <p class="card-text">Nombre: Bibiana</p>
    <p class="card-text">Apellidos: Abang</p>
    <p class="card-text">Tutor: Asuncion </p>
    <p class="card-text">Telefono: 222235456</p>
    <button class="btn btn-danger w-100">Eliminar</button>
  </div>
</div>
<!--FIN DISENO PARA VISTA MOBIL-->
        </main>

    </div>

</div>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/aside.js"></script>
<script src="../js/all.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>