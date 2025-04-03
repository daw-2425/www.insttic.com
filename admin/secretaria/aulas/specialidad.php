<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialidades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <style>
        .general {
            min-height: 100vh;
            background-color: rgb(192, 192, 192);
        }
        

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
        }
        
        .logo img {
            max-width: 150px;
        }
        
        .btnmover {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }
        
        .nav{
    
    width: 100%;
    height: 350px;
    display: flex;
    justify-content: center;
    align-items: center;
   
}
        .nav li {
            margin-bottom: 1rem;
        }
        
        .nav a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
        
        .main {
            flex: 1;
            background-color: rgb(192, 192, 192);
        }
        
        .main-header {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .buscardor .lupa {
            display: flex;
            align-items: center;
            gap: 1rem;
            background-color: #f5f5f5;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }
        
        .buscardor input {
            border: none;
            background: none;
            outline: none;
            width: 100%;
        }
        
        .user {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 1rem;
        }
        
        .table th {
            background-color: #0A2A66;
            color: white;
        }
        
        .modal-header {
            background-color: #0A2A66;
            color: white;
        }
        
        .btn-close {
            filter: brightness(0) invert(1);
        }
        
        .toast-header {
            background-color: #0A2A66 !important;
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="mobile-header d-lg-none">
        <button class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </button>
        <div class="mobile-logo">
            <img src="./img/logoi.png" alt="Logo">
        </div>
    </div>

    <div class="sidebar-overlay"></div>

    <div class="aside-responsive">
        <header class="header">
            <a class="btn logo">
                <img src="./img/logoi.png" alt="">
            </a>
            <button class="close-menu">
                <i class="fas fa-times"></i>
            </button>
        </header>

        <nav class="nav">
            <li><a href="main.php"><i class="fa-solid fa-door-open"></i> <span>Agregar Sala</span></a></li>
            <li><a href="specialidad.php"><i class="fa-solid fa-graduation-cap"></i> <span>Agregar Especialidad</span></a></li>
            <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span>Enlace</span></a></li>
            <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span>Enlace</span></a></li>
            <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span>Enlace</span></a></li>
            <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span>Enlace</span></a></li>
            <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span>Enlace</span></a></li>
        </nav>
    </div>

    <div class="general container-fluid p-0">
        <div class="row g-0">
            <div class="aside d-none d-lg-block">
                <header class="header">
                    <a class="btn logo">
                        <img src="./img/logoi.png" alt="">
                    </a>
                    <button class="mover btnmover"><i class="fa-solid fa-angle-left"></i></button>
                </header>

                <nav class="nav">
                    <li><a href="main.php"><i class="fa-solid fa-door-open"></i> <span> Agregar Sala</span></a></li>
                    <li><a href="specialidad.php"><i class="fa-solid fa-graduation-cap"></i> <span> Agregar Especialidad</span></a></li>
                    <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                    <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                    <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                    <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                    <li><a href=""><i class="fa-solid fa-user-graduate"></i> <span> Enlace</span> </a></li>
                </nav>
            </div>

            <div class="col">
                <div class="main">
                    <div class="container-fluid px-4 py-3">
                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-md-8">
                                <div class="buscardor">
                                    <div class="lupa">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <input type="text" placeholder="Buscar...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="perfil d-none d-lg-flex">
                                    <div class="imagen">
                                        <img src="./img/perfil/perfil.jpg" alt="">
                                    </div>
                                    <div class="nombre d-none d-lg-block">
                                        <span>Admin</span>
                                    </div>
                                    <i class="fa-regular fa-bell d-none d-lg-block"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn" style="background-color: #0A2A66; color: white;" data-bs-toggle="modal" data-bs-target="#especialidadModal">
                                Agregar Especialidad
                            </button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearEspecialidadModal">
                                Crear Especialidad
                            </button>
                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#verEspecialidadModal">
                                Ver Especialidad
                            </button>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="border-end text-center" style="width: 5%; font-size: 0.9rem;">Sala</th>
                                                <th class="border-end text-center" style="width: 5%; font-size: 0.9rem;">Especialidad</th>
                                                <th class="text-center" style="width: 5%; font-size: 0.9rem;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'db_connection.php';
                                            
                                            try {
                                                $sql = "SELECT 
                                                    e.id_especialidad,
                                                    e.denominacion,
                                                    e.descripcion,
                                                    CONCAT('Número ', s.numero, ' - Piso ', s.planta) as sala_info,
                                                    s.id_sala
                                                FROM especialidad e
                                                JOIN sala s ON e.id_sala = s.id_sala";
                                                    
                                                error_log("Executing SQL query: " . $sql);
                                                    
                                                $stmt = $conn->prepare($sql);
                                                if (!$stmt) {
                                                    throw new Exception("Prepare failed: " . $conn->error);
                                                }

                                                if (!$stmt->execute()) {
                                                    throw new Exception("Execute failed: " . $stmt->error);
                                                }

                                                $result = $stmt->get_result();
                                                if (!$result) {
                                                    throw new Exception("Get result failed: " . $stmt->error);
                                                }
                                                
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td class='border-end text-center' style='font-size: 0.9rem;'>" . htmlspecialchars($row['sala_info']) . "</td>";
                                                        echo "<td class='border-end text-center' style='font-size: 0.9rem;'>" . htmlspecialchars($row['denominacion']) . "</td>";
                                                        echo "<td class='text-center'>";
                                                        echo "<div class='action-buttons'>";
                                                        echo "<button class='btn btn-sm btn-primary edit-btn me-2' 
                                                                data-bs-toggle='modal'
                                                                data-bs-target='#editEspecialidadModal'
                                                                data-id='" . htmlspecialchars($row['id_especialidad']) . "' 
                                                                data-sala='" . htmlspecialchars($row['id_sala']) . "' 
                                                                data-nombre='" . htmlspecialchars($row['denominacion']) . "'>
                                                            <i class='fas fa-edit'></i>
                                                        </button>";
                                                        echo "<button class='btn btn-sm btn-danger delete-btn' 
                                                                onclick='deleteEspecialidad(" . htmlspecialchars($row['id_especialidad']) . ")'>
                                                            <i class='fas fa-trash'></i>
                                                        </button>";
                                                        echo "</div>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3' class='text-center'>No hay especialidades registradas</td></tr>";
                                                }

                                                $stmt->close();
                                            } catch (Exception $e) {
                                                error_log("Error in specialidad.php: " . $e->getMessage());
                                                echo "<tr><td colspan='3' class='text-center'>Error al cargar los datos: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="especialidadModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Agregar Especialidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="especialidadForm">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Sala</label>
                                            <select class="form-control" name="id_sala" required>
                                                <option value="">Seleccionar Sala</option>
                                                <?php
                                                $sql = "SELECT id_sala, CONCAT('Número ', numero, ' - Piso ', planta) as sala_info FROM sala ORDER BY numero";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['id_sala'] . "'>" . htmlspecialchars($row['sala_info']) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Especialidad</label>
                                            <select class="form-control" name="denominacion" required>
                                                <option value="">Seleccionar Especialidad</option>
                                                <?php
                                                $sql = "SELECT nombre FROM custom_especialidades ORDER BY nombre";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . htmlspecialchars($row['nombre']) . "'>" . htmlspecialchars($row['nombre']) . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para Crear Especialidad -->
                    <div class="modal fade" id="crearEspecialidadModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Crear Nueva Especialidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="crearEspecialidadForm">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nombre de Especialidad</label>
                                            <input type="text" class="form-control" name="nombre" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="verEspecialidadModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Lista de Especialidades</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="especialidadesTableBody">
                                                <?php
                                                $sql = "SELECT id, nombre FROM custom_especialidades WHERE nombre != '1' ORDER BY nombre";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                                    echo "<td>
                                                            <button class='btn btn-sm btn-primary edit-custom-esp' 
                                                                    data-id='" . htmlspecialchars($row['id']) . "' 
                                                                    data-nombre='" . htmlspecialchars($row['nombre']) . "'>
                                                                Editar
                                                            </button>
                                                            <button class='btn btn-sm btn-danger delete-custom-esp' 
                                                                    data-id='" . htmlspecialchars($row['id']) . "'>
                                                                Eliminar
                                                            </button>
                                                          </td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editEspecialidadModal" tabindex="-1" aria-labelledby="editEspecialidadModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEspecialidadModalLabel">Editar Especialidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editEspecialidadForm">
                                        <input type="hidden" id="edit_id">
                                        <input type="hidden" id="edit_sala_id">
                                        <div class="mb-3">
                                            <label for="edit_denominacion" class="form-label">Denominación</label>
                                            <input type="text" class="form-control" id="edit_denominacion" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" form="editEspecialidadForm" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editCustomEspModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Especialidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editCustomEspForm">
                                        <input type="hidden" id="edit_custom_esp_id" name="id">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Nombre de Especialidad</label>
                                            <input type="text" class="form-control" id="edit_custom_esp_nombre" name="nombre" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Éxito</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Operación realizada con éxito
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script src="./js/aside.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const asideResponsive = document.querySelector('.aside-responsive');
        const closeMenu = document.querySelector('.close-menu');
        const overlay = document.querySelector('.sidebar-overlay');

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                asideResponsive.classList.add('show');
                overlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            });
        }

        function closeMenuHandler() {
            asideResponsive.classList.remove('show');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        if (closeMenu) {
            closeMenu.addEventListener('click', closeMenuHandler);
        }

        if (overlay) {
            overlay.addEventListener('click', closeMenuHandler);
        }

        const menuLinks = document.querySelectorAll('.aside-responsive .nav a');
        menuLinks.forEach(link => {
            link.addEventListener('click', closeMenuHandler);
        });

        loadEspecialidades();

        document.getElementById('especialidadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('add_especialidad.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const modalElement = document.getElementById('especialidadModal');
                    const modal = bootstrap.Modal.getInstance(modalElement);
                    modal.hide();
                    
                    this.reset();
                    
                    const toast = new bootstrap.Toast(document.getElementById('successToast'));
                    toast.show();
                    
                    loadEspecialidades();
                } else {
                    alert('Error al agregar la especialidad');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al agregar la especialidad');
            });
        });

        document.querySelectorAll('.edit-custom-esp').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const nombre = this.dataset.nombre;
                
                document.getElementById('edit_custom_esp_id').value = id;
                document.getElementById('edit_custom_esp_nombre').value = nombre;
                
                const verModal = bootstrap.Modal.getInstance(document.getElementById('verEspecialidadModal'));
                verModal.hide();
                
                new bootstrap.Modal(document.getElementById('editCustomEspModal')).show();
            });
        });

        document.querySelectorAll('.delete-custom-esp').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('¿Está seguro de eliminar esta especialidad?')) {
                    const id = this.dataset.id;
                    fetch('delete_custom_especialidad.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({id: id})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            location.reload();
                        }
                    });
                }
            });
        });

        document.getElementById('editCustomEspForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = {
                id: document.getElementById('edit_custom_esp_id').value,
                nombre: document.getElementById('edit_custom_esp_nombre').value
            };

            fetch('edit_custom_especialidad.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    bootstrap.Modal.getInstance(document.getElementById('editCustomEspModal')).hide();
                    const toast = new bootstrap.Toast(document.getElementById('successToast'));
                    toast.show();
                    setTimeout(() => location.reload(), 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al editar la especialidad');
            });
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const sala_id = this.dataset.sala;
                const denominacion = this.dataset.nombre;
                
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_sala_id').value = sala_id;
                document.getElementById('edit_denominacion').value = denominacion;
                
                new bootstrap.Modal(document.getElementById('editEspecialidadModal')).show();
            });
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('¿Está seguro de eliminar esta especialidad?')) {
                    const id = this.dataset.id;
                    fetch('delete_especialidad.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({id: id})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            location.reload();
                        }
                    });
                }
            });
        });

        document.getElementById('editEspecialidadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = {
                id: document.getElementById('edit_id').value,
                sala_id: document.getElementById('edit_sala_id').value,
                denominacion: document.getElementById('edit_denominacion').value
            };

            fetch('edit_especialidad.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    bootstrap.Modal.getInstance(document.getElementById('editEspecialidadModal')).hide();
                    const toast = new bootstrap.Toast(document.getElementById('successToast'));
                    toast.show();
                    setTimeout(() => location.reload(), 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al editar la especialidad');
            });
        });
    });

    function loadEspecialidades() {
        fetch('get_especialidades.php')
            .then(response => response.json())
            .then(especialidades => {
                const tbody = document.querySelector('.table tbody');
                tbody.innerHTML = '';
                
                especialidades.forEach(esp => {
                    tbody.innerHTML += `
                        <tr>
                            <td class='border-end text-center'>${esp.sala_info || `Número ${esp.numero} - Piso ${esp.planta}`}</td>
                            <td class='border-end text-center'>${esp.denominacion}</td>
                            <td class='text-center'>
                                <div class='d-flex justify-content-center align-items-center'>
                                    <button class='btn btn-sm btn-primary edit-btn me-1' 
                                            data-bs-toggle='modal'
                                            data-bs-target='#editEspecialidadModal'
                                            data-id='${esp.id_especialidad}' 
                                            data-sala='${esp.id_sala}' 
                                            data-nombre='${esp.denominacion}'>
                                        <i class='fas fa-edit'></i>
                                    </button>
                                    <button class='btn btn-sm btn-danger delete-btn' 
                                            onclick='deleteEspecialidad(${esp.id_especialidad})'>
                                        <i class='fas fa-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            })
            .catch(error => {
                console.error('Error:', error);
                const tbody = document.querySelector('.table tbody');
                tbody.innerHTML = '<tr><td colspan="3" class="text-center">Error al cargar los datos</td></tr>';
            });
    }

    function deleteEspecialidad(id) {
        if(confirm('¿Está seguro de eliminar esta especialidad?')) {
            fetch('delete_especialidad.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({id: id})
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const toast = new bootstrap.Toast(document.getElementById('successToast'));
                    toast.show();
                    loadEspecialidades();
                } else {
                    alert('Error al eliminar la especialidad');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la especialidad');
            });
        }
    }
    </script>
</body>
</html>