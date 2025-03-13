<?php 
 define("ruta_base","http://localhost/www.insttic.com/Admin/secretaria");


?>


<div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="./img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">

            
                <li><a href="<?php echo ruta_base;?>/main.php"> <i class="fa fa-dashboard"></i><span>Dashboard</span> </a></li>
<<<<<<< HEAD
                <li><a href="<?= ruta_base;?>/matricula/main.php"><i class="fa-solid fa-user-graduate"></i> <span> Estudiantes</span> </a></li>
                <li><a href="<?= ruta_base;?>/historial/main.php"><i class="fa-solid fa-table"></i> <span> Historial</span> </a></li>
                <li><a href="<?= ruta_base;?>/notas/index.php"><i class="fa-solid fa-book"></i> <span> Notas</span> </a></li>
=======
                <li><a href="<?= ruta_base;?>/matricula/index.php"><i class="fa-solid fa-user-graduate"></i> <span> Estudiantes</span> </a></li>
                <li>
                    <!-- Example split danger button -->
<div class="btn-group">
  <a href="<?= ruta_base;?>/historial/main.php" class=""><i class="fa-solid fa-table"></i> <span> Historial</span> </a>
  <br>
  <a type="button" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </a>
  <ul class="dropdown-menu text-bg-dark">
    <li><a class="dropdown-item text-white" href="#">2024/2024</a></li>
    <li><a class="dropdown-item text-white" href="#">2024</a></li>
    <li><a class="dropdown-item text-white" href="#">2023</a></li>
   
  </ul>
</div>
                    </li>
                <li><a href="<?= ruta_base;?>/notas/main.php"><i class="fa-solid fa-book"></i> <span> Notas</span> </a></li>
>>>>>>> 30ce9b256bf84a5a9d807b157950ac8463f563fd
                <li><a href="<?= ruta_base;?>/actas/main.php"><i class="fa-solid fa-user-graduate"></i> <span> Actas</span> </a></li>
                <li><a href="<?= ruta_base;?>/aulas/main.php"><i class="fa-regular fa-door-open fa"></i> <span> Aulas</span> </a></li>


        </nav>

    </div>