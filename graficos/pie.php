<?php 

/////////////////////////////////////////////
require_once ('../bd/conexion.php');
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');

//CONEXION MYSQl
$link=Conectarse();

//BUSCAMOS SI ENCONTRAMOS UN REGISTRO CON LOS DATOS  DEL USUARIO
$sql="SELECT user.nombres,count(*) as cantidad	from atencion as a  inner join ticket  as t on 	a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
	t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
	u.area_idarea=ar.idarea inner join usuarios as user on 
	a.ate_usuario=user.id_usuario inner join  empresa as emp on
	t.tck_empresa=emp.codigoempresa inner join estado as est on
	a.ate_estado=est.est_id  inner join tipoactividad as ta on 
	t.tck_tipo=ta.codigoactividad  where a.ate_estado like '03' and
ate_horaasig like '%2015-02%'
group by user.nombres";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res)) {
//agregamos los datos al array
$datos[]=$row['cantidad'];
}

// Create the Pie Graph. 
$graph = new PieGraph(600,500);
//$graph->xaxis->SetTickLabels($labels);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
// 
$graph->title->Set("REPORTE DE USUARIOS");
$graph->SetBox(true);

// Create
$p1 = new PiePlot($datos);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3','#BA15D3'));
$graph->Stroke();


//SALIDA ARCHIVO  FORMATO PNG
$grafico->Stroke("pie.png");


 ?>


 