<?php
session_start();
if (!isset($_SESSION["id"])) {
  header("Location: ../index.php");
  exit(); // Importante agregar exit después de redirección
} elseif ($_SESSION["rol"] != 'Alumno') {
  header("Location: ../index.php");
  exit(); // También necesario aquí
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
    
<div class="general conteiner-fluid d-flex">

    
    
        <?php include('./components/aside.php') ?>

        <?php include('./components/asideResponsive.php') ?>


    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="./img/logoi.png" alt="foto">
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
                </div>
                <!-- <i class="fa-solid fa-microphone"></i> -->
            </div>
            <div class="perfil col-2 d-none d-lg-flex">
                <div class="imagen" >
                    <img src="./img/" id="avatar" alt="foto">
                    <input type="file" name="foto" id="changeAvatar">
                </div>
                <div class="nombre d-none d-lg-block">
                
                    <span></span>
                 
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
          
        </div>
        <!-- modal principio -->
        <!-- Button trigger modal -->
    <button type="button" class="btn boton_modal ms-4 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Solicitar Permiso
    </button>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">PERMISO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- formulario -->
                    <form method="POST" id="formulario" enctype="multipart/form-data">
                        <div class="mb-3" id="Idnom">
                      
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" disabled id="nom" value="<?php echo $_SESSION['nombre'] ?>" name="nombre" aria-describedby="emailHelp">
                            <div id="nomA" class="form-text">We'll never share your email with anyone else.</div>
                                <?php ?>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="exampleInputEmail1" class="form-label">Apellido</label> -->
                            <input type="hidden" class="form-control" id="id" name="id" aria-describedby="emailHelp">
                            <!-- <div id="apeA" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                             <label for="exampleInputEmail1" class="form-label">Motivo</label>
                        <div class="mb-3">
                            <!-- <label for="exampleInputEmail1" class="form-label">Motivo</label> -->
                            <textarea name="motivo" id="motivo_a" cols="40" rows="5" required></textarea>
                            <div id="MotA" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3 d-flex gap-3">
                            <div class="entrada">
                            <label for="exampleInputEmail1" class="form-label">Fecha Salida</label>
                            <input type="date" class="form-control" id="fecha_entrada" name="entrada" aria-describedby="emailHelp" required>
                            <div id="fech_aentradaA" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="salida">
                            <label for="exampleInputEmail1" class="form-label">Fecha Entrada</label>
                            <input type="date" class="form-control" id="fecha_salida" name="salida" aria-describedby="emailHelp" required>
                            <div id="fecha_salidaA" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Archiv. Adjunt.</label>
                            <input type="file" class="form-control" id="archvivo_adjuntado" name="archivo" aria-describedby="emailHelp" required>
                            <div id="archivoA" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div> -->
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <!-- /formulario -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>


        <!-- modal final -->


          <!--Mis Tablas-->
          <table class="table container mt-4">
            <thead class="encabezado_tabla">
                <tr>
                    <!-- <th>Foto</th>
                    <th>Nombre Y Apellidos</th> -->
                    <!-- <th>Apellidos</th> -->
                    <th class="text-white">Motivo</th>
                    <th class="text-white">Salida</th>
                    <th class="text-white">Entrada</th>
                    <th class="text-white">Archiv. Adjunt.</th>
                    <th class="text-white">Estado</th>
                </tr>
            </thead>
            <tbody id="tabla">
             <!-- COntenido de las tablas -->
            </tbody>
          </table>
          <!-- fin mis tablas -->

          <!-- mis tarjetas responsivas -->
          <div class="responsive_tabla" id="caja">
            <!-- contenido de las -->
            </div>

         <!--fin mis tarjetas responsivas -->

    </div>

</div>


<script src="./js/aside.js"></script>
<script src="./js/all.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/permiso_estudiante.js"></script>
</body>
</html>