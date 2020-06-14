<?php
include_once('../php/LIBRERIA.php');


//toma de datos
$idTipo = $_POST['idtipo'];
$tipo = $_POST['tipo'];
$descripcion= $_POST['descripcion'];
$numCamas = $_POST['numcamas'];

/*imagem principal*/
 $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
/*imagem 1*/
$imagenuno = addslashes(file_get_contents($_FILES['imagenuno']['tmp_name']));
 /*imagem 2*/
 $imagendos = addslashes(file_get_contents($_FILES['imagendos']['tmp_name']));
/*imagem 3*/
$imagentres = addslashes(file_get_contents($_FILES['imagentres']['tmp_name']));

//consulta y variable $dato para el proceso 
 $sql = "INSERT INTO T_habitacion(IdT_habitacion,tipo_habitacion,Descripcion,NroCamas,foto_principal,foto_uno,foto_dos,foto_tres) values('$idTipo','$tipo','$descripcion','$numCamas','$imagen','$imagenuno','$imagendos','$imagentres')";
  $datos = EJECUTAR_CRUD($sql);

 if($datos==true){
     header('location: Tipo_Habitacion.php');
 }
 else{
      echo "incorrecto";
  }


?>




