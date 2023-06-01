<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background: linear-gradient(135deg, #f6d6e7, #d6e6f6);
        }

        .card {
    position: relative;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 50%;
}

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-text {
            color: #666;
        }

        .editProductBtn {
            margin-top: 10px;
        }

        .loader {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.7);
        }

        /* Estilos personalizados para la barra de desplazamiento */
        .simplebar-scrollbar:before {
            background-color: #f34c7c !important;
        }

        .simplebar-track.simplebar-horizontal .simplebar-scrollbar:before {
            height: 8px !important;
        }

        .simplebar-track.simplebar-vertical .simplebar-scrollbar:before {
            width: 8px !important;
        }
        
        #scrollButton {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #f34c7c;
            color: white;
            cursor: pointer;
            padding: 30px;
            border-radius: 50%;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        #scrollButton:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-white navbar-dark navbar-light bg-light fixed-top nav-custom nav-link" >
        <div class="container" >
            <a class="navbar-brand mt-2 mt-lg-0" href="#" > <img src="img/logo1.png" width="150px" height="50px" alt="MDB Logo" loading="lazy"/> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
                    <div class="navbar-nav ms-auto justify-content-end">
                        <a class="nav-link logged-out text-black fw-bold" href="#" data-bs-toggle="modal"  style="font-family: ITC Bradley Hand Std Bold; font-size: 25px; ">SERVICIOS</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: ITC Bradley Hand Std Bold;  font-size: 25px;">DESCARGAR CATALOGO</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: ITC Bradley Hand Std Bold;">
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-black" href="#">PEINDAOS VARONES</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-black" href="#">PINADO MUJERES </a></li>
                                </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black fw-bold" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: ITC Bradley Hand Std Bold;  font-size: 25px;">LOGIN</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item text-black nav-link logged-out" href="#" data-bs-toggle="modal" data-bs-target="#signinModal" style="font-family: ITC Bradley Hand Std Bold;  font-size: 25px;">INICIAR SECION</a></li>
                                </ul>
                        </li>
                        <!-- Script JavaScript para controlar la visibilidad de Reservas y Reportes -->
                    </div>
                </div>
        </div>
    </nav>
    <br><br><br>

    <div id="loader" class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div id="content" style="display: none;">
        <div class="container mt-4">
            <div class="row">
                <?php
                require 'dbcon.php';

                $query = "SELECT * FROM productos WHERE estado = 1";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $product) {
                ?>
<div class="col-md-4">
    <div class="card mb-3">
        <div class="position-relative">
            <img src="imagenes/<?= $product['imagen'] ?>" class="card-img-top" alt="Imagen del producto">
            <div class="overlay"></div> <!-- Agregado -->
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $product['producto'] ?></h5>
            <p class="card-text"><?= $product['descripcion'] ?></p>
            <p class="card-text">Cantidad: <?= $product['cantidad'] ?></p>
            <p class="card-text">Precio (Bs): <?= $product['precio'] ?></p>
            <div class="btn-group">
    <a href="https://wa.me/67323050" target="_blank" class="btn btn-success btn-sm">Reservar</a>
</div>

        </div>
    </div>
</div>

                <?php
                    }
                } else {
                    echo "<p>No hay productos activos disponibles.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <button id="scrollButton" onclick="scrollToTop()">&#8593;</button>

    <script>
        // Mostrar u ocultar el botón de scroll dependiendo de la posición de desplazamiento
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            var scrollButton = document.getElementById("scrollButton");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollButton.style.display = "block";
            } else {
                scrollButton.style.display = "none";
            }
        }

        // Volver al inicio de la página cuando se hace clic en el botón de scroll
        function scrollToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Agregar el script del plugin SimpleBar -->
    <script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>

    <script>
        // Show loader while page is loading
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("loader").style.display = "flex";
            document.getElementById("content").style.display = "none";
        });

        // Hide loader and show content when page is fully loaded
        window.addEventListener("load", function() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("content").style.display = "block";

            // Inicializar SimpleBar para la sección de productos
            new SimpleBar(document.getElementById("content"));
        });
    </script>
</body>

</html>
