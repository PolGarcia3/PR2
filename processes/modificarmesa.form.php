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
            <b><a style="text-decoration:none" class="btn-logout" href="../view/admin.php">VOLVER</a></b>
            </ul>
        </div>
        <div class="column-2 titulo2">
            <h1>EXPERIA EXPERIENCE</h1>
        </div>
        <div class="logout column-1">
            <ul class="padding-lat">
                <b><a style="text-decoration:none" class="btn-logout" href="logout.proc.php">LOGOUT</a></b>
            </ul>
        </div>
    </div>
    <div class="flex">
        <div class="menu">
            <nav>
                <ul>
                    <li class="li_barra"><a class="barra1">Modificar Mesa</a></li>
                </ul>
            </nav>
        </div> 
    </div>
    <?php

        $mesa = $_GET['id_mesa'];

        $sentencia = $pdo->prepare("SELECT * FROM tbl_mesa where id_mesa=?");

        $sentencia->bindParam(1, $mesa);
        $sentencia->execute();

        $results = $sentencia -> fetch(PDO::FETCH_OBJ);

        //Mostrar todos los lugares de las mesas para el select

        $sql2 = "SELECT DISTINCT lugar_mesa, id_lugar FROM `tbl_mesa`;";

        $sentencia2 = $pdo -> prepare($sql2);

        $sentencia2 -> execute();

        $lugar_mesa = $sentencia2 -> fetchAll(PDO::FETCH_OBJ);

    ?>
    <div class="flex" id="flex">
        <div class="contenido" id="contenido">
        <div class="div_botones" id="div_botones">
            <form action="modificarmesa.php" method="post" onsubmit="return crearmesa();">
                <br>
                <select class="form" name="lugar" id="lugar">
				    <option value="">Nueva ubicacion de la mesa</option>
                        <?php
                        
                        foreach($lugar_mesa as $result){
                            echo "<option value='".$result -> lugar_mesa."'>".$result -> lugar_mesa."</option>";
                        }
                        ?>
                </select>
                <br>
                <input class="form" type="text" name="comensales" id="comensal" max="20" min="2" value="<?php echo $results -> comensales_mesa; ?>">
                <br>
                <div id="mensaje">
                </div>
                <input type="hidden" name="id_mesa" value="<?php echo $mesa; ?>">
                <input class="btn third" type="submit" value="MODIFICAR">
            </form>
        </div>
        </div>
    </div>
</body>

</html>