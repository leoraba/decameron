<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Reserva</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<!---- Bootstrap---->

<!-- CALENDARIO -->
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
<!-- CALENDARIO -->

</head>
<body><br/>
<div class="container">
 <div class="row">    
   <div class="span6">
        <a title="Inicio" href="index.php"><img src="img/logo.png" width="150" height="50" href:"index.php"/></a><br/>            
 <!-- **********************************FORMULARIO********************************************* -->  
        <form action="insert_reserva.php" method="post">
          <h4>Detalle Fechas</h4>
           <input type="submit" id="con1" value="Ver condiciones"/> 
           <script type="text/javascript" language="JavaScript">
          $("#con1").click(function () {
         alert("La estadía NO puede ser mayor a 31 días, ni menor a 2 días.\n\nSi desea reservar mas de 31 dias debera hacer una nueva reservacion.");
          });
         </script>


		       <header><br/>Fecha de entrada:&nbsp;</header>
            <input id="from" name="from" class="form-control" type="text" placeholder="Seleccionar" required="" />
            <header>Fecha de salida:&nbsp;</header>
            <input id="to" name="to" class="form-control" type="text" placeholder="Seleccionar" required=""/>

            <h4>Detalle Habitacion</h4>
            <input type="submit" id="con2" value="Ver condiciones"/> 
            <script type="text/javascript" language="JavaScript">
            $("#con2").click(function () {
            alert("Número máximo de camas supletorias o cunas en la habitación: 1.\n\nLas camas supletorias y/o cunas están disponibles bajo petición y deben ser confirmadas por el alojamiento.\n\nLos suplementos no se calculan automáticamente en el importe total y deben pagarse por separado durante la estancia.");
            });
            </script>

	         <header><br/>Tipo de habitacion:</header>
		        <select id="n_adultos" name="t_hab" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="sencilla">Doble Estandar (1 cama doble)</option>
            <option value="doble">Doble (2 camas dobles) </option>
            </select>

	         <header>Cama extra?</header>
		        <select id="n_cama" name="c_extra" class="form-control">
            <option value="">Ninguna...</option>
		        <option value="Y">Una cama adicional</option>
            <option value="N">Una cuna adicional</option>
            </select>

           <header>Tipo de balcon:</header>
		        <select id="t_balcon" name="t_balcon" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Vista a la piscina</option>
            <option value="2">Vista al jardin</option>
            </select>

          <h4>Detalle acompanantes</h4>

          <input type="button" id="con3" value="Ver condiciones"/> 
          <script type="text/javascript" language="JavaScript">
          $("#con3").click(function () {
          alert("¡Gratis! Hasta 2 menores de 3 años se pueden alojar gratis en cunas.\n\nHasta 2 niños de 3 a 11 años se pueden alojar por 60 USD por noche utilizando las camas existentes.\n\nHasta 2 niños mayores de esa edad o adultos se pueden alojar por 158 USD por noche utilizando las camas existentes.");
          });
          </script>
 
    <!-- ACOMPANANTES -->
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
  break;

  case "2":
  $("#reg2Acomp").show();
  $("#reg1Acomp").hide();
  $("#reg3Acomp").hide();
  break;

  case "3":
  $("#reg3Acomp").show();
  $("#reg1Acomp").hide();
  $("#reg2Acomp").hide();
  break;

  default:
  $("#reg1Acomp").hide();
  $("#reg2Acomp").hide();
  $("#reg3Acomp").hide();

  }  
}
</script>

      <header><br/>Seleccionar numero de acompañantes</header>
	    <select id="acomp" name="n_acomp" class="form-control">
      <option value="0">Ninguno...</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      </select><br/>
      
    <div id="reg1Acomp">
      <h5> Datos acompañante:</h5>
      <header>Nombres:</header>
      <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombres" required=""/>
      <header>Apellidos:</header>
      <input type="text" name="ape_acom_1" maxlength="30" placeholder="Apellidos" required=""/>
      <header>Genero:</header>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero1" value="Mujer">Mujer<br/>
      <header><br/>Fecha de nacimiento:</header>
      <input id="edad_acom_1" name="edad_acom_1" class="form-control" type="date" placeholder="Seleccionar" required="" />
    </div>

    <div id="reg2Acomp">
      <h5> Acompañante 1:</h5>
      <header>Nombres:</header>
      <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombre" required=""/>
      <header>Apellidos:</header>
      <input type="text" name="ape_acom_1" maxlength="30" placeholder="Apellidos" required=""/>
      <header>Genero:</header>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero1" value="Mujer">Mujer<br/>
      <header><br/>Fecha de nacimiento:</header>
      <input id="edad_acom_1" name="edad_acom_1" class="form-control" type="date" placeholder="Seleccionar" required="" />
      <h5> Acompañante 2:</h5>
      <header>Nombres:</header>
      <input type="text" name="nom_acom_2" maxlength="30" placeholder="Nombre" required=""/>
      <header>Apellidos:</header>
      <input type="text" name="ape_acom_2" maxlength="30" placeholder="Nombre" required=""/>
      <header>Genero:</header>
      <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero2" value="Mujer">Mujer<br/>
      <header><br/>Fecha de nacimiento:</header>
      <input id="edad_acom_2" name="edad_acom_2" class="form-control" type="date" placeholder="Seleccionar" required="" />
    </div>

    <div id="reg3Acomp">
      <h5> Acompañante 1:</h5>
      <header>Nombres:</header>
      <input type="text" name="nom_acom_1" maxlength="30" placeholder="Nombre" required=""/>
      <header>Apellidos:</header>
      <input type="text" name="ape_acom_1" maxlength="30" placeholder="Nombre" required=""/>
      <header>Genero:</header>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero1" value="Mujer">Mujer<br/>
      <header><br/>Fecha de nacimiento:</header>
      <input id="edad_acom_1" name="edad_acom_1" class="form-control" type="date" placeholder="Seleccionar" required="" />
      <h5> Acompañante 2:</h5>
      <header>Nombres:</header>
      <input type="text" name="nom_acom_2" maxlength="30" placeholder="Nombre" required=""/>
      <header>Apellidos:</header>
      <input type="text" name="ape_acom_2" maxlength="30" placeholder="Nombre" required=""/>
      <header>Genero:</header>
      <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero2" value="Mujer">Mujer<br/>
      <header><br/>Fecha de nacimiento:</header>
      <input id="edad_acom_2" name="edad_acom_2" class="form-control" type="date" placeholder="Seleccionar" required="" />
      <h5> Acompañante 3:</h5>
      <header>Nombres:</header>
      <input type="text" name="nom_acom_3" maxlength="30" placeholder="Nombre" required=""/>
      <header>Apellidos:</header>
      <input type="text" name="ape_acom_3" maxlength="30" placeholder="Nombre" required=""/>
      <header>Genero:</header>
      <input type="radio" name="genero3" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero3" value="Mujer">Mujer<br/>
      <header><br/>Fecha de nacimiento:</header>
      <input id="edad_acom_3" name="edad_acom_3" class="form-control" type="date" placeholder="Seleccionar" required="" />
    </div>
  
<input type="submit" value="Realizar reservacion">

</form>
    </div> 
 <!-- **********************************FORMULARIO********************************************* -->  

 <div class="span6">
         <h4>Hay 10 habitaciones disponibles actualmente</h4>
          <p>
Todas las habitaciones incluyen:
<h6>- TV de pantalla plana vía satélite</h6>
<h6>- Aire acondicionado</h6> 
<h6>- Teléfono</h6>
<h6>- Cafetera</h6>
<h6>- Caja fuerte</h6>
<h6>- Artículos de aseo gratuitos</h6>
<h6>- Ducha</h6>
<h6>- Bañera</h6>
<h6>- Escritorio</h6>
<h6>- Minibar</h6>
También disponen de un balcón con vistas a los jardines o a la piscina. 
La tarifa indicada es para 2 personas. <h6>Capacidad máxima: 4 personas (consulte las condiciones del hotel).</h6>
<h6>Superficie de la habitación: 25 m²</h6>
<h6>Tipo de cama: 1 cama doble extragrande, 2 sofás cama. o 2 camas dobles, 1 sofá cama.</h6>
	       </p>
	       <a href="registro.php">Quieres hacer una reservacion? Registrate</a><br/>
	       <a href="login.php">Iniciar sesion</a>
	     </div>  
     </div>

</body>
</html>
