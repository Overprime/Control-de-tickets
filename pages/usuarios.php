<!DOCTYPE html>
<html lang="es">
<head>
<?php include('../header.php'); ?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-6 column">
<form role="form"  method="POST" action="../registrar/usuarios" autocomplete="Off">
<div class="form-group">
<label for="exampleInputEmail1">NOMBRES:</label>
<input type="text" name="nombres"  class="form-control"  maxlength="60"  required 
onchange="conMayusculas(this);" />
</div>
<div class="form-group">
<label for="exampleInputPassword1">APELLIDOS</label>
<input type="text" name="apellidos"  class="form-control" maxlength="60"  required
onchange="conMayusculas(this);"/>
</div>
<div class="form-group">
<label for="exampleInputPassword1">DNI</label>
<input type="text" name="dni"  class="form-control"  maxlength="8"  
pattern="[0-9]+" required
onchange="conMayusculas(this);"/>
</div>

<button type="submit" class="btn btn-lg btn-primary">AGREGAR</button>
</form>
</div>
<div class="col-md-6 column">
<div class="panel-group" id="panel-651839">
<div class="panel panel-default">
<div class="panel-heading">
<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-651839" href="#panel-element-589893">Collapsible Group Item #1</a>
</div>
<div id="panel-element-589893" class="panel-collapse collapse">
<div class="panel-body">
Anim pariatur cliche...
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-651839" href="#panel-element-887494">Collapsible Group Item #2</a>
</div>
<div id="panel-element-887494" class="panel-collapse collapse">
<div class="panel-body">
Anim pariatur cliche...
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>