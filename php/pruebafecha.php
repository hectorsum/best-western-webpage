<?php

$start = "2006-04-05";
$end ="006-04-01";

function dateDiff($start, $end) {
$start_ts = strtotime($start);
$end_ts = strtotime($end);
$diff = $end_ts - $start_ts;
return round($diff / 86400);

}

echo dateDiff($start, $end);

include_once('../php/LIBRERIA.php');

$conexion = ABRIR_CONEC();

if($conexion){
    echo "Si hay conexion.........conexion";
}
else{
    echo "no hay conexion";
}


?>