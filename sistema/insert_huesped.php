<?php
include_once('../php/LIBRERIA.php');

//toma de datos
$idHuesped = $_POST['idhuesped'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$TipoDocu = $_POST['documento'];
$numDocu = $_POST['num_documento'];
$email = $_POST['email'];
$Pais = $_POST['pais'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$estado = $_POST['estado'];



//consulta y variable $dato para el proceso 
$sql = "INSERT INTO Huesped(IdHuesped,Nombre,Apellido_P,Apellido_M,TipoDoc,numDocumento,Email,Pais,Direccion,Telefono,Celular,Estado) 
values('$idHuesped','$nombre','$paterno','$materno','$TipoDocu','$email','$Pais','$direccion','$telefono','$celular','$estado')";

$datos = EJECUTAR_CRUD($sql);
if($datos==true){
  header('location: huesped.php');
}
else{
  echo "incorrecto";
}

?>
