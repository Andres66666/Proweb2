<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro De Empleados</title>

    <!-- Bostra-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url(https://e1.pxfuel.com/desktop-wallpaper/508/876/desktop-wallpaper-beauty-parlour-model-beauty-parlour.jpg);
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        table {
            margin: 0 auto;
            text-align: left;
            border-collapse: separate;
            border-spacing: 0 5px;
            width: 100%;
        }

        td {
            padding: auto;
        }

        li {
            padding: 10px;
            color: black;
            font-size: 10px;
        }

        nav {
            background-color: rgb(209, 190, 206);
        }

        th {
            color: black;
        }

        .container {
            background-color: white;
        }

        .center-form {
            display: block;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 10vh;
            text-align: center;
        }

        .contenido {
            width: 400px;
            height: auto;
            margin: 0 auto;
            justify-content: center;
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
            padding: 20px;
        }

        .texto1 img {
            margin-right: 10px;
            margin-top: 10px;
            position: relative;
            width: 210px;
            height: 210px;
            float: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-family: "Latin Modern Roman";
            font-style: italic;
            color: white;
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            color: aliceblue;
        }

        select {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            color: white;
        }

        option {
            color: black;
        }

        button {
            background-color: #66ca5d;
            border: 1px solid #999;
            color: white;
            /* Color del texto */
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 8px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
            text-transform: uppercase;
        }

        .form-buttons {
            text-align: center;
            /* Centrar horizontalmente */
            margin-top: 10px;
            /* Espacio entre el formulario y los botones */
        }

        h1 {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: black;
        }

        #datos {
            display: block;
            /* Mostrar los datos inicialmente */
        }

        .oculto {
            display: none;
            /* Ocultar los datos cuando se aplique esta clase */
        }
    </style>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #btn-mas {
            display: none;
        }

        .containerflotante {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .redes a,
        .btn-mas label {
            display: block;
            text-decoration: none;
            background: #cc2b2b;
            color: #fff;
            width: 55px;
            height: 55px;
            line-height: 55px;
            text-align: center;
            border-radius: 50%;
            box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.4);
            transition: all 500ms ease;
        }

        .redes a:hover {
            background: #fff;
            color: #cc2b2b;
        }

        .redes a {
            margin-bottom: -15px;
            opacity: 0;
            visibility: hidden;
        }

        #btn-mas:checked~.redes a {
            margin-bottom: 10px;
            opacity: 1;
            visibility: visible;
        }

        .btn-mas label {
            cursor: pointer;
            background: #f44141;
            font-size: 23px;
        }

        #btn-mas:checked~.btn-mas label {
            transform: rotate(135deg);
            font-size: 25px;
        }

        li a {
            color: black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-dark navbar-light bg-light fixed-top nav-custom nav-link">
        <div class="container">
            <a class="navbar-brand mt-2 mt-lg-0" href="#"> <img src="../img/logo1.png" width="150px" height="50px" alt="MDB Logo" loading="lazy" /> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: ITC Bradley Hand Std Bold;  font-size: 25px; color: black;">SERVICIOS</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: ITC Bradley Hand Std Bold;">
                            <li><a class="dropdown-item text-black" href="#" style="color: black;">CORTES</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-black" href="#" style="color: black;">PEINADOS</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-black" href="#" style="color: black;">MAQUILLAJE</a></li>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: ITC Bradley Hand Std Bold;  font-size: 25px; color: black;">DESCARGAR CATALOGO</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: ITC Bradley Hand Std Bold;">
                            <li><a class="dropdown-item text-black" href="#" style="color: black;">PRODUCTOS</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-black" href="#" style="color: black;">PEINDAOS VARONES</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-black" href="#" style="color: black;">PINADO MUJERES </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: ITC Bradley Hand Std Bold;  color: black; font-size: 25px;">LOGIN</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-black nav-link logged-out" href="#" data-bs-toggle="modal" data-bs-target="#signinModal" style="font-family: ITC Bradley Hand Std Bold;   color: black; font-size: 25px;">INICIAR SECION</a></li>
                        </ul>
                    </li>
                    <!-- Script JavaScript para controlar la visibilidad de Reservas y Reportes -->
                </div>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <div class="modal fade" id="Registrar" tabindex="-1">
        <div class="modal-dialog" style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 ));">
            <div class="modal-content" style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 ));">
                <div class="modal-body">
                    <section class="contenido">
                        <form action="cliente.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <h1 style="color: #fff;">Formulario Clinete</h1>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group" style="margin-top: 5px;">
                                            <label for="">ID</label><br>
                                            <input type="number" name="id" id="id" placeholder="Ingrese Su Carnet">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="NOMBRE">NOMBRES</label>
                                            <input type="text" name="nombres" id="nombres" placeholder="Ingrese Su Nombre">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="APELLIDO_PAT">APELLIDOS</span></label>
                                            <input type="text" name="apellidos" id="apellidos" placeholder="Ingrese Su Apellido">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="E_MAIL">CORREO</label>
                                            <input type="email" style="width: 355px;" name="correo" id="correo" placeholder="Ingrese Su Correo">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">SEXO:</label><br>
                                            <select name="sexo" id="sexo" style="width: 350px;">
                                                <option value="Vacio"></option>
                                                <option value="Femenino">Femenina</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>


                            </table>
                            <br>
                            <div style="text-align: center;">
                                <button type="submit" class="btn btn-success" name="enviar" value="Guardar💾">Guardar💾</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php
    ini_set("display_errors", "on");
    $conexion = conectar_MySQL("sql308.byethost14.com", "b14_33887233", "13247291", "b14_33887233_Salon");

    function conectar_MySQL($host, $user, $pass, $bd)
    {
        $conexion = mysqli_connect($host, $user, $pass, $bd) or die("Error al conectar: " . mysqli_connect_error());
        mysqli_select_db($conexion, $bd) or die("Error al seleccionar la BD: " . mysqli_error($conexion));
        return $conexion;
    }
    /* Función para insertar empleados en la base de datos */
    function Empleado($conexion, $id, $nombres, $apellidos, $correo, $sexo)
    {
        $sql = "INSERT INTO clientes VALUES ('$id', '$nombres', '$apellidos', '$correo', '$sexo')";
        return mysqli_query($conexion, $sql);
    }
    if (isset($_POST['enviar'])) {
        if (!empty($_POST['id']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['correo']) && !empty($_POST['sexo'])) {
            $id = $_POST['id'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            $sexo = $_POST['sexo'];

            // Realizar consulta para obtener el ID del administrador
            $sql = "SELECT ID_ADMINISTRADOR FROM Administrador";
            $resultado = mysqli_query($conexion, $sql);

            // Verificar si se obtuvo algún resultado
            if (mysqli_num_rows($resultado) > 0) {
                // Obtener el primer registro
                $row = mysqli_fetch_assoc($resultado);
                $ID_ADMINISTRADOR = $row['ID_ADMINISTRADOR'];

                $ok = Empleado($conexion, $id, $nombres, $apellidos, $correo, $sexo);

                // Asignar el valor del ID_ADMINISTRADOR al campo correspondiente en el formulario
                echo '<script>document.getElementsByName("ID_ADMINISTRADOR")[0].value = "' . $ID_ADMINISTRADOR . '";</script>';
                echo '<div id="mensaje" style="width: 260px; height: 80px; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 )); border: 1px solid #ccc; padding: 15px; border-radius: 5px; text-align: center; display: flex; justify-content: center; align-items: center;">
                        <span style="font-weight: bold; color: #00ff00;">Datos ingresados correctamente.😃✅</span>
                    </div>';

                echo '<script>
                        setTimeout(function(){
                            var mensaje = document.getElementById("mensaje");
                            mensaje.style.display = "none";
                        }, 5000); // El mensaje desaparecerá después de 5 segundos (5000 milisegundos)
                    </script>';
            } else {
                echo "No se encontró ningún ID de administrador<br/>";
            }
            // Liberar memoria del resultado
            mysqli_free_result($resultado);
        } else {
            echo '<div id="mensaje" style="width: 260px; height: 80px; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 )); border: 1px solid #ccc; padding: 15px; border-radius: 5px; text-align: center; display: flex; justify-content: center; align-items: center;">
                        <span style="font-weight: bold; color:#ff0000;">Por favor, complete todos los campos.🤦🏽‍♂️❌ </span>
                </div>';

            echo '<script>
                        setTimeout(function(){
                            var mensaje = document.getElementById("mensaje");
                            mensaje.style.display = "none";
                        }, 5000); // El mensaje desaparecerá después de 5 segundos (5000 milisegundos)
                    </script>';
        }
    }

    ?>
    <div style="display: flex; height: 100vh; padding:50px; margin: 50xp; ">
        <div style="flex: 1; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 )); padding:20px; margin:20xp;">
            <center>
                <div class="container">
                    <div class="text-center" style="padding: 50px;">
                        <button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#Registrar">Registrar📋</button>
                        <form method="POST" action="cliente.php" class="center-form">
                            <input type="text" name="id" id="id" style="height: 35px; margin-right: 5px;">
                            <button type="submit" name="buscar" class="btn btn-primary">Buscar 🔍</button>
                        </form>
                        <table id="myTable" class="table table-bordered table-striped" style="padding: 50px;">
                            <tr>
                                <th>ID</th>
                                <th>Nonbre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                            </tr>
                            <?php
                            require '../Manuel/dbcon.php';
                            $query = mysqli_query($con, "SELECT * FROM clientes");
                            $query_run = mysqli_num_rows($query);
                            if ($query_run > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['nombres'] ?></td>
                                        <td><?php echo $data['apellidos'] ?></td>
                                        <td><?php echo $data['correo'] ?></td>
                                        <td><?php echo $data['sexo'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </center>
        </div>

        <div style="flex: 1; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 )); padding:20px; margin:20xp;">
            <br><br><br>
            <?php
            ini_set("display_errors", "on");
            $conexion = conectar_MySQL("sql308.byethost14.com", "b14_33887233", "13247291", "b14_33887233_Salon");
            if (isset($_POST['buscar'])) {
                $id = $_POST['id'];
                $sql = "SELECT * FROM clientes WHERE id = $id";
                $resultado = mysqli_query($conexion, $sql);
                if (mysqli_num_rows($resultado) > 0) {
                    $accidente = mysqli_fetch_assoc($resultado);
            ?>
                    <section class="contenido" id="datos" style="background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 ));">
                        <form method="POST" action="cliente.php" enctype="multipart/form-data">
                            <h1 style="color: #fff;">Actualizacion De Datos</h1>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">ID</label>
                                            <input type="number" style="width: 355px;" name="id" value="<?php echo $accidente['id']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">NOMBRES</label>
                                            <input type="text" style="width: 355px;" name="nombres" id="nombres" value="<?php echo $accidente['nombres']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">APELLIDOS</label>
                                            <input type="text" style="width: 355px;" name="apellidos" id="apellidos" value="<?php echo $accidente['apellidos']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">CORREO</label>
                                            <input type="email" style="width: 355px;" name="correo" id="E_MAIL" value="<?php echo $accidente['correo']; ?>">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">SEXO:</label>
                                            <select name="sexo" id="sexo" style="width: 360px;">
                                                <option value="Vacio"></option>
                                                <option value="Femenino" <?php if ($accidente['sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                                                <option value="Masculino" <?php if ($accidente['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <div class="container column" style="text-align: center; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 ));">
                                <input class="modify-button" type="submit" name="modificar" value="Modificar💾" style="font-size: 2em;" onclick="modificarDatos()" />
                                <br>
                                <input id="ocultarMostrar" type="button" value="Cerrar 🧹" style="font-size: 2em;" onclick="ocultarMostrarDatos()" />
                            </div>
                        </form>
                        <script type="text/javascript">
                            function ocultarMostrarDatos() {
                                var datos = document.getElementById("datos");
                                datos.classList.toggle("oculto");
                            }
                        </script>
                    </section>
            <?php
                } else {
                    echo "No se encontró el id $id";
                }
            }

            if (isset($_POST['modificar'])) {
                $id = $_POST['id'];
                $nombres = $_POST['nombres'];
                $apellidos = $_POST['apellidos'];
                $correo = $_POST['correo'];
                $sexo = $_POST['sexo'];

                $sql_update_empleado = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', correo='$correo', sexo='$sexo' WHERE id=$id";
                if (mysqli_query($conexion, $sql_update_empleado)) {
                    echo '<div id="mensaje-exito" style="width: 260px; height: 80px; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 )); border: 1px solid #ccc; padding: 15px; border-radius: 5px; text-align: center; display: flex; justify-content: center; align-items: center;">
                        <span style="font-weight: bold; color: #00ffb3;">Registro actualizado correctamente.😃✅</span>
                    </div>';
                    echo '<script>
                        setTimeout(function(){
                            var mensajeExito = document.getElementById("mensaje-exito");
                            mensajeExito.style.display = "none";
                        }, 5000); // El mensaje de éxito desaparecerá después de 5 segundos (5000 milisegundos)
                    </script>';
                } else {
                    echo '<div id="mensaje-error" style="width: 260px; height: 80px; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)); border: 1px solid #ccc; padding: 15px; border-radius: 5px; text-align: center; display: flex; justify-content: center; align-items: center;">
                        <span style="font-weight: bold; color: #ff0000;">Error al actualizar el registro: 🤦🏽‍♂️❌' . mysqli_error($conexión) . '</span>
                    </div>';
                    echo '<script>
                        setTimeout(function(){
                            var mensajeError = document.getElementById("mensaje-error");
                            mensajeError.style.display = "none";
                        }, 5000); // El mensaje de error desaparecerá después de 5 segundos (5000 milisegundos)
                    </script>';
                }
            }
            mysqli_close($conexion);
            ?>
        </div>
    </div>
    <div class="containerflotante">
        <input type="checkbox" id="btn-mas">
        <div class="redes">
            <a href="https://www.facebook.com/andres.yucra.7315" class="fa fa-facebook"></a>
            <a href="https://www.youtube.com/channel/UCF8EGfmr_5WoqGkDZBNd7Mw" class="fa fa-youtube"></a>
            <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZXMifQ%3D%3D%22%7D" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-pinterest"></a>
            <a href="../index.html" target="_blank" class="fa fa-home"></a>

        </div>
        <div class="btn-mas">
            <label for="btn-mas" class="fa fa-plus"></label>
        </div>
    </div>

</body>

</html>