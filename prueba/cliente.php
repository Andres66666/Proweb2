<?php
include_once "header.php";
?>
    
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
                            require 'dbcon.php';
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

    <?php
include_once "footer.php";
?>