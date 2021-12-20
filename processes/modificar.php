<?php

include '../services/connection.php';

$email = $_REQUEST['email_usu'];
$email_usu = $_REQUEST['email'];
$nom_usu = $_REQUEST['nombre'];
$apellido_usu = $_REQUEST['apellido'];
$contra_usu = $_REQUEST['passwd'];

$sentencia = $pdo->prepare("UPDATE tbl_camareros SET email_usu=?, nom_usu=?, apellido_usu=?, contra_usu=?, tipo_usu='1' where email_usu='$email'");

$sentencia->bindParam(1, $email_usu);
$sentencia->bindParam(2, $nom_usu);
$sentencia->bindParam(3, $apellido_usu);
$sentencia->bindParam(4, $contra_usu);
$sentencia->execute();

header('Location: ../view/admin.php?exito=exito');

?>