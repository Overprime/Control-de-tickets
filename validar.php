				<?php 
				//Proceso de conexiÃ³n con la base de datos
				include('bd/conexion.php');
				$link=Conectarse();
				//Inicio de variables de sesiÃ³n
				if (!isset($_SESSION)) {
				session_start();
				}
				
				//Recibir los datos ingresados en el formulari	o
				$usuario= addslashes($_POST['usuario']);
				$contrasena=addslashes($_POST['contrasena']);
				////$usuario= addslashes($_POST['usuario']);
				//$contrasena=addslashes($_POST['contrasena']);
				
				//Consultar si los datos son estÃ¡n guardados en la base de datos
				$consulta= "SELECT * FROM usuarios
				WHERE usuario='".$usuario."' AND contrasena='".$contrasena."'"; 
				$resultado= mysql_query($consulta,$link) or die (mysql_error());
				$fila=mysql_fetch_array($resultado);
				
				
				if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
				{
				echo '<script language = javascript>
				alert("Usuario o Password errados, por favor verifique.")
				self.location = "/sistemas"
				</script>';
				}
				else //opcion2: Usuario logueado correctamente
				{
				//Definimos las variables de sesiÃ³n y redirigimos a la pÃ¡gina de usuario
				$_SESSION['id'] = $fila['id_usuario'];
				$_SESSION['nombre'] = $fila['nombres'];
				$_SESSION['apellido'] = $fila['apellidos'];
			
				
				header("Location: /sistemas/home");
				}
				?>