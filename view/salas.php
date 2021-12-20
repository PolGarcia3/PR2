<?php

require_once '../services/config.php';
require_once '../services/connection.php';

$fecha = date('Y-m-d');

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
                    <li class="li_barra"><a class="barra active" href="salas.php">Salas Privadas</a></li>
                </ul>
            </nav>
        </div> 
    </div>
    <div class="flex" id="flex">
        <div class="contenido" id="contenido">
        <div class="div_botones" id="div_botones">
            <div>
                <h2>SALA PRIVADA 1</h2>

                <?php

                    $sql = "SELECT * FROM tbl_mesa where lugar_mesa='Sala Privada 1'";

                    $sentencia = $pdo -> prepare($sql);

                    $sentencia -> execute();

                    $results = $sentencia -> fetchAll(PDO::FETCH_OBJ);

                        foreach($results as $result) {
                            
                            ?>                        
                                <div class="cuadro">
                            <?php
                    
                            echo "<tr>";
                            echo "<br>";
                            echo "<b>Numero Mesa: </b>";
                            echo "<td>".$result -> numero_mesa."</td>";
                            echo "<br>";
                            echo "<b>Lugar: </b>";
                            echo "<td>".$result -> lugar_mesa."</td>";
                            echo "<br>";
                            echo "<b>Comensales: </b>";
                            echo "<td>".$result -> comensales_mesa."</td>";
                            echo "<br>";
                            echo "</tr>";
                            echo "<br>";
                            
                ?>
                        <form action="../processes/reserva.php" method="POST" onsubmit="return reserva();">
                            <b><label for="dia">Dia de la reserva:</label></b>
                            <br>
                            <br>
                            <input class="form" type="date" id="dia_reserva" name="dia_reserva" min="<?php echo $fecha; ?>"  placeholder="Que dia quieres reservar">
                            <br>
                            <br>
                            <b><label for="horario">Hora de la reserva: </label><b>
                            <br>
                            <br>
                            <select class="form" name="horario">
                                <option value="13:00-14:00">13:00-14:00</option>
                                <option value="14:00-15:00">14:00-15:00</option>
                                <option value="15:00-16:00">15:00-16:00</option>
                                <option value="20:00-21:00">20:00-21:00</option>
                                <option value="21:00-22:00">21:00-22:00</option>
                                <option value="22:00-23:00">22:00-23:00</option>
                            </select>
                            <br>
                            <div id="mensaje">
                            </div>
                            <input type="hidden" name="id_mesa" value="<?php echo $id_mesa; ?>">
                            <input class="btn third" type="submit" value="RESERVAR" name="crea" onclick="window.location.href='reserva.php?id_mesa=<?php echo $id_mesa; ?>'">
                            <input class="btn third" type="button" value="QUITAR RESERVA" name="elimina" onclick="window.location.href='quitarreserva.php?id_mesa=<?php echo $id_mesa; ?>'">
                        </form>
                    </div>
                    <?php
                        }
                    ?> 

            </div>
            <br>
            <br>
            <div>

                <h2>SALA PRIVADA 2</h2>

                <?php

                    $sql = "SELECT * FROM tbl_mesa where lugar_mesa='Sala Privada 2'";

                    $sentencia = $pdo -> prepare($sql);

                    $sentencia -> execute();

                    $results = $sentencia -> fetchAll(PDO::FETCH_OBJ);

                        foreach($results as $result) {
                            
                            ?>                        
                                <div class="cuadro">
                            <?php
                    
                            echo "<tr>";
                            echo "<br>";
                            echo "<b>Numero Mesa: </b>";
                            echo "<td>".$result -> numero_mesa."</td>";
                            echo "<br>";
                            echo "<b>Lugar: </b>";
                            echo "<td>".$result -> lugar_mesa."</td>";
                            echo "<br>";
                            echo "<b>Comensales: </b>";
                            echo "<td>".$result -> comensales_mesa."</td>";
                            echo "<br>";
                            echo "</tr>";
                            echo "<br>";
            
                ?>
                        <form action="../processes/reserva.php" method="POST" onsubmit="return reserva();">
                            <b><label for="dia">Dia de la reserva:</label></b>
                            <br>
                            <br>
                            <input class="form" type="date" id="dia_reserva" name="dia_reserva" min="<?php echo $fecha; ?>"  placeholder="Que dia quieres reservar">
                            <br>
                            <br>
                            <b><label for="horario">Hora de la reserva: </label><b>
                            <br>
                            <br>
                            <select class="form" name="horario">
                                <option value="13:00-14:00">13:00-14:00</option>
                                <option value="14:00-15:00">14:00-15:00</option>
                                <option value="15:00-16:00">15:00-16:00</option>
                                <option value="20:00-21:00">20:00-21:00</option>
                                <option value="21:00-22:00">21:00-22:00</option>
                                <option value="22:00-23:00">22:00-23:00</option>
                            </select>
                            <br>
                            <div id="mensaje">
                            </div>
                            <input type="hidden" name="id_mesa" value="<?php echo $id_mesa; ?>">
                            <input class="btn third" type="submit" value="RESERVAR" name="crea" onclick="window.location.href='reserva.php?id_mesa=<?php echo $id_mesa; ?>'">
                            <input class="btn third" type="button" value="QUITAR RESERVA" name="elimina" onclick="window.location.href='quitarreserva.php?id_mesa=<?php echo $id_mesa; ?>'">
                        </form>
                    </div>
                    <?php
                        }
                    ?>

            </div>
            <br>
            <br>
            <div>

                <h2>SALA PRIVADA 3</h2>

                <?php

                    $sql = "SELECT * FROM tbl_mesa where lugar_mesa='Sala Privada 3'";

                    $sentencia = $pdo -> prepare($sql);

                    $sentencia -> execute();

                    $results = $sentencia -> fetchAll(PDO::FETCH_OBJ);

                        foreach($results as $result) {
                           
                            ?>                        
                                <div class="cuadro">
                            <?php
                    
                            echo "<tr>";
                            echo "<br>";
                            echo "<b>Numero Mesa: </b>";
                            echo "<td>".$result -> numero_mesa."</td>";
                            echo "<br>";
                            echo "<b>Lugar: </b>";
                            echo "<td>".$result -> lugar_mesa."</td>";
                            echo "<br>";
                            echo "<b>Comensales: </b>";
                            echo "<td>".$result -> comensales_mesa."</td>";
                            echo "<br>";
                            echo "</tr>";
                            echo "<br>";
        
                    ?>
                        <form action="../processes/reserva.php" method="POST" onsubmit="return reserva();">
                            <b><label for="dia">Dia de la reserva:</label></b>
                            <br>
                            <br>
                            <input class="form" type="date" id="dia_reserva" name="dia_reserva" min="<?php echo $fecha; ?>"  placeholder="Que dia quieres reservar">
                            <br>
                            <br>
                            <b><label for="horario">Hora de la reserva: </label><b>
                            <br>
                            <br>
                            <select class="form" name="horario">
                                <option value="13:00-14:00">13:00-14:00</option>
                                <option value="14:00-15:00">14:00-15:00</option>
                                <option value="15:00-16:00">15:00-16:00</option>
                                <option value="20:00-21:00">20:00-21:00</option>
                                <option value="21:00-22:00">21:00-22:00</option>
                                <option value="22:00-23:00">22:00-23:00</option>
                            </select>
                            <br>
                            <div id="mensaje">
                            </div>
                            <input type="hidden" name="id_mesa" value="<?php echo $id_mesa; ?>">
                            <input class="btn third" type="submit" value="RESERVAR" name="crea" onclick="window.location.href='reserva.php?id_mesa=<?php echo $id_mesa; ?>'">
                            <input class="btn third" type="button" value="QUITAR RESERVA" name="elimina" onclick="window.location.href='quitarreserva.php?id_mesa=<?php echo $id_mesa; ?>'">
                        </form>
                    </div>
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
    <div id="mensaje">
        <?php
        if(isset($_GET['reserva'])){
            ?><script>alert('ESTA MESA YA ESTA RESERVADA')</script><?php
        }
        ?>
    </div>
    <div id="mensaje">
        <?php
        if(isset($_GET['exito'])){
            ?><script>alert('Reserva eliminada')</script><?php
        }
        ?>
    </div>
</body>

</html>