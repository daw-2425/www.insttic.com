<?php
// Conexión a la base de datos con PDO
$host = "localhost";
$user = "root";  // Cambia si es necesario
$pass = "";      // Pon tu contraseña si tienes una
$dbname = "insttic";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Asegurarse de que es un número entero
        // Obtener los datos de la página
        $stmt = $pdo->prepare("SELECT * FROM noticias WHERE id = ?");
        $stmt->execute([$id]);
        $pagina = $stmt->fetch();
        
        if ($pagina) {
            // Obtener el contenido asociado a la página
            $stmt2 = $pdo->prepare("SELECT * FROM contenido_noticia WHERE id_noticia = ?");
            $stmt2->execute([$id]);
            $contenido = $stmt2->fetch();
        } else {
            $pagina = null;
        }
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>