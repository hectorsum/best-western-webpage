<?php
include_once('../php/LIBRERIA.php');

//toma de datos
$idHabi = $_POST['idHabitacion'];
$num_habi = $_POST['numHabitacion'];
$num_piso = $_POST['num_piso'];
$estado = $_POST['EstadoHabitacion'];
$tarifa = $_POST['tarifaHabi'];
$fk_tipohabi = $_POST['fk_Tipo_HabiId'];


//consulta y variable $dato para el proceso 
 $sql = "INSERT INTO habitacion(IdHabitacion,Nhabitacion,Npiso,EstadoRegistro,Tarifa,fk_T_habitacion_IdT_habitacion) 
 values('$idHabi','$num_habi','$num_piso','$estado','$tarifa','$fk_tipohabi')";

 $datos = EJECUTAR_CRUD($sql);
 if($datos==true){
   header('location: Habitacion.php');
 }
 else{
  echo "incorrecto";
 }

?>
