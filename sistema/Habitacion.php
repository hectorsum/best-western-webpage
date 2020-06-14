<?php

include_once('../php/LIBRERIA.php');
/*PARA LA PAGINACION DE DATOS EN LA TABLA */
$sql_regis = "SELECT count(*) AS total_regis FROM habitacion";
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
$query = "SELECT * FROM habitacion WHERE IdHabitacion LIKE '%".$buscar."%' ORDER BY Npiso ASC LIMIT $desde , $por_pagina" ;
$filas = RECORRIDO_TABLA($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Subir fotos</title>
</head>

<body>

  <div class="titulo-fotoHabi">
    <div class="container">
      <h1>Registro y Creacion de Habitaciones</h1>
    </div>
  </div>


  <section class="buscar">
    <div class="container">
      <h2>busqueda de Habitacion</h2>
      <form action="crearHabitacion.php" method="POST">
         <input class="border" type="text" name="txtbuscar" method="POST">
         <input class="btnfoto btn-dark-green" type="submit" value="Buscar">
      </form>
    </div>
  </section>




  <section class="tabla-fotoHabi">
    <div class="container">
      <table class="tabla">
          <thead class="cabecera">
           <tr class="centro">
               <th class="titulo_cabecera">ID</th>
               <th class="titulo_cabecera"># HABI</th>
               <th class="titulo_cabecera"># DE PISO</th>
               <th class="titulo_cabecera">ESTADO</th>
               <th class="titulo_cabecera">TARIFA</th>
               <th class="titulo_cabecera">TIPO</th>
              
               <th class="titulo_cabecera">UPDATE</th>
               <th class="titulo_cabecera">RESERVAR</th>
           </tr>
           </thead>

          <tbody class="centro">
           <?php foreach($filas as $nuevoDatos) {?>

              <tr class="cuerpo">
                <td class="titulo_cuerpo"><?=$nuevoDatos['IdHabitacion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Nhabitacion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Npiso']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['EstadoRegistro']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Tarifa']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['fk_T_habitacion_IdT_habitacion']?></td>


                <td class="titulo_cuerpo">
              <a class="btnfoto btn-dark-green" href="Eliminar.php?elegido=<?=$nuevoDatos['IdHabitacion']?>">MODIFICAR</a>
                </td>

                <td class="titulo_cuerpo">
              <a class="btnfoto btn-red" href="Actualizar.php?elegido=<?=$nuevoDatos['IdHabitacion']?>">HOSPEDAR</a>
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

  
  <section class="HabitacionFoto">
    <div class="container">
      <h1 class="centro">TIPO HABITACION</h1>

      <form class="formHabi" action="insert_Habitacion.php" method="POST">

          <fieldset>
          <legend>Datos Habitaciones</legend>
          <input type="text" name="idHabitacion" placeholder="id habitacion">
          <input  type="text" name="numHabitacion" id="" placeholder="# de habitacion">
          <select name="num_piso">
            <option value="1">1 Piso</option>
            <option value="2">2 Piso</option>
            <option value="3">3 Piso</option>
          </select>
          <select name="EstadoHabitacion">
            <option value="mantenimiento">Mantenimiento</option>
            <option value="disponible">Disponible</option>
            <option value="habitado">Habitado</option>
          </select>
          <select name="tarifaHabi">
            <option value="60">60(Personal)</option>
            <option value="100">100(Matrimonial)</option>
            <option value="130">130(Familiar)</option>
          </select>
          </fieldset>

          <fieldset>
          <legend>Tipo de habitacion</legend>
          <select name="fk_Tipo_HabiId">
            <option value="1">Personal</option>
            <option value="2">Matrimonial</option>
            <option value="3">Familiar</option>
          </select>
        </fieldset>
        <input type="submit" value="Enviar">
      </form><!--cierre form-->
    </div><!--cierre container-->
  </secction>

  


    
    
</body>
</html>