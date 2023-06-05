<?php
include_once "header.php";
?>

    <br>
    <div style="display: flex; height: 100vh;">
        <div style="flex: 1; background-color: #f1f1f1;">
            <div class="container">
                <h5 class="card-title text-center titulo">Nuevos Productos</h5>
            </div>
            <center>
                <form method="POST" action="Registro.php" class="center-form">
                    <label for="id" class="me-2"><i class="fas fa-search"></i></label>
                    <input type="text" name="ID_EMPLEADO" id="ID_EMPLEADO" style="height: 35px;" placeholder="Nombre Producto">
                    <button type="submit" name="buscar" class="btn btn-primary">Buscar 🔍</button>
                </form>
            </center>
            <!-- NUEVOS PRODUCTOS -->
            <div class="container">
                <?php
                require 'dbcon.php';
                $query = mysqli_query($con, "SELECT * FROM productos");
                $query_run = mysqli_num_rows($query);
                if ($query_run > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($data['img']) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $data['producto'] ?></h5>
                                <p class="card-text text-center"><?php echo $data['descripcion'] ?></p>
                                <p class="card-text text-center"><?php echo $data['precio'] ?></p>
                                <p class="card-text text-center">
                                    <?php if ($data['estado'] == 1) : ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">Inactivo</span>
                                    <?php endif; ?>
                                </p>
                                <div class="form-group">
                                    <input type="number" class="form-control cantidad-input" id="cantidad-<?php echo $data['id'] ?>" data-precio="<?php echo $data['precio'] ?>" placeholder="Cantidad">
                                </div><br>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary agregar-btn" data-id="<?php echo $data['id'] ?>">Agregar🛒</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div style="flex: 1; background-color: #eaeaea;">
            <center>
                <h1>Este es el estado del recibo cliente</h1>
                <div id="recibo-container">
                    <form id="recibo-form" action="ventas.php" method="POST">
                        <label for="">Fecha</label>
                        <input type="datetime-local" name="fecha" style="color: black;">

                        <label for="">CI</label>
                        <input type="tex" name="ci" style="color: black;">

                        <label for="">Nombre</label>
                        <input type="text" name="nombre" style="color: black;">

                        <h2>Productos a comprar:</h2>
                        <table id="productos-comprar" class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <label for="total">Total:</label>
                        <input type="text" id="total" name="total" readonly style="color: black;">
                        <input type="submit" value="Guardar recibo 💸" style="color: black;">
                    </form>
                </div>
            </center>
        </div>
        <script>
            const agregarBtns = document.querySelectorAll('.agregar-btn');
            const cantidadInputs = document.querySelectorAll('.cantidad-input');
            const productosComprarContainer = document.getElementById('productos-comprar').querySelector('tbody');

            const totalventa = document.getElementById('total');
            let total = 0;

            agregarBtns.forEach((btn, index) => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const cantidad = parseInt(cantidadInputs[index].value);
                    const nombreProducto = btn.parentElement.parentElement.querySelector('.card-title').innerText;
                    const precioUnitario = parseInt(cantidadInputs[index].getAttribute('data-precio'));
                    const subtotal = cantidad * precioUnitario;

                    total += subtotal;
                    const productoComprar = document.createElement('tr');
                    productoComprar.innerHTML = ` 
                        <td>${nombreProducto}</td>
                        <td>${cantidad}</td>
                        <td>${precioUnitario}</td>
                        <td>${subtotal}</td>`;
                    productosComprarContainer.appendChild(productoComprar);
                    totalventa.value = total;
                });
            });
        </script>

    </div>
    <!-- esto es la insercion de ventas a la tabla ventas -->

    <?php
    require 'dbcon.php';
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $fecha = $_POST["fecha"];
        $ci = $_POST["ci"];
        $nombre = $_POST["nombre"];
        $total = $_POST["total"];

        // Guardar los datos en la tabla "ventas"
        $sql = "INSERT INTO ventas (fecha, ci, nombre, total) VALUES ('$fecha', '$ci', '$nombre', '$total')";
        if (mysqli_query($conn, $sql)) {
            echo "Datos guardados en la tabla 'ventas' correctamente.";
        } else {
            echo "Error al guardar los datos en la tabla 'ventas': " . mysqli_error($conn);
        }

        // Obtener los productos comprados
        $productos = $_POST["productos"]; // asumiendo que tienes un campo oculto en el formulario con name="productos" que contiene los datos de los productos en formato JSON

        // Decodificar los productos desde JSON
        $productos = json_decode($productos, true);

        // Guardar los productos en la tabla "venta de productos"
        foreach ($productos as $producto) {
            $nombreProducto = $producto["nombre"];
            $cantidad = $producto["cantidad"];
            $precioUnitario = $producto["precio_unitario"];
            $subtotal = $producto["subtotal"];

            $sql = "INSERT INTO ventas_productos (nombre_producto, cantidad, precio_unitario, subtotal) VALUES ('$nombreProducto', $cantidad, $precioUnitario, $subtotal)";
            if (mysqli_query($conn, $sql)) {
                echo "Producto '$nombreProducto' guardado en la tabla 'ventas_productos' correctamente.";
            } else {
                echo "Error al guardar el producto '$nombreProducto' en la tabla 'ventas_productos': " . mysqli_error($conn);
            }
        }


        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    }
    ?>
    <!-- esta seccion actualiza los productos de la base de  de datos -->

    <?php
    // Actualizar la cantidad de productos en la tabla "productos"
    foreach ($productos as $producto) {
        $nombreProducto = $producto["nombre"];
        $cantidadVendida = $producto["cantidad"];

        // Obtener la cantidad actual del producto en la base de datos
        $sql = "SELECT cantidad FROM productos WHERE nombre = '$nombreProducto'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $cantidadActual = $row["cantidad"];

        // Calcular la nueva cantidad después de la venta
        $nuevaCantidad = $cantidadActual - $cantidadVendida;

        // Actualizar la cantidad en la base de datos
        $sql = "UPDATE productos SET cantidad = $nuevaCantidad WHERE nombre = '$nombreProducto'";
        if (mysqli_query($conn, $sql)) {
            echo "Cantidad actualizada para el producto '$nombreProducto'.";
        } else {
            echo "Error al actualizar la cantidad para el producto '$nombreProducto': " . mysqli_error($conn);
        }
    }

    ?>
<?php
include_once "footer.php";
?>