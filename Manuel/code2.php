<?php

require 'dbcon.php';

if (isset($_POST['save_product'])) {
    $producto = mysqli_real_escape_string($con, $_POST['producto']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);

    if ($producto == NULL || $descripcion == NULL || $cantidad == NULL || $precio == NULL || $categoria == NULL || $estado == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO productos (producto, descripcion, cantidad, precio, categoria, estado) VALUES ('$producto', '$descripcion', '$cantidad', '$precio', '$categoria', '$estado')";
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
}





if (isset($_POST['update_product'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $producto = mysqli_real_escape_string($con, $_POST['producto']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
    $precio = mysqli_real_escape_string($con, $_POST['precio']);
    $categoria = mysqli_real_escape_string($con, $_POST['categoria']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);


    if ($producto == NULL || $descripcion == NULL || $cantidad == NULL || $precio == NULL || $categoria == NULL || $estado == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Todos los campos son obligatorios'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE productos SET producto='$producto', descripcion='$descripcion', cantidad='$cantidad', precio='$precio', categoria = '$categoria', estado = '$estado'
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