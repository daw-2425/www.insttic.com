<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/www.insttic.com/admin/conexion/conexion.php';

 $sql = "select * from alumno";
 $resultado = $conexion -> query($sql);
 
?>

<?php
include 'conexion1.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $foto2 = $_FILES['foto2']['name'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $contacto_emergencia = $_POST['contacto_emergencia'];
    $id_especialidad = $_POST['id_especialidad'];
    $id_generacion = $_POST['id_generacion'];

    if (move_uploaded_file($_FILES['foto2']['tmp_name'], 'image/' . $foto2)) {
        echo "Archivo subido correctamente.";
    } else {
        echo "Error al subir el archivo.";
    }

    $stmt = $pdo->prepare("INSERT INTO alumno (foto2, nombre, apellidos, fecha_nacimiento, contacto_emergencia, id_especialidad, id_generacion) 
                           VALUES (:foto2, :nombre, :apellidos, :fecha_nacimiento, :contacto_emergencia, :id_especialidad, :id_generacion)");

    $stmt->execute([
        ':foto2' => $foto2,
        ':nombre' => $nombre,
        ':apellidos' => $apellidos,
        ':fecha_nacimiento' => $fecha_nacimiento,
        ':contacto_emergencia' => $contacto_emergencia,
        ':id_especialidad' => $id_especialidad,
        ':id_generacion' => $id_generacion
    ]);

    echo "Alumno registrado exitosamente!";
}

$stmt = $pdo->query("
    SELECT a.*, e.denominacion AS especialidad, g.nombre AS generacion
    FROM alumno a
    JOIN especialidad e ON a.id_especialidad = e.id_especialidad
    JOIN generacion g ON a.id_generacion = g.id
");
$alumnos = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/dashboard.css">
 
   
</head>
<style>
        .table-container {
            max-height: 400px; 
            overflow-y: auto;
            display: block;
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #f8f9fa; 
            z-index: 1; 
        }

        th {
            position: sticky;
            top: 0;
            z-index: 2; 
            background-color: #f8f9fa; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
<body>
    
<div class="general conteiner-fluid d-flex">

    
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/www.insttic.com/admin/secretaria/components/aside.php" ?>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] ."/www.insttic.com/admin/secretaria/components/asideResponsive.php" ?>

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

        <div class="main-header container pt-4 d-flex">
            <!-- <header class="header">
                <a class="btn logo">
                    <img src="./img/logoi.png" alt="">
                </a>
                
            </header> -->
            <div class="buscardor col-lg-9 d-none d-lg-block">
                <!-- <div class="lupa">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar...">
                </div> -->
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


        <div class="container">

        <?php
        // Obtener las generaciones disponibles para mostrar los botones
        $stmt_generaciones = $pdo->query("SELECT * FROM generacion");
        $generaciones = $stmt_generaciones->fetchAll();
        ?>

        <!-- Botones para seleccionar generación -->
         <h5>SELECCIONAR GENERACION</h5>
        <div class="container mt-3">
            <div id="generaciones" class="btn-group">
                <?php foreach ($generaciones as $generacion): ?>
                    <button type="button" class="btn btn-primary generacion-btn" data-generacion-id="<?php echo $generacion['id']; ?>">
                        <?php echo $generacion['nombre']; ?>
                    </button>
                <?php endforeach; ?>
            </div>
           

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroAlumnoModal">
  Registrar Alumno
</button>

<!-- Modal -->
<div class="modal fade" id="registroAlumnoModal" tabindex="-1" aria-labelledby="registroAlumnoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registroAlumnoModalLabel">Formulario de Registro de Alumno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="foto2" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto2" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required>
          </div>
          <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" required>
          </div>
          <div class="mb-3">
            <label for="contacto_emergencia" class="form-label">Contacto de Emergencia</label>
            <input type="text" class="form-control" name="contacto_emergencia" required>
          </div>
          <div class="mb-3">
            <label for="id_especialidad" class="form-label">Especialidad</label>
            <select class="form-control" name="id_especialidad" required>
              <option value="">Seleccione Especialidad</option>
              <?php
              $stmt = $pdo->query("SELECT * FROM especialidad");
              while ($row = $stmt->fetch()) {
                echo "<option value='" . $row['id_especialidad'] . "'>" . $row['denominacion'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="id_generacion" class="form-label">Generación</label>
            <select class="form-control" name="id_generacion" required>
              <option value="">Seleccione Generación</option>
              <?php
              $stmt = $pdo->query("SELECT * FROM generacion");
              while ($row = $stmt->fetch()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . " (" . $row['año_inicio'] . " - " . $row['año_fin'] . ")</option>";
              }
              ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Registrar Alumno</button>
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
      

        <!-- Tabla de alumnos -->
        <div class="container mt-5">
            <h2>Listado de Todos Los Alumnos</h2>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha Nacimiento</th>
                            <th>Especialidad</th>
                            <th>Generación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="alumnos-list">
                        <?php foreach ($alumnos as $alumno): ?>
                            <tr data-generacion-id="<?php echo $alumno['id_generacion']; ?>">
                                <td><img src="./image/<?php echo trim($alumno['foto2']); ?>" alt="foto" width="100"></td>
                                <td><?php echo $alumno['id_alumno']; ?></td>
                                <td><?php echo $alumno['nombre']; ?></td>
                                <td><?php echo $alumno['apellidos']; ?></td>
                                <td><?php echo $alumno['fecha_nacimiento']; ?></td>
                                <td><?php echo $alumno['especialidad']; ?></td>
                                <td><?php echo $alumno['generacion']; ?></td>
                                <td>
                                   <a href="edit_alumno.php?id=<?php echo $alumno['id_alumno']; ?>" class="btn btn-primary">
                                   <i class="fas fa-sync-alt"></i>
                                   </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

        <script>
// Función para buscar los alumnos en tiempo real
function searchAlumnos() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const alumnosRows = document.querySelectorAll('#alumnos-list tr');

    alumnosRows.forEach(row => {
        const nombre = row.cells[2].textContent.toLowerCase(); // Columna de Nombre
        const apellidos = row.cells[3].textContent.toLowerCase(); // Columna de Apellidos

        // Verificamos si el nombre o apellidos contienen el término de búsqueda
        if (nombre.includes(searchInput) || apellidos.includes(searchInput)) {
            row.style.display = ''; // Mostrar fila
        } else {
            row.style.display = 'none'; // Ocultar fila
        }
    });
}

// JavaScript para filtrar la tabla de alumnos según la generación seleccionada
document.addEventListener('DOMContentLoaded', function() {
    const generacionBtns = document.querySelectorAll('.generacion-btn');
    const alumnosRows = document.querySelectorAll('#alumnos-list tr');
    
    // Función para filtrar los alumnos según la generación seleccionada
    generacionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const generacionId = this.getAttribute('data-generacion-id');
            
            // Mostrar solo los alumnos que pertenecen a la generación seleccionada
            alumnosRows.forEach(row => {
                if (row.getAttribute('data-generacion-id') === generacionId) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});
        </script>
       
       

    </div>

</div>

<script src="../js/chart.umd.js"></script>
<script src="../js/chartjs-plugin-datalabels.js"></script>
<script src="../js/aside.js"></script>
<script src="../js/all.js"></script>
<script src="../js/grafico.js"></script>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>