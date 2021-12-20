<?php
include '../services/connection.php';

$lugar = $_REQUEST['lugar'];
$comensales = $_REQUEST['comensal'];

$sql1 = "SELECT * FROM `tbl_mesa` where lugar_mesa='$lugar' order by numero_mesa DESC LIMIT 1;";

$sentencia1 = $pdo -> prepare($sql1);

$sentencia1 -> execute();

$ultima_mesa = $sentencia1 -> fetch(PDO::FETCH_OBJ);

$num_mesa = $ultima_mesa -> numero_mesa + 1;

$query = "INSERT INTO `tbl_mesa` (`id_mesa`, `lugar_mesa`, `numero_mesa`, `comensales_mesa`) VALUES (NULL,?, ?, ?)";

$sentencia =$pdo->prepare($query);

$sentencia->bindParam(1, $lugar);
$sentencia->bindParam(2, $num_mesa);
$sentencia->bindParam(3, $comensales);
$sentencia->execute();

header('Location: ../view/mesas.php?exito=exito');

?>