	<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="UTF-8">
	<?php
	//VARIABLES DE SESION 
	//session_start();
	//$IDUSUARIO=$_SESSION['id_usuario'];	
	
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
	
	
	<script type="text/javascript" language="javascript" src="js/jslistadoasignado.js"></script>
	
	
	<table class="table table-bordered table-condensed" id="tabla_lista_asignado">
	<thead>
	<tr class="success">
	<th>ID</th>
	<th>RESP. TICKET</th>
	<th>USUARIO</th>
	<th>EMPRESA</th>
	<th>AREA</th>
	<th>TIPO</th>
	<th>PROBLEMA</th>
	<th>HORA CREACIÓN</th>
	<th>HORA ASIGNADA</th>
	</tr>
	<?php require_once('../../bd/conexion.php');
	$link=  Conectarse();
	$listado=  mysql_query("SELECT ate_id,ate_tck_id,user.nombres,
	concat(u.nombre,' ',u.apellido) as fullname,
	ar.nombre,emp.nombreempresa,ta.descripcion,
	t.tck_detalle,	DATE_FORMAT(t.tck_fecha,'%d/%m/%Y %H:%i:%s')as horacreacion,
	DATE_FORMAT(ate_horaasig,'%d/%m/%Y %H:%i:%s') AS ate_horaasig,
	est.est_descripcion,upper(ate_detalle)as ate_detalle,
	DATE_FORMAT(ate_horaestado,'%d/%m/%Y  %H:%i:%s') AS ate_horaestado,
	TIMEDIFF(ate_horaestado,ate_horaasig) AS TIEMPO
	from atencion as a  inner join ticket  as t on
	a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
	t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
	u.area_idarea=ar.idarea inner join usuarios as user on 
	a.ate_usuario=user.id_usuario inner join  empresa as emp on
	t.tck_empresa=emp.codigoempresa inner join estado as est on
	a.ate_estado=est.est_id  inner join tipoactividad as ta on 
	t.tck_tipo=ta.codigoactividad  where a.ate_estado like '01' ",$link);
	?>
	
	<tbody>
	<?php
	while($reg=  mysql_fetch_array($listado))
	{
	?>
	<tr >
	<td><?php echo $reg[ate_tck_id]; ?></td>
	<td><?php echo $reg[nombres]; ?></td>
	<td><?php echo $reg[fullname]; ?></td>
	<td><?php echo $reg[nombreempresa]; ?></td>
	<td><?php echo $reg[nombre]; ?></td>
	<td><?php echo $reg[descripcion]; ?></td>
	<td><?php echo $reg[tck_detalle]; ?></td>
		<td><?php echo $reg[horacreacion]; ?></td>
	<td><?php echo utf8_encode($reg[ate_horaasig]); ?></td>
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