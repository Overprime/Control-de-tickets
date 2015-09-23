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


<script type="text/javascript" language="javascript" src="js/jslistadoresponsable.js"></script>


<table class="table table-bordered table-condensed" id="tabla_lista_responsable">
<thead>
<tr class="success">
<th>ID TICKET.</th>
<th>USUARIO</th>
<th>EMPRESA</th>
<th>AREA</th>
<th>TIPO</th>
<th width="1000">DETALLE</th>
<th>HORA ASIGNADA</th>
<th>ESTADO</th>
<th>ARCHIVO</th>
</tr>
<?php require_once('../../bd/conexion.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT  ate_id,ate_tck_id,user.nombres,
concat(u.nombre,' ',u.apellido) as fullname,
ar.nombre,emp.nombreempresa,ta.descripcion,
t.tck_detalle,ate_horaasig,est.est_descripcion,ate_detalle,
ate_horaestado,(t.tck_asunto)AS asuntos,
(substring(t.tck_asunto from 34))as ruta from atencion as a  inner join ticket  as t on
a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
u.area_idarea=ar.idarea inner join usuarios as user on 
a.ate_usuario=user.id_usuario inner join  empresa as emp on
t.tck_empresa=emp.codigoempresa inner join estado as est on
a.ate_estado=est.est_id  inner join tipoactividad as ta on 
t.tck_tipo=ta.codigoactividad  where a.ate_estado not like '03' AND 
user.id_usuario='$IDUSUARIO'",$link);
?>

<tbody>
<?php
while($reg=  mysql_fetch_array($listado))
{
?>
<tr >

<td><a href="../pages/responsable?idticket=<?php echo $reg[ate_tck_id];?>">
<?php echo utf8_encode($reg[ate_tck_id]); ?></a></td>
<td><?php echo utf8_encode($reg[fullname]); ?></td>
<td><?php echo utf8_encode($reg[nombreempresa]); ?></td>
<td><?php echo utf8_encode($reg[nombre]); ?></td>
<td><?php echo $reg[descripcion]; ?></td>
<td><?php echo $reg[tck_detalle]; ?></td>
<td><?php echo utf8_encode($reg[ate_horaasig]); ?></td>
<td><?php echo utf8_encode($reg[est_descripcion]); ?></td>
<td><a href="<?php  echo $reg['asuntos'];?>" target="_black"><?php  echo $reg['ruta'];?></a></td>
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