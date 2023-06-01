<?php
include_once "../prueba/header.php";
?>

    <nav class="d-flex align-items-center" style="padding-left: 20px; padding-top: 20px; padding-bottom: 20px;">
        <img style="width: 100px; height: 100px;" src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/beauty-salon-logo-design-template-e61ddd9eace61452cfcab9f89683c64d_screen.jpg?ts=1651761686.png" class="mr-3">
        <ul class="nav justify-content-center" style="padding-left: 350px;">
            <li class="nav-item"> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Registrar">Registrar📋</button>
            </li>
            <li class="nav-item"> 
                <form method="POST" action="Registro.php" class="center-form">
                    <label for="id" class="me-2"><i class="fas fa-search"></i></label>
                    <input type="text" name="ID_EMPLEADO" id="ID_EMPLEADO" style="height: 35px;">
                    <button type="submit" name="buscar" class="btn btn-primary">Buscar 🔍</button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="modal fade" id="Registrar" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <section class="contenido">
                        <form action="Registro.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <h1>Formulario Empleado</h1>
                            <table>
                                <tr>
                                    <td>
                                        <div class="form-group" style="text-align: center;">
        <canvas style="border:black 1px dashed;" class="canvasA" width="150px" height="150px"></canvas><br>
        <input type="file" class="fotoAlumA" name="FOTO" style="display: none;" title="Foto png o jpg" accept=".jpg, .jpeg, .png" multiple tabindex="4" />
        <button type="button" class="btnCargarImagenA">Cargar Imagen📷</button>
    </div>
    <script type="text/javascript">
        const inputs = document.getElementsByClassName('fotoAlumA'); // Arreglo de componentes de la imagen
        const canvases = document.getElementsByClassName('canvasA'); // Contenedor del canvas
        const btnCargarImagenA = document.getElementsByClassName('btnCargarImagenA'); // Botón de carga de imagen
    
        // Iterar sobre los elementos para agregar los eventos
        for (let i = 0; i < inputs.length; i++) {
            const input = inputs[i];
            const canvas = canvases[i];
            const context = canvas.getContext('2d');
    
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
    
        // Evento de clic en los botones de carga de imagen
        for (let i = 0; i < btnCargarImagenA.length; i++) {
            const btn = btnCargarImagenA[i];
            btn.addEventListener('click', function() {
                const input = this.previousElementSibling;
                input.click();
            });
        }
    </script>
                                    </td>
                                    <td style="padding-left: 10px;">
                                        <div class="form-group" style="margin-top: -25px;">
                                            <label for="">CI <span id="error_ID_EMPLEADO"></span> </label><br>
                                            <input type="number" name="ID_EMPLEADO" id="ID_EMPLEADO" placeholder="Ingrese Su Carnet">
                                        </div>
                                        <div class="form-group">
                                            <label for="NOMBRE">NOMBRES <span id="error_NOMBRE"></span></label>
                                            <input type="text" name="NOMBRE" id="NOMBRE"  placeholder="Ingrese Su Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="APELLIDO_PAT">APELLIDO PATERNO <span id="error_APELLIDO_PAT"></span></label>
                                            <input type="text" name="APELLIDO_PAT" id="APELLIDO_PAT" placeholder="Ingrese Su Apellido">
                                        </div>
                                        <div class="form-group">
                                            <label for="APELLIDO_MAT">APELLIDO MATATERNO <span id="error_APELLIDO_MAT"></span></label>
                                            <input type="text" name="APELLIDO_MAT" id="APELLIDO_MAT" placeholder="Ingrese Su Apellido">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="F_CONTRATACION">FECHA CONTRATACION <span id="error_F_CONTRATACION"></span></label>
                                            <input type="date" id="F_CONTRATACION" name="F_CONTRATACION" style="width: 350px;" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">SEXO: <span id="error_SEXO"></span></label><br>
                                            <select name="SEXO" id="SEXO" style="width: 350px;">
                                                <option value="Vacio"></option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="">ESPECIALIDAD <span id="error_ESPECIALIDAD"></span></label>
                                            <select name="ESPECIALIDAD" id="ESPECIALIDAD" style="width: 350px;">
                                                <option value="Vacio"></option>
                                                <option value="MAQUILLADOR">MAQUILLADOR</option>
                                                <option value="MAQUILLADOR">PEINADOR</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="TELEFONO">TELEFONO <span id="error_TELEFONO"></span></label>
                                            <input type="number" style="width: 355px;" name="TELEFONO" id="TELEFONO" pattern="[67][0-9]{7}" placeholder="Ingrese Su Telefono">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label for="E_MAIL">E-MAIL <span id="error_E_MAIL"></span></label>
                                            <input type="email" style="width: 355px;" name="E_MAIL" id="E_MAIL" placeholder="Ingrese Su Correo">
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
            ini_set("display_errors","on");
            $conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");
            
            function conectar_MySQL($host, $user, $pass, $bd){
                $conexion = mysqli_connect($host, $user, $pass, $bd) or die ("Error al conectar: " . mysqli_connect_error());
                mysqli_select_db($conexion, $bd) or die ("Error al seleccionar la BD: " . mysqli_error($conexion));
                return $conexion;
            }
            /* Función para insertar empleados en la base de datos */
            function Empleado($conexion, $ID_EMPLEADO, $NOMBRE, $APELLIDO_PAT, $APELLIDO_MAT, $F_CONTRATACION, $SEXO, $ESPECIALIDAD, $TELEFONO, $E_MAIL, $FOTO, $ID_ADMINISTRADOR){
                $sql = "INSERT INTO EMPLEADO VALUES ('$ID_EMPLEADO', '$NOMBRE', '$APELLIDO_PAT', '$APELLIDO_MAT', '$F_CONTRATACION', '$SEXO', '$ESPECIALIDAD', '$TELEFONO', '$E_MAIL', '$FOTO', '$ID_ADMINISTRADOR')";
                return mysqli_query($conexion, $sql);
            }
            if (isset($_POST['enviar'])) {
            if (!empty($_POST['ID_EMPLEADO']) && !empty($_POST['NOMBRE']) && !empty($_POST['APELLIDO_PAT']) && !empty($_POST['APELLIDO_MAT']) && !empty($_POST['F_CONTRATACION']) && !empty($_POST['SEXO']) && !empty($_POST['ESPECIALIDAD']) && !empty($_POST['TELEFONO']) && !empty($_POST['E_MAIL'])) {
                $ID_EMPLEADO = $_POST['ID_EMPLEADO'];
                $NOMBRE = $_POST['NOMBRE'];
                $APELLIDO_PAT = $_POST['APELLIDO_PAT'];
                $APELLIDO_MAT = $_POST['APELLIDO_MAT'];
                $F_CONTRATACION = $_POST['F_CONTRATACION'];
                $SEXO = $_POST['SEXO'];
                $ESPECIALIDAD = $_POST['ESPECIALIDAD'];
                $TELEFONO = $_POST['TELEFONO'];
                $E_MAIL = $_POST['E_MAIL'];
                $FOTO = addslashes(file_get_contents($_FILES['FOTO']['tmp_name']));


                // Realizar consulta para obtener el ID del administrador
                $sql = "SELECT ID_ADMINISTRADOR FROM Administrador";
                $resultado = mysqli_query($conexion, $sql);

                // Verificar si se obtuvo algún resultado
                if (mysqli_num_rows($resultado) > 0) {
                    // Obtener el primer registro
                        $row = mysqli_fetch_assoc($resultado);
                    $ID_ADMINISTRADOR = $row['ID_ADMINISTRADOR'];

                    $ok = Empleado($conexion, $ID_EMPLEADO, $NOMBRE, $APELLIDO_PAT, $APELLIDO_MAT, $F_CONTRATACION, $SEXO, $ESPECIALIDAD, $TELEFONO, $E_MAIL, $FOTO, $ID_ADMINISTRADOR);

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
            }}
    ?>
    <center>
        <div class="container">
            <div class="text-center"  style="padding: 50px;">
                <table id="myTable" class="table table-bordered table-striped" style="padding: 50px;">
                        <tr>
                            <th>ID</th>
                            <th>Nonbre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Fecha Contratacion</th>
                            <th>Sexo</th>
                            <th>Especialidad</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Foto</th>
                        </tr>
                        <?php 
                        require 'Manuel/dbcon.php';
                        $query=mysqli_query($con, "SELECT * FROM EMPLEADO");
                        $query_run=mysqli_num_rows($query);
                        if($query_run>0)
                        {           
                            while($data = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $data['ID_EMPLEADO']?></td>
                                    <td><?php echo $data['NOMBRE']?></td>
                                    <td><?php echo $data['APELLIDO_PAT']?></td>
                                    <td><?php echo $data['APELLIDO_MAT']?></td>
                                    <td><?php echo $data['F_CONTRATACION']?></td>
                                    <td><?php echo $data['SEXO']?></td>
                                    <td><?php echo $data['ESPECIALIDAD']?></td>
                                    <td><?php echo $data['TELEFONO']?></td>
                                    <td><?php echo $data['E_MAIL']?></td>
                                    <td><img height="80px" width="80px" src="data:image/jpg;base64, <?php echo base64_encode($data['FOTO']) ?>"></td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
        </table>
    </center>

    <br><br>
    <?php
    ini_set("display_errors","on");
        $conexion = conectar_MySQL("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon");

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
            <section class="contenido"  id="datos">
            <form method="POST" action="Registro.php" enctype="multipart/form-data">
                <table>
                    <tr>
                    <td>
    <div class="form-group" style="text-align: center;">
        <canvas style="border:black 1px dashed;" id="myCanvas" width="150px" height="150px"></canvas><br>
        <input type="file" id="myInput" name="FOTO" style="display: none;" title="Foto png o jpg" accept=".jpg, .jpeg, .png" multiple tabindex="4" value="" required>
        <button type="button" id="btnCargarImagenB">Cargar Imagen📷</button>
    </div>
</td>
<script type="text/javascript">
    const myInput = document.getElementById('myInput'); // Componente de la imagen
    const myCanvas = document.getElementById('myCanvas'); // Contenedor del canvas
    const context = myCanvas.getContext('2d');
    const btnCargarImagenB = document.getElementById('btnCargarImagenB'); // Botón de carga de imagen

    // Evento de cambio de imagen
    myInput.addEventListener('change', updateImageDisplay);

    function updateImageDisplay() {
        const curFiles = myInput.files;
        if (curFiles.length === 0) {
            context.clearRect(0, 0, myCanvas.width, myCanvas.height);
        } else {
            const file = curFiles[0];
            // Validación de archivo
            if (validFileType(file)) {
                const image = new Image();
                image.onload = function() {
                    context.clearRect(0, 0, myCanvas.width, myCanvas.height);
                    context.drawImage(image, 0, 0, myCanvas.width, myCanvas.height);
                };
                image.src = URL.createObjectURL(file);
            }
        }
    }

    // Arreglo de formatos permitidos
    const allowedFileTypes = [
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
        return allowedFileTypes.includes(file.type);
    }

    // Evento de clic en el botón de carga de imagen
    btnCargarImagenB.addEventListener('click', function() {
        myInput.click();
    });
</script>


                        </td>

                    <td style="padding-left: 10px; padding-top: 10px;" >
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
            </table><br>
                <div class="container column" style="text-align: center; background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5 ));">
                    <button class="modify-button" type="submit" name="modificar" style="font-size: 2em;">Modificar💾</button>
                    <button id="ocultarMostrar" onclick="ocultarMostrarDatos()" style="font-size: 2em;">Cerrar 🧹</button>
                </div>
  
            </form>
            <script type="text/javascript">
                function ocultarMostrarDatos() {
                    var datos = document.getElementById("datos");
                    datos.classList.toggle("oculto");
                }
            </script>
            </section>
            <br><br><br><br>
            <?php
          } else {
            // Si no se encontró el accidente, mostrar un mensaje de error
            echo "No se encontró el ID_EMPLEADO $ID_EMPLEADO";
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
            $FOTO = addslashes(file_get_contents($_FILES['FOTO']['tmp_name']));

            // Actualizar los demás campos en la base de datos
            $sql_update_empleado = "UPDATE EMPLEADO SET NOMBRE='$NOMBRE', APELLIDO_PAT='$APELLIDO_PAT', APELLIDO_MAT='$APELLIDO_MAT', F_CONTRATACION='$F_CONTRATACION', SEXO='$SEXO', ESPECIALIDAD='$ESPECIALIDAD', TELEFONO='$TELEFONO', E_MAIL='$E_MAIL', FOTO='$FOTO' WHERE ID_EMPLEADO=$ID_EMPLEADO";
        
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
<?php
include_once "../prueba/footer.php";
?>