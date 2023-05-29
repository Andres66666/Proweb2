<link rel="stylesheet" href="css/CabeceraRegistro.css">

<?php
    ini_set("display_errors","on");
$conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

function conectar_MySQL($host, $user, $pass, $bd){
    $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar: " . mysqli_connect_error());
    mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: " . mysqli_error($conexion));
    return $conexion;
}

        if (isset($_POST['buscar'])) {
          // Obtener el ID del accidente ingresado por el usuario
            $ID_accidente = $_POST['ID_EMPLEADO'];
        
          // Realizar la consulta a la base de datos
          $sql = "SELECT * FROM EMPLEADO WHERE ID_EMPLEADO = $ID_accidente";
            $resultado = mysqli_query($conexion, $sql);
        
          // Si se encontró el accidente, mostrar los detalles en el formulario
            if (mysqli_num_rows($resultado) > 0) {
            $accidente = mysqli_fetch_assoc($resultado);
            ?>
            <section class="contenido">
            <form method="POST" action="buscar.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <div class="form-group" style="text-align: center;">
                                <canvas style="border:black 1px dashed;" id="canvas" width="150px" height="150px"></canvas><br>
                                <input type="file" id="fotoAlum" name="FOTO"  style="display: none;" title="Foto png o jpg" accept=".jpg, .jpeg, .png" multiple tabindex="4" value="<?php echo $accidente['FOTO']; ?>"/>
                                <button type="button" id="btnCargarImagen">Cargar Imagen📷</button>
                            </div>
                        </td>
                        
                        <script type="text/javascript">
                            const input = document.getElementById('fotoAlum'); // Arreglo de componentes de la imagen
                            const canvas = document.getElementById('canvas'); // Contenedor del canvas
                            const context = canvas.getContext('2d'); // Contexto 2D del canvas
                            const btnCargarImagen = document.getElementById('btnCargarImagen'); // Botón de carga de imagen
                        
                            // Evento de cambio de imagen
                            input.addEventListener('change', updateImageDisplay);
                            function updateImageDisplay() {
                                const curFiles = input.files;
                                if (curFiles.length === 0) {
                                    context.clearRect(0, 0, canvas.width, canvas.height);
                                } else {
                                    const file = curFiles[0];
                                    // Validación de archivo
                                    if (validFileType(file)) {
                                        const image = new Image();
                                        image.onload = function() {
                                            context.clearRect(0, 0, canvas.width, canvas.height);
                                            context.drawImage(image, 0, 0, canvas.width, canvas.height);
                                        };
                                        image.src = URL.createObjectURL(file);
                                    }
                                }
                            }
                        
                            // Arreglo de formatos permitidos
                            const fileTypes = [
                                "image/apng",
                                "image/bmp",
                                "image/gif",
                                "image/jpeg",
                                "image/pjpeg",
                                "image/png",
                                "image/svg+xml",
                                "image/tiff",
                                "image/webp",
                                "image/x-icon"
                            ];
                        
                            function validFileType(file) {
                                return fileTypes.includes(file.type);
                            }
                        
                            // Evento de clic en el botón de carga de imagen
                            btnCargarImagen.addEventListener('click', function() {
                                input.click();
                            });
                        </script>
                        
                        
                    <td>
                        <div class="form-group" style="margin-top: -25px;">
                            <label for="ID_EMPLEADO">CI</label>
                            <input type="number" name="ID_EMPLEADO" value="<?php echo $accidente['ID_EMPLEADO']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="NOMBRE">NOMBRE</label>
                            <input type="text" name="NOMBRE" id="NOMBRE" value="<?php echo $accidente['NOMBRE']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="APELLIDO_PAT">APELLIDO PATATERNO</label>
                            <input type="text" name="APELLIDO_PAT" id="APELLIDO_PAT" value="<?php echo $accidente['APELLIDO_PAT']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="APELLIDO_MAT">APELLIDO MATERNO</label>
                            <input type="text" name="APELLIDO_MAT" id="APELLIDO_MAT" value="<?php echo $accidente['APELLIDO_MAT']; ?>">
                        </div>
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="F_CONTRATACION">FECHA CONTRATACION</label>
                            <input type="date" name="F_CONTRATACION" id="F_CONTRATACION" style="width: 360px;" value="<?php echo $accidente['F_CONTRATACION']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                <td colspan="2">
                    <div class="form-group">
                        <label for="">SEXO:</label>
                        <select name="SEXO" id="SEXO" style="width: 360px;">
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
                            <select name="ESPECIALIDAD"  id="ESPECIALIDAD"style="width: 360px;">
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
                            <input type="number" style="width: 355px;" name="TELEFONO" id="TELEFONO" value="<?php echo $accidente['TELEFONO']; ?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="E_MAIL">E-MAIL</label>
                            <input type="email" style="width: 355px;" name="E_MAIL" id="E_MAIL" value="<?php echo $accidente['E_MAIL']; ?>">
                        </div>
                    </td>
                </tr>
            </table>
                <div class="container column">
                    <button class="modify-button"  type="submit" name="modificar">Modificar</button>
                    <button type="button" name="eliminar" ><a href="mostrar.php">Regresar</a> </button>
                </div>       
            </form>
            </section>
            <?php
          } else {
            // Si no se encontró el accidente, mostrar un mensaje de error
            echo "No se encontró el ID_EMPLEADO $ID_EMPLEADO";
            header("Location:buscar.php");
          }
        }

        if (isset($_POST['modificar'])) {
            $ID_EMPLEADO = $_POST['ID_EMPLEADO'];
            $NOMBRE = $_POST['NOMBRE'];
            $APELLIDO_PAT = $_POST['APELLIDO_PAT'];
            $APELLIDO_MAT = $_POST['APELLIDO_MAT'];
            $F_CONTRATACION = $_POST['F_CONTRATACION'];
            $SEXO = $_POST['SEXO'];
            $ESPECIALIDAD = $_POST['ESPECIALIDAD'];
            $TELEFONO = $_POST['TELEFONO'];
            $E_MAIL = $_POST['E_MAIL'];
            $FOTO = $_POST['FOTO'];
        
            // Actualizar la imagen si se cargó una nueva
            if ($_FILES['FOTO']['name']) {
                // Obtener el nombre y la ubicación temporal del archivo subido
 
                $file_name = $_FILES['FOTO']['name'];
                $file_tmp = $_FILES['FOTO']['tmp_name'];
        
                // Mover el archivo subido a una ubicación permanente
                move_uploaded_file($file_tmp, "ruta/donde/guardar/la/imagen/$file_name");
                
        
                // Actualizar el campo de la imagen en la base de datos con el nuevo nombre de archivo
                $sql_update_foto = "UPDATE EMPLEADO SET FOTO='$file_name' WHERE ID_EMPLEADO=$ID_EMPLEADO";
                mysqli_query($conexion, $sql_update_foto);
            }
        
            // Actualizar los demás campos en la base de datos
            $sql_update_foto = "UPDATE EMPLEADO SET FOTO='$file_name' WHERE ID_EMPLEADO=$ID_EMPLEADO";

            $sql_update_empleado = "UPDATE EMPLEADO SET NOMBRE='$NOMBRE', APELLIDO_PAT='$APELLIDO_PAT', APELLIDO_MAT='$APELLIDO_MAT', F_CONTRATACION='$F_CONTRATACION', SEXO='$SEXO', ESPECIALIDAD='$ESPECIALIDAD', TELEFONO='$TELEFONO', E_MAIL='$E_MAIL' WHERE ID_EMPLEADO=$ID_EMPLEADO";
        
            if (mysqli_query($conexion, $sql_update_empleado)) {
                echo "Registro actualizado correctamente.";
                header("Location:mostrar.php");
            } else {
                echo "Error al actualizar el registro: " . mysqli_error($conexion);
                header("Location:buscar.php");
            }
        }
        
        if (isset($_POST['eliminar'])) {
            $ID_EMPLEADO = $_POST['ID_EMPLEADO'];
        
            // Eliminar la imagen asociada al empleado si existe
            $sql_select_foto = "SELECT FOTO FROM EMPLEADO WHERE ID_EMPLEADO=$ID_EMPLEADO";
            $result_select_foto = mysqli_query($conexion, $sql_select_foto);
            $row_select_foto = mysqli_fetch_assoc($result_select_foto);
            $foto = $row_select_foto['FOTO'];
            if ($foto) {
                // Eliminar el archivo de imagen
                unlink("ruta/donde/guardar/la/imagen/$foto");
            }
        
            // Eliminar el registro de empleado de la base de datos
            $sql_delete_empleado = "DELETE FROM EMPLEADO WHERE ID_EMPLEADO=$ID_EMPLEADO";
            if (mysqli_query($conexion, $sql_delete_empleado)) {
                echo "Registro eliminado correctamente.";
                header("Location:mostrar.php");
            } else {
                echo "Error al eliminar el registro: " . mysqli_error($conexion);
                header("Location:buscar.php");
            }
        }
        mysqli_close($conexion);
    ?>