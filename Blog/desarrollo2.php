<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Leer Mas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/desarrollo2.css">
    <link rel="stylesheet" href="../css/enlaces.css">
</head>
<body>
    
<!--Menu
<nav class="navbar navbar-expand-lg  fixed-top" >
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="#" id="logo">
        <img src="../IMGPublica/logo.jpeg" alt="" id="logo_img">
        </a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel" id="logo_menuHambburguesa">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2" href="#">Sobre Nosotros</a>
                    </li>
                    <div class="dropdown">
        <button class="btn dropdown-toggle  text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="buttonDrop">
        Especialidades
        </button>
        <ul class="dropdown-menu">
            <li id="li"><button class="dropdown-item" type="button"><a href="#">DAW</a></button></li>
            <li id="li"><button class="dropdown-item" type="button"><a href="#">DIW</a></button></li>
            <li id="li"><button class="dropdown-item" type="button"><a href="#">TSIR</a></button></li>
            <li id="li"><button class="dropdown-item" type="button"><a href="#">TELECOS</a></button></li>
        </ul>
        </div>

                    <li class="nav-item">
                        <a class="nav-link active mx-lg-2" href="#" id="navLink_active">Blog</a>
                    </li>
                </ul> 
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </div>
</nav>
Fin menu-->
<div>
    <?php
        require("../componentes/header.php");
    ?>
</div>
<!--contenedor para titulo_BLOGs-->
<div class="container">
    <div class="row">
        <div class="col">
            <!--  <div class="contenedor p-2 d-flex justify-content-start" id="enlaces">
                <div id="inicio_en"><a href="#" class="a">Inicio </a> </div>
                <div id="blog_en"> >Blog</div>
                <hr>
            </div>-->

            <div class="contenedor p-2 " id="titulo_BLOG">
                <h1>BLOG INSTTIC</h1>
            </div>
        </div>
    </div>
</div>
<!--fIN contenedor para titulo_BLOG-->


<div class="container">
    <div class="row  d-flex">
        <div class="col">
            <div class="contenedor d-flex" id="container_blogGen_aside">
            
                <!--Caja noticias General-->

                <div  id="caja_noticiasGen">
                    <div class="card mb-3 rounded-0" style="" id="card_texto_foto">
                        <div class="row g-0" id="row_card_texto_foto">
                            <div class="col-md-5" id="noticiagen_foto1">
                                <img src="./img/card2.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7" id="noticiagen_foto1_texto">
                                <div class="card-body">
                                    <h4 class="card-title">Preparativos para el aniversario del INSTTIC </h4>
                                    <p class="card-text">
                                        Cada 23 de febrero se celebra el aniversario del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC) ese dia fue cuando se dio a conocer al
                                        instituto. 
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary"></small></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <p class="card-text">
                                    Hablando de la tecnologia y su integracion en el aprendizaje afirma que el y con la colaboracion del  Ministro de Transportes, Correos y Nuevas Tecnologías de Información y Comunicación Honorato Evita Oma
                                    ,han implementado plataformas digitales, aulas virtuales y herramientas interactivas para facilitar el aprendizaje. También capacitan a los docentes en el uso de nuevas tecnologías para que puedan aprovecharlas al máximo.
                                    Explica que el instituto esta enfocado en mejorar la infraestructura, aumentar la oferta de actividades extracurriculares y fortalecer el vínculo entre la comunidad educativa y el instituto.
                                    </p>
                                </div>
                            </div>    
                        </div>
                        <div class="row " id="card_texto_foto2">
                            <div class="col-md-7" id="noticiagen_foto2_texto">
                                <div class="card-body">
                                    <p class="card-text">
                                    El presidente en su entrevista por el aniversario del INSTTIC dijo: Gracias a la tecnología, continuó el miembro del Gobierno, las empresas se hacen más eficientes ayudando a la creación de nuevas oportunidades de empleo, por eso, insistió que la tecnología debe identificarse como un factor clave para el desarrollo y la diversificación, porque es fundamental en cualquier desarrollo económico, ya sea en el sector primario, como en el sector secundario, con la transformación productiva y el sector de servicios.
                                    Según S. E. Obiang Nguema Mbasogo, el Instituto Superior de Telecomunicaciones, se ha creado para la formación intelectual y profesional porque hoy en día, estas materias están presentes en todos los sectores, y la nueva vida administrativa política y económica se basan en las nuevas tecnologías por eso dijo, "tenemos que formar a nuestros jóvenes si queremos alcanzar el nivel de otros países”.
                                    </p>
                                    <p class="card-text">Jueves, 23 de febrero<small class="text-body-secondary"></small></p>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-5" id="noticiagen_foto2">
                                <img src="./img/aside1.jpeg" class="img-fluid " alt="...">
                            </div>
                        </div>
                    
                    </div>
                </div> <!--Fin cadrtextofoto-->
                    
                <!--Fin Caja noticias General-->

                <!--Caja aside de noticias General-->
            
                <div id="caja_aside">
            
                <div id="texto_noticias_ultimas">
                    <h4>Últimas noticias</h4>
                    <hr>
                </div>
                <!--Blog_aside1
                <a href="./desarrollo.php" id="ancla_aside" style="text-decoration: none;">
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0" id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./img/card3.jpeg" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Entrevista al director del INSTTIC</h5>
                                    <p class="card-text"> 
                                    El licenciado Director del INSTTIC en una entrevista realizada el jueves en las inmediaciones
                                    de ciudad La paz nos confirma los rumores...
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Sabado, 25 de enero</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                fin Blog_aside1-->
                <!--Blog_aside2-->
                <a href="./desarrollo3.php" style="text-decoration: none;">
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0"  id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./img/cadr1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Visita de la PNUD en el instituto</h5>
                                    <p class="card-text"> 
                                    Antes de culminar el mes el  Programa de las Naciones Unidas para el Desarrollo (PNUD) hizo una visita al Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC)...
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Viernes, 24 de enero</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--fin Blog_aside2-->
              <!--Blog_aside3-->
              <a href="./desarrollo4.php" style="text-decoration: none;">
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0"  id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./img/mar.webp" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">La ciudad de Oyala organiza una maraton para los estudiantes por el 12 de octubre</h5>
                                    <p class="card-text"> 
                                    El presidente de Oyala tuvo la idea de organizar una maraton por el dia de la Independencia del pais...
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Miercoles, 10 de enero</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--fin Blog_aside3-->

                <div>  
                        
                <!--Fin Caja aside de noticias General--> 

            </div><!---->
        </div>
    </div>
</div>
</div>
</div>
<!--Fin Contenedor Blog y Aside-->
<!-- FOOTER -->
<div  style="  margin-top:20rem ;">
  
  <?php
       require("../componentes/footer.php");
   ?>
  
 </div>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="/fontawesome-5/js/fontawesome.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<script src="/bootstrap5/js/bootstrap.min.js"></script>
</body>
</html>