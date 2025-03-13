<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Leer Mas</title>
    <link rel="stylesheet" href="../css/enlaces.css">
    <link rel="stylesheet" href="./css/desarrollo.css">
    <link rel="stylesheet" href="../css/bootstrap5/css/bootstrap.min.css">
</head>
<body>
    

    <?php
        require("../componentes/header.php");
    ?>

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


<div class="container" id="container_blog">
    <div class="row  d-flex">
        <div class="col">
            <div class="contenedor d-flex" id="container_blogGen_aside">
            
                <!--Caja noticias General-->

                <div  id="caja_noticiasGen">
                    
                    <?php require("./pdo_contenido.php") ?>
                <?php if ($pagina && $contenido): ?>
                    <div class="card mb-3 rounded-0" style="" id="card_texto_foto">
                        <div class="row g-0" id="row_card_texto_foto">
                            <div class="col-md-5" id="noticiagen_foto1">
                            <img src="./img/<?php echo htmlspecialchars($pagina['imagen']); ?>" alt="Imagen de la página" class="img-fluid rounded-start"  id="img-fluid ">
                            </div>
                            <div class="col-md-7" id="noticiagen_foto1_texto">
                                <div class="card-body">

                                    <h4><?php echo htmlspecialchars($pagina['titulo']); ?></h4>
                                    <p class="card-text"> <?php echo nl2br(htmlspecialchars($pagina['descripcion'])); ?></p>   
                                
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <p class="card-text">
                                    <?php echo nl2br(htmlspecialchars($contenido['texto'])); ?>
                                    </p>
                                </div>
                            </div>    
                        </div>
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <p class="card-text">
                                    <img src="./img/<?php echo htmlspecialchars($contenido['imagen_secundaria']); ?>" alt="Imagen secundaria"class="img-fluid " width=600 height=1000 id="img_secundaria">    
                                    </p>
                                </div>
                            </div>    
                        </div>
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <p class="card-text">
                                    <?php echo nl2br(htmlspecialchars($contenido['texto'])); ?>
                                    </p>
                                    <p class="card-text"> <?php echo htmlspecialchars($contenido['fecha']); ?><small class="text-body-secondary"></small></p>
                                    <hr>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <?php else: ?>
    <p>Página no encontrada.</p>
    <a href="../blog.php">Volver a la página principal</a>
                    <?php endif; ?>
                </div> <!--Fin cadrtextofoto-->
                    
                <!--Fin Caja noticias General-->

                <!--Caja aside de noticias General-->
            
                <div id="caja_aside">
            
                <div id="texto_noticias_ultimas">
                    <h4>Últimas noticias</h4>
                    <hr>
                </div>
                <!--Blog_aside1-->
                <a href="./desarrollo3.php" id="ancla_aside">
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0" id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./img/cadr1.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Visita del PNUD en el instituto </h5>
                                    <p class="card-text"> 
                                    Antes de culminar el mes el  Programa de las Naciones Unidas para el Desarrollo (PNUD) hizo una visita al INSTTIC... 
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Sabado, 25 de enero</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--fin Blog_aside1-->
                <!--Blog_aside2-->
                <a href="./desarrollo4.php">
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
                <!--fin Blog_aside2-->
                <!--Blog_aside3-->
                <a href="./desarrollo2.php">
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



  <div  style="  margin-top:20rem ;">
  
   <?php
        require("../componentes/footer.php");
    ?>
   
  </div>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>