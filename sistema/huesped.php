<?php

include_once('../php/LIBRERIA.php');

$sql_regis = "SELECT count(*) AS total_regis FROM Huesped";
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
$query = "SELECT * FROM Huesped WHERE Nombre LIKE '%".$buscar."%' ORDER BY IdHuesped ASC LIMIT $desde , $por_pagina" ;
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

  <div class="titulo-fotoHabi">
    <div class="container">
      <h1>Registro y Creacion de Habitaciones</h1>
    </div>
  </div>


  <section class="HabitacionFoto">
  <form action="insert_huesped.php" method="POST">
      <fieldset>
        <legend>Datos Huesped</legend>
        <input type="text" placeholder="id huesped" name="idhuesped">
        <input type="text" placeholder="Nombre" name="nombre">
        <input type="text" placeholder="Apellido 1" name="paterno">
        <input type="text" placeholder="Apellido 2" name="materno">
        <select name="documento" id="">
            <option value="cedula">Cedula</option>
            <option value="ppt">PPT</option>
            <option value="pasaporte">Pasaporte</option>
        </select>
        <input type="text" placeholder="numero documento" name="num_documento">
        <input type="email" placeholder="Email@example" name="email">
        <input type="text" placeholder="Pais" name="pais">
        <input type="text" placeholder="Direccion" name="direccion">
        <input type="tel" placeholder="Telefono" name="telefono">
        <input type="tel" placeholder="celular" name="celular">
        <select name="estado" id="">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
      </fieldset>
   </form>
  </secction>



  <section class="buscar">
    <div class="container">
      <h2>busqueda de Habitacion</h2>
      <form action="Man_cliente.php" method="POST">
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
               <th class="titulo_cabecera">DNI</th>
               <th class="titulo_cabecera">EMAIL</th>
               <th class="titulo_cabecera">CELULAR</th>
               <th class="titulo_cabecera">TIPO</th>
               <th class="titulo_cabecera">PRIMERO</th>
               <th class="titulo_cabecera">SEGUNDO</th>
               <th class="titulo_cabecera">UPDATE</th>
               <th class="titulo_cabecera">DELETE</th>
           </tr>
           </thead>

          <tbody class="centro">
           <?php foreach($filas as $nuevoDatos) {?>

              <tr class="cuerpo">
                <td class="titulo_cuerpo"><?=$nuevoDatos['IdHuesped']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Nombre']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Apellido_P']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Apellido_M']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['TipoDoc']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['numDocumento']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Email']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Pais']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Direccion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Telefono']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Celular']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Estado']?></td>

                <td class="titulo_cuerpo">
                  <a class="btnfoto btn-dark-green" href="CARGAR_UPDATE_FOTO.php?elegido=<?=$nuevoDatos['IdHuesped']?>">MODIFICAR</a>
                </td>

                <td class="titulo_cuerpo">
                  <a class="btnfoto btn-red" href="DELETE_FOTO.php?elegido=<?=$nuevoDatos['IdHuesped']?>">ELIMINAR</a>
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