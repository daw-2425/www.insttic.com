<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Leer Mas</title>
    <link rel="stylesheet" href="../css/enlaces.css">
    <link rel="stylesheet" href="./css/tecnologia2.css">
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
                    <div class="card mb-3 rounded-0" style="" id="card_texto_foto">
                      <!--    <div class="row g-0" id="row_card_texto_foto">
                            <div class="col-md-5" id="noticiagen_foto1">
                                <img src="../../img/tecno.jpg" class="img-fluid rounded-start" alt="..." id="img-fluid ">
                            </div>
                          <div class="col-md-7" id="noticiagen_foto1_texto">
                                <div class="card-body">
                                    <h4 class="card-title">Entrevista al director del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC):Retos y Desafíos de la Educación </h4>
                                    <p class="card-text">
                                        Segun la entrevista realizada el sabado, 1 de febrero al Director del Instituto Sergio en la ciudad de Oyala. El "INSTTIC ha sido su desafio mas grande a nivel educacional". Segun el,
                                        Los desafíos son diversos. Desde la adaptación a nuevas metodologías de enseñanza, hasta el uso de la tecnología en el aula y la gestión de la convivencia entre los estudiantes. También es crucial fomentar la motivación y el bienestar del alumnado.
                                        
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary"></small></p>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h4 class="card-title">La especialidad de administración de sistemas informáticos en red sube un video tecnológico a Youtube</h4>
                                    <p class="card-text">
                                    Apodaron el video con el nombre de "INSTTIC: administración de sistemas informáticos en red, un día con nosotros 📚🎥". Un video rodado en el 
                                    Instituto Superior de Telecomunicaciones y Tecnologías de la Información y la Comunicación (INSTTIC) en el primer semestre en el que explican
                                    cómo armar el cable Ethernet RJ45. Que se utiliza para conectar dispositivos a la red, como computadoras, routers, dispositivos de almacenamiento en red, o smart TV.
                                    </p>
                                </div>
                            </div>    
                        </div>
                        <div class="row g-0">
                            <img src="./img/hq720.jpg" alt="">
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
                <a href="./desarrollo3.php" id="ancla_aside">
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



<div  style="  margin-top:30rem ;">
  
   <?php
        require("../componentes/footer.php");
    ?>
   
  </div>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>