<?php

require_once '../services/config.php';
require_once '../services/connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../img/Aiga_restaurant_inv.svg.png" type="image/x-icon">
    <script src="../js/code.js"></script>
</head>

<body id="portada">
        <?php
            include '../services/connection.php';
            session_start();
            $id=0;
            if(!isset($_SESSION['option'])){
            $_SESSION['option']=1;}
            /* Controla que la sesión esté iniciada */
            if (!isset($_SESSION['email'])) {
            header('Location: login.php');
            }
            $cadena = substr ( $_SESSION['email'], 0, -10);

            $id = $_REQUEST['id_mesa'];

        ?>
    <div class="row2 section-1">
        <div class="usuario column-1">
            <ul class="padding-lat">
                <b><a class="btn-logout">Bienvenido <?php echo $cadena;?></a></b>
            </ul>
        </div>
        <div class="column-2 titulo2">
            <h1>EXPERIA EXPERIENCE</h1>
        </div>
        <div class="logout column-1">
            <ul class="padding-lat">
                <b><a style="text-decoration:none" class="btn-logout" href="../processes/logout.proc.php">LOGOUT</a></b>
            </ul>
        </div>
    </div>
    <div class="flex">
        <div class="menu">
            <nav>
                <ul>
                    <li class="li_barra"><a class="barra" href="terrazas.php">Terrazas</a></li>
                    <li class="li_barra"><a class="barra" href="comedores.php">Comedores</a></li>
                    <li class="li_barra"><a class="barra" href="salas.php">Salas Privadas</a></li>
                </ul>
            </nav>
        </div> 
    </div>
    <div class="flex" id="flex">
        <div class="contenido" id="contenido">
        <div class="div_botones" id="div_botones">
            <div>
                <?php

                    $sql = "SELECT * FROM tbl_fecha where id_mesa='$id'";

                    $sentencia = $pdo -> prepare($sql);

                    $sentencia -> execute();

                    $results = $sentencia -> fetchAll(PDO::FETCH_OBJ);

                    $numRow = $sentencia->rowCount();

                    if($numRow > 0){
                        foreach($results as $result) {
                            echo "<tr>";
                            echo "<br>";
                            echo "<b>Hora: </b>";
                            echo "<td>".$result -> hora_reserva."</td>";
                            echo "<br>";
                            echo "<b>Dia: </b>";
                            echo "<td>".$result -> fecha_reserva."</td>";
                            echo "<br>";
                            echo "<td><a class='' href='../processes/eliminarreserva.php?id_mesa={$id}&hora_reserva={$result -> hora_reserva}&fecha_reserva={$result -> fecha_reserva}'><span><b>ELIMINAR RESERVA</b></span></a></td>";
                            echo "<br>";
                            echo "</tr>";
                            echo "<br>";
                        }
                    } else {
                        ?>
                            <h2>No hay reservas para esta mesa</h2>
                        <?php
                    }
                ?>
            </div>
        </div>
        </div>
    </div>
    <div class="flex" id="flex">
        <div class="footer">
            <nav>
                <ul>
                    <li class="li_barra"><a class="barra" href="historial.php">HISTORIAL DE RESERVAS</a></li>
                </ul>
            </nav>
        </div> 
    </div>
</body>

</html>