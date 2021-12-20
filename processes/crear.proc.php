<?php

include '../services/connection.php';

$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$email = $_REQUEST['email'];
$passwd = $_REQUEST['passwd'];

$query = "INSERT INTO `tbl_camareros` (`id_usu`, `nom_usu`, `tipo_usu`, `apellido_usu`, `contra_usu`, `email_usu`) VALUES (NULL,?, '1', ?, ?, ?)";

$sentencia =$pdo->prepare($query);

$sentencia->bindParam(1, $nombre);
$sentencia->bindParam(2, $apellido);
$sentencia->bindParam(3, $passwd);
$sentencia->bindParam(4, $email);

$sentencia->execute();

header('Location: ../view/admin.php?exito=exito');

?>