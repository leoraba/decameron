<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sistema de reservacion Royal Decameron Salinitas</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/south-street/jquery-ui.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

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
    <input name="from" id='from' class="form-control" type="datepicker" placeholder="Seleccionar" required=""/>
    <label class="control-label">Fecha de salida</label><br/>
    <input name="to" id='to' class="form-control" type="datepicker" placeholder="Seleccionar" required=""/>
    <label class="control-label"># de habitaciones</label>
    <select id="n_habitaciones" name="n_habitaciones" class="form-control">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    </select>
    <label class="control-label">Tipo de habitacion:</label>
    <select id="t_hab" name="t_hab" class="form-control" required=""/>
    <option value="">Seleccionar...</option>
    <option value="1">Estandar (1 cama doble)</option>
    <option value="2">Doble (2 camas dobles) </option>
    </select>
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
    <p>© Ing de software II 02-2014</p>
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
        <input name ="nacimiento" id='nacimiento' type="datepicker" placeholder="Seleccionar" required=""/>
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
        <input type="text" name="usuario" maxlength="30" placeholder="Usuario" required="" />
        <br/><br/>
        <label class="control-label">Contrasena :</label><br/>
        <input type="password" name="contra" required id="password1"  pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/>
        <br/><br/>
        <label class="control-label">Repetir contrasena :</label><br/>
        <input type="password" name="rcontra" required id="password2" pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/>
        <br/><br/>
        <input type="submit" value="enviar">
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
             <div class="col-md-12"><br/>
             <h3>Iniciar sesion</h3>
             <form action="verificar_login.php" method="post" name="passwordForm" id="passwordForm">
             <header>Usuario:</header>
             <input type="text" name="user" id="user" class="form-control" style="width:250px" maxlength="30" placeholder="Usuario">
             <header>Contrasena:</header>
             <input type="password" name="pass" class="form-control" style="width:250px"  maxlength="30" placeholder="Contrasena">
             <br/>
             <input type="submit" value="Iniciar sesion"><br/>
             <!-- Change this to a button or input when using this as a form -->
             </form>
             </div>
             </div><!-- inicio div id="login" -->

            <div class="container" id='divReserva' style="display: none"><!-- inicio div id="reserva" -->
            <div class="row">
            <div class="col-sm-12">
            <br/> <br/> <br/> 
            <?php
            include("../includes/conexion.php");
            $from = $_POST['from'];
            $to = $_POST['to'];
            $n_habitaciones = $_POST['n_habitaciones'];
            $t_hab = $_POST['t_hab'];
            
            $sq1 = "SELECT COUNT(id_reserva_habitacion) FROM RESERVA_HABITACION WHERE fecha_inicio >= $from AND fecha_fin <= $to AND fk_id_tipo_habitacion=$t_hab";
            $sq2 = "SELECT COUNT(id_habitacion) FROM HABITACION WHERE fk_id_tipo_habitacion =$t_hab AND estado_habitacion='d'";
            
            $qr1=mysql_query($sq1,$ln);
            $row_reserva=mysql_fetch_array($qr1);
            $resultado_reserva=$row_reserva[0];
            
            $qr2=mysql_query($sq2,$ln);
            $row_habitacion=mysql_fetch_array($qr2);
            $resultado_habitacion=$row_habitacion[0];
            
            echo "$resultado_reserva";
            echo "$resultado_habitacion";
            echo "$sq1";
            echo "$sq2";
            if($resultado_reserva>=$resultado_habitacion){
            echo "no hay disponibles";
            } else {
            echo "si hay disponibles";
            }
            ?>
            </div> 
            </div> 
            
            <div class="row">
            <div class="col-sm-12"> 
            <!-- **********************************FORMULARIO********************************************* -->  
            <form id="reserva" name="reserva" action="insert_reserva.php" method="post">
            <br/><br/>
            <table class="table table-striped table-bordered" cellspacing="1" >
            <thead>
            <tr class="info">
            <th>Entrada</th>
            <th>Salida</th>
            <th>Tipo habitacion</th>
            <th>Cama extra</th>
            <th>Balcon</th>
            <th># huespedes</th>
            <th>Precio total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td ><input id="desde" type="text" readonly style="width:80px"></td>
            <td ><input id="hasta" type="text" readonly style="width:80px"></td>
            <td ><input id="hab" type="text" readonly style="width:80px"></td>
            <td ><input id="c_extra" type="text" readonly style="width:80px"></td>
            <td ><input id="tbal" type="text" readonly style="width:80px"></td>
            <td ><input id="thues" name="thues" type="text" readonly style="width:80px"></td>
            <td>TOTAL $55555</td>
            </tr>
            </tbody>
            </table>
            </div>
            </div>
            
            <div class="row">
            <div class="col-sm-12"> 
            <h4>1. Fechas de reserva</h4>
            <a id='con1'>Ver condiciones</a> 
            <br/>
            <script>
            $('#con1').click( function() { alert('La estadía NO puede ser mayor a 31 días, ni menor a 2 días.\n\nSi desea reservar mas de 31 dias debera hacer una nueva reservacion.'); });
            </script>
            
            <label class="control-label">Entrada</label><br/>
            <input name="from1" id='from1' class="form-control" style="width:200px" type="datepicker" placeholder="Seleccionar" required=""/>
            
            <label class="control-label">Salida</label><br/>
            <input name="to1" id='to1' class="form-control" style="width:200px" type="datepicker" placeholder="Seleccionar" required=""/>
            
            <h4>2. Detalles de habitacion</h4>
            <a id='con2'>Ver condiciones</a> 
            <script>
            $('#con2').click( function() { alert('Número máximo de camas supletorias o cunas en la habitación: 1.\n\nLas camas supletorias y/o cunas están disponibles bajo petición y deben ser confirmadas por el alojamiento.\n\nLos suplementos no se calculan automáticamente en el importe total y deben pagarse por separado durante la estancia.'); });
            </script>
            
            <label class="control-label">Tipo:</label><br/>
            <select id='t_habi' name="t_hab" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="sencilla">Estandar (1 cama king)</option>
            <option value="doble">Doble (2 camas dobles)</option>
            </select>
            
            <label class="control-label">Cama extra?</label><br/>
            <select id="n_cama" name="c_extra" class="form-control">
            <option value="">Ninguna...</option>
            <option value="cama">Una cama adicional</option>
            <option value="cuna">Una cuna adicional</option>
            </select>
            
            <label class="control-label">Tipo de balcon:</label><br/>
            <select id="t_balcon" name="t_balcon" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Vista a la piscina</option>
            <option value="2">Vista al jardin</option>
            </select>
            
            <h4>3. Detalle de Huespedes</h4>
            <a id='con3'>Ver condiciones</a>
            <script>
            $('#con3').click( function() { alert('¡Gratis! Hasta 2 menores de 3 años se pueden alojar gratis en cunas.\n\nHasta 2 niños de 3 a 11 años se pueden alojar por 60 USD por noche utilizando las camas existentes.\n\nHasta 2 niños mayores de esa edad o adultos se pueden alojar por 158 USD por noche utilizando las camas existentes.'); });
            </script> 
            
            <script>
            $("#from1").change(function() {
            var val = $(this).val();
            $("#desde").val(val);
            });
            $("#to1").change(function() {
            var val = $(this).val();
            $("#hasta").val(val);
            });
            $("#t_habi").change(function() {
            var val = $(this).val();
            $("#hab").val(val);
            });
            $("#n_cama").change(function() {
            var val = $(this).val();
            $("#c_extra").val(val);
            });
            $("#t_balcon").change(function() {
            var val = $(this).val();
            $("#tbal").val(val);
            });
            </script>
            
            <script type="text/javascript" language="JavaScript">
            $(document).ready(function () {
            toggleFields(); 
            $("#acomp").change(function () {
            toggleFields();
            });
            });
            function toggleFields() {
            
            var i = $("#acomp").val();
            
            switch (i) {
            
            case "1":
            $("#reg1Acomp").show();
            $("#reg2Acomp").hide();
            $("#reg3Acomp").hide();
            $("#reg4Acomp").hide();
            break;
            
            case "2":
            $("#reg2Acomp").show();
            $("#reg1Acomp").hide();
            $("#reg3Acomp").hide();
            $("#reg4Acomp").hide();
            break;
            
            case "3":
            $("#reg3Acomp").show();
            $("#reg1Acomp").hide();
            $("#reg2Acomp").hide();
            $("#reg4Acomp").hide();
            break;
            
            case "4":
            $("#reg4Acomp").show();
            $("#reg1Acomp").hide();
            $("#reg2Acomp").hide();
            $("#reg3Acomp").hide();
            
            default:
            $("#reg1Acomp").hide();
            $("#reg2Acomp").hide();
            $("#reg3Acomp").hide();
            $("#reg3Acomp").hide();
            
            }  
            }
            </script>
            
            <label class="control-label">Huespedes por habitacion:</label><br/>
            <select id="acomp" name="n_acomp" class="form-control" onchange='document.reserva.thues.value=this.options[this.options.selectedIndex].value'>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select><br/>
            
            <div id="reg1Acomp">
            <h5> Datos huesped:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombres" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_1" maxlength="30" placeholder="Apellidos" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero1" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            </div>
            
            <div id="reg2Acomp">
            <h5> Datos huesped 1:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_1" maxlength="30" placeholder="Apellidos" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero1" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            <h5> Datos huesped 2:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_2" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_2" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero2" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            </div>
            
            <div id="reg3Acomp">
            <h5> Datos huesped 1:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_1" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero1" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            <h5> Datos huesped 2:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_2" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_2" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero2" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            <h5> Datos huesped 3:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_3" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_3" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero3" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero3" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            </div>
            
            <div id="reg4Acomp">
            <h5> Datos huesped 1:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_1" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero1" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            <h5> Datos huesped 2:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_2" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_2" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero2" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            <h5> Datos huesped 3:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_3" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_3" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero3" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero3" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_1" name="edad_acom_1" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            <h5> Datos huesped 4:</h5>
            <header>Nombres:</header>
            <input type="text" name="nom_acom_4" maxlength="30" placeholder="Nombre" required=""/>
            <header>Apellidos:</header>
            <input type="text" name="ape_acom_4" maxlength="30" placeholder="Nombre" required=""/>
            <header>Genero:</header>
            <input type="radio" name="genero4" value="Hombre" checked="checked">Hombre
            <input type="radio" name="genero4" value="Mujer">Mujer<br/><br/>
            <header>Edad:</header>
            <select id="edad_acom_4" name="edad_acom_4" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño de 3 a 11 años</option>
            <option value="2">Adulto</option>
            </select>
            </div>

            <br/>
            <input type="submit" value="Realizar reservacion" style="font-face: 'Comic Sans MS'; font-size: larger; color: white; background-color: #289510; border: 5pt ridge lightgrey">
            </form>
            </div> 
            </div><!-- fin div id="reserva" -->  

    <!-- jQuery Version 1.11.1 -->
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/validaciones.js"></script><!-- Validaciones de todos los JQuery -->
    <!-- jQuery Version 1.11.1 -->

</body>
</html>
