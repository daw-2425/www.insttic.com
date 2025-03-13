<?php

    require "./conexion.php";

    $sql = $pdo->prepare(" SELECT e.nombre, e.apellido, p.id_profesor from profesor p inner join empleado e 
    on p.id_empleado = e.id_empleado");
      $sql1 = $pdo->prepare(" SELECT m.id_materia,p.id_profesor,e.denominacion from materia m inner join profesor p 
    on m.id_profesor = p.id_profesor
    inner join especialidad e on m.id_especialidad = e.id_especialidad where e.denominacion='TS-DAW';");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    while($row = $sql->fetch())
    $json[] = $row;
    $sql1->setFetchMode(PDO::FETCH_ASSOC);
    $sql1->execute();
    while($row = $sql1->fetch())
    $json1[] = $row;


    echo json_encode($json);
    echo json_encode($json1);


?>