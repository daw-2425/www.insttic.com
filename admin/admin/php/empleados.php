<?php
       require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/conexion/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/empleados.css">
    <link rel="stylesheet" href="../css/dashboard.css">

</head>
<body>
    
<div class="general conteiner-fluid d-flex" style="font-family: cambria">
    
<!-- Modal -->
<div class="modal fade" id="modalinsert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
      <h5 class="modal-title text-center ms-5" id="modalinsertLabel"> REGISTRAR EMPLEADO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
            <form action="" method="POST" enctype="multipart/form-data" id="formulario">
                    
                    <label clss="ms-4">Foto del empleado</label>
                    <input class="form-control" placeholder="Foto" id="foto" name="foto" type="file">
                    <div class="alert alert-danger mt-2" id="errorFoto"></div>
                    
                    <input class="form-control mt-4" placeholder="Nombre" id="nom" name="nom" type="text">
                    <div class="alert alert-danger mt-2" id="errorNombre"></div>
                    
                    <input class="form-control mt-4" placeholder="Apellidos" id="apel" name="apel" type="text">
                    <div class="alert alert-danger " id="errorApellido"></div>

                    <input class="form-control mt-4" placeholder="Telefono" id="tel" name="tel" type="text">
                    <div class="alert alert-danger " id="errorTelefono"></div>
                    
                    <input class="form-control mt-4" placeholder="Correo" id="correo" name="correo" type="email">
                    <div class="alert alert-danger " id="errorCorreo"></div>

                    <select class="form-control mt-4" name="gen" id="gen">
                        <option>Seleccione el genero</option>
                        <option value="">Femenino</option>
                        <option value="">Masculino</option>
                    </select>
                    <!-- <div class="alert alert-danger " id="errorGenero"></div> -->

                    <select class="form-control mt-4" name="rol" id="rol">
                        <option>Ingrese al tipo de empleado</option>
                        <?php
                                $mostrarRol = $conexion->prepare("SELECT * FROM rol") ;
                                $mostrarRol-> setFetchMode(PDO::FETCH_ASSOC);
                                $mostrarRol->execute();
                                while($rol = $mostrarRol->fetch()){
                        ?>
                        <option value="<?php echo $rol['id_rol']?>"> <?php echo $rol['rol'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <div class="alert alert-danger " id="errorRol"></div>
                    <button type="submit" style="background-color: var(--primary)" class="btn form-control mt-4 text-light" name="btnRegistrar">REGISTRAR EMPLEADO</button>
            </form>
      </div>
      
    </div>
  </div>
</div>
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/admin/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/admin/admin/components/asideResponsive.php" ?>

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="../img/logo.png" alt="">
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
                    <img src="../img/profes.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>



        
        <div class="container w-75 tablaYgrafico mt-5" style="font-family: cambria">
        <p class="h4 text-center mb-4 fw-bold">EMPLEADOS DEL INSTTIC</p>
             <div class="">
            <button type="button" style="background-color: var(--primary);" class="btn ms-3 mb-5 text-light" data-bs-toggle="modal" data-bs-target="#modalinsert">
            <i class="fa-solid fa-user-plus"></i>  Nuevo Empleado
            </button>
                <!-- TABLA -->
                <div class="container tabla col-lg-12 col-12 d-flex align-items-center flex-column">

                <!-- Button trigger modal -->
                    <table class="table table-responsive text-center align-items-center">
                   
                        <thead>
                            <th>FOTO</th>
                            <th>NOMBRE y APELLIDOS</th>
                            <th>TELEFONO</th>
                            <th>CORREO</th>
                            <th>GENERO</th>
                            <th>ROL</th>
                            <th>ACCION</th>
                        </thead>
                        <tbody id="tablaEmpleado">
                            
                           
                        </tbody>

                    </table>

                        <div id="paginacion">
                            <button class="btn btn-danger me-5" id="anterior">
                            <i class="fa-solid fa-left-long"></i>
                            </button>
                                <span id="pagina-actual">1</span>
                            <button class="btn btn-primary ms-5" id="siguiente">
                                <i class="fa-solid fa-right-long"></i>
                            </button>
                        </div>
                        
                </div>
          <!-- GRAFICo -->
                
             </div>
        </div>
       

    </div>

</div>


<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/admin/js/script.php";
?>
<script src="../js/empleado.js"></script>
</body>
</html>