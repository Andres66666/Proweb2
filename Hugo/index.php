<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <!-- BOOSTRAP CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    <link rel="stylesheet" href="css/coverflow.css">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Stylesheet--------------------------->
    <link rel="stylesheet" href="css/valoracion.css"/>
    <!--Fav-icon------------------------------>
    <link rel="shortcut icon" href="images/fav-icon.png"/>
    <!--poppins-font-family------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--using-Font-Awesome-------------------->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <script src="./login/main.js" type="module"></script>

</head>
<body> 
    <nav class="navbar navbar-expand-lg bg-white navbar-dark navbar-light bg-light fixed-top nav-custom nav-link">
        <div class="container">
            <a class="navbar-brand mt-2 mt-lg-0" href="#" > <img src="img/logo.png" height="15" alt="MDB Logo" loading="lazy"/> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
                    <div class="navbar-nav ms-auto justify-content-end">
                        <a class="nav-link logged-out text-black fw-bold"  href="#" data-bs-toggle="modal" data-bs-target="#signinModal"><li>Productos</li> </a>
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
<?php
include('config.php');

  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);

?>
<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
    </div>
  </div>





<div id="calendar"></div>


<?php  
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
?>



<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

    

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
    events: [
      <?php
        while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
          {
          _id: '<?php echo $dataEvento['id']; ?>',
          title: '<?php echo $dataEvento['evento']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>'
          },
        <?php } ?>
    ],


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);
      $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>


<!--------- WEB DEVELOPER ------>
<!--------- URIAN VIERA   ----------->
<!--------- PORTAFOLIO:  https://blogangular-c7858.web.app  -------->
<div class="my-5" style="padding-left: 0; padding-right: 0;">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style=" background-color: #504f4f;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
            <!-- Section: Links -->
                <section class="">
                <!--Grid row-->
                <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3" style="width: 400px;" >
                    <h6 class="text-uppercase mb-4 font-weight-bold titulo text-center" style="color: #ffffff;">Nombre del Salon de belleza </h6>
                    <p>
                        El Salón de belleza Lindsay, 
                        se encarga del arreglo personal en mujeres, varones 
                        donde se realizan cortes, tintes, peinados, maquillado, 
                        uñas, cejas y pestañas y otros.
                    </p>
                </div>
                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-2" style="width: 400px; padding-left: 100px;">
                    <h6 class="text-uppercase mb-4 font-weight-bold titulo text-center" style="color: #ffffff;">Productos</h6>
                    <p><a class="text-white">Accesorios</a></p>
                    <p><a class="text-white">Maquillaje</a></p>
                    <p><a class="text-white">Depilación</a></p>
                    <p><a class="text-white">Uñas</a></p>
                </div>
                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />
                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3" style="width: 400px;">
                    <h6 class="text-uppercase mb-4 font-weight-bold titulo text-center" style="color: #ffffff;">Contactos</h6>
                    <p><i class="fas fa-home mr-3"></i> El Alto: Satelite, NY 10012, US</p>
                    <p><i class="fas fa-envelope mr-3"></i> cya2024773@est.univalle.edu</p>
                    <p><i class="fas fa-phone mr-3"></i> + 591 787 454 66</p>
                    <p><i class="fas fa-map-marker-alt mr-3"></i><a style="color: white;" href="https://goo.gl/maps/EBKZjPLSdx3y3AnF6">Google Maps</a></p>
                </div>
                
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4 text-center " style="width: 500px;">
                    <h6 class="text-uppercase mb-4 font-weight-bold text-center titulo" style="color: #ffffff;">Síganos en nuetras redes </h6>
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1 rounded-circle btn-floating" style="background-color: #3b5998; font-size: 30px;" href="#!" role="button" ><i class="fab fa-facebook"></i> </a>      
                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1 rounded-circle btn-lg btn-floating" style="background-color: #000000; font-size: 30px;" href="#!" role="button" ><i class="fab fa-tiktok"></i></a>
                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1 rounded-circle btn-floating" style="background-color: #dd4b39; font-size: 30px;" href="#!" role="button" ><i class="fab fa-youtube"></i></a>
                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1 rounded-circle btn-lg btn-floating" style="background-image: linear-gradient(135deg, #405DE6 0%, #5851DB 10%, 	#833AB4 20%, #C13584 30%, #E1306C 40%, #FD1D1D 50%, 	#F56040 60%, #F77737 70%,#FCAF45 80%, #FFDC80 100%); font-size: 30px;" href="#!" role="button" ><i class="fab fa-instagram"></i></a>
                    <!-- Linkedin -->
                </div>
                </div>
                <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)" >© 2023 Derechos de autor:
                <a class="text-white" href="https://mdbootstrap.com/">Grupo Cian</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</body>
</html>
