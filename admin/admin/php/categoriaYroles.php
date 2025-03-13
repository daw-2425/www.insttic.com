

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
    <link rel="stylesheet" href="../css/rolYcategoria.css">
</head>
<body>
    
<div class="general conteiner-fluid d-flex">
    
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

            <!--MODAL CATEGORIA -->
            <div class="modal fade" style="font-family: cambria" id="categoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categoriaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5 ms-4" id="categoriaLabel">Categoria de Noticia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="formulCategoria">

                                <input class="form-control" placeholder="Codigo de la Categoria" id="codigoCat" name="codigoCat" type="number">
                                <div class="alert alert-danger mt-2" id="errorCodCat"></div>

                                <input class="form-control mt-3" placeholder="Categoria de la Noticia" id="cat" name="cat" type="text">
                                <div class="alert alert-danger mt-2" id="errorCat"></div>
                        
                                <button type="submit" style="background-color: var(--primary)" class="btn form-control mt-4 text-light" name="btnRegistrar">REGISTRAR CATEGORIA</button>
                        </form>
                    </div>
                    
                    </div>
                </div>
            </div>

            <!--MODAL ROL -->
            <div class="modal fade" style="font-family: cambria" id="modalRol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categoriaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5 ms-4" id="categoriaLabel">Rol de empleado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" id="formulRol">

                                <input class="form-control" placeholder="Codigo del Rol" id="codigoRol" name="codigoRol" type="number">
                                <div class="alert alert-danger mt-2" id="errorCodRol"></div>

                                <input class="form-control mt-3" placeholder="Rol" id="rol" name="rol" type="text">
                                <div class="alert alert-danger mt-2" id="errorRol"></div>
                        
                                <button type="submit" style="background-color: var(--primary)" class="btn form-control mt-4 text-light" name="btnRegistrar">REGISTRAR ROL</button>
                        </form>
                    </div>
                    
                    </div>
                </div>
            </div>

            <!-- TABLAS -->
        
        <div class="container d-flex tablaYgrafico mt-5" style="font-family: cambria">
        
            <div class="" style="width: 500px" >
                <button type="button" style="background-color: var(--primary);" class="btn ms-3 mb-5 text-light" data-bs-toggle="modal" data-bs-target="#categoria">
                    <i class="fa-solid fa-plus"></i>  Categoria
                </button>
                <p class="h4 text-center mb-4 fw-bold">CATEGORIA DE LAS NOTICIAS</p>
                <!-- TABLA CATEGORIA-->
                <div class="container tabla col-lg-12 col-12 d-flex align-items-center flex-column">
                    <!-- Button trigger modal -->
                        <table class="table table-responsive text-center align-items-center">
                            <thead>
                                <th>COD_CATEGORIA</th>
                                <th>TIPO_NOTICIA</th>
                                <th>ACCION</th>
                            </thead>
                            <tbody id="tablaCategoria">
                        
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

            <!-- ROL -->
            <div class="" style="width: 500px">
                <button type="button" style="background-color: var(--primary);" class="btn ms-3 mb-5 text-light" data-bs-toggle="modal" data-bs-target="#modalRol">
                <i class="fa-solid fa-plus"></i>  Rol
                </button>
                <p class="h4 text-center mb-4 fw-bold">ROLES</p>
                    <!-- TABLA -->
                    <div class="container tabla col-lg-12 col-12 d-flex align-items-center flex-column">

                    <!-- Button trigger modal -->
                        <table class="table table-responsive text-center align-items-center">
                            <thead>
                                <th>COD_ROL</th>
                                <th>ROL</th>
                                <th>ACCION</th>
                            </thead>
                            <tbody id="tablaRol">                          
                        
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

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/admin/js/script.php";
?>
<script src="../js/rolYcategoria.js"></script>
<!-- <script src="../js/categoriaNoticia.js"></script> -->
</body>
</html>