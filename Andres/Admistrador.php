<?php

ini_set("display_errors","on");
$conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd){
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar : ".mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: ".mysqli_error($conexion));
    return $conexion;
}

function Administrador($conexion, $CI, $NOMBRES, $APELLIDO_PAT, $APELLIDO_MAT,$FECHA_NAC,$SEXO,$TELEFONO,$CORREO,$CATEGORIA,$IMG){
    $sql = "INSERT INTO  Empleados VALUES (".$CI.",'".$NOMBRES."','".$APELLIDO_PAT."','".$APELLIDO_MAT."','".$FECHA_NAC."','".$SEXO."','".$TELEFONO."','".$CORREO."','".$CATEGORIA."','".$IMG."')";
    return mysqli_query($conexion, $sql);
}

$CI = $_POST['CI'];
$NOMBRES = $_POST['NOMBRES'];
$APELLIDO_PAT = $_POST['APELLIDO_PAT'];
$APELLIDO_MAT = $_POST['APELLIDO_MAT'];
$FECHA_NAC = $_POST['FECHA_NAC'];
$SEXO = $_POST['SEXO'];
$TELEFONO = $_POST['TELEFONO'];
$CORREO = $_POST['CORREO'];
$CATEGORIA = $_POST['CATEGORIA'];
$IMG = $_POST['IMG'];


$ok = Administrador($conexion, $CI, $NOMBRES, $APELLIDO_PAT, $APELLIDO_MAT,$FECHA_NAC,$SEXO,$TELEFONO,$CORREO,$CATEGORIA,$IMG);

if ($ok == false){
    echo "Error al insertar datos<br/>";
}else{
    echo "Datos insertados correctamente<br/>";
}



?>

