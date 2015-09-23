<?php 
/*
//FUNCION QUE CONVIERTE A SEGUNDOS A TIMESTAMP....
function conv_ts($fecha_dd_mm_aaaa){
if (empty($fecha_dd_mm_aaaa)) $fecha_dd_mm_aaaa = time(); 
list($d,$m,$a)=explode("-",$fecha_dd_mm_aaaa);
return mktime(0,0,0,$m,$d,$a);

}

//DECLARACION DE FECHAS
$fecha1='10-10-2013';
$fecha2='20-10-2013';

//CONVERSION DE FECHA A TIMESTAMP
$fecha1=conv_ts($fecha1);
$fecha2=conv_ts($fecha2);

//TRANSFORMAMOS LA  DIFERENCIA EN DIAS
$dif=$dif/(60*60*24);

echo "LA DIFERENCIA ENTRE '10-10-2013' Y '20-10-2013' ES DE ".$dif. "dias.";

*/

echo mktime('10-10-2013');
 ?>