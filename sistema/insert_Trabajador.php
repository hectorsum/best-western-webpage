<?php
include_once('../php/LIBRERIA.php');

//toma de datos
//toma de datos
$idtrabajador = $_POST['id trabajador'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$TipoDocu = $_POST['documento'];
$numDocu = $_POST['num_documento'];
$estado = $_POST['estado'];
//creacion de login
$nom_login = $_POST['usuario'];
$password = $_POST['contraseña'];
$fk_tipoPuesto =  $_POST['fk_Puesto'];



//consulta y variable $dato para el proceso 
$sql = "INSERT INTO Trabajador(IdTrabajador,Nombre,ApellidoP,ApellidoM,Direccion,Correo,Telefono,TipoDoc,NumDoc,Estado,nombre_Login,contraseña) 
values('$idtrabajador','$nombre','$paterno','$materno','$direccion','$email','$telefono','$TipoDocu','$numDocu','$estado','$nom_login','$password','$fk_tipoPuesto')";

$datos = EJECUTAR_CRUD($sql);
if($datos==true){
  header('location: Trabajador.php');
}
else{
  echo "incorrecto";
}
?>
