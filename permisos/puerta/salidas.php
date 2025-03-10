<?php

include './obtener_salidas.php'; 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../recursos/all.css">
    <link rel="stylesheet" href="../recursos/bootstrap.min.css">
    <link rel="stylesheet" href="../css/AsideBar.css">
    <link rel="stylesheet" href="../css/Puerta.css">
</head>
<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="../img/LogoRecortado.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">

        <li><a href=""><i class="fa-solid fa-house-user"></i><span> Inicio</span> </a></li>
                <li><a href="../index.php" ><i class="fa-solid fa-door-closed"></i> <span>permisos</span> </a></li>
                <li><a href="./salidas.php" class='billy'><i class="fa-solid fa-person-walking-arrow-right"></i> <span> salidas</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
        </nav>

    </div>

   

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="../img/logoi.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </header>
        </div>

        <div class="main-header conteiner  p-2 d-flex">
            <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logoi.png" alt="">
                </a>
                
            </header> -->
            <div class="buscardor  col-5 p-2 col-lg-9 d-none d-lg-block">
                <div class="lupa">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar...">
                </div>
                
            </div>
            <div class="perfil col-2 d-none d-lg-flex">
                <div class="imagen">
                    <img src="../img/perfil/perfil.jpg" alt="">
                </div>
                <div class="nombre d-none d-lg-block">
                    <span>Admin</span>
                </div>
                <i class="fa-regular fa-bell d-none d-lg-block"></i>
            </div>
                
        </div>

        <hr>

        <div class="container mt-5">
            <button type="button" class="btn  bajar" data-bs-toggle="modal" data-bs-target="#studentModal">
            <i class="fa-solid fa-circle-plus"></i>-Agregar
            </button>
        </div>
        <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title textocon-imagen" id="studentModalLabel"><i class="fa-solid fa-location-dot"></i>Formulario de Estudiante</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <input type="hidden" name="tipo" value="salida">
                            <div class="form-group">
                              
                                <select class="form-control  mt-4" id="id_alumno" name="id_alumno" required>
                                    <option value="">nombres..</option>
                                    <?php foreach ($alumnos as $alumno): ?>
                                        <option value="<?= $alumno['id_alumno'] ?>"><?= $alumno['nombre'] . ' ' . $alumno['apellidos'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                
                                <input type="number" class="form-control  mt-4" id="numero_cuarto" name="numero_cuarto" placeholder='numero de cuarto..' required>
                            </div>
                            <div class="form-group">
                          
                                <input type="text" class="form-control mt-4" id="destino"  name="destino" placeholder='Destino..' required>
                            </div>
                            <button type="submit" class="btn btn-primary  mt-4 "><i class="fa-solid fa-check-to-slot"></i>-Registrar</button>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>



<div class='caja'>
    <div class="container">
        <h2 class="mt-5 texto-con-imagen" ><i class="fa-solid fa-person-walking-arrow-right  "></i> Lista de Salidas</h2>
        <div class="table-container"> <!-- Contenedor con scroll -->
            <table class="table">
                <thead class='fixed'>
                    <tr>
                        <th>Foto</th>
                        <th>ID Salida</th>
                        <th>Alumno</th>
                        <th>Número de Cuarto</th>
                        <th>Fecha y Hora de Entrada</th>
                        <th>Fecha y Hora de Salida</th>
                        <th>Estado</th>
                        <th>Destino</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php foreach ($salidas as $salida): ?>
                        <?php
                        // Verificar si la hora de regreso es después de las 16:45
                        $horaRegreso = $salida['fechayhora_salida'];
                        $horaLimite = '16:45:00';
                        $insigniaTarde = '';
                        if ($horaRegreso && date('H:i:s', strtotime($horaRegreso)) > $horaLimite) {
                            $insigniaTarde = '<span class="badge-tarde">Tarde</span>';
                        }
                        ?>
                        <tr>
                            <td><img src="<?= $salida['foto'] ?>" alt="Foto" class="foto-alumno"></td>
                            <td><?= $salida['id_salida'] ?></td>
                            <td><?= $salida['nombre'] . ' ' . $salida['apellidos'] ?></td>
                            <td><?= $salida['numero_cuarto'] ?></td>
                            <td><?= $salida['fechayhora_entrada'] ?></td>
                            <td>
                                <?= $salida['fechayhora_salida'] ? $salida['fechayhora_salida'] : 'N/A' ?>
                                <?= $insigniaTarde ?>
                            </td>
                            <td>
                                <?php if ($salida['estado'] === 'regresado'): ?>
                                    <span class="estado-regresado">Regresado</span>
                                <?php elseif ($salida['estado'] === 'cancelado'): ?>
                                    <span class="estado-cancelado">Cancelado</span>
                                <?php else: ?>
                                    <span class="badge badge-warning"><?= ucfirst($salida['estado']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $salida['destino'] ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="id_salida" value="<?= $salida['id_salida'] ?>">
                                    <input type="hidden" name="tipo" value="actualizar_estado">
                                    <button type="submit" name="estado" value="regresado" class="btn btn-success"><i class="fa-regular fa-square-check"></i></button>
                                    <button type="submit" name="estado" value="cancelado" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?> -->
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
  

</div>


<script src="../js/aside.js"></script>
<script src="../recursos/all.js"></script>
<script src="../recursos/bootstrap.min.js"></script>
</body>
</html>