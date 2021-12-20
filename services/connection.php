<?php

require_once '../services/config.php';

$servidor= "mysql:host=".SERVIDOR."; dbname=".BD; 

try {
    $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));

    /* echo "<script> alert('conexion establecida')</script>"; */

} catch (PDOException $e){
    echo $e->getMessage();
    echo "<script> alert('Error de conexion')</script>";
}

?>