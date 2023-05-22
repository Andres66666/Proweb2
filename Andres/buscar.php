<link rel="stylesheet" href="style.css">
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
            <form method="POST" action="buscar.php">
                
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
                            //obtener elementos
                            var inputImagen = document.getElementById("FOTO");
                        var btnCargarImagen = document.getElementById("btnCargarImagen");
                        var canvas = document.getElementById("canvas");
                        var ctx = canvas.getContext("2d");
    
                        //agregar evento click al botón de cargar imagen
                        btnCargarImagen.addEventListener("click", function(){
                            //simular click en input de tipo file
                            inputImagen.click();
                        });
    
                        //agregar evento change al input de tipo file
                        inputImagen.addEventListener("change", function(){
                            //verificar si se seleccionó una imagen
                            if (this.files && this.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    //crear nueva imagen
                                    var img = new Image();
                                    img.onload = function() {
                                        //dibujar imagen en el canvas
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
                        <label for="">SEXO:</label>
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
                    <button class="modify-button"  type="submit" name="modificar">Modificar</button>
                    <button class="update-button" type="submit" name="actualizar">Actualizar</button>
                    <button class="delete-button"  type="submit" name="eliminar" >Eliminar</button>
                </div>       
            </form>
            <?php
          } else {
            // Si no se encontró el accidente, mostrar un mensaje de error
            echo "No se encontró el ID_EMPLEADO $ID_EMPLEADO";
          }
        }

        if (isset($_POST['modificar'])) {
            $ID_accidente = $_POST['ID_accidente'];
            $F_accidente = $_POST['F_accidente'];
            $Tipo_accidente = $_POST['Tipo_accidente'];
            $Num_Depoliza = $_POST['Num_Depoliza'];
        
            $sql = "UPDATE Accidentes SET F_accidente='$F_accidente', Tipo_accidente='$Tipo_accidente', Num_Depoliza='$Num_Depoliza' WHERE ID_accidente=$ID_accidente";
        
            if (mysqli_query($conexion, $sql)) {
                echo "Registro actualizado correctamente.";
            } else {
                echo "Error al actualizar el registro: " . mysqli_error($conexion);
            }
        }

        if (isset($_POST['eliminar'])) {
            $ID_accidente = $_POST['ID_accidente'];
        
            $sql = "DELETE FROM Accidentes WHERE ID_accidente=$ID_accidente";
        
            if (mysqli_query($conexion, $sql)) {
                echo "Registro eliminado correctamente.";
            } else {
                echo "Error al eliminar el registro: " . mysqli_error($conexion);
            }
        }
        if (isset($_POST['actualizar'])) {
            $ID_accidente = $_POST['ID_accidente'];
            $fecha = $_POST['F_accidente'];
            $tipo = $_POST['Tipo_accidente'];
            $num_dep = $_POST['Num_Depoliza'];
        
            $sql = "UPDATE Accidentes SET F_accidente='$fecha', Tipo_accidente='$tipo', Num_Depoliza='$num_dep' WHERE ID_accidente='$ID_accidente'";
        
            if (mysqli_query($conexion, $sql)) {
                echo "Datos actualizados correctamente";
            } else {
                echo "Error al actualizar datos: " . mysqli_error($conexion);
            }
        }
        
        mysqli_close($conexion);
    ?>