<?php
        include '../services/connection.php';

        $id_mesa=$_REQUEST['id_mesa'];
        $horario=$_POST['horario'];
        $dia_reserva=$_POST['dia_reserva'];

        $query = "SELECT hora_reserva, fecha_reserva, id_mesa from `tbl_fecha` WHERE hora_reserva=? and fecha_reserva=? and id_mesa=?";

        $sentencia=$pdo->prepare($query);

        $sentencia->bindParam(1,$horario);
        $sentencia->bindParam(2,$dia_reserva);
        $sentencia->bindParam(3,$id_mesa);
        $sentencia->execute();

        $sentencia->fetch(PDO::FETCH_ASSOC);

        $numRow = $sentencia->rowCount();

        if($numRow > 0){
            header("Location: ../view/terrazas.php?reserva=reserva");
        }else{
            $query = "INSERT INTO `tbl_fecha` (`fecha_reserva`, `hora_reserva`, `id_mesa`, `hora_salida`, `fecha_lugar_reserva`) VALUES (?, ?, ?, NULL, NULL);";

            $sentencia=$pdo->prepare($query);

            $sentencia->bindParam(1,$dia_reserva);
            $sentencia->bindParam(2,$horario);
            $sentencia->bindParam(3,$id_mesa);
            $sentencia->execute();

            header("Location: ../view/exito.php");
        }
?>