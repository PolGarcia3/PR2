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
    <title>Admin</title>
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

            // Controla que la sesión esté iniciada //
            if (!isset($_SESSION['email'])) {
            header('Location: login.php');
            }
            $cadena = substr ( $_SESSION['email'], 0, -10);

            //Mostrar todas las mesas

            $sql = "SELECT * FROM tbl_mesa";

            $sentencia = $pdo -> prepare($sql);

            $sentencia -> execute();

            $results = $sentencia -> fetchAll(PDO::FETCH_OBJ);

            //Mostrar todos los lugares de las mesas para el select

            $sql2 = "SELECT DISTINCT lugar_mesa, id_lugar FROM `tbl_mesa`;";

            $sentencia2 = $pdo -> prepare($sql2);

            $sentencia2 -> execute();

            $lugar_mesa = $sentencia2 -> fetchAll(PDO::FETCH_OBJ);
        ?>
    <div class="row2 section-1">
        <div class="usuario column-1">
            <ul class="padding-lat">
                <b><a class="btn-logout">ADMIN</a></b>
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
                    <li class="li_barra"><a class="barra" href="admin.php">Crear usuarios</a></li>
                    <li class="li_barra"><a class="barra active" href="mesas.php">Añadir mesas</a></li>
                </ul>
            </nav>
        </div> 
    </div>
    <div class="flex" id="flex">
        <div class="contenido" id="contenido">
        <div class="div_botones" id="div_botones">
            <form action="../processes/crearmesa.proc.php" method="post" onsubmit="return crearmesa();">
                <br>
                <select class="form" name="lugar" id="lugar">
				    <option value="">Donde esta ubicada la mesa?</option>
                        <?php
                        
                        foreach($lugar_mesa as $result){
                            echo "<option value='".$result -> lugar_mesa."'>".$result -> lugar_mesa."</option>";
                        }
                        ?>
                </select>
                <br>
                <input class="form" type="number" min="2" max="20" name="comensal" id="comensal" placeholder="Introduce cuantos comensales va a tener la mesa">
                <br>
                <div id="mensaje">
                </div>
                <input class="btn third" type="submit" value="CREAR">
            </form>
        </div>
        <div>
            <br>
            <h2>MESAS DISPONIBLES</h2>

            <?php
                    foreach($results as $result) {

                    $mesa = $result -> id_mesa;

                    ?>                        
                        <div class="cuadro2">
                    <?php
        
                    echo "<tr>";
                    echo "<br>";
                    echo "<b>Numero mesa: </b>";
                    echo "<td>".$result -> numero_mesa."</td>";
                    echo "<br>";
                    echo "<b>Lugar: </b>";
                    echo "<td>".$result -> lugar_mesa."</td>";
                    echo "<br>";
                    echo "<b>Comensales: </b>";
                    echo "<td>".$result -> comensales_mesa."</td>";
                    echo "<br>";
                    echo "<td><a class='boton modificar' href='../processes/modificarmesa.form.php?id_mesa={$mesa}'><span><b>MODIFICAR</b></span></a></td>";
                    echo "<td><a class='boton eliminar' href='../processes/eliminarmesa.php?id_mesa={$mesa}'><span><b>ELIMINAR</b></span></a></td>";
                    echo "<br>";
                    echo "</tr>";
                    echo "<br>";
                    
                    ?>                        
                        </div>
                    <?php
        
                    }
            ?>

        </div>
        </div>
    </div>
    <div id="mensaje">
        <?php
        if(isset($_GET['exito'])){
            ?><script>alert('Exito')</script><?php
        }
        ?>
    </div>
</body>

</html>