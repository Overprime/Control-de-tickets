<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<?php
//VARIABLES DE SESION 
session_start();
$IDUSUARIO=$_SESSION['id'];	
//echo $IDUSUARIO;
?>
</head>
<body>

<div class="container">

<div class="row clearfix">
<div class="col-md-12 column">
</div>
</div>

<div class="row clearfix">

<div class="col-md-12 column">

<div class="table-responsive">


<script type="text/javascript" language="javascript" src="js/jslistadoasignar.js"></script>


<table class="table table-bordered table-condensed" id="tabla_lista_asignar">
<thead>
<tr class="success">
<th>ID TICKET</th><!--Estado-->
<th>USUARIO</th>
<th>AREA</th>
<th>EMPRESA</th>
<th>TIPO</th>
<th>DETALLE</th>
<th>HORA DE CREACION</th>
<th>ARCHIVO</th>
</tr>
<?php require_once('../../bd/conexion.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT tck_id,tck_usuario,e.nombreempresa,a.nombre,
	concat(u.nombre,' ',u.apellido) as fullname ,
tck_detalle,ta.descripcion,
DATE_FORMAT(tck_fecha,'%d/%m/%Y --%H:%i:%s') AS tck_fecha,tck_asunto,
(substring(tck_asunto from 34))as ruta from ticket  as t inner join  empresa as e on
t.tck_empresa=e.codigoempresa inner join webnets_rdgdb.usuario as  u  on
t.tck_usuario=u.idusuario inner join webnets_rdgdb.area as a on
u.area_idarea=a.idarea  inner join  tipoactividad as ta on
t.tck_tipo=ta.codigoactividad  where t.tck_estado like '01'",$link);
?>

<tbody>
<?php
while($reg=  mysql_fetch_array($listado))
{
?>
<tr >

<td><a href="../registrar/registrar-atencion.php?idticket=<?php echo $reg[tck_id];?>&
idusuario=<?php echo $IDUSUARIO;?>">
<?php echo utf8_encode($reg[tck_id]); ?></a></td>
<td><?php echo utf8_encode($reg[fullname]); ?></td>
<td><?php echo $reg[nombre]; ?></td>
<td><?php echo utf8_encode($reg[nombreempresa]); ?></td>
<td><?php echo utf8_encode($reg[descripcion]); ?></td>
<td><?php echo $reg[tck_detalle]; ?></td>
<td><?php echo utf8_encode($reg[tck_fecha]); ?></td>
<td><a href="<?php echo $reg['tck_asunto'];  ?>" 
target="_black"><?php echo $reg['ruta'];  ?></a></td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>

</div>
</div>

</div>

</body>

</html>