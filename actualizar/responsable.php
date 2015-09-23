<?php 
include('../bd/conexion.php');
$ATENCION=  $_REQUEST['atencion'];
$NUEVO=$_REQUEST['nuevo'];
$ACTUAL=  $_REQUEST['actual'];

/*ACTUALIZAR DATOS*/

$link=Conectarse();

$Sql ="UPDATE atencion set ate_usuario='$NUEVO'
where ate_id='$ATENCION' and ate_usuario='$ACTUAL'";

$result=mysql_query($Sql);
if (!$result){echo "Error al guardar";}
else{

echo "<script>
alert('El Atencion $ATENCION fue actualizada de responsable.');
window.location ='/sistemas/consulta/responsable';

</script>";
}



?>