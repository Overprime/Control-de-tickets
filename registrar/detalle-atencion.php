<?php 

include('../bd/conexion.php');

//Iniciar Sesion
session_start();




 $Usuarioactual=$_SESSION['id_usuario'];
 $Usuarionuevo=$_REQUEST['usuarionuevo'];
 $Horas=$_REQUEST['horas'];
 $Detalle=$_REQUEST['detalle'];
   $Estado=$_REQUEST['estado'];
 $Idatencion=$_REQUEST['idatencion'];
 $Idticket=$_REQUEST['idticket'];



/*Insertamos los nuevos Datos */

$link=Conectarse();

$Sql ="INSERT INTO detalle_atencion(usuarioactual,usuarionuevo,fecha,horas,detalle,estado,
idatencion,idticket)VALUES
('$Usuarioactual','$Usuarionuevo',now(),'$Horas','$Detalle','$Estado',
'$Idatencion','$Idticket')";

$Sql1="UPDATE atencion SET ate_estado='07' WHERE ate_id=2563 ";

$result=mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{
$result1=mysql_query($Sql1);
header('Location: /sistemas/pages/actualizar-atencion-new?idticket='.$Idticket);


}

 ?>