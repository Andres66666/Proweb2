<?php

ini_set("display_errors","on");
$conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd){
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar: " . mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: " . mysqli_error($conexion));
    return $conexion;
}
?>