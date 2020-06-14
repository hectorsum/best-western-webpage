<?php

include_once('../php/LIBRERIA.php');

$sql_regis = "SELECT count(*) AS total_regis FROM Trabajador";
$resul_registro = CARGAR_DATOS_CAMPO($sql_regis);
$total_registro = $resul_registro['total_regis'];

$por_pagina = 3;
if(empty($_GET['pagina'])){
  $pagina = 1;
}else{
  $pagina = $_GET['pagina'];
}
$desde = ($pagina-1)*$por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);

var_dump($total_paginas);




/*PARA BUSCAR DATOS EN LA TABLA */
if(!isset($_POST['txtbuscar'])){
  $_POST['txtbuscar'] = "";
  $buscar = $_POST['txtbuscar'];
}
$buscar = $_POST['txtbuscar'];
$query = "SELECT * FROM Trabajador WHERE Nombre LIKE '%".$buscar."%' ORDER BY IdTrabajador ASC LIMIT $desde , $por_pagina" ;
$filas = RECORRIDO_TABLA($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <title>Subir fotos</title>
</head>

<body>

  <section class="HabitacionFoto">
  <form action="insert_Trabajador.php" method="POST">
      <fieldset>
        <legend>Datos Huesped</legend>
        <input type="text" placeholder="id trabajador" name="idhuesped">
        <input type="text" placeholder="Nombre" name="nombre">
        <input type="text" placeholder="Apellido 1" name="paterno">
        <input type="text" placeholder="Apellido 2" name="materno">
        <input type="text" placeholder="Direccion" name="direccion">
        <input type="email" placeholder="Email@example" name="email">
        <input type="tel" placeholder="Telefono" name="telefono">
        <select name="documento" id="">
            <option value="cedula">Cedula</option>
            <option value="ppt">PPT</option>
            <option value="pasaporte">Pasaporte</option>
        </select>
        <input type="text" placeholder="numero documento" name="num_documento">
        <select name="estado" id="">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
      </fieldset>

      <fieldset>
        <legend>Creacion de Login</legend>
        <input type="text" placeholder="nombre usuario" name="usuario">
        <input type="password" placeholder="contraseña" name="celular">
      </fieldset>
      <fieldset>
        <legend>Puesto Requerido</legend>

      </fieldset>
         <select name="fk_Puesto" id="">
            <option value="P001">Recepcionista</option>
            <option value="P002">Manager</option>
            <option value="P003">Servicios</option>
         </select>
      <input type="submit" name="Registrar">
   </form>
  </secction>



  <section class="buscar">
    <div class="container">
      <h2>busqueda de Habitacion</h2>
      <form action="Man_trabajador.php" method="POST">
         <input class="border" type="text" name="txtbuscar" placeholder="buscar por DNI">
         <input class="btnfoto btn-dark-green" type="submit" value="Buscar">
      </form>
    </div>
  </section>




  <section class="tabla-cli">
    <div class="container">
      <table class="tabla">
          <thead class="cabecera">
           <tr class="centro">
               <th class="titulo_cabecera">ID</th>
               <th class="titulo_cabecera">NOMBRE</th>
               <th class="titulo_cabecera">PATERNO</th>
               <th class="titulo_cabecera">MATERNO</th>
               <th class="titulo_cabecera">DIRECCION</th>
               <th class="titulo_cabecera">CORREO</th>
               <th class="titulo_cabecera">TELEFONO</th>
               <th class="titulo_cabecera">TIPO DOC</th>
               <th class="titulo_cabecera"># DOCUM</th>
               <th class="titulo_cabecera">ESTADO</th>
               <th class="titulo_cabecera">USUARIO</th>
               <th class="titulo_cabecera">CONTRASEÑA</th>
               <th class="titulo_cabecera">ID PUES</th>
               <th class="titulo_cabecera">ACTUALIZAR</th>
               <th class="titulo_cabecera">ELIMINAR</th>
           </tr>
           </thead>

          <tbody class="centro">
           <?php foreach($filas as $nuevoDatos) {?>

              <tr class="cuerpo">
                <td class="titulo_cuerpo"><?=$nuevoDatos['IdTrabajador']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Nombre']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['ApellidoP']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['ApellidoM']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Direccion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Correo']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Telefono']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['TipoDoc']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['NumDoc']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Estado']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['nombre_Logi']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['contraseña']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['fk_Puesto_idPuesto']?></td>

                <td class="titulo_cuerpo">
                  <a class="btnfoto btn-dark-green" href="CARGAR_UPDATE_FOTO.php?elegido=<?=$nuevoDatos['IdTrabajador']?>">MODIFICAR</a>
                </td>

                <td class="titulo_cuerpo">
                  <a class="btnfoto btn-red" href="DELETE_FOTO.php?elegido=<?=$nuevoDatos['IdTrabajador']?>">ELIMINAR</a>
                </td>
              </tr>
             <?php } ?>
          </tbody>
      </table>
    </div>
  </section>
    
  <section class="paginador">
    <div class="container">
      <ul class="nav-paginador">
      <?php if($pagina !=1){ ?>
        <li><a href="?pagina=<?php echo 1;?>">|<<</a></li>
        <li><a href="?pagina=<?php echo $pagina-1;?>"><<</a></li>
      <?php }

          for($i= 1;$i<=$total_paginas; $i++){

          if($i==$pagina){
          echo '<li class="selected">'.$i.'</li>';
          }
          else{
          echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
          }
        }

        if($pagina !=$total_paginas)
        {
        ?>
        <li><a href="?pagina=<?php echo 1;?>">>></a></li>
        <li><a href="?pagina=<?php echo $total_paginas;?>">>>|</a></li>
        <?php } ?>
      </ul>
    </div>
  </section>
  
    
</body>
</html>