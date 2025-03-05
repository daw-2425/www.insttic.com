<?php


class Conexion_Insttic
{

    private $host = 'localhost';
    private $nombre_base_de_datos = 'insttic';
    private $usuario = 'root';
    private $password = '';
    private $conexion;

    public function getConexion()
    {

        try {

            $this->conexion = null;
            $dns = "mysql:host=$this->host;dbname=$this->nombre_base_de_datos";
            $this->conexion =  new PDO($dns, $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            echo "Se ha producido un error al establecer la conexion " . $e->getMessage() . "</br>";
            echo "Se ha producido un error al establecer la conexion codigo del error " . $e->getCode();
            if ($e->getCode() === 1049) {
                echo "No se pudo localizar la base de datos $this->nombre_base_de_datos";
            } else if ($e->getCode() === 1045) {
                echo "Usuario o Contraseña incorrecta";
            } else if ($e->getCode() === 2002) {
                echo "Servidor no encontrado.";
            }
        }
        return $this->conexion;
    }
}

$conectar = new Conexion_Insttic();
$conectar->getConexion();
if ($conectar) {
    // echo "CONEXION EXITOSA";
} else {
    // echo "CONEXION FALLIDA";
}
