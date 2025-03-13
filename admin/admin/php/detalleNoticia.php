

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/dashboard.css">
 
   
</head>
<body>
    
<div class="general conteiner-fluid d-flex">
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/admin/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/admin/admin/components/asideResponsive.php" ?>

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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
        
        <div class="container tablaYgrafico mt-5" style="font-family: cambria">
        <p class="h4 text-center mb-4 fw-bold">DETALLES DE LAS NOTICIAS DEL INSTTIC</p>
             <div class="">
            <button type="button" style="background-color: var(--primary);" class="btn ms-3 mb-5 text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-plus"></i>  Nuevo Detalle
            </button>
                <!-- TABLA -->
                <div class="container tabla col-lg-12 col-12 d-flex align-items-center flex-column">

                <!-- Button trigger modal -->
                    <table class="table table-responsive text-center align-items-center">
                   
                        <thead>
                            <th>FOTO</th>
                            <th>DESCRIPCION</th>
                            <th>COD_NOTICIA</th>
                            <th>CATEGORIA</th>
                            <th>ACCION</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <img class="rounded-pill" src="../../img/balon.jpg" alt="" style="width: 30px; height:30px"> </td>
                                <td> <p>El INSTTIC celebra su aniversario</p> </td>
                                <td> <p>2</p> </td>
                                
                                <td> <p>Deportes</p> </td>
                                <td>
                                    <button type="button" class="btn btn-primary"> <i class="fa-regular fa-pen-to-square"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td> <img class="rounded-pill" src="../../img/balon.jpg" alt="" style="width: 30px; height:30px"> </td>
                                <td> <p>El INSTTIC celebra su aniversario</p> </td>
                                <td> <p>Lorem ipsum dolor sit nisi ratione vero rerum?</p> </td>
                                
                                <td> <p>Deportes</p> </td>
                                <td>
                                    <button type="button" class="btn btn-primary"> <i class="fa-regular fa-pen-to-square"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td> <img class="rounded-pill" src="../../img/balon.jpg" alt="" style="width: 30px; height:30px"> </td>
                                <td> <p>El INSTTIC celebra su aniversario</p> </td>
                                <td> <p>Lorem ipsum dolor sit nisi ratione vero rerum?</p> </td>
                               
                                <td> <p>Deportes</p> </td>
                                <td>
                                    <button type="button" class="btn btn-primary"> <i class="fa-regular fa-pen-to-square"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td> <img class="rounded-pill" src="../../img/balon.jpg" alt="" style="width: 30px; height:30px"> </td>
                                <td> <p>El INSTTIC celebra su aniversario</p> </td>
                                <td> <p>Lorem ipsum dolor sit nisi ratione vero rerum?</p> </td>
                              
                                <td> <p>Deportes</p> </td>
                                <td>
                                    <button type="button" class="btn btn-primary"> <i class="fa-regular fa-pen-to-square"></i></button>
                                </td>
                            </tr>
                           
                       
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
          
        </div>
       

    </div>

</div>

<script src="../js/chart.umd.js"></script>
<script src="../js/aside.js"></script>
<script src="../js/all.js"></script>
<script src="../js/grafico.js"></script>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>