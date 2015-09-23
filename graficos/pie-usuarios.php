<?php 

/////////////////////////////////////////////
require_once ('../bd/conexion.php');
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
session_start();
$IDUSUARIO=$_SESSION['id']; 
//CONEXION MYSQl
//
$link=Conectarse();


$sql2="SELECT fecha from validarfecha where usuario=$IDUSUARIO and tipo='usuario' ";
$result=mysql_query($sql2,$link);
if ($row=mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field=mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/

$fecha    =$row[0];

} while ($row=mysql_fetch_array($result));


}else { 
echo "NO hay nada";

} 

//CONEXION MYSQL
mysql_connect("192.168.1.28","root","sistemas");
mysql_select_db("prueba");

//BUSCAMOS SI ENCONTRAMOS UN REGISTRO CON LOS DATOS  DEL USUARIO
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
group by user.nombres order by user.nombres;
";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res)) {
//agregamos los datos al array

$datos[]=$row['cantidad'];

}

// Create the Pie Graph. 
$graph = new PieGraph(600,500);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->title->Set("REPORTE DE USUARIOS TI");
$graph->SetBox(true);

// Create
$p1 = new PiePlot($datos);
$graph->Add($p1);

//$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
$graph->Stroke();


//SALIDA ARCHIVO  FORMATO PNG
//$grafico->Stroke("pie.png");


 ?>


 