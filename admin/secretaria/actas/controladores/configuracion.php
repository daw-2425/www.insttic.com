<?php
class Database {
    // Propiedades para la configuración de la base de datos
    private $host = 'localhost';
    private $db_name = 'insttic';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Método para conectar
    public function connect() {
        $this->conn = null;

        try {
            // Cadena de conexión PDO
            $dsn = "mysql:host={$this->host};dbname={$this->db_name}";
            
            // Crear una instancia PDO
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Configurar el modo de error para lanzar excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Configurar el juego de caracteres (opcional pero recomendado)
            $this->conn->exec("SET NAMES 'utf8'");
            
        } catch (PDOException $e) {
            // Manejar errores de conexión
            echo "Error de conexión: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>