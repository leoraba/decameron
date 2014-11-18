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
<div class="container"><!-- **********************************PREVIEW********************************************* -->  
   <div class="row"> 
      <a title="Inicio" href="index.php"><img src="img/logo.png" width="150" height="50" href:"index.php"/></a><br/><br/>
    
<!-- **********************************FORMULARIO********************************************* -->  
<form id="reserva" name="reserva" action="insert_reserva.php" method="post">

     <table class="table table-striped table-bordered" cellspacing="1" width="100">
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
            <td ><input id="entrada" type="text" readonly></td>
            <td ><input id="salida" type="text" readonly></td>
            <td ><input id="hab" type="text" readonly></td>
            <td ><input id="c_extra" type="text" readonly></td>
            <td ><input id="tbal" type="text" readonly></td>
            <td ><input id="thues" name="thues" type="text" readonly></td>
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
         </script><br/>

		       <span><br/>Entrada:&nbsp;</span>
            <input id="from" name="from" class="form-control" type="text" placeholder="Seleccionar" required=""/>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;Salida:&nbsp;</span>
            <input id="to" name="to" class="form-control" type="text" placeholder="Seleccionar" required=""/>
  
            <h4>2. Detalles de habitacion</h4>
            <input type="submit" id="con2" value="Ver condiciones"/> 
            <script type="text/javascript" language="JavaScript">
            $("#con2").click(function () {
            alert("Número máximo de camas supletorias o cunas en la habitación: 1.\n\nLas camas supletorias y/o cunas están disponibles bajo petición y deben ser confirmadas por el alojamiento.\n\nLos suplementos no se calculan automáticamente en el importe total y deben pagarse por separado durante la estancia.");
            });
            </script><br/>
           
	         <span><br/>Tipo:</span>
		        <select id="t_hab" name="t_hab" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="sencilla">Estandar (1 cama king)</option>
            <option value="doble">Doble (2 camas dobles)</option>
            </select>

	         <span>&nbsp;&nbsp;&nbsp;Cama extra?</span>
		        <select id="n_cama" name="c_extra" class="form-control">
            <option value="">Ninguna...</option>
		        <option value="si">Una cama adicional</option>
            <option value="no">Una cuna adicional</option>
            </select>

           <span>&nbsp;&nbsp;&nbsp;Tipo de balcon:</span>
		        <select id="t_balcon" name="t_balcon" class="form-control" required=""/>
            <option value="">Elejir...</option>
            <option value="1">Vista a la piscina</option>
            <option value="2">Vista al jardin</option>
            </select>

          <h4>3. Detalle de Huespedes</h4>
          <input type="button" id="con3" value="Ver condiciones"/> 
          <script type="text/javascript" language="JavaScript">
          $("#con3").click(function () {
          alert("¡Gratis! Hasta 2 menores de 3 años se pueden alojar gratis en cunas.\n\nHasta 2 niños de 3 a 11 años se pueden alojar por 60 USD por noche utilizando las camas existentes.\n\nHasta 2 niños mayores de esa edad o adultos se pueden alojar por 158 USD por noche utilizando las camas existentes.");
          });
          </script>
 
    <!--**************************************** CARRITO *********************************************************-->
   <script type="text/javascript" language="JavaScript">
  $("#from").on("focusout ", function(){
     var val = $(this).val();
     val=$("#entrada").val(val);
  })
  </script>

  <script type="text/javascript" language="JavaScript">
  $("#to").on("focusout ", function(){
     var val = $(this).val();
     val=$("#salida").val(val);
  })
</script>

<script type="text/javascript" language="JavaScript">
  $("#t_hab").on("focusout ", function(){
     var val = $(this).val();
     val=$("#hab").val(val);
  })
   </script>

   <script type="text/javascript" language="JavaScript">
  $("#n_cama").on("focusout ", function(){
     var val = $(this).val();
     val=$("#c_extra").val(val);
  })
   </script>

   <script type="text/javascript" language="JavaScript">
  $("#t_balcon").on("focusout ", function(){
     var val = $(this).val();
     val=$("#tbal").val(val);
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
<!-- ghfssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->
      <header><br/>Huespedes por habitacion</header>
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
 <!-- **********************************FORMULARIO********************************************* -->  
 
     </div>

</body>
</html>
