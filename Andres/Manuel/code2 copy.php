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


    if (!empty($_FILES['FOTO']['name'])) {
        // Directorio donde deseas guardar las imágenes
        $targetDirectory = "path/to/directory/";
        $targetFile = $targetDirectory . basename($_FILES['FOTO']['name']);
        if (move_uploaded_file($_FILES['FOTO']['tmp_name'], $targetFile)) {
            // Archivo subido correctamente, ahora puedes guardar el nombre del archivo en la base de datos
            $FOTO = mysqli_real_escape_string($conexion, $_FILES['FOTO']['name']);
        } else {
            // Error al subir el archivo
            $res = [
                'status' => 500,
                'message' => 'Error al subir el archivo'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        // El campo de la foto está vacío
        $res = [
            'status' => 422,
            'message' => 'La foto es obligatoria'
        ];
        echo json_encode($res);
        return;
    }

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


if (isset($_POST['select_employee'])) {
    $ID_EMPLEADO = mysqli_real_escape_string($con, $_POST['ID_EMPLEADO']);

    // Verifica que el ID_EMPLEADO no esté vacío
    if ($ID_EMPLEADO == NULL) {
        $res = [
            'status' => 422,
            'message' => 'El ID_EMPLEADO es obligatorio'
        ];
        echo json_encode($res);
        return;
    }

    $query = "SELECT * FROM EMPLEADO WHERE ID_EMPLEADO='$ID_EMPLEADO'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $employee = mysqli_fetch_assoc($query_run);
        $res = [
            'status' => 200,
            'message' => 'Empleado seleccionado correctamente',
            'data' => $employee
        ];
        echo json_encode($res);
        return;
    } else {
        $error_message = mysqli_error($con);
        $res = [
            'status' => 500,
            'message' => 'Error al seleccionar el empleado: ' . $error_message
        ];
        echo json_encode($res);
        return;
    }
}



                                                                /*+++++++++++ eliminar ++++++++++++*/
        
            if (isset($_POST['delete_employee'])) {
            $ID_EMPLEADO = mysqli_real_escape_string($con, $_POST['ID_EMPLEADO']);
        
            $query = "DELETE FROM EMPLEADO WHERE ID_EMPLEADO='$ID_EMPLEADO'";
            $query_run = mysqli_query($con, $query);
        
            if ($query_run) {
                $res = [
                    'status' => 200,
                    'message' => 'Empleado eliminado correctamente'
                ];
                echo json_encode($res);
                return;
            } else {
                $error_message = mysqli_error($con);
                $res = [
                    'status' => 500,
                    'message' => 'Error al eliminar el empleado: ' . $error_message
                ];
                echo json_encode($res);
                return;
            }
        }
        
?>