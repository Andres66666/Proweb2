    <?php

ini_set("display_errors","on");
$conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd){
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar : ".mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: ".mysqli_error($conexion));
    return $conexion;
}

function insertarAccidente($conexion, $CI, $NOMBRES, $APELLIDO_PAT, $APELLIDO_MAT,$FECHA_NAC,$SEXO,$TELEFONO,$CORREO,$CATEGORIA,$IMG){
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


$ok = insertarAccidente($conexion, $CI, $NOMBRES, $APELLIDO_PAT, $APELLIDO_MAT,$FECHA_NAC,$SEXO,$TELEFONO,$CORREO,$CATEGORIA,$IMG);

if ($ok == false){
    echo "Error al insertar datos<br/>";
}else{
    echo "Datos insertados correctamente<br/>";
}



?>

<?php
// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Verificar las credenciales del administrador
$adminUsuario = 'admin';
$adminPassword = 'admin123';

if ($usuario === $adminUsuario && $password === $adminPassword) {
    // Credenciales válidas, redirigir al panel de administración
    header("Location: panel_administrador.php");
    exit();
} else {
    // Credenciales inválidas, redirigir al formulario de inicio de sesión
    header("Location: formulario_login.php");
    exit();
}
?>