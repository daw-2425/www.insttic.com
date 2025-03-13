
<?php  define("ruta_base","http://localhost/www.insttic.com/admin/estudiante");?>

<div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="./img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">
                <li><a href="<?= ruta_base;?>/index.php"><i class="fa fa-dashboard"></i> <span> Dashboard</span> </a></li>
                <li><a href="<?= ruta_base;?>/estudio/"><i class="fa-solid fa-calendar-alt"></i> <span> Plan de ciclo</span> </a></li>
                <li><a href="<?= ruta_base;?>/historial/"><i class="fa-solid fa-file-contract"></i> <span> Historial academico</span> </a></li>
                <li><a href="<?= ruta_base;?>/permisos/"><i class="fa-solid fa-file-signature"></i> <span> Solicitud de permiso</span> </a></li>
        </nav>

    </div>