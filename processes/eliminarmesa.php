<?php 

include '../services/connection.php';

$mesa = $_GET['id_mesa'];

$sentencia = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mesa=? ");

$sentencia->bindParam(1, $mesa);
$sentencia->execute();

header('Location: ../view/mesas.php?exito=exito');

?>