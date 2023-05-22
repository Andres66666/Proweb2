<?php
ini_set("display_errors","on");

$con = mysqli_connect("sql308.byethost14.com","b14_33887233","13247291","b14_33887233_Salon") or die ("Error al conectar: " . mysqli_connect_error());
mysqli_select_db($con, $bd) or die ("Error al seleccionar la BD: " . mysqli_error($con));

?>
