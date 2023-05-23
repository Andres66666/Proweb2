
<?php

ini_set("display_errors","on");
$conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd){
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar: " . mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: " . mysqli_error($conexion));
    return $conexion;
}

/* Función para insertar empleados en la base de datos */
function Empleado($conexion, $ID_EMPLEADO, $NOMBRE, $APELLIDO_PAT, $APELLIDO_MAT, $F_CONTRATACION, $SEXO, $ESPECIALIDAD, $TELEFONO, $E_MAIL, $FOTO, $ID_ADMINISTRADOR){
    $sql = "INSERT INTO EMPLEADO VALUES ('$ID_EMPLEADO', '$NOMBRE', '$APELLIDO_PAT', '$APELLIDO_MAT', '$F_CONTRATACION', '$SEXO', '$ESPECIALIDAD', '$TELEFONO', '$E_MAIL', '$FOTO', '$ID_ADMINISTRADOR')";
    return mysqli_query($conexion, $sql);
}

$ID_EMPLEADO = $_POST['ID_EMPLEADO'];
$NOMBRE = $_POST['NOMBRE'];
$APELLIDO_PAT = $_POST['APELLIDO_PAT'];
$APELLIDO_MAT = $_POST['APELLIDO_MAT'];
$F_CONTRATACION = $_POST['F_CONTRATACION'];
$SEXO = $_POST['SEXO'];
$ESPECIALIDAD = $_POST['ESPECIALIDAD'];
$TELEFONO = $_POST['TELEFONO'];
$E_MAIL = $_POST['E_MAIL'];
$FOTO = $_POST['FOTO'];

// Realizar consulta para obtener el ID del administrador
$sql = "SELECT ID_ADMINISTRADOR FROM Administrador";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se obtuvo algún resultado
if (mysqli_num_rows($resultado) > 0) {
    // Obtener el primer registro
    $row = mysqli_fetch_assoc($resultado);
    $ID_ADMINISTRADOR = $row['ID_ADMINISTRADOR'];

    $ok = Empleado($conexion, $ID_EMPLEADO, $NOMBRE, $APELLIDO_PAT, $APELLIDO_MAT, $F_CONTRATACION, $SEXO, $ESPECIALIDAD, $TELEFONO, $E_MAIL, $FOTO, $ID_ADMINISTRADOR);

    if ($ok == false){
        echo '<script>alert("Error al insertar los datos");</script>';
        header("Location:Empleados.html");
        
    } else { 
        echo '<script>alert("Datos insertados correctamente");</script>';
        header("Location:mostrar.php");
    }

    // Asignar el valor del ID_ADMINISTRADOR al campo correspondiente en el formulario
    echo '<script>document.getElementsByName("ID_ADMINISTRADOR")[0].value = "' . $ID_ADMINISTRADOR . '";</script>';
} else {
    echo "No se encontró ningún ID de administrador<br/>";
}

// Liberar memoria del resultado
mysqli_free_result($resultado);


mysqli_close($conexion);
?>
