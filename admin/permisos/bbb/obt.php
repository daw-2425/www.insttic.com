<?php
// Conexión a la base de datos
$host = 'localhost';
$db = 'insr';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Consulta INNER JOIN para obtener los datos del alumno y su estado
    $sql = "SELECT a.id, a.nombre, a.edad, a.curso, a.promedio, r.fecha, r.estado 
            FROM alumno a 
            INNER JOIN registros r ON a.id = r.id_alumno";
    $stmt = $pdo->query($sql);
    
    echo "<thead><tr><th>Nombre</th><th>Curso</th><th>Promedio</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead><tbody>";

    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['curso']}</td>";
        echo "<td>{$row['promedio']}</td>";
        echo "<td>{$row['estado']}</td>";
        echo "<td>{$row['fecha']}</td>";
        echo "<td><button class='btn btn-success' onclick='registrarSalida({$row['id']})'>Salida</button> ";
        echo "<button class='btn btn-warning' onclick='registrarRegreso({$row['id']})'>Regreso</button></td>";
        echo "</tr>";
    }

    echo "</tbody>";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
