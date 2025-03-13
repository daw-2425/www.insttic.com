<?php

class Buscador {
    private $conexion;

    public function __construct($host, $dbname, $user, $password) {
        try {
            $this->conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    // Método para buscar alumnos por nombre o apellido
    public function buscarAlumnos($termino) {
        $sql = "SELECT DISTINCT a.id_alumno, a.nombre AS nombre_alumno, a.apellidos 
                FROM alumno a 
                INNER JOIN nota n ON a.id_alumno = n.id_alumno 
                INNER JOIN materia m ON n.id_materia = m.id_materia 
                INNER JOIN especialidad e ON m.id_especialidad = e.id_especialidad 
                WHERE e.denominacion = 'TSDAWEB' 
                AND (a.nombre LIKE :termino OR a.apellidos LIKE :termino)";
        
        $stmt = $this->conexion->prepare($sql);
        $termino = "%" . $termino . "%";
        $stmt->bindParam(":termino", $termino, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>