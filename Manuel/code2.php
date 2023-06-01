<?php

require 'dbcon.php';

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 3c27be75bab5d8d8f133404db7abe88fd1b2d9e1
if (isset($_POST['save_product'])) {
    $producto = mysqli_real_escape_string($con, $_POST['producto']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);
<<<<<<< HEAD

    // Obtener el nombre del archivo de imagen
    $imagen = $_FILES['imagen']['name'];
    // Obtener la ubicación temporal del archivo de imagen
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    // Mover el archivo de imagen a la carpeta deseada
    move_uploaded_file($imagen_temp, "imagenes/" . $imagen);

    if ($producto == NULL || $descripcion == NULL || $cantidad == NULL || $precio == NULL || $categoria == NULL || $estado == NULL || $imagen == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO productos (producto, descripcion, cantidad, precio, categoria, estado, imagen) VALUES ('$producto', '$descripcion', '$cantidad', '$precio', '$categoria', '$estado', '$imagen')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Producto registrado correctamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $error_message = mysqli_error($con);
        $res = [
            'status' => 500,
            'message' => 'Error al crear el producto: ' . $error_message
        ];
        echo json_encode($res);
        return;
=======

    // Obtener el nombre del archivo de imagen
    $imagen = $_FILES['imagen']['name'];
    // Obtener la ubicación temporal del archivo de imagen
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    // Mover el archivo de imagen a la carpeta deseada
    move_uploaded_file($imagen_temp, "imagenes/" . $imagen);

    if ($producto == NULL || $descripcion == NULL || $cantidad == NULL || $precio == NULL || $categoria == NULL || $estado == NULL || $imagen == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO productos (producto, descripcion, cantidad, precio, categoria, estado, imagen) VALUES ('$producto', '$descripcion', '$cantidad', '$precio', '$categoria', '$estado', '$imagen')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Producto registrado correctamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $error_message = mysqli_error($con);
        $res = [
            'status' => 500,
            'message' => 'Error al crear el producto: ' . $error_message
        ];
        echo json_encode($res);
        return;
=======
        $query = "INSERT INTO productos (producto, descripcion, cantidad, precio, categoria, img, estado) VALUES ('$producto', '$descripcion', '$cantidad', '$precio', '$categoria', '$img', '$estado')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Producto registrado correctamente'
            ];
            echo json_encode($res);
            return;
        } else {
            $error_message = mysqli_error($con);
            $res = [
                'status' => 500,
                'message' => 'Error al crear el producto: ' . $error_message
            ];
            echo json_encode($res);
            return;
        }
>>>>>>> b1d6c45c804ca5dc94a55d7de9732fa112ff50a0
>>>>>>> 3c27be75bab5d8d8f133404db7abe88fd1b2d9e1
    }
}






if (isset($_POST['update_product'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $producto = mysqli_real_escape_string($con, $_POST['producto']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);

    // Nuevos campos para la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];

    if ($producto == NULL || $descripcion == NULL || $cantidad == NULL || $precio == NULL || $categoria == NULL || $estado == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    // Mover la imagen a la ubicación deseada
    move_uploaded_file($imagen_tmp, "imagenes/$imagen");

    $query = "UPDATE productos SET producto='$producto', descripcion='$descripcion', cantidad='$cantidad', precio='$precio', categoria = '$categoria', estado = '$estado', imagen = '$imagen'
                WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Producto modificado correctamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $error_message = mysqli_error($con);
        $res = [
            'status' => 500,
            'message' => 'Error al modificar el producto: ' . $error_message
        ];
        echo json_encode($res);
        return;
    }
}




if(isset($_GET['product_id']))
{
    $product_id = mysqli_real_escape_string($con, $_GET['product_id']);

    $query = "SELECT * FROM productos WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $product = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Product Fetch Successfully by id',
            'data' => $product
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Id de producto no encotrado'
        ];
        echo json_encode($res);
        return;
    }
}



if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $query = "DELETE FROM productos WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Producto eliminado correctamente'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Producto no eliminado'
        ];
        echo json_encode($res);
        return;
    }
}
?>