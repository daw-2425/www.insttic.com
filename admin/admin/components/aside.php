<?php 
 define("ruta_base","http://localhost/www.insttic.com/admin/admin");
?>


<div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="../img/logo.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">
                <li><a class="mt-5" href="<?php echo ruta_base;?>/index.php"> <i class="fa fa-dashboard "></i><span> Dashboard</span> </a></li>
                <li><a class="mt-4" href="<?= ruta_base;?>/php/categoriaYroles.php"><i class="fa-solid fa-newspaper"></i> <span> Categorias y Roles</span> </a></li>
                <!-- <li><a class="mt-4" href="<?= ruta_base;?>/php/detalleNoticia.php"><i class="fa-solid fa-newspaper"></i> <span> Dettalle Noticia</span> </a></li> -->
                <li><a class="mt-4" href="<?= ruta_base;?>/php/estudiantes.php"><i class="fa-solid fa-user-graduate "></i> <span> Estudiantes</span> </a></li>
                <li><a class="mt-4" href="<?= ruta_base;?>/php/empleados.php"><i class="fa-solid fa-users"></i> <span> Empleados</span> </a></li>
                <li><a class="mt-4" href="<?= ruta_base;?>/php/usuarios.php"><i class="fa-solid fa-user-lock"></i> <span> Usuarios</span> </a></li> 
                <li><a class="mt-4" href="<?= ruta_base;?>/php/noticias.php"><i class="fa-solid fa-newspaper"></i> <span> Noticia</span> </a></li>
                
              
        </nav>

    </div>