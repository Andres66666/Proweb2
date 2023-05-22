<?php

require 'conection.php'; 

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
        echo "Error al insertar datos<br/>";
    } else {
        echo "Datos insertados correctamente<br/>";
    }

    // Asignar el valor del ID_ADMINISTRADOR al campo correspondiente en el formulario
    echo '<script>document.getElementsByName("ID_ADMINISTRADOR")[0].value = "' . $ID_ADMINISTRADOR . '";</script>';
} else {
    echo "No se encontró ningún ID de administrador<br/>";
}


// Liberar memoria del resultado
mysqli_free_result($resultado);

                                                        /*+++++++++++ editar++++++++++++*/

if (isset($_POST['edit_employee'])) {
    $ID_EMPLEADO = mysqli_real_escape_string($con, $_POST['ID_EMPLEADO']);
    $NOMBRE = mysqli_real_escape_string($con, $_POST['NOMBRE']);
    $APELLIDO_PAT = mysqli_real_escape_string($con, $_POST['APELLIDO_PAT']);
    $APELLIDO_MAT = mysqli_real_escape_string($con, $_POST['APELLIDO_MAT']);
    $F_CONTRATACION = mysqli_real_escape_string($con, $_POST['F_CONTRATACION']);
    $SEXO = mysqli_real_escape_string($con, $_POST['SEXO']);
    $ESPECIALIDAD = mysqli_real_escape_string($con, $_POST['ESPECIALIDAD']);
    $TELEFONO = mysqli_real_escape_string($con, $_POST['TELEFONO']);
    $E_MAIL = mysqli_real_escape_string($con, $_POST['E_MAIL']);
    $FOTO = mysqli_real_escape_string($con, $_POST['FOTO']);

    if ($NOMBRE == NULL || $APELLIDO_PAT == NULL || $APELLIDO_MAT == NULL || $F_CONTRATACION == NULL || $SEXO == NULL || $ESPECIALIDAD == NULL || $TELEFONO == NULL || $E_MAIL == NULL || $FOTO == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE EMPLEADO SET NOMBRE='$NOMBRE', APELLIDO_PAT='$APELLIDO_PAT', APELLIDO_MAT='$APELLIDO_MAT', F_CONTRATACION='$F_CONTRATACION', SEXO='$SEXO', ESPECIALIDAD='$ESPECIALIDAD', TELEFONO='$TELEFONO', E_MAIL='$E_MAIL', FOTO='$FOTO'
                WHERE ID_EMPLEADO='$ID_EMPLEADO'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Empleado modificado correctamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $error_message = mysqli_error($con);
        $res = [
            'status' => 500,
            'message' => 'Error al modificar el empleado: ' . $error_message
        ];
        echo json_encode($res);
        return;
    }
}
                                /*+++++++++++ editar++++++++++++*/




/* Función para eliminar empleados de la base de datos */
function eliminarEmpleado($conexion, $ID_EMPLEADO){
    $sql = "DELETE FROM EMPLEADO WHERE ID_EMPLEADO='$ID_EMPLEADO'";
    return mysqli_query($conexion, $sql);
}

$ID_EMPLEADO = $_POST['ID_EMPLEADO'];

$ok = eliminarEmpleado($conexion, $ID_EMPLEADO);

if ($ok == false){
    echo "Error al eliminar empleado<br/>";
} else {
    echo "Empleado eliminado correctamente<br/>";
}

// Liberar memoria del resultado
mysqli_free_result($resultado);








function mostrarEmpleados($conexion) {
    $sql = "SELECT * FROM EMPLEADO";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<table id="myTable" class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="vertical-line">ID_EMPLEADO</th>';
        echo '<th class="vertical-line">NOMBRE</th>';
        echo '<th class="vertical-line">APELLIDO_PAT</th>';
        echo '<th class="vertical-line">APELLIDO_MAT</th>';
        echo '<th class="vertical-line">F_CONTRATACION</th>';
        echo '<th class="vertical-line">SEXO</th>';
        echo '<th class="vertical-line">ESPECIALIDAD</th>';
        echo '<th class="vertical-line">TELEFONO</th>';
        echo '<th class="vertical-line">E_MAIL</th>';
        echo '<th class="vertical-line">FOTO</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td class="vertical-line">' . $row['ID_EMPLEADO'] . '</td>';
            echo '<td class="vertical-line">' . $row['NOMBRE'] . '</td>';
            echo '<td class="vertical-line">' . $row['APELLIDO_PAT'] . '</td>';
            echo '<td class="vertical-line">' . $row['APELLIDO_MAT'] . '</td>';
            echo '<td class="vertical-line">' . $row['F_CONTRATACION'] . '</td>';
            echo '<td class="vertical-line">' . $row['SEXO'] . '</td>';
            echo '<td class="vertical-line">' . $row['ESPECIALIDAD'] . '</td>';
            echo '<td class="vertical-line">' . $row['TELEFONO'] . '</td>';
            echo '<td class="vertical-line">' . $row['E_MAIL'] . '</td>';
            echo '<td class="vertical-line">' . $row['FOTO'] . '</td>';
            echo '<td>';
            echo '<button type="button" value="' . $row['ID_EMPLEADO'] . '" class="viewProductBtn btn btn-info btn-sm">Ver</button>';
            echo '<button type="button" value="' . $row['ID_EMPLEADO'] . '" class="editProductBtn btn btn-success btn-sm">Editar</button>';
            echo '<button type="button" value="' . $row['ID_EMPLEADO'] . '" class="deleteProductBtn btn btn-danger btn-sm">Eliminar</button>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No se encontraron empleados registrados.';
    }

    mysqli_free_result($resultado);
}

// Llamar a la función para mostrar los empleados
mostrarEmpleados($conexion);



mysqli_close($conexion);
?>
