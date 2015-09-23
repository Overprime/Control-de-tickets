<?php 

include('../bd/conexion.php');
$NOMBRES=$_REQUEST['nombres'];
$APELLIDOS=$_REQUEST['apellidos'];
$DNI=$_REQUEST['dni'];




/*Insertamos los nuevos Datos*/

$link=Conectarse();

$Sql ="INSERT INTO usuarios(nombres,apellidos,dni)VALUES
('$NOMBRES','$APELLIDOS','$DNI')";

$result=mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

echo "<script>
window.location ='/sistemas/consulta/usuarios';

</script>";
}

 ?>