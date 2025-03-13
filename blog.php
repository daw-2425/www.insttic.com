
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias INSTTIC</title>
    <link rel="stylesheet" href="./Blog/css/blog.css">
    <link rel="stylesheet" href="./css/enlaces.css">
</head>
<body>

    <?php require("./componentes/header.php") ?>
    <!--Slider 1-./IMG/slibc.jpeg 2-./IMG/card2.png 3-./IMG/slida.webp-->
<div class="slider-container" id="slider-container">
        <div class="slider" id="slider">
            <div class="slide" id="slide1">
                <img src="./Blog/img/card3.jpeg" alt="">
                <div class="overlay">
                    <h2>
                    Entrevista al director del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC):Retos y Desafíos de la Educación   
                    </h2>
                    <p style="margin-top:10px;">
                    Segun la entrevista realizada el sabado, 1 de febrero al Director del Instituto Sergio en la ciudad de Oyala. El "INSTTIC ha sido su desafio mas grande a nivel educacional". Segun el,
                    Los desafíos son diversos. Desde la adaptación a nuevas metodologías de enseñanza, hasta el uso de la tecnología en el aula y la gestión de la convivencia entre los estudiantes. También es crucial fomentar la motivación y el bienestar del alumnado.        
                    </p>
                    <?php require("./Blog/db.php")?>
            <?php require("./Blog/noticiasTres.php")?>
                <?php foreach ($paginas as $pagina): ?>
                    <a href="./Blog/contenido.php?id=<?php echo $pagina['id']; ?>" class="btn" id="btn_leerMas">Leer más</a>
                    <?php endforeach;?> 
                </div>
                
            </div>
            <div class="slide" id="slide2">
                <img src="./Blog/img/card2.png" alt="">
                <div class="overlay">
                    <h2>Preparativos para el aniversario del INSTTIC</h2>
                    <p>
                    Cada 23 de febrero se celebra el aniversario del Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC) ese dia fue cuando se dio a conocer al
                    instituto. 
                    El presidente en su entrevista por el aniversario del INSTTIC dijo: Gracias a la tecnología, continuó el miembro del Gobierno, las empresas se hacen más eficientes ayudando a la creación de nuevas oportunidades de empleo, por eso, insistió que la tecnología debe identificarse como un factor clave para el desarrollo y la diversificación, porque es fundamental en cualquier desarrollo económico, ya sea en el sector primario, como en el sector secundario, con la transformación productiva y el sector de servicios. 
                    </p>
                    <?php require("./Blog/db.php")?>
            <?php require("./Blog/noticiasTres.php")?>
                <?php foreach ($paginas as $pagina): ?>
                    <a href="./Blog/contenido.php?id=<?php echo $pagina['id']; ?>" class="btn" id="btn_leerMas">Leer más</a>
                    <?php endforeach;?> 
                </div>
            </div>
            <div class="slide" id="slide3">
                <img src="./Blog/img/cadr1.jpg" alt="">
                <div class="overlay">
                    <h2>Visita del PNUD en el instituto</h2>
                    <p style="margin-top:17px;"> 
                    Antes de culminar el mes el  Programa de las Naciones Unidas para el Desarrollo (PNUD) hizo una visita al Instituto Superior de Telecomunicaciones, Tecnologia de Informacion Y Comunicacion(INSTTIC).
                                        Con el fin de darse a conocer entre los jovenes.
                                        La PNUD desde siempre ha hecho esa visita en el pais con la corazonada de cambiar la forma de pensar de los jovenes.
                                        El PNUD es una red mundial que trabaja en más de 170 países y territorios. Su objetivo es ayudar a los países a alcanzar los Objetivos de Desarrollo Sostenible, reduciendo la pobreza y las desigualdades, y promoviendo el cambio climático. 
                    </p>
                    
                    <?php require("./Blog/db.php")?>
            <?php require("./Blog/noticiasTres.php")?>
                <?php foreach ($paginas as $pagina): ?>
                    <a href="./Blog/contenido.php?id=<?php echo $pagina['id']; ?>" class="btn" id="btn_leerMas">Leer más</a>
                    <?php endforeach;?> 
                </div>
            </div>
        </div>
        <div class="buttons">
            <button id="prev">&#10094;</button>
            <button id="next">&#10095;</button>
        </div>
</div>
<!--Fin Slider-->

<!--contenedor para titulo_BLOGs-->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="contenedor p-2 " id="titulo_BLOG">
                <h1>BLOG INSTTIC</h1>
            </div>
        </div>
    </div>
</div>
<!--fIN contenedor para titulo_BLOG-->

<div class="container">
    <div class="row d-flex">
        <div class="col">
            <div class="contenedor d-flex" id="texto_blog_aside">
                <div class="col texto_noticias">
                <h3>Últimas noticias</h3>
                <hr>
                </div>
                <div class="col texto_aside">
                <h3> Más noticias</h3>
                <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row  d-flex" id="row_general">

        <div class="col">
            <div class="contenedor d-flex" id="container_blog_aside">
            <div  id="caja_noticias">
            <?php require("./Blog/db.php")?>
            <?php require("./Blog/noticiasTres.php")?>
                <?php foreach ($paginas as $pagina): ?>
                <div class="TarjetaGeneral">
                    
                    <div class="cimagen">  
                    <img src="./Blog/img/<?php echo htmlspecialchars($pagina['imagen']); ?>" alt="Imagen de la página" >
                    </div>
                    <div class="ctexto">
                        <h2><?php echo htmlspecialchars($pagina['titulo']); ?></h2>
                        <p> <?php echo nl2br(htmlspecialchars($pagina['descripcion'])); ?></p>
                        <a href="./Blog/contenido.php?id=<?php echo $pagina['id']; ?>" class="btn" id="btn_leerMas">Leer más</a>
                    </div>
                    
                </div>  
                <?php endforeach;?>
            </div> 
         
                <div class="col caja_aside_general">
                    <div class=" input-grupo">
                    <input type="text" class="formulario-control" placeholder="Buscar noticia o categoria...">
                    <button class="bttn">Buscar</button>
                    </div>
                    <!--Caja aside de not-->
                    
                <div class="row" id="caja_aside">
                    <div class="col categorias">
                        <div class="row categoria1">
                        <p class="cat_tecnológica">categoria tecnológica</p>
                        <!--Blog_aside1-->
                <a href="./Blog/tecnologia.php" id="ancla_aside" style="text-decoration:none;">
                <div class="card mb-3" style="" id="card">
                    <div class="row g-0">
                        <div class="col-md-4" id="caja_imagen">
                        <img src="./Blog/img/tecno.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">INSTTIC y Huawei clausuran la primera formación en HCIA Datacom para profesores en Guinea Ecuatorial</h5>
                            <p class="card-text">                     
                            </p>
                            <p class="card-text"><small class="text-body-secondary">Sábado, 15 de febrero</small></p>
                            <hr>  
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <!--  fin Blog_asi1-->
                <!-- Blog_aside2-->
                <a href="./Blog/tecnologia3.php" style="text-decoration:none;">
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0"  id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./Blog/img/tecno4.jpeg" class="img-fluid" alt="..." style=" ">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">                     
                                    El INSTTIC gana en la parte de Hackathon
                                    en el Concurso Tecnológico Interescolar - Hackathon y Mekhaton.</h5>
                                    <p class="card-text"> 
                                    
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Miércoles, 13 de noviembre</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- fin Blog_aside2-->
                <!-- Blog_aside3-->
                    <a href="./Blog/tecnologia2.php" style="text-decoration:none;">
                    <div class="card mb-3" style="" id="card">
                        <div class="row g-0"  id="row_card_aside">
                            <div class="col-md-4" id="caja_imagen">
                                <img src="./Blog/img/hq720.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">La especialidad de administración de sistemas informáticos en red sube un video tecnológico a Youtube</h5>
                                    <p class="card-text"> 
                                    
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Miércoles, 13 de noviembre</small></p>
                                    <hr>  
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- fin Blog_aside3-->

                        
                        <div class="row categoria2">
                        <p class="cat_deporte">categoria deportiva</p>
                        <!--Blog_aside1-->
                <a href="./Blog/deporte.php" id="ancla_aside" style="text-decoration:none;">
                <div class="card mb-3" style="" id="card">
                    <div class="row g-0">
                        <div class="col-md-4" id="caja_imagen">
                        <img src="./Blog/img/sport (3).jpeg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">La Universidad Afroamerica Africa Central(AAUCA) invita al INSTTIC a un partido amistoso de Baloncesto. </h5>
                            
                            <p class="card-text"><small class="text-body-secondary">Viernes, 31 de enero</small></p>
                            <hr>  
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <!--  fin Blog_asi1-->
                <!--Blog_aside2-->
                
                <!--fin Blog_aside2-->
                <!-- Blog_aside3--> 
                    
                <!-- fin Blog_aside3-->
                        </div>
                        <div class="row categoria3">
                        <p class="cat_cultural">categoria cultural</p>
                        <!--Blog_aside1-->
                <a href="./Blog/cultural.php" id="ancla_aside"  style="text-decoration:none;">
                <div class="card mb-3" style="" id="card">
                    <div class="row g-0">
                        <div class="col-md-4" id="caja_imagen">
                        <img src="./Blog/img/car.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Evento especial por el dia del libro en el INSTTIC </h5>
                            
                            <p class="card-text"><small class="text-body-secondary">Domingo, 23 de febrero</small></p>
                            <hr>  
                        </div>
                        </div>
                    </div>
                </div>
                </a>
                <!--  fin Blog_asi1-->
            
                        </div>
                    </div> 
                </div>  <!-- fin aside de noticias-->  
                
                
            
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!--Fin Contenedor Blog y Aside-->
<div  id="footer">
<?Php require("./componentes/footer.php") ?>
</div>

<script src="./js/bootstrap.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./Blog/js/blog.js"></script>

</body>
</html>