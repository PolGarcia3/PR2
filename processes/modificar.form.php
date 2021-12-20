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
                    <li class="li_barra"><a class="barra1">Modificar Usuario</a></li>
                </ul>
            </nav>
        </div> 
    </div>
    <?php

        $email = $_GET['email_usu'];

        $sentencia = $pdo->prepare("SELECT * FROM tbl_camareros where email_usu=?");

        $sentencia->bindParam(1, $email);
        $sentencia->execute();

        $results = $sentencia -> fetch(PDO::FETCH_OBJ);

    ?>
    <div class="flex" id="flex">
        <div class="contenido" id="contenido">
        <div class="div_botones" id="div_botones">
            <form action="modificar.php" method="post" onsubmit="return crear();">
                <br>
                <input class="form" type="text" name="nombre" id="nombre" value="<?php echo $results -> nom_usu ; ?>">
                <br>
                <input class="form" type="text" name="apellido" id="apellido" value="<?php echo $results -> apellido_usu; ?>">
                <br>
                <input class="form" type="text" name="email" id="email" value="<?php echo $results -> email_usu; ?>">
                <br>
                <input class="form" type="password" name="passwd" id="passwd" value="<?php echo $results -> contra_usu; ?>">
                <br>
                <div id="mensaje">
                </div>
                <input type="hidden" name="email_usu" value="<?php echo $email; ?>">
                <input class="btn third" type="submit" value="MODIFICAR">
            </form>
        </div>
        </div>
    </div>
</body>

</html>