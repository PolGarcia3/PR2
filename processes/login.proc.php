<?php

// 1. Conexión con la base de datos	
include '../services/connection.php';

$email=$_REQUEST['email'];
$passwd=$_REQUEST['password'];

$sentencia = $pdo->prepare("SELECT * FROM tbl_camareros WHERE email_usu=? and contra_usu=MD5(?)");

$sentencia->bindParam(1, $email);
$sentencia->bindParam(2, $passwd);
$sentencia->execute();

$cuenta = $sentencia->rowCount();

if ($cuenta == 1) {

    // Comprobamos si coincide el email y el password

    session_start();

    $user = $sentencia->fetch(PDO::FETCH_ASSOC);

    $_SESSION['email']=$email;

    if ($user['tipo_usu'] == "2") {
        header("location: ../view/admin.php");
    } else {
        header("location: ../view/terrazas.php");
    };

} else {

    // En caso de que falle volvemos al login

    header("location: ../view/login.php?error=errorinicio");
    
};