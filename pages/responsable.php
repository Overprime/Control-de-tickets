<!DOCTYPE html>
<html lang="es">
<head>
<?php include('../header.php'); ?>
</head>
<body>
<?php 

/*Realizamos la consulta para llenar los datos
con el id que hemos seleccionado*/
$TICKET=$_REQUEST['idticket'];
$link=Conectarse();
$sql="SELECT ate_id,ate_tck_id,CONCAT(nombres,' ',apellidos) as usuarios,usuarios.id_usuario
from ticket inner join atencion on
ticket.tck_id=atencion.ate_tck_id inner join usuarios on
atencion.ate_usuario=usuarios.id_usuario
where ate_tck_id=$TICKET;";
$result=mysql_query($sql,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field=mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/

$Ate_id=$row[0];
$Ate_tck_id=$row[1];
$Usuarios=$row[2];
$Codigo=$row[3];

} while ($row=mysql_fetch_array($result));


}else { 
echo "NO hay nada";

} 

?>
<div class="container">

<div class="row clearfix">

<div class="col-md-2 column">

</div>
<div class="col-md-4 column">
<form action="../actualizar/responsable.php" method="POST">
<label for="">ID ATENCIÓN:</label>
<input type="text" name="atencion" class="form-control" value="<?php echo $Ate_id; ?>" readonly>
<label for="">ID TICKET:</label>
<input type="text" class="form-control" value="<?php echo $Ate_tck_id;?>" readonly>
<label for="">RESPONSABLE ACTUAL:</label>
<input type="text" class="form-control" value="<?php echo $Usuarios; ?>" readonly>
<label for="">ACTUALIZAR RESPONSABLE:</label>
<select name="nuevo" class="form-control" id="">
<option value="<?php echo "$Codigo"; ?>">Seleccione el responsable...</option>
<?php
$link=Conectarse();
$Sql ="SELECT id_usuario,nombres from  usuarios where id_usuario not like '$Codigo' AND 
 estado='ACTIVO'";
$result=mysql_query($Sql) or die(mysql_error());		
while ($row=mysql_fetch_array($result)) {
?>
<option    value="<?php echo $row['id_usuario']?>"><?php echo $row['nombres']?></option>
<?php }?>

</select>

<input type="hidden" name="actual" value="<?php echo "$Codigo"; ?>">

</div>

<div class="col-md-3 column">
<br>
<button type="submit" class="btn btn-lg btn-primary">ACTUALIZAR</button>

</form>
</div>
</div>

</div>
</body>
</html>