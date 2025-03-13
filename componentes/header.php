
<?php
     define("ruta_header","http://localhost/www.insttic.com");

?>


       <!-- CAJA DE CONTACTOS ARRIBA DEL HEADER -->
       <div class="container-fluid d-flex py-1 cajaContactos">

      
            <!-- Contactos -->
            <div class="d-flex contactos ms-5">
                <a class="me-3" href="https://wa.me/555658064"> <i class="fa-brands fa-whatsapp"></i> <span>+240 555 777 442</span> </a>
                <a class="me-3" href="mailto:daw548071@gmail.com"> <i class="fa-solid fa-envelope"></i> <span>insttic@gmail.com</span> </a> 
            </div>
            <div class="icono d-flex">
                <div>
                    <a class="nav-link me-3 rounded-pill" href="./admin/">
                    <i class="fa-solid fa-user p-2"></i></a>
                </div>
            </div>
         </div>

    <nav class="navbar navbar-expand-lg header">
        <div class="container-fluid">
            <a class="navbar-brand ps-4 fs-3 text-light" href="#">
                INSTTIC    
            </a>
                <!-- HEADER EN MOVIL -->
                <button class="btn btnMenu text-ligth" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <i class="fa-solid fa-bars text-light"></i>
                </button>

                <div class="offcanvas offcanvas-end text-light ps-3" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="staticBackdropLabel ps-5">Menu de Navegacion</h5>
                        <button type="button" class="btn-close btn-drak" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body anclas ps-5">
                        <div class="d-flex flex-column">
                            <a class="nav-link mt-4" href="<?php echo ruta_header;?>/index.php">Inicio</a>
                            <!-- Menu de las especialidades -->
                            <div class="dropdown mt-3">
                                <button class="nav-link dropdown-toggle text-light me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Especialidades
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/index.php">DAW</a></li>
                                    <li><a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/asir.php">ASIR</a></li>
                                    <li><a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/teleco.php">TSI</a></li>
                                    <li><a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/micro.php">SMTI</a></li>
                                </ul>
                            </div>
                            <!-- Fin del menu -->
                            <a class="nav-link text-light me-3 mt-4" aria-current="page" href="<?= ruta_header;?>/blog.php">Blog</a>
                            <a class="nav-link text-light me-3 mt-4" aria-current="page" href="<?= ruta_header;?>/sobrenosotros/sobrenosotros.php">Sobre Nosotros</a>
                            <a class="nav-link text-light me-3 mt-4" aria-current="page" href="<?= ruta_header;?>/contactanos/index.php">Contáctanos</a>
                    
                            
                            
                        </div>
                    </div>
                </div>

            <!-- HEADER EN PANTALLAS GRANDES -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                   
                    <li class="nav-item cajAnclas">
                        <a class="nav-link text-light me-3" aria-current="page" href="<?php echo ruta_header;?>/index.php">Inicio</a>
                    </li>
                    <li class="nav-item cajAnclas">
                        <a class="nav-link text-light me-3" aria-current="page" href="<?= ruta_header;?>/sobrenosotros/sobrenosotros.php">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-light me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Especialidades
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/index.php">DAW</a></li>
                            <li><a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/asir.php">ASIR</a></li>
                            <li><a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/teleco.php">TSI</a></li>
                            <li><a class="dropdown-item" href="<?= ruta_header;?>/instticEspe/micro.php">SMTI</a></li>
                        </ul>
                    </li>
                    <li class="nav-item cajAnclas">
                    <a class="nav-link text-light me-3" aria-current="page" href="<?= ruta_header;?>/blog.php">Blog</a>
                    </li>
                    <li class="nav-item cajAnclas">
                        <a class="nav-link text-light me-3" aria-current="page" href="<?= ruta_header;?>/contactanos/index.php">Contáctanos</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- ICONO DE WHATSAPP FLOTANTE -->
    <!-- <div class="btnWhtasapp">
        <a href="https://wa.me/555658064">
            <img class="" src="./img/whatsapp.png" alt="WhatsApp">
        </a>
    </div>
     -->

 


        
        
  


        

       