
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/enlaces.css">
    <link rel="stylesheet" href="../componentes/styles.css">
    <link rel="stylesheet" href="./css/sobrenosotros.css">
</head>
<body>
<div>
    <?php
        require("../componentes/header.php");
    ?>
</div>

<div class="banner">
    <div class="texto-animado">
        <h2 style="margin-top: 60px; font-family: cambria; font-weight: bold;" class="animated-text">
            INSTITUTO SUPERIOR DE TELECOMUNICACIONES INFORMACION Y COMUNICACION<br>
            (INSTTIC)
        </h2>
    </div>
</div>
<style>
    .animated-text {
        opacity: 0;
        transform: translateX(-100px); /* Inicia fuera de la pantalla a la izquierda */
        animation: slideInLeft 2s ease-in-out forwards;
    }

    @keyframes slideInLeft {
        to {
            opacity: 1;
            transform: translateX(0); /* Termina en su posición original */
        }
    }
</style>
<!-- Historia -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <p class="titul">NUESTRA HISTORIA</p><br>
            <div class="card-body">
                <h5 class="card-title" style="font-family: cambria; font-weight: 500">INSTITUTO SUPERIOR DE TELECOMUNICANIONES INFORMACION COMUNICACION (INSTTIC)</h5><br>
                <p class="card-text" style="margin-bottom:20px; font-family: cambria">
                    El Instituto Superior de Telecomunicaciones de Guinea Ecuatorial (INSTTIC) en Oyala fue inaugurado el 23 de febrero de 2017.
                    Este instituto se enfoca en la formación técnica y profesional en el ámbito de las telecomunicaciones y la tecnología.
                    En Oyala se encuentra la sede del Instituto de Tecnología de Guinea Ecuatorial,
                    ubicado en la ciudad de Djibloho, que es una de las nuevas ciudades 
                    planificadas en el país. Este instituto fue creado para impulsar la 
                    educación técnica y profesional en distintos ámbitos, buscando fortalecer
                    las habilidades y capacidades de la población ecuatoguineana en un mundo 
                    cada vez más digital y tecnológico.
                    La construcción de este instituto forma parte de los esfuerzos
                    del gobierno para modernizar la infraestructura educativa del país.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <img  style="border-radius: 15px;"src="../img/sobrenosotros/Mbasogo.jpg" class="img-fluid" alt="Imagen del Card">
        </div>
    </div>
</div>
<!-- Vision -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <p class="titul">NUESTRA VISION</p><br>
            <div class="card-body">
                <h5 class="card-title">INSTITUTO SUPERIOR DE TELECOMUNICANIONES INFORMACION COMUNICACION</h5><br>
                <p class="card-text">
                    Ser un referente educativo en la formación de ciudadanos comprometidos con su educacion.
                </p>
                <p>
                    Brindar una educación integral que fomente el desarrollo académico, emocional y social de nuestros estudiantes, preparándolos para enfrentar los retos del futuro.
                    En nuestro centro educativo, nos dedicamos a formar a las futuras generaciones con valores y conocimientos.
                </p>
            </div>
        </div>
        <div style="width: 500px ; height: 300px; display: flex; align-items: center; justify-content: center;" class="col-md-6">
            <img style="height: 350px;  width: 450px; border-radius: 15px;" src="../img/bax.jpg" class="img-fluid" alt="Imagen del Card">
        </div>
    </div>
</div>

<!-- Lo que hacemos -->
<div class="container mt-5">
    <p class="titul">LO QUE HACEMOS</p><br>
    <p>Ofrecemos programas educativos innovadores, actividades extracurriculares y un ambiente de aprendizaje inclusivo y motivador.</p>
    <div class="row mt-4">
        <div class="col-md-4">
            <img style="height: 300px; width: 350px; border-radius: 15px;" src="../img/asir.jpg" class="img-fluid" alt="Actividad Educativa">
            <p class="text-center">Actividades Educativas</p>
        </div>
        <div class="col-md-4">
            <img style=" height: 300px; width: 360px; border-radius: 15px;" src="../img/micro2.jpg" class="img-fluid" alt="Trabajo en Equipo">
            <p class="text-center">Trabajo en Equipo</p>
        </div>
        <div class="col-md-4">
            <img style="height: 300px; width: 500px; border-radius: 15px;" src="../img/telec2.jpg" class="img-fluid" alt="Proyectos Creativos">
            <p class="text-center">Proyectos Creativos</p>
        </div>
    </div>
</div>

<!-- Nuestro Personal -->
<div class="container mt-5 text-center">
    <p class="titul">Nuestro Personal</p>
    <p>En nuestro instituto, nos dedicamos a brindar una educación integral,
        fomentando el desarrollo académico y personal de nuestros estudiantes.
        Creemos en la formación de ciudadanos responsables y creativos.</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <i class="icono fas fa-book" style="color: #0A2A66;"></i>
                <h5>Educación de Calidad</h5>
                <p>Ofrecemos programas educativos de alta calidad con un enfoque en el aprendizaje activo y colaborativo.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <i class="icono fas fa-users" style="color: #0A2A66;"></i>
                <h5>Comunidad Inclusiva</h5>
                <p>Fomentamos un ambiente inclusivo donde todos los estudiantes se sientan valorados y respetados.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <i class="icono fas fa-chalkboard-teacher" style="color: #0A2A66;"></i>
                <h5>Profesores Dedicados</h5>
                <p>Nuestros docentes están comprometidos con el éxito de cada estudiante, brindando apoyo y guía constante.</p>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div class="mt-5">
    <?php
        require("../componentes/footer.php");
    ?>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>