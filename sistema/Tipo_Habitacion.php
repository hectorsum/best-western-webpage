<?php

include_once('../php/LIBRERIA.php');

$query = "SELECT * FROM T_Habitacion" ;
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
      <h1>TIPO DE HABITACIONES</h1>
    </div>
  </div>


  <section class="tabla-fotoHabi">
    <div class="container">
      <table class="tabla">
          <thead class="cabecera">
           <tr class="centro">
               <th class="titulo_cabecera">ID</th>
               <th class="titulo_cabecera">TIPO</th>
               <th class="titulo_cabecera">DESCRIPCION</th>
               <th class="titulo_cabecera"># CAMAS</th>
               <th class="titulo_cabecera">PRINCIPAL</th>
               <th class="titulo_cabecera">FOTO UNO</th>
               <th class="titulo_cabecera">FOTO DOS</th>
               <th class="titulo_cabecera">FOTO TRES</th>
               <th 
               class="titulo_cabecera">UPDATE</th>
               <th class="titulo_cabecera">DELETE</th>
           </tr>
           </thead>

          <tbody class="centro">
           <?php foreach($filas as $nuevoDatos) {?>

              <tr class="cuerpo">
                <td class="titulo_cuerpo"><?=$nuevoDatos['IdT_habitacion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['tipo_habitacion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['Descripcion']?></td>
                <td class="titulo_cuerpo"><?=$nuevoDatos['NroCamas']?></td>
                <!--FOTO PRINCIPAL-->
                <td class="titulo_cuerpo"> 
                <img class="foto" src="data:image/jpg;base64,<?= base64_encode($nuevoDatos['foto_principal']);?>" alt="fOTO Principal">
                </td>
                <!--FOTO 1-->
                <td class="titulo_cuerpo"> 
                <img class="foto" src="data:image/jpg;base64,<?= base64_encode($nuevoDatos['foto_uno']);?>" 
                alt="fOTO 1">
                </td>
                <!--FOTO 2-->
                <td class="titulo_cuerpo"> 
                <img class="foto" src="data:image/jpg;base64,<?= base64_encode($nuevoDatos['foto_dos']);?>" 
                alt="fOTO 2">
                </td>
                <!--FOTO 3-->
                <td class="titulo_cuerpo"> 
                <img class="foto" src="data:image/jpg;base64,<?= base64_encode($nuevoDatos['foto_tres']);?>" alt="fOTO 3">
                </td>

                <td class="titulo_cuerpo">
              <a class="btnfoto btn-dark-green" href="CARGAR_UPDATE_FOTO.php?elegido=<?=$nuevoDatos['IdT_habitacion']?>">MODIFICAR</a>
                </td>

                <td class="titulo_cuerpo">
              <a class="btnfoto btn-red" href="DELETE_FOTO.php?elegido=<?=$nuevoDatos['IdT_habitacion']?>">ELIMINAR</a>
                </td>
              </tr>
             <?php } ?>
          </tbody>
      </table>
    </div>
  </section>
    

  
  <section class="HabitacionFoto">
    <div class="container">
      <h1 class="centro">ALISTAR UNA HABITACION</h1>

      <form class="formHabi" action="insert_Tipo_Habitacion.php"  method="POST" enctype="multipart/form-data">

        <fieldset>
          <legend>Datos tipo Habitaciones</legend>
             <select name="idtipo">
                  <option value="1">1 = Personal</option> 
                  <option value="2">2 = Matrimonial</option>
                  <option value="3">3 = Familiar</option>
             </select>
             <select name="tipo">
                  <option value="PERS">Personal</option>
                  <option value="MATR">Matr1monial</option>
                  <option value="FAMI">Familiar</option> 
             </select>
             <textarea name="descripcion" placeholder="decripcion de la habitacion"></textarea>
             <select name="numcamas">
                  <option value=""># Camas</option>
                  <option value="1">1 cama</option> 
                  <option value="2">2 camas</option>
             </select>
             <input  type="file" placeholder="foto" name="imagen" required>
             <input  type="file" placeholder="fotouno" name="imagenuno" required>
             <input  type="file" placeholder="fotodos" name="imagendos" required>
             <input  type="file" placeholder="fototres" name="imagentres" required>
             <input  type="submit" value="Enviar">
        </fieldset>
      </form><!--cierre form-->
    </div><!--cierre container-->
  </secction>

</body>
</html>