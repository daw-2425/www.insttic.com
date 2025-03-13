

<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="menuBar" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header text-center">
    <h5 class="" id="offcanvasScrollingLabel ">INSTTIC</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body sidebar w-100 ">


    <nav class="nav">


      <li><a href="<?php echo ruta_base; ?>/main.php"> <i class="fa fa-dashboard"></i><span>Dashboard</span> </a></li>
      <li><a href="<?= ruta_base; ?>/matricula/index.php"><i class="fa-solid fa-user-graduate"></i> <span> Estudiantes</span> </a></li>
      <li>
                    <!-- Example split danger button -->
<div class="btn-group">
  <a href="<?= ruta_base;?>/historial/main.php" class=""><i class="fa-solid fa-table"></i> <span> Historial</span> </a>
  <br>
  <a type="button" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">2024/2023</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>
                    </li>
      <li><a href="<?= ruta_base; ?>/notas/main.php"><i class="fa-solid fa-book"></i> <span> Notas</span> </a></li>
      <li><a href="<?= ruta_base; ?>/actas/main.php"><i class="fa-solid fa-user-graduate"></i> <span> Actas</span> </a></li>
      <li><a href="<?= ruta_base; ?>/aulas/main.php"><i class="fa-regular fa-door-open fa"></i> <span> Aulas</span> </a></li>


    </nav>
  </div>

</div>