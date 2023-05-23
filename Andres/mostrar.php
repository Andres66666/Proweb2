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
    <style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}
		input[type="text"] {
			padding: 5px;
			border-radius: 3px;
			border: 1px solid #ccc;
			margin-bottom: 10px;
			width: 250px;
		}
        a{
            text-decoration: none;
        }

        .form-button {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.form-link {
    color: #fff;
  text-decoration: none;
}

.form-link:hover {
  text-decoration: underline;
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
        echo '<div style="margin-top: 70px;">';
        echo '<table id="myTable" class="table table-bordered table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border-top: 1px solid #ccc;"></th>';
        echo '<th class="vertical-line">ID</th>';
        echo '<th class="vertical-line">Nonbre</th>';
        echo '<th class="vertical-line">Apellido Paterno</th>';
        echo '<th class="vertical-line">Apellido Materno</th>';
        echo '<th class="vertical-line">Fecha Contratacion</th>';
        echo '<th class="vertical-line">Sexo</th>';
        echo '<th class="vertical-line">Especialidad</th>';
        echo '<th class="vertical-line">Telefono</th>';
        echo '<th class="vertical-line">Correo</th>';
        echo '<th class="vertical-line">Foto</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td style="border-left: 1px solid #ccc;"></td>';
            echo '<td class="vertical-line">' . $row['ID_EMPLEADO'] . '</td>';
            echo '<td class="vertical-line">' . $row['NOMBRE'] . '</td>';
            echo '<td class="vertical-line">' . $row['APELLIDO_PAT'] . '</td>';
            echo '<td class="vertical-line">' . $row['APELLIDO_MAT'] . '</td>';
            echo '<td class="vertical-line">' . $row['F_CONTRATACION'] . '</td>';
            echo '<td class="vertical-line">' . $row['SEXO'] . '</td>';
            echo '<td class="vertical-line">' . $row['ESPECIALIDAD'] . '</td>';
            echo '<td class="vertical-line">' . $row['TELEFONO'] . '</td>';
            echo '<td class="vertical-line">' . $row['E_MAIL'] . '</td>';
            //echo '<td class="vertical-line"><img src="ruta/donde/guardar/la/imagen/' . $row['FOTO'] . '" width="100" height="100" alt="Foto del empleado"></td>';
            echo '<td class="vertical-line">' . $row['FOTO'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo 'No se encontraron empleados registrados.';
    }

    mysqli_free_result($resultado);
}
// Llamar a la función para mostrar los empleados
mostrarEmpleados($conexion);

mysqli_close($conexion);
?>
    <div class="row">
    <div class="column">
        <form method="POST" action="buscar.php">
            <label for="ID_EMPLEADO">Buca Al Empleado Por Su ID:</label><br>
            <input type="text" name="ID_EMPLEADO" id="ID_EMPLEADO">
            <button type="submit" name="buscar" class="form-button">Buscar</button> <br><br>
            <button type="button" class="form-button"><a href="Empleados.html" class="form-link">Regresar 🚪</a></button>
        </form>
    </div>
</div> 
</body>
</html>
