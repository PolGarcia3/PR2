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
                    <li class="li_barra"><a class="barra active" href="admin.php">Crear usuarios</a></li>
                    <li class="li_barra"><a class="barra" href="mesas.php">Añadir mesas</a></li>
                </ul>
            </nav>
        </div> 
    </div>
    <div class="flex" id="flex">
        <div class="contenido" id="contenido">
        <div class="div_botones" id="div_botones">
            <form action="../processes/crear.proc.php" method="post" onsubmit="return crear();">
                <br>
                <input class="form" type="nombre" name="nombre" id="nombre" placeholder="Introduce un Nombre">
                <br>
                <input class="form" type="apellido" name="apellido" id="apellido" placeholder="Introduce un apellido">
                <br>
                <input class="form" type="email" name="email" id="email" placeholder="Introduce un Email">
                <br>
                <input class="form" type="password" name="passwd" id="passwd" placeholder="Introduce una contraseña">
                <br>
                <div id="mensaje">
                </div>
                <input class="btn third" type="submit" value="CREAR">
            </form>
        </div>
        <div>
            <br>
            <h2>USUARIOS DISPONIBLES</h2>

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

                $sql = "SELECT * FROM tbl_camareros where tipo_usu='1'";

                $sentencia = $pdo -> prepare($sql);

                $sentencia -> execute();

                $results = $sentencia -> fetchAll(PDO::FETCH_OBJ);

                foreach($results as $result) {

                    $email = $result -> email_usu;

                    ?>
                        <div class="cuadro2">
                    <?php

                    echo "<tr>";
                    echo "<br>";
                    echo "<b>Nombre: </b>";
                    echo "<td>".$result -> nom_usu."</td>";
                    echo "<br>";
                    echo "<b>Apellido: </b>";
                    echo "<td>".$result -> apellido_usu."</td>";
                    echo "<br>";
                    echo "<b>Email: </b>";
                    echo "<td>".$result -> email_usu."</td>";
                    echo "<br>";
                    echo "<td><a class='boton modificar' href='../processes/modificar.form.php?email_usu={$email}'><span><b>MODIFICAR</b></span></a></td>";
                    echo "<td><a class='boton eliminar' href='../processes/eliminar.php?email_usu={$email}'><span><b>ELIMINAR</b></span></a></td>";
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