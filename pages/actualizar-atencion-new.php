				<!DOCTYPE html>
				<html lang="en">
				<head>
				<meta charset="UTF-8">
				<title>Document</title>
				<?php include('../header.php'); ?>
				<?php 
				
				/*Realizamos la consulta para llenar los datos
				con el id que hemos seleccionado*/
				$TICKET=2559;
				
				$link=Conectarse();
				$sql="SELECT ate_id,ate_tck_id,user.nombres,
				concat(u.nombre,' ',u.apellido) as fullname,
				ar.nombre,emp.nombreempresa,ta.descripcion,
				t.tck_detalle,
				DATE_FORMAT(ate_horaasig,'%d/%m/%Y %H:%i:%s') AS ate_horaasig,est.est_descripcion,ate_detalle,
				DATE_FORMAT(ate_horaestado,'%d/%m/%Y %H:%i:%s') AS ate_horaestado,ate_estado,(t.tck_asunto) AS ruta,
				(substring(t.tck_asunto from 34)) AS archivo,
				user.codigo from atencion as a  inner join ticket  as t on
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
				$Idusuario=$row[codigo];
				} while ($row=mysql_fetch_array($result));
				
				
				}else { 
				echo "NO hay nada";
				
				} 
				
				?>
				</head>
				<body>
				<div class="container">
				<div class="row clearfix">
				<div class="col-md-12 column">
				<div class="row clearfix">
				<div class="col-md-4 column">
				<div class="form-group">
				<label>ID ATENCIÓN</label>
				<input type="text" name="" value="<?php echo $Ate_id; ?>" class="form-control">	
				</div>
				<div class="form-group">
				<label>ID TICKET</label>
				<input type="text" name="" class="form-control" value="<?php echo $Ate_tck_id; ?>">	
				</div>
				<div class="form-group">
				<label class="text-success">USUARIO SISTEMAS:</label>
				<button class="btn btn-block btn-info"><?php echo $Usuariosistemas; ?></button>
				</div>
				<div class="form-group">
				<label>USUARIO TICKET</label>
				<input type="text" name="" class="form-control" value="<?php echo $Usuarioticket; ?>" >	
				</div>
				<div class="form-group">
				<label>TIPO DE ASUNTO</label>
				<input type="text" name="" class="form-control" value="<?php echo $Tipo; ?>">	
				</div>
				<div class="form-group">
				<label>DETALLE DE TICKET</label>
				<textarea name="" class="form-control" cols="30" rows="7">
				<?php echo $Detalle; ?>
				</textarea>	
				</div>
				</div>
				<div class="col-md-8 column">
				<div class="row clearfix">
				<div class="col-md-4 column">
				<div class="form-group">
				<label>FECHA DE ASIGNACIÓN</label>
				<input type="text" name="" class="form-control" value="<?php echo $Horainicio; ?>">	
				</div>
				<div class="form-group">
				<label>ESTADO ACTUAL</label>
				<input type="text" name="" class="form-control" value="<?php echo $Estadoactual; ?>" readonly>
				</div>
				
				<div class="form-group">
				<label>ACTUALIZAR ESTADO</label>
				<select name="" id="" class="form-control">
				<option value="<?php echo"$CodigoEstado";?>">Seleccione el nuevo estado....</option>
				<?php                  
				$link=Conectarse();
				$Sql ="SELECT est_id,est_descripcion from estado  
				where est_id  not like '$CodigoEstado'";
				$result=mysql_query($Sql) or die(mysql_error());
				while ($row=mysql_fetch_array($result)) {
				?>
				<option    value="<?php echo $row['est_id']?>">
				<?php echo $row['est_descripcion']?>
				</option>
				<?php }?>
				</select>
				</div>
				<div class="form-group">
				<a id="modal-49033" href="#modal-container-49033" role="button" 
				class="btn btn-success btn-block" data-toggle="modal">AGREGAR ACTIVIDAD</a>
				</div>
				</div>
				<div class="col-md-4 column">
				<div class="form-group">
				<a href="" class="btn btn-primary btn-block">ACTUALIZAR</a>
				</div>
				</div>
				<div class="col-md-4 column">
				<div class="form-group">
				<a href="" class="btn btn-warning btn-block">PROCESOS</a>
				</div>
				</div>
				</div>
				<div class="row clearfix">
				<div class="col-md-12 column">
				<div class="table-responsive">
				<table class="table table-bordered table-condensed">
				<thead>
				<tr class="success">	
				<th>CÓDIGO</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>EDAD</th>
				<th>DIRECCIÓN</th>
				<th><a href=""><i class="glyphicon glyphicon-trash text-danger"></i></th>
				</tr>
				</thead>
				<?php 
				$sql="SELECT * FROM detalle_atencion";  
				$result= mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($result)==0) die("No hay registros para mostrar");
				
				while($row=mysql_fetch_array($result))
				{?>
				
				<tbody>
				<tr>
				<td><?php echo $row[detalle]; ?></td>
				<td><?php echo $row[estado]; ?></td>
				<td><?php echo $row[fecha]; ?></td>
				<td><?php echo $row[horas]; ?></td>
				<td><?php echo $row[usuarionuevo]; ?></td>
				<td><a href=""></a><i class="glyphicon glyphicon-trash text-danger"></i></td>
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
				</div>
				</div>
				</div>
				</div>
				</body>
				
				<!--  -->
				<div class="modal fade" id="modal-container-49033" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">
				Agregar  Actividad
				</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
				<form action="../registrar/detalle-atencion.php" method="POST">
				<label>DETALLE</label>
				<textarea name="detalle" class="form-control" cols="30" rows="3"
				onchange="conMayusculas(this);" ></textarea>
				</div>
				<div class="form-group">
				<label>ACTUALIZAR ESTADO</label>
				<select name="estado" id="" class="form-control">
				<option value="<?php echo"$CodigoEstado";?>"><?php echo $Estadoactual; ?></option>
				<?php                  
				$link=Conectarse();
				$Sql ="SELECT est_id,est_descripcion from estado  
				where est_id  not like '$CodigoEstado'";
				$result=mysql_query($Sql) or die(mysql_error());
				while ($row=mysql_fetch_array($result)) {
				?>
				<option    value="<?php echo $row['est_id']?>">
				<?php echo $row['est_descripcion']?>
				</option>
				<?php }?>
				</select>
				</div>
				
				<div class="form-group">
				<label>HORAS</label>
				<input type="number" name="horas" class="form-control" min="1">
				</div>
				<div class="form-group">
				<label>USUARIO</label>
				<select name ="usuarionuevo"  class="form-control" required>
				<option value="<?php echo"$Idusuario";?>"><?php echo $Usuariosistemas; ?></option>
				<?php                  
				$link=Conectarse();
				$Sql ="SELECT codigo,nombres from usuario  
				where codigo not like '$Idusuario' AND estado='ACTIVO';";
				$result=mysql_query($Sql) or die(mysql_error());
				while ($row=mysql_fetch_array($result)) {
				?>
				<option    value="<?php echo $row['codigo']?>">
				<?php echo $row['nombres']?>
				</option>
				<?php }?>
				</select>
				</div>
				
				<input type="hidden" name="idticket" value="<?php echo $Ate_id ?>">
				<input type="hidden" name="idatencion" value="<?php echo $Ate_tck_id ?>">
				</div>
				<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Agregar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
				</form>
				</div>
				</div>
				
				</div>
				
				</div>
				<!--  -->
				
				<!--  -->
				<div class="modal fade" id="modal-container-49034" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">
				EDITAR ACTIVIDAD
				</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
				<label>DETALLE</label>
				<textarea name="" class="form-control" cols="30" rows="3"></textarea>
				</div>
				<div class="form-group">
				<label>ESTADO</label>
				<select name="" class="form-control">
				<option></option>
				</select>
				</div>
				
				<div class="form-group">
				<label>HORAS</label>
				<input type="number" class="form-control"  min="1">
				</div>
				<div class="form-group">
				<label>HORAS</label>
				<input type="datetime-local" class="form-control" >
				</div>
				<div class="form-group">
				<label>USUARIO</label>
				<select name="text" class="form-control">
				<option></option>
				</select>
				</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-primary">ACTUALIZAR</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
				
				</div>
				</div>
				
				</div>
				
				</div>
				<!--  -->
				<!--  -->
				<div class="modal fade" id="modal-container-49035" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">
				Eliminar  Actividad
				</h4>
				</div>
				<div class="modal-body">
				¿DESEA ELIMINAR LA ACTIVIDAD SELECCIONADA?
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-danger">ELIMINAR</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
				
				</div>
				</div>
				
				</div>
				
				</div>
				<!--  -->
				
				
				
				</html>