<?php 
 /*incluimos la CONFIG.php*/
 include_once('CONFIG.php');
 $conexion = NULL;

 /*funcion conectar */
 function ABRIR_CONEC(){
     global $conexion;
     $conexion = mysqli_connect(HOST,USER,PASS,BASE,PORT);
     if(!$conexion){
        return 0;
     }
     else return 1;
     mysqli_query($conexion,"set names utf8");
 }
 
 function CERRAR_CONEC(){
     global $conexion;
     mysqli_close($conexion);
 }

 /*datos de la tabla y lo pondremos en una tabla*/
 function RECORRIDO_TABLA($slq=''){
    #select 
    global $conexion;
     ABRIR_CONEC();
     $bolsa = mysqli_query($conexion,$slq);
     $datos = array();
     while($filas= mysqli_fetch_assoc($bolsa)){
        $datos[] = $filas;
     }
     CERRAR_CONEC();
     return $datos;
 }

 function EJECUTAR_CRUD($sql=''){
     #insert update delete
     global $conexion;
     ABRIR_CONEC();
     $exito = mysqli_query($conexion,$sql);
     CERRAR_CONEC();
     if($exito){
         return 1;
     }
     else{
         return 0;
     }
 }


 //para traer solo una fila para poder modificar o eliminar
function CARGAR_DATOS_CAMPO($sql){
	global $conexion;
	ABRIR_CONEC();
  $datos = mysqli_query($conexion,$sql);
  $filas = mysqli_fetch_assoc($datos);
  return $filas;
}




?>