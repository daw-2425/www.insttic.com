<?php
ob_start(); // Iniciar el buffer de salida

// Conexión a la base de datos
include 'db.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos

// Manejo de la inserción de salidas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'salida') {
    $id_alumno = $_POST['id_alumno'];
    $numero_cuarto = $_POST['numero_cuarto'];
    $destino = $_POST['destino'];
    $fechayhora_entrada = date('Y-m-d H:i:s'); // Fecha y hora actual
    $estado = 'salido'; // Estado por defecto

    try {
        $stmt = $pdo->prepare("INSERT INTO salidas (id_alumno, numero_cuarto, fechayhora_entrada, estado, destino) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id_alumno, $numero_cuarto, $fechayhora_entrada, $estado, $destino]);
    } catch (Exception $e) {
        echo "Error al registrar la salida: " . $e->getMessage();
    }
}

// Obtener todas las salidas con información del alumno
$stmt = $pdo->query("
    SELECT s.*, a.nombre, a.apellidos, a.foto
    FROM salidas s
    INNER JOIN alumno a ON s.id_alumno = a.id_alumno
");
$salidas = $stmt->fetchAll();

// Obtener todos los alumnos para el select
$alumnos = $pdo->query("SELECT * FROM alumno")->fetchAll();

// Manejo de la actualización del estado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'actualizar_estado') {
    $id_salida = $_POST['id_salida'];
    $nuevo_estado = $_POST['estado'];

    try {
        // Solo actualizar la fecha de salida si el nuevo estado es "regresado"
        if ($nuevo_estado === 'regresado') {
            $fechayhora_salida = date('Y-m-d H:i:s'); // Fecha y hora actual para la salida
            $stmt = $pdo->prepare("UPDATE salidas SET estado = ?, fechayhora_salida = ? WHERE id_salida = ?");
            $stmt->execute([$nuevo_estado, $fechayhora_salida, $id_salida]);
        } else {
            // Si el estado es cancelado, solo actualiza el estado
            $stmt = $pdo->prepare("UPDATE salidas SET estado = ? WHERE id_salida = ?");
            $stmt->execute([$nuevo_estado, $id_salida]);
        }
    } catch (Exception $e) {
        echo "Error al actualizar el estado: " . $e->getMessage();
    }

    // Redirigir para evitar reenvío de formulario
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./est.css">
</head>
<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <div class="aside d-none d-lg-block">
        <header class="header">
            <a class="btn logo">
                <img src="./img/logoi.png" alt="">
            </a>
            <button class="mover btnmover"><i class="fa-brands fa-angle-left fa"></i></button>
        </header>

        <nav class="nav">

        <li><a href=""><i class="fa-solid fa-house-user"></i><span> Enlace</span> </a></li>
                <li><a href="./index.php" class='billy' ><i class="fa-solid fa-door-closed"></i> <span>permisos</span> </a></li>
                <li><a href="./inde.php" ><i class="fa-solid fa-person-walking-arrow-right"></i> <span> salidas</span> </a></li>
                <li><a href="#"> </a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
        </nav>

    </div>

   

    <div class="main">
        <div class="container-fluid encabezado d-flex d-lg-none ">
                 <header class="encabezado  col-12 d-flex justify-content-between">
                    <a class="btn logo">
                        <img src="./img/logoi.png" alt="">
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
                    <img src="./img/perfil/perfil.jpg" alt="">
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
                        <th>Alumno</th>
                        <th>Número de Cuarto</th>
                        <th>Fecha y Hora de Salida</th>
                        <th>Fecha y Hora de Entrada</th >                       
                        <th>Estado</th>
                        <th>Destino</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($salidas as $salida): ?>
                        <?php
                        // Verificar si la hora de regreso es después de las 16:45
                        $horaRegreso = $salida['FECHAYHORA_SALIDAD'];
                        $horaLimite = '16:45:00';
                        $insigniaTarde = '';
                        if ($horaRegreso && date('H:i:s', strtotime($horaRegreso)) > $horaLimite) {
                            $insigniaTarde = '<span class="badge-tarde">Tarde</span>';
                        }
                        ?>
                        <tr>
                            <td><img src="<?= $salida['foto'] ?>" alt="Foto" class="foto-alumno"></td>
                          
                            <td><?= $salida['nombre'] . ' ' . $salida['apellidos'] ?></td>
                            <td><?= $salida['NUMERO_CUARTO'] ?></td>
                            <td><?= $salida['FECHAYHORA_ENTRADA'] ?></td>
                            <td>
                                <?= $salida['FECHAYHORA_SALIDAD'] ? $salida['FECHAYHORA_SALIDAD'] : 'N/A' ?>
                                <?= $insigniaTarde ?>
                            </td>
                            <td>
                                <?php if ($salida['ESTADO'] === 'regresado'): ?>
                                    <span class="estado-regresado">Regresado</span>
                                <?php elseif ($salida['ESTADO'] === 'cancelado'): ?>
                                    <span class="estado-cancelado">Cancelado</span>
                                <?php else: ?>
                                    <span class="badge badge-warning"><?= ucfirst($salida['ESTADO']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $salida['DESTINO'] ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="id_salida" value="<?= $salida['id_salida'] ?>">
                                    <input type="hidden" name="tipo" value="actualizar_estado">
                                    <button type="submit" name="estado" value="regresado" class="btn btn-success"><i class="fa-regular fa-square-check"></i></button>
                                    <button type="submit" name="estado" value="cancelado" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
  

</div>


<script src="./js/aside.js"></script>
<script src="./js/all.js"></script>
<script src="./js/bootstrap.js"></script>
</body>
</html>