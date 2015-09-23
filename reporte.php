<!DOCTYPE html>
<html lang ="es">
<head>
<?php include('header.php'); ?>


</head>
<body>
<div class ="container">

<div class="row clearfix">
<div class="col-md-12 column">
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT * from usuarios where estado='ACTIVO'",$link);
?>
<?php
while($reg=  mysql_fetch_array($listado))
{
?>

[<?php echo utf8_encode($reg[id_usuario]); ?>]  <br>	[<?php echo utf8_encode($reg[nombres]); ?>]



<?php
}

?>
</div>
</div>

</div>


</div>
</body>
</html>