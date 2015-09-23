<?php 
include('../bd/conexion.php');
$IDATENCION=$_REQUEST['idatencion'];
$DETALLE=htmlspecialchars($_REQUEST['detalle']);
$ESTADO=$_REQUEST['estado'];
/*ACTUALIZAR DATOS*/

$link=Conectarse();

$Sql ="UPDATE atencion set ate_estado='$ESTADO',
ate_detalle='$DETALLE',ate_horaestado=now() where ate_id='$IDATENCION'";

$result=mysql_query($Sql);
if (!$result){echo "Error al guardar";}
else{

echo "<script>
alert('El Atencion $IDATENCION fue actualizada correctamente.');
window.location ='/sistemas/consulta/seguimiento';

</script>";
}



?>