<?php

include '../services/connection.php';

$mesa = $_REQUEST['id_mesa'];
$comensales = $_REQUEST['comensales'];

$sentencia = $pdo->prepare("UPDATE tbl_mesa SET comensales_mesa=? where id_mesa='$mesa'");

print_r ($sentencia);

$sentencia->bindParam(1, $comensales);
$sentencia->execute();

header('Location: ../view/mesas.php?exito=exito');

?>