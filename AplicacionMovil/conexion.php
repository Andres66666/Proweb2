<?php
/*sql308.byethost14.com */
/*sql308.byetcluster.com  */
error_reporting(0);
$conexion = mysqli_connect("sql308.byetcluster.com", "b14_33887233", "13247291", "b14_33887233_movil");

if (!$conexion) {
    exit("Error al intentar conectar al servidor");
} else {
    echo "Conexión exitosa<br>";
}
/*registro de a la tabla de la base datos*/

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];

        $consulta= "INSERT INTO usuarios (nombre) values('$nombre')";
        mysqli_query($conexion, $consulta);
        if (mysqli_affected_rows($conexion)>0){
            echo "regsitro completado ";
        }else{
            echo "Error registro";
        }
    }
}

/*primera consulta a la base de datos mostrar  los datos */
$consulta = " SELECT nombre FROM  usuarios";
$resultado =  mysqli_query($conexion, $consulta);

if($resultado &&  mysqli_num_rows($resultado)>0){
    while($fila = mysqli_fetch_assoc($resultado)){
        echo "nombre" . $fila['nombre']."<br>";
        echo "<br>";
    }
}else{
    echo "no se encotraron registros en la base de datos...";
}
mysqli_close($conexion);
?>




































<?php

/*sql308.byethost14.com */
/*sql308.byetcluster.com  */
error_reporting(0);
$conexion = mysqli_connect("sql308.byethost14.com", "b14_33887233", "13247291", "b14_33887233_movil");

if (!$conexion) {
    exit("Error al intentar conectar al servidor");
} else {
    echo "Conexión exitosa<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se ha enviado un formulario mediante el método POST

    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre']; // Obtener el valor del parámetro 'nombre' del formulario
        
        $consulta = "INSERT INTO usuario (nombre) VALUES ('$nombre')";
        mysqli_query($conexion, $consulta);
        
        if (mysqli_affected_rows($conexion) > 0) {
            echo "Registro completado. ¡Gracias!";
        } else {
            echo "Error! Su registro no se ha podido completar.";
        }
    }
}

// Realizar consulta SELECT
$consulta = "SELECT nombre FROM usuario";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Mostrar los datos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "nombre: " . $fila['nombre'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No se encontraron registros.";
}

mysqli_close($conexion);
?>
