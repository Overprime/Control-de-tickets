<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>USUARIO</title>
<?php include('../header.php'); ?>
<?php
//VARIABLES DE SESION 
session_start();
$IDUSUARIO=$_SESSION['id'];	
$link=Conectarse();


$sql2="SELECT fecha from validarfecha where usuario=$IDUSUARIO and tipo='usuario' ";
$result=mysql_query($sql2,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field=mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/

$fecha		=$row[0];

} while ($row=mysql_fetch_array($result));


}else { 
echo "NO hay nada";

} 

?>

<?php

$sql3="SELECT count(*)  from atencion as a  inner join ticket  as t on
	a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
	t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
	u.area_idarea=ar.idarea inner join usuarios as user on 
	a.ate_usuario=user.id_usuario inner join  empresa as emp on
	t.tck_empresa=emp.codigoempresa inner join estado as est on
	a.ate_estado=est.est_id  inner join tipoactividad as ta on 
	t.tck_tipo=ta.codigoactividad  where a.ate_estado like '03' and
ate_horaestado like '%$fecha%'";
$result=mysql_query($sql3,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field=mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/

$total		=$row[0];

} while ($row=mysql_fetch_array($result));


}else { 
echo "NO hay nada";

} 

?>



</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="../actualizar/fecha-grafico-usuario.php" method="post">
<input type="hidden" name="tipo" value="usuario">
<input type="hidden" name="idusuario" value="<?php echo $IDUSUARIO;	 ?>">
<select name="fecha" id="" class="form-control" onchange="this.form.submit()" required>
	<option value="">MES</option>
	<OPTION VALUE="2015-01">ENERO</OPTION>
	<OPTION VALUE="2015-02">FEBRERO</OPTION>
	<OPTION VALUE="2015-03">MARZO</OPTION>
	<OPTION VALUE="2015-04">ABRIL</OPTION>
	<OPTION VALUE="2015-05">MAYO</OPTION>
	<OPTION VALUE="2015-06">JUNIO</OPTION>
	<OPTION VALUE="2015-07">JULIO</OPTION>
	<OPTION VALUE="2015-08">AGOSTO</OPTION>
	<OPTION VALUE="2015-09">SEPTIEMBRE</OPTION>
	<OPTION VALUE="2015-10">OCTUBRE</OPTION>
	<OPTION VALUE="2015-11">NOVIEMBRE</OPTION>
	<OPTION VALUE="2015-12">DICIEMBRE</OPTION>
</select>
</form>
</div>	
<div class="col-md-2 column">
<input type="" class="form-control" value="<?php echo $fecha;?>" readonly>
</div>
<div class="col-md-2 column">
<input type="" class="form-control" value="<?php echo "Total:"." ".$total." "."atenciones";?>" readonly>
</div>
</div>
<div class="row clearfix">
<div class="col-md-4 column">
<div class="table-responsive">
<table class="table">
<thead>
<tr >

<th>NOMBRES</th>
<th>CANTIDAD</th>
<th>PORCENTAJE(%)</th>


</tr>
</thead>

<tbody>

<?php 
$sql="SELECT user.id_usuario, user.nombres,count(*)as cantidad,(count(*)*100/
(SELECT count(*)  from atencion as a  inner join ticket  as t on
	a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
	t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
	u.area_idarea=ar.idarea inner join usuarios as user on 
	a.ate_usuario=user.id_usuario inner join  empresa as emp on
	t.tck_empresa=emp.codigoempresa inner join estado as est on
	a.ate_estado=est.est_id  inner join tipoactividad as ta on 
	t.tck_tipo=ta.codigoactividad  where a.ate_estado like '03' and
ate_horaestado like '%$fecha%')) as porc from atencion as a  inner join ticket  as t on
	a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
	t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
	u.area_idarea=ar.idarea inner join usuarios as user on 
	a.ate_usuario=user.id_usuario inner join  empresa as emp on
	t.tck_empresa=emp.codigoempresa inner join estado as est on
	a.ate_estado=est.est_id  inner join tipoactividad as ta on 
	t.tck_tipo=ta.codigoactividad  where a.ate_estado like '03' and
ate_horaestado like '%$fecha%'
group by user.nombres  order by user.nombres;

" ;
$result= mysql_query($sql) or die(mssql_error());
if(mysql_num_rows($result)==0) die("ESTE MES AUN NO INICIA");

while($row=mysql_fetch_array($result))
{
	?>
<tr>
<td> <?php echo  utf8_encode($row[nombres]);?>  </td>
<td> <?php echo  $row[cantidad];?> </td>
<td> <?php echo  number_format($row[porc],1);?> </td>


            


</tr>
<?php
}
?>

</tbody>


</table>


</div>

</div>
<div class="col-md-8 column">
<iframe src="/sistemas/graficos/pie-usuarios.php" width="600" height="500"
 frameborder="0"></iframe>

</div>
</div>


</div>
</body>
</html>


