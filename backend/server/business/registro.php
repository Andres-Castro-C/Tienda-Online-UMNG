<?php

include("ConnectionDB.php");

 
  if (isset($_POST['meRegistre'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['documento']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST["d/m/y"] && strlen($_POST['pasword']) >= 1) >= 1) {
	    $nombre = trim($_POST['nombre']);
      $documento = trim($_POST['documento']);
      $fechaNacimiento = date("d/m/y");
	    $correo = trim($_POST['email']);
      $clave = trim($_POST['pasword']);
	    $consulta = "INSERT INTO usuario( nombre, documento, correo, fechaNacimiento, clave) VALUES ( '$nombre', '$documento', '$fechaNacimiento', '$correo' , '$clave' )";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}
?>