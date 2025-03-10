<?php
session_start();
if (!isset($_SESSION["id"])) {
  header("Location: ../index.php");
}elseif ($_SESSION["rol"]='secretaria' ){
  header("Location:../secretaria");

}elseif ($_SESSION['rol']='estudiante') {
    header("Location:../estudiante");
}

?>