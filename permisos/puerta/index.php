<?php

include './obtener.php';

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
<style>
    .texto-con-puntos {
        width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 10px;
    }
</style>

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


                <li><a href="../index.php"><i class="fa-solid fa-house-user"></i><span> Inicio</span> </a></li>
                <li><a href="../index.php" class='billy'><i class="fa-solid fa-door-closed"></i> <span>permisos</span> </a></li>
                <li><a href="./salidas.php "><i class="fa-solid fa-person-walking-arrow-right"></i> <span> salidas</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Alumnos</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Empleados</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Aulas</span> </a></li>
                <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Pisos</span> </a></li>


            </nav>

        </div>

        <div class="main">
            <div class="container-fluid encabezado d-flex d-lg-none ">
                <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="../img/LogoRecortado.png" alt="">
                    </a>
                    <a class="btn d-flex d-lg-none text-white" data-bs-toggle="offcanvas" data-bs-target="#menuBar" aria-controls="offcanvasScrolling">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </header>
            </div>


            <div class="main-header conteiner  p-2 d-flex">

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


            <div class="container">
                <h1 class="texto-con-imagen"><i class="fa-solid fa-person-walking-arrow-right"></i>-🔜LISTA DE PERMISOS</h1>

                <hr>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Foto</th> <!-- Foto primero -->
                            <th>Alumno</th> <!-- Nombre después -->

                            <th>Motivo</th>
                            <th>Fecha de Entrada</th>
                            <th>Fecha de Salida</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                            <th>Regresado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($permisos as $permiso): ?>
                            <tr>
                                <!-- Foto primero -->
                                <td><img src="" alt="Foto" style="width: 50px; height: auto;"></td>

                                <!-- Nombre después -->
                                <td><?= $permiso['nombre'] . ' ' . $permiso['apellidos'] ?></td>

                                <!-- Resto de campos -->

                                <td>
                                    <div class="texto-con-puntos"><?= $permiso['motivo'] ?></div>
                                </td>
                                <td><?= $permiso['fecha_entrada'] ?></td>
                                <td><?= $permiso['fecha_salida'] ?></td>
                                <td><?= $permiso['especialidad'] ?></td>
                                <td>
                                    <?php
                                    // Mostrar el estado con colores
                                    if ($permiso['estado'] === 'denegado'): ?>
                                        <span class="badge badge-danger">Denegado</span>
                                    <?php elseif ($permiso['estado'] === 'aprobado'): ?>
                                        <span class="badge badge-success">Aprobado</span>
                                    <?php elseif ($permiso['estado'] === 'regresado'): ?>
                                        <span class="badge badge-success">Regresado</span>
                                    <?php else: ?>
                                        <?php
                                        // Comprobar si la fecha de salida ha pasado y el estado no es "regresado"
                                        if (strtotime($permiso['fecha_salida']) < time() && $permiso['estado'] !== 'regresado'): ?>
                                            <span class="badge badge-warning">Debe Regresar</span> <!-- Insignia -->
                                        <?php endif; ?>
                                        <span class="badge badge-info"><?= ucfirst($permiso['estado']) ?></span> <!-- Para otros estados -->
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($permiso['estado'] !== 'denegado' && $permiso['estado'] !== 'pendiente'): ?>
                                        <button class="btn btn-success" onclick="actualizarEstado(<?= $permiso['id_permiso'] ?>, 'regresado')">
                                            <i class="fa-regular fa-square-check"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="actualizarEstado(<?= $permiso['id_permiso'] ?>, 'fuera')">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>



            <script>
                document.getElementById('permisoForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'obtener.php', true);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            location.reload(); // Recargar la página para ver el nuevo registro
                        }
                    };
                    xhr.send(formData);
                });

                function actualizarEstado(id_permiso, nuevo_estado) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'obtener.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            location.reload(); // Recargar la página para ver el nuevo estado
                        }
                    };
                    xhr.send('action=update&id_permiso=' + id_permiso + '&nuevo_estado=' + nuevo_estado);
                }
            </script>

        </div>

    </div>

    <script src="../recursos/sweetalert2.all.js"></script>
    <script src="../js/aside.js"></script>
    <script src="../recursos/all.js"></script>
    <script src="../recursos/bootstrap.min.js"></script>
</body>

</html>