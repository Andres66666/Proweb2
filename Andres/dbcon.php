<?php
$usuario  = "b14_33887233";
$password = "13247291";
$servidor = "sql308.byethost14.com";
$basededatos = "b14_33887233_Salon";
$con = mysqli_connect($servidor, $usuario, $password, $basededatos) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>
