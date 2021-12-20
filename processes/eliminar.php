<?php 

include '../services/connection.php';

$email = $_REQUEST['email_usu'];

$sentencia = $pdo->prepare("DELETE FROM tbl_camareros WHERE email_usu=? ");

$sentencia->bindParam(1, $email);
$sentencia->execute();

header('Location: ../view/admin.php?exito=exito');

?>