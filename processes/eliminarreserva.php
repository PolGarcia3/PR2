<?php
        include '../services/connection.php';

        $id=$_REQUEST['id_mesa'];
        $hora_reserva=$_REQUEST['hora_reserva'];
        $fecha_reserva=$_REQUEST['fecha_reserva'];

        $query = "DELETE FROM tbl_fecha WHERE hora_reserva=? and fecha_reserva=? and id_mesa=?";

        $sentencia=$pdo->prepare($query);

        $sentencia->bindParam(1,$hora_reserva);
        $sentencia->bindParam(2,$fecha_reserva);
        $sentencia->bindParam(3,$id);
        $sentencia->execute();

        $sentencia->fetch(PDO::FETCH_ASSOC);

        header("Location: ../view/terrazas.php?exito=exito");
?>