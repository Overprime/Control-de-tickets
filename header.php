<?php
//Proceso de conexion con la base de datos
include('bd/conexion.php');
$link=Conectarse();

//Iniciar Sesion
session_start();

//Validar si se esta ingresando con sesion correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "/sistemas/"
</script>';
}

$id_usuario = $_SESSION['id'];
$Nombres=$_SESSION['nombre'];
$Apellidos=$_SESSION['apellido'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>SISTEMAS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
<!--script src="js/less-1.3.3.min.js"></script-->
<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

<link href="/sistemas/css/bootstrap.min.css" rel="stylesheet">
<link href="/sistemas/css/style.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/sistemas/img/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/sistemas/img/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/sistemas/img/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/sistemas/img/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="/sistemas/img/logo-over.ico">

<script type="text/javascript" src="/sistemas/js/jquery.min.js"></script>
<script type="text/javascript" src="/sistemas/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/sistemas/js/scripts.js"></script>
<!-- Inicio Script convertir en mayuscula al ingresar	-->
<script language    =""="JavaScript">
function conMayusculas(field) {
field.value         = field.value.toUpperCase()
}
</script>
<!-- Fin Script convertir en mayuscula al ingresar-->
</head>

<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse"
data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">
Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar">

</span><span class="icon-bar"></span></button>
<a class="navbar-brand" href="/sistemas/home">INICIO</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROGRAMAS<strong class="caret">
</strong></a>
<ul class="dropdown-menu">
<li>
<a href="http://192.168.1.27/ticket/registrar" target="_black">TICKET</a>
</li>
<li>
<a href="http://192.168.1.27/aplicaciones/" target="_black">APLICACIONES</a>
</li>
<li>
<a href="http://192.168.1.27/insumos/" target="_black">INSUMOS</a>
</li>
<li>
<a href="http://directorio.rockdrillgroup.com/" target="_black">DIRECTORIO</a>
</li>
<li>
<a href="http://admindirectorio.rockdrillgroup.com/" target="_black">ADM-DIRECTORIO</a>
</li>
<li>
<a href="https://webmail.opentransfer.com/horde/imp/" target="_black">CORREO CORPORATIVO</a>
</li>
<li>
<a href="https://cp6.ixwebhosting.com/psoft/
servlet/psoft.hsphere.CP?action=change_mbox_password" target="_black">ACTUALIZACION CORREOS</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROCESOS<strong class="caret">
</strong></a>
<ul class="dropdown-menu">
<li>
<a href="/sistemas/consulta/asignar">ASIGNAR</a>
</li>
<li>
<a href="/sistemas/consulta/seguimiento">SEGUIMIENTO</a>
</li>
<li>
<a href="/sistemas/consulta/responsable">ACTUALIZAR RESPONSABLE</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">CONSULTAS<strong class="caret">
</strong></a>
<ul class="dropdown-menu">
<li>
<a href="/sistemas/consulta/asignados">ASIGNADOS-(ALL)</a>
</li>
<li>
<a href="/sistemas/consulta/desarrollo">DESARROLLO-(ALL)</a>
</li>
<li>
<a href="/sistemas/consulta/all">SOLUCIONADOS-(ALL)</a>
</li>
<li>
<a href="/sistemas/consulta/dia">SOLUCIONADOS DEL DIA-
<label class="text-danger">(<?php echo date('d-m-Y');?>)</label></a>
</li>
<li>
<a href="/sistemas/consulta/solicitud">SOLICITUD DE COMPRA</a>
</li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">REPORTES<strong class="caret">
</strong></a>
<ul class="dropdown-menu">
<li>
<a href="/sistemas/reportes/area">REPORTES POR ÁREA</a>
</li>
<li>
<a href="/sistemas/reportes/empresa">REPORTES POR EMPRESA</a>
</li>
<li>
<a href="/sistemas/reportes/usuario">REPORTES POR USUARIO</a>
</li>
<li>
<a href="/sistemas/reportes/categoria">REPORTES POR CATEGORIA</a>
</li>
</ul>
</li>
</ul>
<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input type="text" class="form-control">
</div> <button type="submit" class="btn btn-default">BUSCAR</button>
</form>
<ul class="nav navbar-nav navbar-right">
<li>
<a ><i class="glyphicon glyphicon-user text-success"></i>
<?php echo $Nombres.' '.$Apellidos;	 ?>
</a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a id="modal-244730" href="#modal-container-244730" role="button"  data-toggle="modal">PERFIL</a>
</li>
<li>
<a href="#">HERRAMIENTAS</a>
</li>
<li>
<a href="#">PRIVACIDAD</a>
</li>
<li class="divider">
</li>
<li>
<a href="/sistemas/adios">SALIR</a>
</li>
</ul>
</li>
</ul>
</div>

</nav>
</div>
</div>

</div>
</body>

<!-- inicio modal -->
<div class="modal fade" id="modal-container-244730" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel">
<?php echo $Nombres.' '.$Apellidos; ?>
</h4>
</div>
<div class="modal-body">
...
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 

</div>
</div>

</div>

</div>

<!--  fin modal-->
</html>
