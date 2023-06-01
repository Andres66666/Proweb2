<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD PRODUCTOS</title>
    <style>
        body {
            background: linear-gradient(135deg, #f6d6e7, #d6e6f6);
        }
    </style>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

</head>
<body>
<br>
<br>
<br>

<center><h1>CRUD PRODUCTOS</h1></center>

<!-- AGREGAR PRODUCTO -->
<div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="saveProduct" method="POST">
                <div class="modal-body">
<<<<<<< HEAD
                    <div id="errorMessage" class="alert alert-warning d-none"></div>
=======
<<<<<<< HEAD
                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                    <input type="hidden" name="product_id" id="product_id">
=======
>>>>>>> 3c27be75bab5d8d8f133404db7abe88fd1b2d9e1

>>>>>>> b1d6c45c804ca5dc94a55d7de9732fa112ff50a0
                    <div class="mb-3">
                        <label for="">Producto</label>
                        <input type="text" name="producto" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Descripción</label>
                        <textarea type="text" name="descripcion" class="form-control" style="width: 300px; height: 150px;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Categoría</label>
                        <select name="categoria" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            <option value="Producto de belleza">Producto de belleza</option>
                            <option value="Artefacto de belleza">Artefacto de belleza</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Cantidad</label>
                        <input type="text" pattern="[0-9]+" name="cantidad" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Precio (Bs)</label>
                        <input type="text" pattern="[0-9]+" name="precio" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Imagen</label>
                        <input type="file" name="imagen" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Estado</label>
                        <select name="estado" class="form-control">
                            <option value="1" selected>Activo</option>
                            <option value="0" disabled>Inactivo</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- EDITAR PRODUCTO MODAL -->
<div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateProduct">
                <div class="modal-body">
                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                    <input type="hidden" name="product_id" id="product_id">

                    <div class="mb-3">
                        <label for="">Producto</label>
                        <input type="text" name="producto" id="producto" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Descripción</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control" style="width: 300px; height: 150px;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Categoría</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            <option value="Producto de belleza">Producto de belleza</option>
                            <option value="Artefacto de belleza">Artefacto de belleza</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" pattern="[0-9]+" id="cantidad" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Precio (Bs)</label>
                        <input type="number" name="precio" pattern="[0-9]+" id="precio" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Imagen</label>
                        <input type="file" name="imagen" id="nueva_imagen" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- VER PRODUCTOS MODAL -->
<div class="modal fade" id="productViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Visualizar Productos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Producto</label>
                    <p id="view_producto" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Descripción</label>
                    <p id="view_descripcion" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Categoria</label>
                    <p id="view_categoria" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Cantidad</label>
                    <p id="view_cantidad" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Precio (Bs)</label>
                    <p id="view_precio" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Estado</label>
                    <p id="view_estado" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        <div class="float-end">
                            <div class="input-group" style="max-width: 300px;">
                               &nbsp; &nbsp;  <h2>Buscar:  &nbsp;</h2> <input type="text" id="searchInput" class="form-control" placeholder="Buscar producto">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#productAddModal">
                            Agregar Producto
                        </button>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Cantidad</th>
                                <th>Precio (Bs)</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon.php';

                            $query = "SELECT * FROM productos";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $product)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $product['id'] ?></td>
                                        <td><?= $product['producto'] ?></td>
                                        <td><?= $product['descripcion'] ?></td>
                                        <td><?= $product['categoria'] ?></td>
                                        <td><?= $product['cantidad'] ?></td>
                                        <td><?= $product['precio'] ?></td>
                                        <td><img src="imagenes/<?= $product['imagen'] ?>" alt="Imagen del producto" style="width: 100px;"></td>
                                        <td>
                                            <?php if ($product['estado'] == 1): ?>
                                                <span class="badge bg-success">Activo</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactivo</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" value="<?= $product['id'] ?>" class="viewProductBtn btn btn-info btn-sm">Ver</button>
                                            <button type="button" value="<?= $product['id'] ?>" class="editProductBtn btn btn-success btn-sm">Editar</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
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
    // Obtener referencias a los elementos HTML
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('myTable');
    const tableRows = table.getElementsByTagName('tr');

    // Agregar evento input al input de búsqueda
    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();

        // Iterar sobre las filas de la tabla y mostrar/ocultar según el término de búsqueda
        for (let i = 1; i < tableRows.length; i++) {
            const row = tableRows[i];
            const columns = row.getElementsByTagName('td');
            let found = false;

            for (let j = 1; j < columns.length; j++) {
                const cellValue = columns[j].textContent.toLowerCase();
                if (cellValue.includes(searchTerm)) {
                    found = true;
                    break;
                }
            }

            row.style.display = found ? '' : 'none';
        }
    });
</script>



    <script>
        


        $(document).on('submit', '#saveProduct', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_product", true);

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


        $(document).on('click', '.editProductBtn', function() {
    var product_id = $(this).val();

    $.ajax({
        type: "GET",
        url: "code2.php?product_id=" + product_id,
        success: function(response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 404) {
                alert(res.message);
            } else if (res.status == 200) {
                $('#product_id').val(res.data.id);
                $('#producto').val(res.data.producto);
                $('#descripcion').val(res.data.descripcion);
                $('#cantidad').val(res.data.cantidad);
                $('#precio').val(res.data.precio);
                $('#categoria').val(res.data.categoria);
                $('#estado').val(res.data.estado);

                if (res.data.imagen) {
                    $('#nueva_imagen').removeAttr('disabled');
                } else {
                    $('#nueva_imagen').prop('disabled', false);
                }

                $('#productEditModal').modal('show');
            }
        },
        error: function() {
            alert('Error al cargar el producto');
        }
    });
});




$(document).on('submit', '#updateProduct', function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_product", true);

    var nuevaImagen = $('#nueva_imagen').prop('files')[0]; // Obtener la nueva imagen seleccionada

    if (nuevaImagen) {
        formData.append("imagen", nuevaImagen); // Agregar la nueva imagen al formulario
    } else {
        formData.delete("imagen"); // Eliminar el campo de imagen del formulario
    }

    // Verificar si hay una imagen en el formulario para decidir si se actualiza o no
    if (nuevaImagen || formData.get("imagen")) {
        $.ajax({
            type: "POST",
            url: "code2.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                } else if (res.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');

                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#studentEditModal').modal('hide');
                    $('#updateProduct')[0].reset();

                    $('#myTable').load(location.href + " #myTable");
                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });
    } else {
        // No hay una nueva imagen ni una imagen existente en el formulario, mostrar mensaje de error
        $('#errorMessageUpdate').removeClass('d-none');
        $('#errorMessageUpdate').text("Debe seleccionar una imagen.");
    }
});





        $(document).on('click', '.viewProductBtn', function () {

            var product_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code2.php?product_id=" + product_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_producto').text(res.data.producto);
                        $('#view_descripcion').text(res.data.descripcion);
                        $('#view_cantidad').text(res.data.cantidad);
                        $('#view_precio').text(res.data.precio);
                        $('#view_categoria').text(res.data.categoria);
                        $('#view_estado').text(res.data.estado);

                        $('#productViewModal').modal('show');
                    }
                }
            });
        });





        $(document).on('click', '.deleteProductBtn', function (e) {
            e.preventDefault();
<<<<<<< HEAD
            if(confirm('¿Estas seguro de que quieres eliminar este producto?'))
            {
=======

<<<<<<< HEAD
            if(confirm('¿Estas seguro de que quieres eliminar este producto?'))
            {
=======
            if (confirm('¿Estas seguro de que quieres eliminar este producto?')) {
>>>>>>> b1d6c45c804ca5dc94a55d7de9732fa112ff50a0
>>>>>>> 3c27be75bab5d8d8f133404db7abe88fd1b2d9e1
                var product_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code2.php",
                    data: {
                        'delete_product': true,
                        'product_id': product_id
                    },
<<<<<<< HEAD
                    success: function (response) {
=======
<<<<<<< HEAD
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {
=======
                    success: function(response) {
>>>>>>> 3c27be75bab5d8d8f133404db7abe88fd1b2d9e1

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

>>>>>>> b1d6c45c804ca5dc94a55d7de9732fa112ff50a0
                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);
                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

    </script>

</body>
</html>