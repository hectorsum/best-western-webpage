<?php 

 include_once('LIBRERIA.php');
 $codigo = $_GET['elegido'];/*capturado de index.php en la seccion de habitaciones*/

 /*consulta  para traer los datos de la habitacion con el dodigo capturado de index.php*/
 $sql = "SELECT * FROM T_habitacion where IdT_habitacion = '$codigo' ";
 $resultado = CARGAR_DATOS_CAMPO($sql);
//  echo "el resultado es".var_dump($resultado);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">  -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&family=Comic+Neue&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <!--IMAGEN DE LA WEB-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>

<body>
    <!--Parte Navbar-->
    <nav class="navbar">
        <div class="container">
            <div class="flex-navbar">
                <div class="logo">
                    <img src="../img/logo.png" alt="Imagen logo">
                </div><!--cierre logo-->
  
                <ul class="navigation">
                    <li class="item"><a class="enlace" href="principal.html">Inicio</a></li>
                    <li class="item"><a class="enlace" href="nosotros.html">Nosotros</a></li>
                    <li class="item"><a class="enlace" href="habitaciones.php">Habitaciones</a></li>
                    <li class="item"><a class="enlace" href="servicios.html">Servicios</a></li>
                    <li class="item"><a class="enlace" href="contactos.html">Contactos</a></li>
                </ul><!--cierre navigation-->

            </div><!--cierre flex-navbar-->
        </div><!--cierre container-->
    </nav><!--cierre navbar-->
         
 


    <!--Cuerpo del Programa-->

    <main class="habitacion-huesped">
        <div class="container">
            <h1 class="centro title-reservacion">Datos de la Habitacion Requerida</h1>
            <div class="flex-habitacion">

                <div class="img-habitacion">
                    <img src="data:image/jpg;base64,<?= base64_encode($resultado['foto_principal']);?>" alt="Imagen de la Habitacion General">
                </div><!--cierre imagen habitacion-->
                
                    <!--con este formulario mnadamos los datos hacia resevaciones.phph-->
                <form class="form-reservacion" action="Reservacion.php" method="POST">
                    <div class="form-habitacion">
                        <input type="text" name="codigo" value="<?php echo $resultado['IdT_habitacion']?>"><!--codigo de la habitacion oculto-->
                        <div class="precio">
                            <p class=" centro">Desde <span class="estilo-monto">90 S/</span> por dia</p>
                        </div>

                        <div class="flex-cajas-h">
                            <div class="caja-h">
                                <label class="centro" for="ini">Fecha De Inicio Hospedaje</label>
                                <input type="date" name="fecha_inicio" id="ini">
                            </div>
        
                            <div class="caja-h">
                                <label class="centro" for="">Fecha De Fin Hospedaje</label>
                                <input type="date" name="fecha_salida" id="">
                            </div>
                        </div><!--cierre flex.cajas-h-->
                   
                        <div class="caja-h espacio-arriba">
                         <input class="btn" type="submit" value="Reservar" id="">
                        </div>
                    </div><!--cierre caja formulario-->
                </form>

            </div><!--cierre flex-habitacion-->

        </div><!--cierre container-->
    </main>

    <div class="mesaje-reserva centro">
        <p>whatsapp para contacto</p>
        <img src="../img/whatsapp.png" alt="Imagen Whatsap">
        <p>51+ 990 999 999</p>
    </div>
   

    <section class="imagenes-habitacion">
        <h3 class="centro">Fotos de la Habitacion</h3>
        <!--AQUI VA IR LOS UN MEDI QUERY PARA QUE LAS IMAGENES SE DESLICEN CON EL CLICK DEL MOUSE-->
        </div>
    </section>



  <!--pie de pagina o footer-->
  <footer class="footer">
        <div class="container">
            <div class="flex-footer margin_top_bottom">
                <div class="servicio">
                    <h5 class="centro">SERVICIO GRATUITO</h5>
                    <ul class="nav-servicio">
                        <li class="item-footer">Spa y Cortes</li>
                        <li class="item-footer">Atencion Medica las 24-Hrs</li>
                        <li class="item-footer">Gimnasio por las tardes</li>
                        <li class="item-footer">Piscina</li>
                    </ul>
                </div>
            

                <div class="servicio">
                    <h5 class="centro">Terminos y Condiciones</h5>
                    <ul class="nav-servicio">
                        <li class="item-footer">Ser ordenado</li>
                        <li class="item-footer">Ser Educado con los huespedes</li>
                        <li class="item-footer">Respetar al Personal del Servicio</li>
                    </ul>
                </div>


                <div class="servicio">
                    <!--display block-->
                    <h5 class="centro">Contactos</h5>
                    <div class="flex-servicio-contacto">
                        <div class="contacto">
                            <img src="../img/ubitcation.png" alt="Icono Ubicacion">
                            <a class="direccion-contacto" href="contactos.html"><p>Av los Jazmines331 mz 19 lt 9</p></a>
                        </div>
                        <div class="contacto">
                            <img src="../img/whatsapp.png" alt="Icono Whasaap">
                            <p>999 999 999</p>
                        </div>
                        <div class="contacto">
                            <img src="../img/phone.png" alt="icono Telefono">
                            <p>5679765</p>
                        </div>
                        <div class="contacto">
                            <img src="../img/email.png" alt="Icono Email">
                            <p>@micorreo.tipo</p>
                        </div>
                    </div>

                </div>
    

                <div class="servicio">
                    <h5 class="centro">Lgotipo</h5>
                   <div class="logo-footer">
                       <img src="../img/logo.png" alt="">
                   </div>
                </div>
           </div><!--cierre flex-footer-->
        </div><!--cierre container-->


           <div class="derechos-reservados">
               <div class="msj-derechos">
                <p>Copyright</p>
                <p>Creado <date>11/04/2020</date></p>
               </div>    
           </div>
     
    </footer><!--cierre footer-->
</body>
</html>