<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Leer Mas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/desarrollo3.css">
    <link rel="stylesheet" href="./css/bootstrap5/css/bootstrap.min.css">
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
                            <div class="col-md" id="noticiagen_foto1">
                                <img src="./img/cadr1.jpg" class="img-fluid " alt="..." id="img-fluid ">
                            </div>
                            <div class="col-md-7" id="noticiagen_foto1_texto">
                                <div class="card-body">
                                    <h4 class="card-title">Visita del PNUD en el instituto </h4>
                                    <p class="card-text">
                                        Antes de culminar el mes el  Programa de las Naciones Unidas para el Desarrollo (PNUD) hizo una visita al Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC).
                                        Con el fin de darse a conocer entre los jovenes.
                                        La PNUD desde siempre ha hecho esa visita en el pais con la corazonada de cambiar la forma de pensar de los jovenes.
                                        El PNUD es una red mundial que trabaja en más de 170 países y territorios. Su objetivo es ayudar a los países a alcanzar los Objetivos de Desarrollo Sostenible, reduciendo la pobreza y las desigualdades, y promoviendo el cambio climático. 
                                        
                                        
                                        
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary"></small></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <p class="card-text">
                                    contra las mujeres.
En segundo lugar, trabaja con los asociados sobre las interacciones entre
gobernanza, derechos humanos y respuestas sanitarias. La clave de las soluciones
para un desarrollo eficaz se encuentra en establecer una estrategia de salud
basada en los derechos humanos, que se centre en reducir la desigualdad y en
alcanzar a los más excluidos de la sociedad. El PNUD impulsa la respuesta al
VIH prestando especial atención al papel que desempeñan los marcos legales.
De este modo, trabaja con los gobiernos, la sociedad civil y los asociados de
las Naciones Unidas para cumplir las recomendaciones de la Comisión Global
sobre VIH y el Derecho, así como la legislación vigente en distintos ámbitos:
criminalización; igualdad de género y capacitación de la mujer; derechos de
los trabajadores sexuales, de los hombres que tienen relaciones sexuales con
hombres, de las personas que consumen drogas y de las personas transgénero;
y acceso al tratamiento. Por otra parte, más allá de estas acciones concretas,
el PNUD desempeña un papel fundamental a la hora de asegurar la atención
al VIH y a la salud a través de iniciativas más amplias en materia de gobernanza
y derechos. Algunas de estas serían, por ejemplo, reforzar la gobernanza local
y las capacidades nacionales para asegurar que las personas afectadas por el
VIH disfruten de un acceso más equitativo a los servicios; consolidar el estado
de derecho; o reformar los sistemas legales con el fin de reaccionar ante la
discriminación contra las personas afectadas por el VIH.
Finalmente, el PNUD apoya a los países para que pongan en marcha programas
complejos y eficaces de salud, mientras invierte en el desarrollo de su capacidad.
De este modo, los asociados, tanto locales como nacionales, pueden asumir
esta responsabilidad en el futuro. La asociación del PNUD con el Fondo Mundial
constituye una parte importante de esta labor, ya que facilita el acceso a los
recursos a los países que tienen dificultades para recibir directamente esta
financiación y para gestionarla. Así, dichos países pueden llevar a cabo acciones
en materia de sida, tuberculosis y malaria. De hecho, el PNUD colabora con países
en situación de crisis o de post-crisis, con aquellos con una capacidad institucional
débil o con problemas de gobernanza, así como con países sometidos a sanciones.
También actúa como receptor principal temporal en estos lugares si se le solicita,
además de ofrecer apoyo en la puesta en marcha y desarrollo de sus capacidades,
así como en la cooperación política y técnica. Todo ello ha contribuido a mejorar
de manera significativa los servicios relacionados con el VIH, la tuberculosis y la
malaria en algunos de los entornos más complejos y con mayor riesgo de los países
en desarrollo.
                                    </p>
                                </div>
                            </div>    
                        </div>
                        <div class="row " id="card_texto_foto2">
                            <div class="col-md-12" id="noticiagen_foto2">
                                <img src="./img/masnot2.jpg" class="img-fluid " alt="...">
                            </div>
                            <p class="card-text">Sabado, 25 de enero<small class="text-body-secondary"></small></p>
                            <hr>
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
                                <img src="./img/blog_img/card3.jpeg" class="img-fluid" alt="...">
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
                                    <p class="card-text"><small class="text-body-secondary">Viernes, 24 de enero</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--fin Blog_aside2-->
                <!--Blog_aside3-->
                <a href="./desarrollo2.php" style="text-decoration: none;" >
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0"  id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./img/card2.png" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Preparativos para el aniversario del INSTTIC</h5>
                                    <p class="card-text"> 
                                    Cada 23 de febrero se celebra el aniversario del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC) ese dia fue cuando se dio a conocer al instituto...
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Lunes, 2 de febrero</small></p>
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
<div  style="  margin-top:40rem ;">
  
  <?php
       require("../componentes/footer.php");
   ?>
  
 </div>

<script src="/fontawesome-5/js/fontawesome.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<script src="/bootstrap5/js/bootstrap.min.js"></script>
</body>
</html>