<?php

ini_set("display_errors","on");
$conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd){
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar: " . mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: " . mysqli_error($conexion));
    return $conexion;
}

if (isset($_POST['insert_employee'])) {
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

    if ($ID_EMPLEADO == NULL ||$NOMBRE == NULL || $APELLIDO_PAT == NULL || $APELLIDO_MAT == NULL || $F_CONTRATACION == NULL || $SEXO == NULL || $ESPECIALIDAD == NULL || $TELEFONO == NULL || $E_MAIL == NULL || $FOTO == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO EMPLEADO (ID_EMPLEADO,NOMBRE, APELLIDO_PAT, APELLIDO_MAT, F_CONTRATACION, SEXO, ESPECIALIDAD, TELEFONO, E_MAIL, FOTO) 
            VALUES ('$ID_EMPLEADO','$NOMBRE', '$APELLIDO_PAT', '$APELLIDO_MAT', '$F_CONTRATACION', '$SEXO', '$ESPECIALIDAD', '$TELEFONO', '$E_MAIL', '$FOTO')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Empleado insertado correctamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $error_message = mysqli_error($con);
        $res = [
            'status' => 500,
            'message' => 'Error al insertar el empleado: ' . $error_message
        ];
        echo json_encode($res);
        return;
    }
}
?>