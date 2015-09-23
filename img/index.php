<?php //Iniciar Sesion
session_start();

//Validar si se esta ingresando con sesion correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "/sistemas/"
</script>';
}
 ?>



 <?php 	

header('Location: /sistemas/home');


  ?>