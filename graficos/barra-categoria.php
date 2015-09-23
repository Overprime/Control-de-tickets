<?php 

/////////////////////////////////////////////
//REQUERIMOS LA LIBRERIA GENERICA
require_once ('../bd/conexion.php');
require_once('jpgraph/jpgraph.php');

//REQUERIMOS LA LIBRERIA PARA EL GRAFICO DE BARRAS
require_once('jpgraph/jpgraph_bar.php');
//CONEXION MYSQL
mysql_connect("192.168.1.28","root","sistemas");
mysql_select_db("prueba");
session_start();
$IDUSUARIO=$_SESSION['id'];	
//CONEXION MYSQl
$link=Conectarse();


$sql2="SELECT fecha from validarfecha where usuario=$IDUSUARIO and tipo='categoria' ";
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
//BUSCAMOS SI ENCONTRAMOS UN REGISTRO CON LOS DATOS  DEL USUARIO
$sql="SELECT count(*) as cantidad,ta.alias	from atencion as a  inner join ticket  as t on 	a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
	t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
	u.area_idarea=ar.idarea inner join usuarios as user on 
	a.ate_usuario=user.id_usuario inner join  empresa as emp on
	t.tck_empresa=emp.codigoempresa inner join estado as est on
	a.ate_estado=est.est_id  inner join tipoactividad as ta on 
	t.tck_tipo=ta.codigoactividad  where a.ate_estado like '03' and
ate_horaestado like '%$fecha%'
group by  ta.alias order by count(*) desc";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res)) {
//agregamos los datos al array

$datos[]=$row['cantidad'];
$labels[]=$row['alias'];

}


//DEFINIMOS  FORMATOS GENERALES
$grafico=new Graph(1140,400,'auto');
$grafico->SetScale("textint");
$grafico->title->Set("GRAFICO ESTADISTICO DE ACTIVIDADES");
$grafico->xaxis->title->Set("");
$grafico->xaxis->SetTickLabels($labels);
//$grafico->xaxis->SetLabelAngle(50);
//$grafico->xaxis->SetLabelAngle(45); 
$grafico->yaxis->title->set("CANTIDAD DE ATENCIONES");	

//INGRESAMOS LOS DATOS  AL ARREGLO DE DATOS QUE IRAN  EN EL GRAFICO
$barplot1=new BarPlot($datos);
	
//DEFINIMOS FORMATOS ESPECIFICOS
//

//UNA GRADIENTE HORIZONTAL DE MORADOS
$barplot1->SetFillGradient("#BE81F7","#E3CEF6",GRAD_HOR);

//30 PIXELES DE ANCHO PARA CADA BARRA
$barplot1->SetWidth(50);

//AL GARFICO LE AGREGAMOS LOS DATOS
$grafico->Add($barplot1);


//SALIDA POR PANTALLA
$grafico->Stroke();


//SALIDA ARCHIVO  FORMATO PNG
//$grafico->Stroke("IMG.png");




 ?>


 