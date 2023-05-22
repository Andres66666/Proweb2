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
    
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .btn-primary:hover {
            background-color: #0069d9;
        }
    
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    
        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .btn-success:hover {
            background-color: #218838;
        }
    
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .btn-danger:hover {
            background-color: #c82333;
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
                                            <th>Acciones</th>
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
                                                <td>
                                                <button type="button" value="<?= $product['ID_EMPLEADO']; ?>" class="editProductBtn btn btn-success btn-sm" onclick="openEditForm(<?= $product['ID_EMPLEADO']; ?>)">Editar</button>

                                                    <button type="button" value="<?= $product['ID_EMPLEADO']; ?>" class="editProductBtn btn btn-success btn-sm" data-toggle="modal" data-target="#editarEmpleadoModal">Editar</button>
                                                    <button type="button" value="<?= $product['ID_EMPLEADO']; ?>" class="deleteProductBtn btn btn-danger btn-sm">Eliminar</button>
                                                </td>
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

    <div id="editForm" class="edit-form-overlay">
    <div class="edit-form">
        <form method="POST" action="" id="buscar">
            <div class="row">
                <div class="column">
                    <label for="ID_EMPLEADO">ID_EMPLEADO:</label>
                    <input type="text" name="ID_EMPLEADO" id="ID_EMPLEADO">
                    <button type="submit" name="buscar">Buscar</button> 
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php
if (isset($_POST['buscar'])) {
    // Obtener el ID del empleado ingresado por el usuario
    $ID_empleado = $_POST['ID_EMPLEADO'];

    // Realizar la consulta a la base de datos
    $sql = "SELECT * FROM EMPLEADO WHERE ID_EMPLEADO = $ID_empleado";
    $resultado = mysqli_query($conexion, $sql);

    // Si se encontró el empleado, mostrar los detalles en el formulario
    if (mysqli_num_rows($resultado) > 0) {
        $empleado = mysqli_fetch_assoc($resultado);
        // Mostrar los detalles del empleado
        echo "<div class='row'>
                <div class='column'>
                    <label for='ID_EMPLEADO'>CI:</label>
                    <input type='number' name='ID_EMPLEADO' value='{$empleado['ID_EMPLEADO']}' readonly>
                </div>
              </div>";
        // Continúa mostrando los demás campos del formulario con los detalles del empleado
    } else {
        echo "No se encontró el empleado con ID_EMPLEADO $ID_empleado";
    }
}
?>

<div id="editForm" class="edit-form-overlay">
            <div class="edit-form">
                <form method="POST" id="buscar">
                    <table>
                        <tr>
                            <td>
                                <div class="form-group" style="text-align: center;">
                                    <canvas style="border:black 1px dashed;" id="canvas" width="150px" height="150px"></canvas><br>
                                    <input type="file" id="FOTO" name="FOTO" style="display:none;" value="<?php echo $accidente['FOTO']; ?>">
                                    <button type="button" id="btnCargarImagen">Cargar Imagen</button>
                                </div>
                            </td>
                            <script>
                                // Obtener elementos
                                var inputImagen = document.getElementById("FOTO");
                                var btnCargarImagen = document.getElementById("btnCargarImagen");
                                var canvas = document.getElementById("canvas");
                                var ctx = canvas.getContext("2d");

                                // Agregar evento click al botón de cargar imagen
                                btnCargarImagen.addEventListener("click", function() {
                                    // Simular click en input de tipo file
                                    inputImagen.click();
                                });

                                // Agregar evento change al input de tipo file
                                inputImagen.addEventListener("change", function() {
                                    // Verificar si se seleccionó una imagen
                                    if (this.files && this.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            // Crear nueva imagen
                                            var img = new Image();
                                            img.onload = function() {
                                                // Dibujar imagen en el canvas
                                                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                                            };
                                            img.src = e.target.result;
                                        }
                                        reader.readAsDataURL(this.files[0]);
                                    }
                                });

                            </script>
                            <td>
                                <div class="form-group" style="margin-top: -25px;">
                                    <label for="ID_EMPLEADO">CI</label>
                                    <input type="number" name="ID_EMPLEADO" value="<?php echo $accidente['ID_EMPLEADO']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="NOMBRE">Nombres</label>
                                    <input type="text" name="NOMBRE" value="<?php echo $accidente['NOMBRE']; ?>">
                                    </div>
                                <div class="form-group">
                                    <label for="APELLIDO_PAT">APELLIDO_PAT</label>
                                    <input type="text" name="APELLIDO_PAT" value="<?php echo $accidente['APELLIDO_PAT']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="APELLIDO_MAT">APELLIDO_MAT</label>
                                    <input type="text" name="APELLIDO_MAT" value="<?php echo $accidente['APELLIDO_MAT']; ?>">
                                </div>
                            </td>
                        </tr> 
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label for="F_CONTRATACION">F_CONTRATACION</label>
                                    <input type="date" name="F_CONTRATACION" style="width: 360px;" value="<?php echo $accidente['F_CONTRATACION']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label for="SEXO">SEXO:</label>
                                    <select name="SEXO" style="width: 360px;">
                                        <option value="Vacio"></option>
                                        <option value="Femenino" <?php if ($accidente['SEXO'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                                        <option value="Masculino" <?php if ($accidente['SEXO'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label for="ESPECIALIDAD">ESPECIALIDAD</label>
                                    <select name="ESPECIALIDAD" style="width: 360px;">
                                        <option value="Vacio"></option>
                                        <option value="MAQUILLADOR" <?php if ($accidente['ESPECIALIDAD'] == 'MAQUILLADOR') echo 'selected'; ?>>MAQUILLADOR</option>
                                        <option value="PEINADOR" <?php if ($accidente['ESPECIALIDAD'] == 'PEINADOR') echo 'selected'; ?>>PEINADOR</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label for="TELEFONO">TELEFONO</label>
                                    <input type="number" style="width: 355px;" name="TELEFONO" value="<?php echo $accidente['TELEFONO']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                    <label for="E_MAIL">E_MAIL</label>
                                    <input type="email" style="width: 355px;" name="E_MAIL" value="<?php echo $accidente['E_MAIL']; ?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="container column">
                        <button class="modify-button" type="submit" name="modificar">Modificar</button>
                        <button class="update-button" type="submit" name="actualizar">Actualizar</button>
                        <button class="delete-button" type="submit" name="eliminar">Eliminar</button>
                        </div>
                </form>
    </body>
</html>