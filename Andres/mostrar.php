<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Add your CSS styles here */
        .oculto0 {
            display: none;
        }
    
        .contenido1 {
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
        }
    
        .modal-dialog {
            max-width: 600px;
            margin: 30px auto;
        }
    
        .modal-body {
            padding: 20px;
        }
    
        .modal-footer {
            padding: 10px 20px;
            background-color: #f4f4f4;
            border-top: 1px solid #ccc;
        }
    
        .container {
            margin-top: 20px;
        }
    
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    
        .card-header {
            background-color: #f4f4f4;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
        }
    
        .card-body {
            padding: 20px;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
        }
    
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }


        .vertical-line {
    border-right: 1px solid #dee2e6;
}
    </style>
</head>
<body>
    <?php
ini_set("display_errors", "on");
$conexion = conectar_MySQL("sql308.byethost14.com", "b14_33887233", "13247291", "b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd)
{
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die("Error al conectar: " . mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die("Error al seleccionar la BD: " . mysqli_error($conexion));
    return $conexion;
}

function mostrarEmpleados($conexion)
{
    $sql = "SELECT * FROM EMPLEADO";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<table id="myTable" class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="vertical-line">ID</th>';
        echo '<th class="vertical-line">NOMBRE</th>';
        echo '<th class="vertical-line">APELLIDO_PAT</th>';
        echo '<th class="vertical-line">APELLIDO_MAT</th>';
        echo '<th class="vertical-line">FECHA_CONTRATACION</th>';
        echo '<th class="vertical-line">SEXO</th>';
        echo '<th class="vertical-line">ESPECIALIDAD</th>';
        echo '<th class="vertical-line">TELEFONO</th>';
        echo '<th class="vertical-line">E_MAIL</th>';
        echo '<th class="vertical-line">FOTO</th>';
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
<div id="mi-div1" class="oculto0">
        <section class="contenido1">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="vertical-line">ID_EMPLEADO</th>
                                            <th class="vertical-line">NOMBRE</th>
                                            <th class="vertical-line">APELLIDO_PAT</th>
                                            <th class="vertical-line">APELLIDO_MAT</th>
                                            <th class="vertical-line">F_CONTRATACION</th>
                                            <th class="vertical-line">SEXO</th>
                                            <th class="vertical-line">ESPECIALIDAD</th>
                                            <th class="vertical-line">TELEFONO</th>
                                            <th class="vertical-line">E_MAIL</th>
                                            <th class="vertical-line">FOTO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td class="vertical-line"><?= $product['ID_EMPLEADO'] ?></td>
                                                <td class="vertical-line"><?= $product['NOMBRE'] ?></td>
                                                <td class="vertical-line"><?= $product['APELLIDO_PAT'] ?></td>
                                                <td class="vertical-line"><?= $product['APELLIDO_MAT'] ?></td>
                                                <td class="vertical-line"><?= $product['F_CONTRATACION'] ?></td>
                                                <td class="vertical-line"><?= $product['SEXO'] ?></td>
                                                <td class="vertical-line"><?= $product['ESPECIALIDAD'] ?></td>
                                                <td class="vertical-line"><?= $product['TELEFONO'] ?></td>
                                                <td class="vertical-line"><?= $product['E_MAIL'] ?></td>
                                                <td class="vertical-line"><?= $product['FOTO'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="row">
    <div class="column">
        <form method="POST" action="buscar.php">
            <label for="ID_EMPLEADO">ID_EMPLEADO:</label>
            <input type="text" name="ID_EMPLEADO" id="ID_EMPLEADO">
            <button type="submit" name="buscar">Buscar</button> 
        </form>
    </div>
</div> 
</body>
</html>
