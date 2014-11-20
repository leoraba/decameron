<!doctype html> 
<html>
<head>
<meta charset="utf-8" />
<title>Royal Decameron</title>

<meta name="viewport" content="width=device-width, ininitial-scale=1.0" />
<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

<!---- Bootstrap---->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-1.11.0.js"></script>
<script src="js/jquery-ui.js"></script>

<!--****************** VALIDACION DE FECHAS ****************** -->
<script>
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
#wrapper {
  width: 980px;
  text-align: left;
  margin-top: 5px;
  overflow: hidden;  /* porque no conocemos el alto del contenido */
  margin: auto;
  border: 2px solid #FFFFFF;
  height: auto;
  padding-top: 20px;
  
}
p  {
    color:black;
    font-family:verdana;
    font-size:80%;
}
h4 {
  color:blue;
}
<!---- Bootstrap---->
/*Escritorio*/
@media (min-width: 700px) {
  
}
/*Tablet*/
@media (min-width: 768px) and (max-width: 979px){
  
}
/*Smartphone*/
@media (max-width: 767px) {
  
}
/*Escritorio*/
@media (min-width: 480px) {
  
}
</style>
</head>

<body>
      <div id="wrapper">
       <div class="container">

   <!---- Logo decameron---->
<div class="row">
   <div class="span6">
    <img src="img/logo.png" width="150" height="50"/>
</div>
<!---- Fin Logo Decameron---->


<!---- Login ---->
<div class="span6">
  <div class="text-right">
    <div class="btn-group btn-group-lg">
     <a href="login.php" style="color: #FFF"><button type="button" class="btn btn-primary">Inicia sesion</button></a>
      </div>
       <div class="btn-group btn-group-lg">
   <a href="registro.php" style="color: #000000"><button type="button" class="btn btn-default">Registrate</button></a>
       </div>
     </div>
</div>    
<!---- Fin Login ---->

   <!---- Menu principal ---->
<div class="row">
  <div class="span12">
    <div class="text-center">
      <div class="btn-group" style="margin: 9px 0;">
      <a href="#"><button type="button" class="btn btn-default">INICIO</button></a> 
      <a href="convenciones.php"><button type="button" class="btn btn-default">CONVENCIONES</button></a>
      <a href="todoincluido.php"><button type="button" class="btn btn-default">VACACIONES TODO INCLUIDO</button></a>
      <a href="condiciones.php"><button type="button" class="btn btn-default">CONDICIONES</button></a>
      <a href="preguntasfrecuentes.php"><button type="button" class="btn btn-default">PREGUNTAS FRECUENTES</button></a>
      <a href="servicios.php"><button type="button" class="btn btn-default">SERVICIOS</button></a>
      <a href="#"><button type="button" class="btn btn-default">CONTACTO</button></a>
    </div>
    </div>
  </div>
</div>

  <!---- Slide de fotografias ---->
  <div class="row">
       <div class="span12">

     <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
  <div id="wowslider-container1">
  <div class="ws_images"><ul>
<li><img src="data1/images/d1.jpg" alt="" title="" id="wows1_0"/>Ven y descubre la magia del Todo Incluido Decameron, un concepto para pasar las mejores vacaciones</li>
<li><img src="data1/images/d2.jpg" alt="" title="" id="wows1_1"/>En nuestros Hoteles podrs disfrutar exquisitos y variados desayunos y almuerzos al estilo buffet</li>
<li><img src="data1/images/d3.jpg" alt="" title="" id="wows1_2"/>Acompania tus vacaciones con las bebidas que tu desees, con nosotros puedes disfrutar bares abiertos en playas y piscinas en donde podras encontrar cocteles con y sin alcohol, jugos de frutas, gaseosas y m�s</li>
<li><img src="data1/images/d4.jpg" alt="" title="" id="wows1_3"/>En Decameron encuentras diversion para todos, te ofrecemos una amplia variedad de actividades, para todas las edades y gustos</li>
<li><img src="data1/images/d7.jpg" alt="" title="" id="wows1_4"/>Cada una de nuestras habitaciones esta equipada con todas las comodidades necesarias para que vivas una placentera estadia, en donde tendras una experiencia �nica de relajacion, descanso y comodidad �Es hora de darte el descanso que te mereces!.</li>
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
</div>
<br/>

      <!---- Modulo de reserva ---->
    <div class="container">
    <div class="row">
   <div class="span4">

<fieldset>
<!-- Form Name -->
<div class="container">
<form action="disponibilidad.php" method="post">
<h4 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONSULTAR</h4>
<!-- Prepended checkbox -->
<header>Fecha de entrada&nbsp;</header>
<input id="from" name="from" class="form-control" type="text" placeholder="Seleccionar" required="" /></br>
   
<!-- Prepended checkbox -->
<header>Fecha de salida&nbsp;</header>
<input id="to" name="to" class="form-control" type="text" placeholder="Seleccionar" required=""/>
    
<!-- Select Basic -->
<header># de habitaciones&nbsp;</header>
    <select id="n_habitaciones" name="n_habitaciones" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select><br/>
 
<!-- Select Basic -->
<header>Tipo de habitacion:</header>
    <select id="t_hab" name="t_hab" class="form-control" required=""/>
    <option value="">Ninguna...</option>
        <option value="1">Estandar (1 cama doble)</option>
        <option value="2">Doble (2 camas dobles) </option>
        </select><br/>
<!-- Button -->
<input type="submit" value="CONSULTAR">
</form>
</div></div>
<div class="span8">
  <img src="img/1.jpg" alt="" class="img-rounded">
  <img src="img/2.jpg" alt="" class="img-rounded">
  <img src="img/3.jpg" alt="" class="img-rounded">
<p align="justify">
<br/>
 Somos una cadena hotelera con presencia internacional que se ha dedicado a divertir, entretener, desestresar y alegrar la vida de cada persona que se acerca a tomar nuestros servicios.
<br/>Nos apasiona la calidad, el buen servicio y entendemos la importancia de prestar atención a cada detalle, por eso dedicamos todo nuestro esfuerzo para ofrecerte la mejor alternativa hotelera y turística del mercado, diseñando la experiencia “Todo Incluido” que te llevará a disfrutar sin preocupaciones y dedicado exclusivamente al descanso, la relajación y el entretenimiento, emocionando tu corazón y dejando en tu mente los mejores recuerdos de tu vida.
<br/>Hacemos parte del portafolio de Terranum Hotels, unidad de negocio del Grupo Terranum que desarrolla, adquiere y opera hoteles en mercados estratégicos de América Latina. El Grupo Terranum es la primera plataforma integral de inversión, desarrollo y servicios inmobiliarios corporativos e institucionales en Colombia
</p>
      </div>
   </div>
</div>
    <!---- Informacion ---->
   <div class="span12">
    <h6>Mapa del hotel</h6>
     <img align="left" src="img/mapadecameron.jpg" alt="" class="img-rounded" id="mapa">
     <p align="justify">
      El Royal Decameron Salinitas es un establecimiento de temática maya situado en Los Cobanos, entre espectaculares jardines tropicales. El hotel ofrece acceso directo a la playa y alberga 5 piscinas, entre las que destaca una piscina de agua marina.
Todas las habitaciones presentan una decoración elegante e incluyen aire acondicionado, TV de pantalla plana vía satélite, teléfono, cafetera y caja fuerte. También disponen de un balcón con vistas a los jardines o a la piscina.
El hotel ofrece una amplia variedad de actividades, como salidas en kayak y botes de remo, además de clases de introducción al buceo. También alberga 2 pistas de tenis, una pista de voleibol y una discoteca. Por la noche, se organizan espectáculos de animación para niños y adultos.
El complejo cuenta con diversos restaurantes que ofrecen servicios de desayuno, almuerzo y cena. También hay 4 bares, donde podrá disfrutar de bebidas internacionales con y sin alcohol de forma ilimitada.
    </p>
   </div>
     <!---- Informacion ---->


     <!---- Pie de pagina ---->
     <div class="row">
     <div class="container">
<h3>aca va la informacion de contacto sobre redes sociales y demas</h3>
   </div>
  </div>
</div>
<!---- Pie de pagina ---->

  </div>
   </div>
   
</body>
</html>