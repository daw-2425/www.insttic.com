<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
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
            <?php include('./components/asideResponsive.php') ?>

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
                            <button type="button" class="btn" style="background-color: #0A2A66; color: white;" data-bs-toggle="modal" data-bs-target="#salaModal">
                                Agregar Sala
                            </button>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="border-end text-center" style="width: 15%;">Número</th>
                                                <th class="border-end text-center" style="width: 15%;">Piso</th>
                                                <th class="border-end text-center" style="width: 15%;">Capacidad</th>
                                                <th class="text-center" style="width: 10%;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'db_connection.php';
                                            
                                            try {
                                                $sql = "SELECT * FROM sala ORDER BY numero";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td class='border-end text-center'>" . htmlspecialchars($row['numero']) . "</td>";
                                                        echo "<td class='border-end text-center'>" . htmlspecialchars($row['planta']) . "</td>";
                                                        echo "<td class='border-end text-center'>" . htmlspecialchars($row['capacidad']) . "</td>";
                                                        echo "<td class='text-center'>";
                                                        echo "<div class='d-flex justify-content-center align-items-center'>";
                                                        echo "<button class='btn btn-sm btn-primary edit-btn me-1' 
                                                                onclick='editRoom(" . json_encode($row) . ")'>
                                                                <i class='fas fa-edit'></i>
                                                            </button>";
                                                        echo "<button class='btn btn-sm btn-danger delete-btn' 
                                                                onclick='deleteRoom(" . $row['id_sala'] . ")'>
                                                                <i class='fas fa-trash'></i>
                                                            </button>";
                                                        echo "</div>";
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4' class='text-center'>No hay salas registradas</td></tr>";
                                                }
                                            } catch (Exception $e) {
                                                error_log("Error: " . $e->getMessage());
                                                echo "<tr><td colspan='4' class='text-center'>Error al cargar los datos</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="salaModal" tabindex="-1" aria-labelledby="salaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaModalLabel">Agregar Nueva Sala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="salaForm">
                        <div class="mb-3">
                            <label for="numero_sala" class="form-label">Número de Sala</label>
                            <input type="number" class="form-control" id="numero_sala" name="numero_sala" required>
                        </div>
                        <div class="mb-3">
                            <label for="piso" class="form-label">Piso</label>
                            <input type="number" class="form-control" id="piso" name="piso" required>
                        </div>
                        <div class="mb-3">
                            <label for="capacidad" class="form-label">Capacidad</label>
                            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Sala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="mb-3">
                            <label class="form-label">Número de Sala</label>
                            <input type="number" class="form-control" id="edit_numero_sala" name="numero_sala" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Piso</label>
                            <input type="number" class="form-control" id="edit_piso" name="piso" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Capacidad</label>
                            <input type="number" class="form-control" id="edit_capacidad" name="capacidad" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="background-color: #0A2A66; color: white;">
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

        loadRooms();

        document.getElementById('salaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('add_room.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const modalElement = document.getElementById('salaModal');
                    const modal = bootstrap.Modal.getInstance(modalElement);
                    modal.hide();
                    
                    this.reset();
                    
                    const toast = new bootstrap.Toast(document.getElementById('successToast'));
                    toast.show();
                    
                    loadRooms();
                } else {
                    alert('Error al agregar la sala');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al agregar la sala');
            });
        });

        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                id: document.getElementById('edit_id').value,
                numero_sala: document.getElementById('edit_numero_sala').value,
                piso: document.getElementById('edit_piso').value,
                capacidad: document.getElementById('edit_capacidad').value
            };

            fetch('edit_room.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const modalElement = document.getElementById('editModal');
                    const modal = bootstrap.Modal.getInstance(modalElement);
                    modal.hide();
                    
                    const toast = new bootstrap.Toast(document.getElementById('successToast'));
                    toast.show();
                    
                    loadRooms();
                } else {
                    alert('Error al editar la sala');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al editar la sala');
            });
        });
    });

    function loadRooms() {
        fetch('get_rooms.php')
            .then(response => response.json())
            .then(data => {
                console.log('Server response:', data); 
                
                const tbody = document.querySelector('.table tbody');
                
                if (data.success && data.data) {
                    tbody.innerHTML = '';
                    const rooms = data.data;
                    
                    if (rooms.length > 0) {
                        rooms.forEach(room => {
                            tbody.innerHTML += `
                                <tr>
                                    <td class='border-end text-center'>${room.numero}</td>
                                    <td class='border-end text-center'>${room.planta}</td>
                                    <td class='border-end text-center'>${room.capacidad}</td>
                                    <td class='text-center'>
                                        <div class='d-flex justify-content-center align-items-center'>
                                            <button class='btn btn-sm btn-primary edit-btn me-1' 
                                                    onclick='editRoom(${JSON.stringify(room).replace(/"/g, "&quot;")})'>
                                                <i class='fas fa-edit'></i>
                                            </button>
                                            <button class='btn btn-sm btn-danger delete-btn' 
                                                    onclick='deleteRoom(${room.id_sala})'>
                                                <i class='fas fa-trash'></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center">No hay salas registradas</td></tr>';
                    }
                } else {
                    console.error('Error from server:', data.error); 
                    tbody.innerHTML = `<tr><td colspan="4" class="text-center">Error al cargar los datos: ${data.error || 'Unknown error'}</td></tr>`;
                }
            })
            .catch(error => {
                console.error('Fetch error:', error); 
                const tbody = document.querySelector('.table tbody');
                tbody.innerHTML = '<tr><td colspan="4" class="text-center">Error al cargar los datos</td></tr>';
            });
    }

    function editRoom(room) {
        document.getElementById('edit_id').value = room.id_sala;
        document.getElementById('edit_numero_sala').value = room.numero;
        document.getElementById('edit_piso').value = room.planta;
        document.getElementById('edit_capacidad').value = room.capacidad;
        
        const modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }

    function deleteRoom(id) {
        if(confirm('¿Está seguro de eliminar esta sala?')) {
            fetch('delete_room.php', {
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
                    loadRooms();
                } else {
                    alert('Error al eliminar la sala');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la sala');
            });
        }
    }
    </script>
</body>
</html>