<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sistema de reservacion Royal Decameron Salinitas</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

 <!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- jQuery Version 1.11.0 -->
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>

<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

<!--****************** VALIDACION DE FECHAS ****************** -->
<script type="text/javascript">
$(function () {
$("#from").datepicker({
minDate: 'today',
onClose: function (selectedDate) {
$("#to").datepicker("option", "minDate", selectedDate);
}
});
$("#to").datepicker({
maxDate: "+12M",
changeMonth: true,
changeYear: true,
onClose: function (selectedDate) {
$("#from").datepicker("option", "maxDate", selectedDate);
}
});
});
//zoom a imagenes
$(document).ready(function(){
       $('#mapa').width(200);
       $('#mapa').mouseover(function()
       {
          $(this).css("cursor","pointer");
          $(this).animate({width: "900px"}, 'slow');
       });
    
    $('#mapa').mouseout(function()
      {   
          $(this).animate({width: "200px"}, 'slow');
       });
   });
</script>
<style type="text/css">
p  {
    color:black;
    font-family:verdana;
    font-size:80%;
}
h4 {
  color:blue;
}
</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="70" height="30"/></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php" target="_blank">INICIO</a></li>
                <li><a href="convenciones.php" target="_blank">CONVENCIONES</a></li>
                <li><a href="todoincluido.php" target="_blank">VACACIONES TODO INCLUIDO</a></li>
                <li><a href="condiciones.php" target="_blank">CONDICIONES</a></li>
                <li><a href="preguntasfrecuentes.php" target="_blank">PREGUNTAS FRECUENTES</a></li>
                <li><a href="servicios.php" target="_blank">SERVICIOS</a></li>
                <li><a href="login.php" target="_blank">Iniciar sesion</a></li>
                <li><a href="registro.php" target="_blank">Registrarse</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="jumbotron">
       <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
  <div id="wowslider-container1">
  <div class="ws_images"><ul>
<li><img src="data1/images/d1.jpg" alt="" title="" id="wows1_0"/>Ven y descubre la magia del Todo Incluido Decameron, un concepto para pasar las mejores vacaciones</li>
<li><img src="data1/images/d2.jpg" alt="" title="" id="wows1_1"/>En nuestros Hoteles podrs disfrutar exquisitos y variados desayunos y almuerzos al estilo buffet</li>
<li><img src="data1/images/d3.jpg" alt="" title="" id="wows1_2"/>Acompania tus vacaciones con las bebidas que tu desees, con nosotros puedes disfrutar bares abiertos en playas y piscinas en donde podras encontrar cocteles con y sin alcohol, jugos de frutas, gaseosas y mas</li>
<li><img src="data1/images/d4.jpg" alt="" title="" id="wows1_3"/>En Decameron encuentras diversion para todos, te ofrecemos una amplia variedad de actividades, para todas las edades y gustos</li>
<li><img src="data1/images/d7.jpg" alt="" title="" id="wows1_4"/>Cada una de nuestras habitaciones esta equipada con todas las comodidades necesarias para que vivas una placentera estadia, en donde tendras una experiencia unica de relajacion, descanso y comodidad Es hora de darte el descanso que te mereces!.</li>
<li><img src="data1/images/d9.jpg" alt="" title="" id="wows1_5"/>Ven y descubre la magia del Todo Incluido Decameron, un concepto para pasar las mejores vacaciones</li>
<li><a href="http://wowslider.com/vf"><img src="data1/images/d14.jpg" alt="full screen slider" title="" id="wows1_6"/></a>Ven y realiza tus reuniones en nuestras modernas instalaciones, equipadas con todo lo necesario para tus eventos empresariales</li>
<li><img src="data1/images/d15.jpg" alt="" title="" id="wows1_7"/>En nuestros Hoteles puedes disfrutar de las mas hermosas playas y piscinas para adultos y ninos que inspiran descanso y relajacion, donde podras disfrutar en plenitud de hermosos paisajes e imagenes que jamas olvidaras.</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title=""><img src="data1/tooltips/d1.jpg" alt=""/>1</a>
<a href="#" title=""><img src="data1/tooltips/d2.jpg" alt=""/>2</a>
<a href="#" title=""><img src="data1/tooltips/d3.jpg" alt=""/>3</a>
<a href="#" title=""><img src="data1/tooltips/d4.jpg" alt=""/>4</a>
<a href="#" title=""><img src="data1/tooltips/d7.jpg" alt=""/>5</a>
<a href="#" title=""><img src="data1/tooltips/d9.jpg" alt=""/>6</a>
<a href="#" title=""><img src="data1/tooltips/d14.jpg" alt=""/>7</a>
<a href="#" title=""><img src="data1/tooltips/d15.jpg" alt=""/>8</a>
</div></div>
  <div class="ws_shadow"></div>
  </div>  
  <script type="text/javascript" src="engine1/wowslider.js"></script>
  <script type="text/javascript" src="engine1/script.js"></script>
  <!-- End WOWSlider.com BODY section -->
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <form action="disponibilidad.php" method="post">
            <h4>CONSULTAR</h4>
            <!-- Prepended checkbox -->
            <label class="control-label">Fecha de entrada</label><br/>
            <div class='input-group date' id='from'>
            <input id="from" name="from" class='form-control' type="text" placeholder="Seleccionar" required="" />
            <span class="input-group-addon">
            <span class="fa fa-calendar"></span>
            </span>
            </div>

            <!-- Prepended checkbox -->
            <label class="control-label">Fecha de salida</label><br/>
            <div class='input-group date' id='from'>
            <input id="to" name="to" class="form-control" type="text" placeholder="Seleccionar" required=""/>
            <span class="input-group-addon">
            <span class="fa fa-calendar">
              </span>
             </span>
            </div>
    
            <!-- Select Basic -->
            <header># de habitaciones</header>
            <select id="n_habitaciones" name="n_habitaciones" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
 
            <!-- Select Basic -->
            <header>Tipo de habitacion:</header>
            <select id="t_hab" name="t_hab" class="form-control" required=""/>
            <option value="">Ninguna...</option>
            <option value="1">Estandar (1 cama doble)</option>
            <option value="2">Doble (2 camas dobles) </option>
            </select>
            <!-- Button -->
            <input type="submit" value="CONSULTAR">
            </form>
    </div>

    <div class="clearfix visible-sm-block"></div>
    <div class="col-sm-6 col-md-4 col-lg-3">
    <img src="img/2.jpg" alt="" class="img-rounded">
    <p align="justify">
    <br/>
    Somos una cadena hotelera con presencia internacional que se ha dedicado a divertir, entretener, desestresar y alegrar la vida de cada persona que se acerca a tomar nuestros servicios.
    <br/>Nos apasiona la calidad, el buen servicio y entendemos la importancia de prestar atención a cada detalle, por eso dedicamos todo nuestro esfuerzo para ofrecerte la mejor alternativa hotelera y turística del mercado, diseñando la experiencia “Todo Incluido” que te llevará a disfrutar sin preocupaciones y dedicado exclusivamente al descanso, la relajación y el entretenimiento, emocionando tu corazón y dejando en tu mente los mejores recuerdos de tu vida.
    <br/>Hacemos parte del portafolio de Terranum Hotels, unidad de negocio del Grupo Terranum que desarrolla, adquiere y opera hoteles en mercados estratégicos de América Latina. El Grupo Terranum es la primera plataforma integral de inversión, desarrollo y servicios inmobiliarios corporativos e institucionales en Colombia
    </p>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <h2>Mapa del lugar</h2>
            <img align="left" src="img/mapadecameron.jpg" alt="" class="img-rounded" id="mapa">
            <p align="justify">
    El Royal Decameron Salinitas es un establecimiento de temática maya situado en Los Cobanos, entre espectaculares jardines tropicales. El hotel ofrece acceso directo a la playa y alberga 5 piscinas, entre las que destaca una piscina de agua marina.
    Todas las habitaciones presentan una decoración elegante e incluyen aire acondicionado, TV de pantalla plana vía satélite, teléfono, cafetera y caja fuerte. También disponen de un balcón con vistas a los jardines o a la piscina.
    El hotel ofrece una amplia variedad de actividades, como salidas en kayak y botes de remo, además de clases de introducción al buceo. También alberga 2 pistas de tenis, una pista de voleibol y una discoteca. Por la noche, se organizan espectáculos de animación para niños y adultos.
    El complejo cuenta con diversos restaurantes que ofrecen servicios de desayuno, almuerzo y cena. También hay 4 bares, donde podrá disfrutar de bebidas internacionales con y sin alcohol de forma ilimitada.
    </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <footer>
                <p>© Ing de software II 02-2014</p>
            </footer>
        </div>
    </div>
</div>
</body>
</html>  