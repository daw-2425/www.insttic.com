<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/vistaRegistro.css">
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

            
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
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

        <main>

        <div class="head-title">
          <div class="left">
            <a href="../php/genracionAno.php" class="btn btn-outline-info" style="color:white; background-color:#3C91E6;"><i class="fa-solid fa-arrow-rotate-left"> </i> Atras</a>
            <ul class="breadcrumb">
             
            </ul>
          </div>
          <a href="" class="btn-dowload">
            <i class="fa-regular fa-circle-down"></i>
            <span class="text">Download</span>
          </a>
        </div>

        <div class="container contenedor-card" >
   <div class="card" style="width: 100%;">
  <img src="../img/logo.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nombre: Bibiana Abang Nguema</h5>
    <p class="card-text">codigo: ert123</p>
  </div>

  <div class="scrol-tbod">
  <table class="table caja-tabla">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Asignaturas</th>
      <th scope="col">Nota 1</th>
      <th scope="col">Nota 2</th>
      <th scope="col">Nota 3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>LMS</td>
      <td>BBDD</td>
      <td>DAWES</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>BBDD</td>
      <td>Thornton</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>BBDD</td>
      <td>@twitter</td>
    </tr>

    
  </tbody>
</table>
  </div>

  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
   </div> 

       
       
<div class="card card-respon" style="width: 21rem;">
  <img src="../img/logo.png" class="card-img-top" alt="..." width="50px" height="50px">
  <div class="card-body">
    <div class="card-title id-acciones">
    <h5 class="card-title  d-flex">ID: DM23DE</h5>
    <!--<a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>-->
    
    </div>
    
    <p class="card-text">Asignatura: LMS</p>
    <p class="card-text">Nota 1: 7,5</p>
    <p class="card-text">Nota 2: 8 </p>
    <p class="card-text">Nota 3: 6</p>
    <p class="card-text">Nota final: 7.2</p>

    <!--<button class="btn btn-danger w-100">Eliminar</button>-->
  </div>
</div>

<div class="card card-respon" style="width: 21rem;">
  <img src="../img/logo.png" class="card-img-top" alt="..." width="50px" height="50px">
  <div class="card-body">
    <div class="card-title id-acciones">
    <h5 class="card-title  d-flex">ID: DM23DE</h5>
    <!--<a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>-->
    
    </div>
    
    <p class="card-text">Asignatura: LMS</p>
    <p class="card-text">Nota 1: 7,5</p>
    <p class="card-text">Nota 2: 8 </p>
    <p class="card-text">Nota 3: 6</p>
    <p class="card-text">Nota final: 7.2</p>

    <!--<button class="btn btn-danger w-100">Eliminar</button>-->
  </div>
</div>

<div class="card card-respon" style="width: 21rem;">
  <img src="../img/logo.png" class="card-img-top" alt="..." width="50px" height="50px">
  <div class="card-body">
    <div class="card-title id-acciones">
    <h5 class="card-title  d-flex">ID: DM23DE</h5>
    <!--<a href="../php/actualizar.php" class="btn btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></i></a>
    <a href="../php/vistaRegistro.php" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>-->
    
    </div>
    
    <p class="card-text">Asignatura: LMS</p>
    <p class="card-text">Nota 1: 7,5</p>
    <p class="card-text">Nota 2: 8 </p>
    <p class="card-text">Nota 3: 6</p>
    <p class="card-text">Nota final: 7.2</p>

    <!--<button class="btn btn-danger w-100">Eliminar</button>-->
  </div>
</div>
        </main>

    </div>

</div>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/aside.js"></script>
<script src="../js/all.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>