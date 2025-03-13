<?php 
 define("ruta_base","http://localhost/www.insttic.com/admin/secretaria");


?>


<div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="../img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">
                <li><a class="mt-5" href="<?php echo ruta_base;?>/main.php"> <i class="fa fa-dashboard"></i><span> Dashboard</span> </a></li>
                <li><a class="mt-3" href="<?= ruta_base;?>/matricula/main.php"><i class="fa-solid fa-user-graduate"></i> <span> Estudiantes</span> </a></li>
                <li><a class="mt-3" href="<?= ruta_base;?>/php/generacion.php"><i class="fa-solid fa-user"></i> <span> Generacion</span> </a></li>
                <li><a class="mt-3" href="<?= ruta_base;?>/historial/main.php"><i class="fa-solid fa-table"></i> <span> Historial</span> </a></li>
                <li><a class="mt-3" href="<?= ruta_base;?>/notas/index.php"><i class="fa-solid fa-book"></i> <span> Notas</span> </a></li>
                <li><a class="mt-3" href="<?= ruta_base;?>/actas/main.php"><i class="fa-solid fa-user-graduate"></i> <span> Actas</span> </a></li>
                <li><a class="mt-3" href="<?= ruta_base;?>/aulas/main.php"><i class="fa-regular fa-door-open fa"></i> <span> Aulas</span> </a></li>


        </nav>

    </div>