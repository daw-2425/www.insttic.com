<?php

$stmt = $pdo->prepare("SELECT * FROM noticias LIMIT 3");
$stmt->execute();
$paginas = $stmt->fetchAll();

?>