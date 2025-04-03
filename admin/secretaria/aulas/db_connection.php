<?php
$conn = new mysqli("localhost", "root", "", "insttic"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Room functions
function addRoom($numero, $capacidad, $planta) {
    global $conn;
    $sql = "INSERT INTO sala (numero, capacidad, planta) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $numero, $capacidad, $planta);
    return $stmt->execute();
}

function getRooms() {
    global $conn;
    $sql = "SELECT id_sala, numero, capacidad, planta FROM sala ORDER BY numero";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function editRoom($id, $numero, $capacidad, $planta) {
    global $conn;
    $sql = "UPDATE sala SET numero = ?, capacidad = ?, planta = ? WHERE id_sala = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisi", $numero, $capacidad, $planta, $id);
    return $stmt->execute();
}

function deleteRoom($id) {
    global $conn;
    $sql = "DELETE FROM sala WHERE id_sala = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Especialidad functions
function addSpecialidad($id_sala, $denominacion, $descripcion = '') {
    global $conn;
    $sql = "INSERT INTO especialidad (id_sala, denominacion, descripcion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $id_sala, $denominacion, $descripcion);
    return $stmt->execute();
}

function getEspecialidades() {
    global $conn;
    $sql = "SELECT e.*, s.numero, s.planta 
            FROM especialidad e 
            JOIN sala s ON e.id_sala = s.id_sala 
            ORDER BY s.numero";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function editEspecialidad($id, $id_sala, $denominacion) {
    global $conn;
    $sql = "UPDATE especialidad SET id_sala = ?, denominacion = ? WHERE id_especialidad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $id_sala, $denominacion, $id);
    return $stmt->execute();
}

function deleteEspecialidad($id) {
    global $conn;
    $sql = "DELETE FROM especialidad WHERE id_especialidad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Custom Especialidad functions
function addCustomEspecialidad($nombre) {
    global $conn;
    $sql = "INSERT INTO custom_especialidades (nombre) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre);
    return $stmt->execute();
}

function editCustomEspecialidad($id, $nombre) {
    global $conn;
    $sql = "UPDATE custom_especialidades SET nombre = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nombre, $id);
    return $stmt->execute();
}

function deleteCustomEspecialidad($id) {
    global $conn;
    $sql = "DELETE FROM custom_especialidades WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function getCustomEspecialidades() {
    global $conn;
    $sql = "SELECT * FROM custom_especialidades WHERE nombre != '1' ORDER BY nombre";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>