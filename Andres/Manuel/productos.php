<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <link rel="stylesheet" href="css/coverflow.css">
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>
<!-- AGREGAR PRODUCTO -->
<div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registro Empleado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveProduct" >
            <div class="modal-body">
            <h1>Registro Empleado</h1>
                <table>
                    <tr>
                        <td>
                            <div class="form-group" style="text-align: center;">
                                <canvas style="border:black 1px dashed;" id="canvas" width="150px" height="150px"></canvas><br>
                                <input type="file" id="FOTO" name="FOTO" style="display:none;" />
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
                            <input type="number" name="ID_EMPLEADO">
                        </div>
                        <div class="form-group">
                            <label for="NOMBRE">Nombres</label>
                            <input type="text" name="NOMBRE">
                        </div>
                        <div class="form-group">
                            <label for="APELLIDO_PAT">APELLIDO_PAT</label>
                            <input type="text" name="APELLIDO_PAT">
                        </div>
                        <div class="form-group">
                            <label for="APELLIDO_MAT">APELLIDO_MAT</label>
                            <input type="text" name="APELLIDO_MAT">
                        </div>
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="F_CONTRATACION">FECHA CONTRATACION</label>
                            <input type="date" name="F_CONTRATACION" style="width: 360px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="">SEXO:</label>
                            <select name="SEXO" style="width: 360px;">
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
                            <label for="">ESPECIALIDAD</label>
                            <select name="ESPECIALIDAD" style="width: 360px;">
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
                            <label for="TELEFONO">TELEFONO</label>
                            <input type="number" style="width: 355px;" name="TELEFONO">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="form-group">
                            <label for="E_MAIL">CORREO</label>
                            <input type="email" style="width: 355px;" name="E_MAIL">
                        </div>
                    </td>
                </tr>
            </table>
            </div>
        </form>    
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </div>
    
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>PRODUCTOS
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#productAddModal">
                            Agregar Producto
                        </button>
                    </h4>
                </div>
                <!--
                    
                -->
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
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>   

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    $(document).on('submit', '#saveProduct', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("insert_employee", true);

            $.ajax({
                type: "POST",
                url: "code2.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#productAddModal').modal('hide');
                        $('#saveProduct')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });
</script>


</body>
</html>