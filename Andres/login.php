<?php
session_start();

ini_set("display_errors", "on");
$conexion = conectar_MySQL("sql308.byethost14.com", "b14_33887233", "13247291", "b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd)
{
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die("Error al conectar: " . mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die("Error al seleccionar la BD: " . mysqli_error($conexion));
    return $conexion;
}

// Función para verificar el inicio de sesión del administrador
function autenticarAdministrador($conexion, $USUARIO, $CONTRASENIA)
{
    $sql = "SELECT * FROM Administrador WHERE USUARIO = '$USUARIO' AND CONTRASENIA = '$CONTRASENIA'";
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si se obtuvo algún resultado
    if (mysqli_num_rows($resultado) > 0) {
        // Iniciar sesión y redirigir al panel de administración
        $_SESSION['admin'] = true;
        echo '<script>alert("Datos correctos");</script>';
        header("Location:../indexadm.html");
        exit();
    } else {
        // Datos incorrectos, mostrar mensaje de alerta
        echo '<script>alert("Usuario o contraseña incorrectos");</script>';
    }

    // Liberar memoria del resultado
    mysqli_free_result($resultado);
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $USUARIO = $_POST['USUARIO'];
    $CONTRASENIA = $_POST['CONTRASENIA'];

    // Autenticar al administrador
    autenticarAdministrador($conexion, $USUARIO, $CONTRASENIA);
}

mysqli_close($conexion);
?>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>