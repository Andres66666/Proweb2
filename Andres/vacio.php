<?php

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
                                                    <button type="button" value="<?= $product['id']; ?>" class="viewProductBtn btn btn-info btn-sm">Ver</button>
                                                    <button type="button" value="<?= $product['id']; ?>" class="editProductBtn btn btn-success btn-sm">Editar</button>
                                                    <button type="button" value="<?= $product['id']; ?>" class="deleteProductBtn btn btn-danger btn-sm">Eliminar</button>
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