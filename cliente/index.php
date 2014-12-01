<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sistema de reservacion Royal Decameron Salinitas</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>

<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

</head>
  <body>
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <?php include('includes/nav.php');?>
    </nav>

  <div class="container" id='divSlide'><!-- Inicio div id="slide" -->
  <br/>
  <?php include('includes/wowslide.php');?><br/><br/>
  </div>

    <div class="container" id='divConsultar'><!-- Inicio div id="consultar" -->
    <div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
    <form action="reserva_habitacion.php" method="post">
    <h4>CONSULTAR</h4>
    <label class="control-label">Fecha de entrada</label><br/>
    <input name="from" id='from' type="datepicker" value="<?php echo date('d/m/y'); ?>" readonly>
    <br/><br/>
    <label class="control-label">Fecha de salida</label><br/>
    <input name="to" id='to' type="datepicker" value="<?php echo date('d/m/y'); ?>" readonly>
    <br/><br/>
    <label class="control-label"># de habitaciones</label><br/>
    <select id="n_habitaciones" name="n_habitaciones" style="height:30px">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    </select>
    <br/><br/>
    <label class="control-label">Tipo de habitacion:</label>
    <select id="t_hab" name="t_hab" style="height:30px" required=""/>
    <option value="">Seleccionar...</option>
    <option value="1">Estandar (1 cama doble)</option>
    <option value="2">Doble (2 camas dobles) </option>
    </select><br/><br/>
    <input type="submit" value="CONSULTAR">
    </form>
    </div>
          
    <div class="clearfix visible-sm-block"></div>
    <div class="col-sm-6 col-md-4 col-lg-4">
    <h5>Mapa del hotel</h5>
    <img src="img/mapadecameron.jpg" class="img-rounded" id="mapa"><br/>
    <p align="justify"><br/><br/>
    El Royal Decameron Salinitas es un establecimiento de temática maya situado en Los Cobanos, entre espectaculares jardines tropicales. El hotel ofrece acceso directo a la playa y alberga 5 piscinas, entre las que destaca una piscina de agua marina.<br/><br/>
    Todas las habitaciones presentan una decoración elegante e incluyen aire acondicionado, TV de pantalla plana vía satélite, teléfono, cafetera y caja fuerte. También disponen de un balcón con vistas a los jardines o a la piscina.<br/><br/>
    El hotel ofrece una amplia variedad de actividades, como salidas en kayak y botes de remo, además de clases de introducción al buceo. También alberga 2 pistas de tenis, una pista de voleibol y una discoteca. Por la noche, se organizan espectáculos de animación para niños y adultos.<br/><br/>
    El complejo cuenta con diversos restaurantes que ofrecen servicios de desayuno, almuerzo y cena. También hay 4 bares, donde podrá disfrutar de bebidas internacionales con y sin alcohol de forma ilimitada.
    </p>
    </div>
    
    <div class="clearfix visible-sm-block"></div>
    <div class="col-sm-6 col-md-4 col-lg-4">
    <img src="img/13.jpg" alt="" class="img-rounded" width="100%">
    <p align="justify">
    <br/>
    Somos una cadena hotelera con presencia internacional que se ha dedicado a divertir, entretener, desestresar y alegrar la vida de cada persona que se acerca a tomar nuestros servicios.
    <br/><br/>Nos apasiona la calidad, el buen servicio y entendemos la importancia de prestar atención a cada detalle, por eso dedicamos todo nuestro esfuerzo para ofrecerte la mejor alternativa hotelera y turística del mercado, diseñando la experiencia “Todo Incluido” que te llevará a disfrutar sin preocupaciones y dedicado exclusivamente al descanso, la relajación y el entretenimiento, emocionando tu corazón y dejando en tu mente los mejores recuerdos de tu vida.
    <br/><br/>Hacemos parte del portafolio de Terranum Hotels, unidad de negocio del Grupo Terranum que desarrolla, adquiere y opera hoteles en mercados estratégicos de América Latina. El Grupo Terranum es la primera plataforma integral de inversión, desarrollo y servicios inmobiliarios corporativos e institucionales en Colombia
    </p>
    </div>
    
    <div class="row">
    <div class="col-sm-12">
    <footer>
    <p>© Ing de software II Virtual 02-2014</p>
    </footer>
    </div>
    </div>
    </div>
    </div> <!-- Fin div id="consultar" -->
    
        <div class="container" id="divRegistro" style="display: none"><!-- Inicio div id="registro" -->
        <div class="row">
        <div class="col-sm-12">
        <form action="insert_registro.php" method="post">
        <?php include("../includes/conexion.php");?>
        <h3>Crear tu cuenta</h3>
        <label class="control-label">Nombres :</label><br/>
        <input type="text" name="nombres" class="input_letras" onpaste="return false" maxlength="30" placeholder="Tus nombres" required="" />
        <br/><br/>
        <label class="control-label">Apellidos :</label><br/>
        <input type="text" name="apellidos" class="input_letras" onpaste="return false" maxlength="30" placeholder="Tus apellidos" required="" />
        <br/><br/>
        <label class= "control-label">Fecha de nacimiento :</label><br/>
        <input name ="nacimiento" id='nacimiento' type="datepicker" value="<?php echo date('d/m/y'); ?>" readonly>
        <br/><br/>
        <label class ="control-label">Correo electronico :</label><br/>
        <input type  ="email" name="email" maxlength="30" placeholder="Tu correo electronico" required="" />
        <br/><br/>
        <label class ="control-label">Genero :</label><br/>
        <input type  ="radio" name="genero" value="Hombre">Hombre<br>
        <input type  ="radio" name="genero" value="Mujer">Mujer
        <br/><br/>
        <label class="control-label">Pais de origen :</label><br/>
        <select name="cmbPais" id="cmbPais" style="height:30px" required="" />
        <option value=""> Seleccione una opci&oacute;n</option>
        <?php
        $qr = mysql_query("SELECT id_pais, nombre_pais FROM PAIS ORDER BY nombre_pais ASC",$ln);
        while($row = mysql_fetch_array($qr)){
        echo "<option value='".$row['id_pais']."'>".$row['nombre_pais']."</option>";
        } 
        ?>
        </select>
        <br/><br/>
        <label class="control-label">Tipo de documento :</label><br/>
        <select name="cmbTipoDocumento" id="cmbTipoDocumento" style="height:30px">
        <option value=""> Seleccione una opci&oacute;n</option>
        <?php
        $qr = mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento ASC",$ln);
        while($row = mysql_fetch_array($qr)){
        echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>";
        }
        ?>
        </select>
        <br/><br/>
        <label class="control-label"># de documento :</label><br/>
        <input type="text" name="num_documento" maxlength="12" class="input_alphanum" placeholder="# de documento" required="" />
        <br/><br/>
        <label class="control-label"># de telefono :</label><br/>
        <input type='text' name="num_telefono" id="num_telefono" class="input_num" onpaste="return false" maxlength="10" placeholder="# de telefono" required="" />
        <span id="errmsg"></span>
        <br/><br/>
        <label class="control-label">Usuario :</label><br/>
        <input type="text" name="usuario" maxlength="30" class="input_un" onpaste="return false" placeholder=". _ y @ son permitidos" required="" />
        <br/><br/>
        <script>
        jQuery(document).ready(function() {
        jQuery('.input_un').keypress(function(tecla) {
        if((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode < 95 || tecla.charCode > 122) && (tecla.charCode < 64 || tecla.charCode > 91) && (tecla.charCode < 45 || tecla.charCode > 46) && (tecla.charCode != 32)) return false;
            });
        });
        </script>
        <label class="control-label">Contrasena :</label><br/>
        <input type="password" name="contra" class="password" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/>
        <br/><br/>
        <label class="control-label">Repetir contrasena :</label><br/>
        <input type="password" name="rcontra" class="confpass" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/>
        <br/><br/>
        <input id="submit" type="submit" value="enviar">
        <br/><br/>
        </form>
        </div>
        </div>
        </div><!-- Fin div id="registro" -->
        
        <div class="container" id="divCondiciones" style="display: none">
        <?php include("includes/condiciones.php");?>
        </div>

        <div class="container" id="divConvenciones" style="display: none">
        <?php include("includes/convenciones.php");?>
        </div>

        <div class="container" id="divPreguntasfrecuentes" style="display: none">
        <?php include("includes/preguntasfrecuentes.php");?>
        </div>

        <div class="container" id="divServicios" style="display: none">
        <?php include("includes/servicios.php");?>
        </div>

        <div class="container" id="divTodoincluido" style="display: none">
        <?php include("includes/todoincluido.php");?>
        </div>

             <div class="container" id='divLogin' style="display: none"><!-- inicio div id="login" -->
             <?php include("includes/login.php");?>
             </div><!-- inicio div id="login" -->


    <!-- jQuery Version 1.11.1 -->
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/validaciones.js"></script><!-- Validaciones de todos los JQuery -->
    <!-- jQuery Version 1.11.1 -->

</body>
</html>
