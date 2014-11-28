<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Reserva</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!---- Bootstrap---->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/south-street/jquery-ui.css">
<link rel="stylesheet" href="dist/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>

<!-- CALENDARIO -->
<script>
$(function () {
$("#from").datepicker({
minDate: 'today',
onClose: function (selectedDate) {
$("#to").datepicker("option", "minDate", selectedDate);
$("#entrada").val(selectedDate);
}
});
$("#to").datepicker({
maxDate: "+12M",
changeMonth: true,
changeYear: true,
onClose: function (selectedDate) {
$("#from").datepicker("option", "maxDate", selectedDate);
$("#salida").val(selectedDate);
}
});
});
</script>
<!-- CALENDARIO -->

</head>
<body>
<br/>

<div class="container">
  <div class="row">
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

<div class="container">
  <div class="row"> 
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <?php include('includes/nav.php');?>
    </nav>

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
          <td ><input id="entrada" type="text" readonly style="width:80px"></td>
          <td ><input id="salida" type="text" readonly style="width:80px"></td>
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


<div class="container">
 <div class="row">               
 <!-- **********************************FORMULARIO********************************************* -->  
          <h4>1. Fechas de reserva</h4>
           <input type="submit" id="con1" value="Ver condiciones"/> 
           <script type="text/javascript" language="JavaScript">
          $("#con1").click(function () {
         alert("La estadía NO puede ser mayor a 31 días, ni menor a 2 días.\n\nSi desea reservar mas de 31 dias debera hacer una nueva reservacion.");
          });
         </script><br/><br/>

		       <label class ="control-label">Fecha de entrada :</label><br/>
            <input id="from" name="from" type="text"  placeholder="Seleccionar" required=""/>
            <br/><br/>
            <label class ="control-label">Fecha de salida :</label><br/>
            <input id="to" name="to" type="text"  placeholder="Seleccionar" required=""/>
            <br/><br/>
            <h4>2. Detalles de habitacion</h4>
            <input type="submit" id="con2" value="Ver condiciones"/> 
            <script type="text/javascript" language="JavaScript">
            $("#con2").click(function () {
            alert("Número máximo de camas supletorias o cunas en la habitación: 1.\n\nLas camas supletorias y/o cunas están disponibles bajo petición y deben ser confirmadas por el alojamiento.\n\nLos suplementos no se calculan automáticamente en el importe total y deben pagarse por separado durante la estancia.");
            });
            </script><br/><br/>
           
	         <label class ="control-label">Tipo de habitacion :</label><br/>
		        <select id="t_hab" name="t_hab" style="height:30px" required=""/>
            <option value="">Elejir...</option>
            <option value="sencilla">Estandar (1 cama king)</option>
            <option value="doble">Doble (2 camas dobles)</option>
            </select>
            <br/><br/>

	         <label class ="control-label">Deseas adicionar una cama/cuna extra? :</label><br/>
		        <select id="n_cama" name="c_extra" style="height:30px">
            <option value="">Ninguna...</option>
		        <option value="cama">Una cama adicional</option>
            <option value="cuna">Una cuna adicional</option>
            </select>
            <br/><br/>

           <label class ="control-label">Tipo de balcon :</label><br/>
		        <select id="t_balcon" name="t_balcon" style="height:30px" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Vista a la piscina</option>
            <option value="2">Vista al jardin</option>
            </select>
            <br/><br/>

          <h4>3. Detalle de Huespedes</h4>
          <input type="button" id="con3" value="Ver condiciones"/> 
          <script type="text/javascript" language="JavaScript">
          $("#con3").click(function () {
          alert("¡Gratis! Hasta 2 menores de 3 años se pueden alojar gratis en cunas.\n\nHasta 2 niños de 3 a 11 años se pueden alojar por 60 USD por noche utilizando las camas existentes.\n\nHasta 2 niños mayores de esa edad o adultos se pueden alojar por 158 USD por noche utilizando las camas existentes.");
          });
          </script><br/><br/>
 
    <!--**************************************** CARRITO *********************************************************-->

<script type="text/javascript" language="JavaScript">
  $("#t_hab").change(function() {
     var val = $(this).val();
     $("#hab").val(val);
  });
  $("#n_cama").change(function() {
     var val = $(this).val();
     $("#c_extra").val(val);
  })
  $("#t_balcon").change(function() {
     var val = $(this).val();
     $("#tbal").val(val);
  })
   </script>
    <!-- ********************************************CARRITO******************************************************* -->

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
<!-- ****************************************************************************************************-->
      <label class ="control-label">Huespedes a registar en habitacion :</label><br/>
	    <select id="acomp" name="n_acomp" style="height:30px" onchange='document.reserva.thues.value=this.options[this.options.selectedIndex].value'>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      </select><br/><br/>
      
    <div id="reg1Acomp">
      <h4> Datos huesped:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_1" class="input_letras" maxlength="30" placeholder="Nombres" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_1" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero1" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
    </div>

    <div id="reg2Acomp">
      <h4> Datos huesped 1:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_1" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_1" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero1" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px" required=""/>
           <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select><br/>
      <h4> Datos huesped 2:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_2" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_2" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero2" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
    </div>

    <div id="reg3Acomp">
      <h4> Datos huesped 1:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_1" class="input_letras"maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_1" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero1" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
      <h4> Datos huesped 2:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_2" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_2" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero2" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
      <h4> Datos huesped 3:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_3" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_3" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero3" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero3" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
    </div>
  
<div id="reg4Acomp">
      <h4> Datos huesped 1:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_1" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_1" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero1" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero1" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
      <h4> Datos huesped 2:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_2" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_2" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero2" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero2" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
      <h4> Datos huesped 3:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_3" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_3" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero3" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero3" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_1" name="edad_acom_1" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
      <h4> Datos huesped 4:</h4>
      <label class ="control-label">Nombres :</label><br/>
      <input type="text" name="nom_acom_4" class="input_letras" maxlength="30" placeholder="Nombre" required=""/>
      <br/><br/>
      <label class ="control-label">Apellidos :</label><br/>
      <input type="text" name="ape_acom_4" class="input_letras" maxlength="30" placeholder="Apellidos" required=""/>
      <br/><br/>
      <label class ="control-label">Genero :</label><br/>
      <input type="radio" name="genero4" value="Hombre" checked="checked">Hombre
      <input type="radio" name="genero4" value="Mujer">Mujer
      <br/><br/>
      <label class ="control-label">Rango de edad :</label><br/>
      <select id="edad_acom_4" name="edad_acom_4" style="height:30px"  required=""/>
            <option value="">Elejir...</option>
            <option value="1">Niño/a menor de 3 años</option>
            <option value="2">Niño/a de 3 a 11 años</option>
            <option value="3">Adulto</option>
      </select>
    </div>
<br/>
<input type="submit" value="Realizar reservacion" style="font-face: 'Comic Sans MS'; font-size: larger; color: white; background-color: #289510; border: 5pt ridge lightgrey">
<br/><br/>
</form>
    </div> 
 <!-- **********************************FORMULARIO********************************************* -->  
 
     </div>
<!-- jQuery Version 1.11.1 -->
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<!-- jQuery Version 1.11.1 -->

</body>
</html>
