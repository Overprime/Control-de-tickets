<!DOCTYPE html>
<html lang="es">
<head>
<?php 	include('../header.php'); ?>
</head>
<body>

<?php 

/*Realizamos la consulta para llenar los datos
con el id que hemos seleccionado*/
$TICKET=$_REQUEST['idticket'];

$link=Conectarse();
$sql="SELECT ate_id,ate_tck_id,user.nombres,
concat(u.nombre,' ',u.apellido) as fullname,
ar.nombre,emp.nombreempresa,ta.descripcion,
t.tck_detalle,
DATE_FORMAT(ate_horaasig,'%d/%m/%Y %H:%i:%s') AS ate_horaasig,est.est_descripcion,ate_detalle,
DATE_FORMAT(ate_horaestado,'%d/%m/%Y %H:%i:%s') AS ate_horaestado,ate_estado,(t.tck_asunto) AS ruta,
(substring(t.tck_asunto from 34)) AS archivo from atencion as a  inner join ticket  as t on
a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
u.area_idarea=ar.idarea inner join usuario as user on 
a.ate_usuario=user.codigo inner join  empresa as emp on
t.tck_empresa=emp.codigoempresa inner join estado as est on
a.ate_estado=est.est_id  inner join tipoactividad as ta on 
t.tck_tipo=ta.codigoactividad 

where ate_tck_id=$TICKET";
$result=mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field=mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/

$Ate_id=$row[0];
$Ate_tck_id=$row[1];
$Usuariosistemas=$row[2];
$Usuarioticket=$row[3];
$Area=$row[4];
$Empresa=$row[5];
$Tipo=$row[6];
$Detalle=$row[7];
$Horainicio=$row[8];
$Estadoactual=$row[9];
$Descripcion=$row[10];
$Horafin=$row[11];
$CodigoEstado=$row[12];
$Ruta=$row[13];
$Archivo=$row[14];
} while ($row=mysql_fetch_array($result));


}else { 
echo "NO hay nada";

} 

?>
<div class="container">	


<div class="row clearfix">

<div class="col-md-4 column">	
<form action="../actualizar/actualizar-atencion.php" method="POST">
<label for="">ID ATENCION:</label>
<input type="text" name="idatencion" class="form-control" value="<?php echo $Ate_id; ?>" readonly>
<label for="">ID TICKET:</label>
<input type="text" name="" class="form-control" value="<?php echo $Ate_tck_id; ?>" readonly>
<label for="">USUARIO SISTEMAS:</label>
<input type="text" name="" class="form-control" value="<?php echo $Usuariosistemas; ?>" readonly>
<label for="">USUARIO TICKET:</label>
<input type="text" name="" class="form-control" value="<?php echo $Usuarioticket; ?>" readonly>
<label for="">TIPO DE ASUNTO:</label>
<input type="text" name="" class="form-control" value="<?php echo $Tipo; ?>" readonly>
<label for="">DETALLE TICKET:</label>
<textarea name="" class="form-control" cols="30" rows="5" readonly="">
<?php echo $Detalle; ?>
</textarea>
</div>

<div class="col-md-4 column">	
<label for="">FECHA DE ASIGNACIÓN:</label>
<input type="text" name="" class="form-control" value="<?php echo $Horainicio; ?>" readonly>
<label for="">ESTADO ACTUAL:</label>
<input type="text" name="" class="form-control" value="<?php echo $Estadoactual; ?>" readonly>
<label for="">ACTUALIZAR ESTADO:</label>
<select name ="estado"  class="form-control" required>
<option value="<?php echo"$CodigoEstado";?>">Seleccione el nuevo estado....</option>
<?php                  
$link=Conectarse();
$Sql ="SELECT est_id,est_descripcion from estado  
where est_id not like '$CodigoEstado' and  est_id not like '01';";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option    value="<?php echo $row['est_id']?>">
<?php echo $row['est_descripcion']?>
</option>
<?php }?>


</select>
<label for="">DETALLE:</label>
<textarea name="detalle" class="form-control" cols="30" rows="8" onchange="conMayusculas(this);"
required title="INGRESE EL DETALLE POR FAVOR">
<?php echo "$Descripcion"?></textarea>
<label for="">FECHA DE PROGRESO:</label>
<input type="text" name="" class="form-control" value="<?php echo"$Horafin";?>" readonly>
</div>

<div class="col-md-2 column">	
<button class="btn btn-lg btn-primary">ACTUALIZAR</button>
</form>
</div>

<div class="col-md-2 column">	
<div class="btn-group">
<button class="btn btn-default">PROCESOS</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
<ul class="dropdown-menu">
<li>
<a id="modal-244730" href="#modal-container-244730" 
role="button" class="btn" data-toggle="modal">CONSULTAR IMAGEN</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>

<!-- INICIO MODAL -->
<div class="modal fade" id="modal-container-244730" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel">
ARCHIVO ADJUNTADO POR EL USUARIO.
</h4>
</div>
<div class="modal-body">
<p>	<a href="<?php 	echo $Ruta; ?>" target="_black"><?php echo $Archivo; ?></a></p>
<embed src="<?php echo $Ruta;?>"  width="900" height="700"
class="img-responsive" />
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
</div>
</div>

</div>

</div>

<!-- FIN MODAL -->

</body>
</html>