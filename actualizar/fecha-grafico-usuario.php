<?php 
include('../bd/conexion.php');
$FECHA=$_REQUEST['fecha'];
$IDUSUARIO=$_REQUEST['idusuario'];
$TIPO=$_REQUEST['tipo'];
/*ACTUALIZAR DATOS*/

$link=Conectarse();

$Sql ="UPDATE validarfecha set fecha='$FECHA'
 where usuario='$IDUSUARIO' and tipo='$TIPO'";

$result=mysql_query($Sql);
if (!$result){echo "Error al guardar";}
else{

echo "<script>
window.location ='/sistemas/reportes/usuario';

</script>";
}



?>