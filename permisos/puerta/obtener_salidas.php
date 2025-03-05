<?php


include '../../conexion/conexion.php'; 

// Manejo de la inserción de salidas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'salida') {
    $id_alumno = $_POST['id_alumno'];
    $numero_cuarto = $_POST['numero_cuarto'];
    $destino = $_POST['destino'];
    $fechayhora_entrada = date('Y-m-d H:i:s'); // Fecha y hora actual
    $estado = 'salido'; // Estado por defecto

    try {
        $stmt = $conexion->prepare("INSERT INTO salidas (id_alumno, numero_cuarto, fechayhora_entrada, estado, destino) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id_alumno, $numero_cuarto, $fechayhora_entrada, $estado, $destino]);
    } catch (Exception $e) {
        echo "Error al registrar la salida: " . $e->getMessage();
    }
}

// Obtener todas las salidas con información del alumno
$stmt = $conexion->query("
    SELECT s.*, a.nombre, a.apellidos, a.foto
    FROM salidas s
    INNER JOIN alumno a ON s.id_alumno = a.id_alumno
");
$salidas = $stmt->fetchAll();

// Obtener todos los alumnos para el select
$alumnos = $conexion->query("SELECT * FROM alumno")->fetchAll();

// Manejo de la actualización del estado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo']) && $_POST['tipo'] === 'actualizar_estado') {
    $id_salida = $_POST['id_salida'];
    $nuevo_estado = $_POST['estado'];

    try {
        // Solo actualizar la fecha de salida si el nuevo estado es "regresado"
        if ($nuevo_estado === 'regresado') {
            $fechayhora_salida = date('Y-m-d H:i:s'); // Fecha y hora actual para la salida
            $stmt = $conexion->prepare("UPDATE salidas SET estado = ?, fechayhora_salida = ? WHERE id_salida = ?");
            $stmt->execute([$nuevo_estado, $fechayhora_salida, $id_salida]);
        } else {
            // Si el estado es cancelado, solo actualiza el estado
            $stmt = $conexion->prepare("UPDATE salidas SET estado = ? WHERE id_salida = ?");
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