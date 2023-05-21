<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD PRODUCTOS</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
    <link rel="stylesheet" href="css/coverflow.css">
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white navbar-dark navbar-light bg-light fixed-top nav-custom nav-link">
        <div class="container">
            <a class="navbar-brand mt-2 mt-lg-0" href="#" > <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy"/> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
                    <div class="navbar-nav ms-auto justify-content-end">
                        <a class="nav-link logged-out text-black fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#signinModal">Servicios</a>
                        <a class="nav-link logged-out text-black fw-bold"  href="Hugo/index.php" data-bs-toggle="" data-bs-target="">Citas</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Descargar Catalogos</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-black" href="#">Productos</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-black" href="#">Peinado Varones </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-black" href="#">Peinado Mujeres </a></li>
                                </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">Logeo</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-black nav-link logged-out" href="#" data-bs-toggle="modal" data-bs-target="#signinModal" >Iniciar Sesion</a></li>
                                    <li><a class="dropdown-item text-black nav-link logged-out" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Registrate Clientes</a></li>
                                    <li><a class="dropdown-item text-black nav-link logged-in" href="#" id="logout">Cerrar Sesion</a></li>
                                    <li><a class="nav-link logged-in dropdown-item text-black " href="Andres/Empleados.html" id="logout1">nueva pagina</a></li>
                                    <li><a class="nav-link logged-in dropdown-item text-black " href="index.php" id="logout2">Reservas</a></li>
                                    <li><a class="nav-link logged-in dropdown-item text-black " href="" id="logout3">Reportes</a></li>

                                </ul>
                        </li>
                    </div>
                </div>
        </div>
    </nav>


<br>
<br>
<br>
<br>

<!-- AGREGAR PRODUCTO -->
<div class="modal fade" id="productAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveProduct">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Producto</label>
                    <input type="text" name="producto" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Descripción</label>
                    <textarea type="text" name="descripcion" class="form-control" style="width: 300px; height: 150px;"></textarea>


                </div>
                <div class="mb-3">
                    <label for="">Cantidad</label>
                    <input type="text" pattern="[0-9]+" name="cantidad" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Precio (Bs)</label>
                    <input type="text" pattern="[0-9]+" name="precio" class="form-control" />
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
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateProduct">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="product_id" id="product_id" >

                <div class="mb-3">
                    <label for="">Producto</label>
                    <input type="text" name="producto" id="producto" class="form-control" />

                </div>
                <div class="mb-3">
                    <label for="">Descripción</label>
                    <textarea type="text" name="descripcion" id="descripcion" class="form-control" style="width: 300px; height: 150px;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Cantidad</label>
                    <input type="number" name="cantidad" pattern="[0-9]+" id="cantidad" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Precio (Bs)</label>
                    <input type="number" name="precio" pattern="[0-9]+" id="precio" class="form-control" />
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
                    <label for="">Cantidad</label>
                    <p id="view_cantidad" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Precio (Bs)</label>
                    <p id="view_precio" class="form-control"></p>
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
                    <h4>PRODUCTOS
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#productAddModal">
                            Agregar Producto
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio (Bs)</th>
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
                                        <td><?= $product['cantidad'] ?></td>
                                        <td><?= $product['precio'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$product['id'];?>" class="viewProductBtn btn btn-info btn-sm">Ver</button>
                                            <button type="button" value="<?=$product['id'];?>" class="editProductBtn btn btn-success btn-sm">Editar</button>
                                            <button type="button" value="<?=$product['id'];?>" class="deleteProductBtn btn btn-danger btn-sm">Eliminar</button>
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





        $(document).on('click', '.editProductBtn', function () {

            var product_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code2.php?product_id=" + product_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#product_id').val(res.data.id);
                        $('#producto').val(res.data.producto);
                        $('#descripcion').val(res.data.descripcion);
                        $('#cantidad').val(res.data.cantidad);
                        $('#precio').val(res.data.precio);

                        $('#studentEditModal').modal('show');
                    }

                }
            });

        });







        $(document).on('submit', '#updateProduct', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_product", true);

            $.ajax({
                type: "POST",
                url: "code2.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#studentEditModal').modal('hide');
                        $('#updateProduct')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

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

                        $('#productViewModal').modal('show');
                    }
                }
            });
        });





        $(document).on('click', '.deleteProductBtn', function (e) {
            e.preventDefault();

            if(confirm('¿Estas seguro de que quieres eliminar este producto?'))
            {
                var product_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code2.php",
                    data: {
                        'delete_product': true,
                        'product_id': product_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

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