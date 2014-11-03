<!doctype html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Reserva</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>
$(function () {
$("#from").datepicker({
minDate: 'today',
onClose: function (selectedDate) {
$("#to").datepicker("option", "minDate", selectedDate);
}
});
$("#to").datepicker({
minDate: 'today',
maxDate: "+12M",
changeMonth: true,
changeYear: true,
onClose: function (selectedDate) {
$("#from").datepicker("option", "maxDate", selectedDate);
}
});
});
</script>


</head>
<body><br/>

<div class="container">
 <div class="row">    
   <div class="span6">
        <a title="Inicio" href="index.php"><img src="img/logo.png" width="150" height="50" href:"index.php"/></a><br/>            

<form action="insert_reserva.php" method="post">
		<h4>Detalle Reservacion</h4><br/>

		<header>Fecha de entrada:&nbsp;</header>
        <input id="from" name="from" class="form-control" type="text" placeholder="Seleccionar" required="" />

        <header>Fecha de salida:&nbsp;</header>
        <input id="to" name="to" class="form-control" type="text" placeholder="Seleccionar" required=""/>

	    <header>Tipo de habitacion:</header>
		<select id="n_adultos" name="t_hab" class="form-control">
        <option value="sencilla">Doble Estandar (cama doble)</option>
        <option value="doble">Doble (2 camas dobles) </option>
        </select>

	    <header>Cama extra?</header>
		<select id="n_cama" name="n_cam" class="form-control">
		<option value="no">NO</option>
        <option value="si">SI</option>
       </select>

       <header>Tipo de balcon:</header>
		<select id="t_balcon" name="t_balcon" class="form-control">
        <option value="si">Vista al jardin</option>
        <option value="no">Vista a la piscina</option>
       </select>

	  <header># Adultos:</header>
	  <select id="t_balcon" name="t_balcon" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
       </select>

       <header># ninos:</header>
	   <select id="t_balcon" name="t_balcon" class="form-control">
       <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      </select><br/>
<input type="submit" value="Realizar reserva">
</form>
    </div> 


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