<?php 

include('../bd/conexion.php');
$IDTICKET=$_REQUEST['idticket'];
$IDUSUARIO=$_REQUEST['idusuario'];
/*Insertamos los nuevos Datos*/

$link=Conectarse();

$Sql ="INSERT INTO atencion(ate_tck_id,ate_usuario,ate_horaasig,ate_estado)VALUES
('$IDTICKET','$IDUSUARIO',now(),'01')";

$Sql1="UPDATE ticket SET  tck_estado ='02' WHERE  tck_id ='$IDTICKET';";
$result=mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{
$result1=mysql_query($Sql1);

echo "<script>
alert('EL ticket $IDTICKET fue asignado correctamente');
window.location ='/sistemas/consulta/asignar';

</script>";
}

 ?>