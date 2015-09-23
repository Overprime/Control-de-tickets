
	<meta charset="UTF-8">

	
	<?php 
	session_start();
	
	if ($_SESSION['nombre'])
	{	
	session_destroy();
	?>
	
	
	
	
	<script language = javascript>
	alert("Su sesión ha terminado correctamente")
	self.location = "/sistemas/"
	</script>
	

	
	
	<?php
	
	}
	else
	{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor registrese")
	self.location = "/sistemas/"
	</script>';}
	?>
	
	
