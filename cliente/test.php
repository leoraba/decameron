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
<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
  <!-- End WOWSlider.com HEAD section -->

  <link href="../css/datepicker.css" rel="stylesheet">

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
</script>

<script>
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

</head>
<body>

<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <?php include('includes/nav.php'); ?>
    </nav>

<div class="container">
    <div class="jumbotron">
      <div id='content'>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <form action="disponibilidad.php" method="post">
            <h4>CONSULTAR</h4>
            <!-- Prepended checkbox -->
            <label class="control-label">Fecha de entrada</label><br/>
            <div class='input-group date' id="from">
            <input name="from" class="form-control" type="text" placeholder="Seleccionar" required="" />
            <span class="input-group-addon">
            <span class="fa fa-calendar"></span>
            </span>
            </div>

            <!-- Prepended checkbox -->
            <label class="control-label">Fecha de salida</label><br/>
            <div class='input-group date' id='to'>
            <input name="to" class="form-control" type="text" placeholder="Seleccionar" required=""/>
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
            <h4>Mapa del lugar</h4>
            <img align="left" src="img/mapadecameron.jpg" alt="" class="img-rounded" id="mapa">
            <p align="justify">
              <br/>
    El Royal Decameron Salinitas es un establecimiento de temática maya situado en Los Cobanos, entre espectaculares jardines tropicales. El hotel ofrece acceso directo a la playa y alberga 5 piscinas, entre las que destaca una piscina de agua marina.
    Todas las habitaciones presentan una decoración elegante e incluyen aire acondicionado, TV de pantalla plana vía satélite, teléfono, cafetera y caja fuerte. También disponen de un balcón con vistas a los jardines o a la piscina.
    El hotel ofrece una amplia variedad de actividades, como salidas en kayak y botes de remo, además de clases de introducción al buceo. También alberga 2 pistas de tenis, una pista de voleibol y una discoteca. Por la noche, se organizan espectáculos de animación para niños y adultos.
    El complejo cuenta con diversos restaurantes que ofrecen servicios de desayuno, almuerzo y cena. También hay 4 bares, donde podrá disfrutar de bebidas internacionales con y sin alcohol de forma ilimitada.
    </p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <footer>
                <p>© Ing de software II 02-2014</p>
            </footer>
        </div>
    </div>
</div>
  </div>

  <script>
$(document).ready(function(){
$("#content").load("slide.php");
});
$('a').click(function(){
var page = $(this).attr('href');
$("#content").load(page);
return false;
});
</script>

</body>
</html>  