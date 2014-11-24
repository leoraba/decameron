<?php
include("../includes/conexion.php");
?>
<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Royal Decameron</title>
<meta name="viewport" content="width=device-width, ininitial-scale=1.0">

<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->

<!---- Bootstrap---->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/bootstrapValidator.min.css"/>
<link href="../css/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
<script src="js/validaciones.js"></script>
<!-- Datepicker JavaScript -->
<script src="css/datepicker.js"></script>

<!--************************* Validar que los passwords coinciden **********************-->
  <script type="text/javascript" language="JavaScript">
    $(document).ready(function(){
      var password1 = document.getElementById('password1');
      var password2 = document.getElementById('password2');

      password1.addEventListener('change', checkPasswordValidity, false);
      password2.addEventListener('change', checkPasswordValidity, false);

      var form = document.getElementById('passwordForm');
      form.addEventListener('submit', function() {
          checkPasswordValidity();
          if (!this.checkValidity()) {
              event.preventDefault();
              //Implement you own means of displaying error messages to the user here.
              password1.focus();
          }
      }, false);

      $('#fecha_nacimiento').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            todayBtn: true,
            autoclose: true,
            todayHighlight: true
      });
    });

    var checkPasswordValidity = function() {
        if (password1.value != password2.value) {
            password1.setCustomValidity('Las contrasenas no coinciden.');
        } else {
            password1.setCustomValidity('');
        }        
    };
</script>

<!--*************************** Validar nombre y apellido *************************-->
<script type="text/javascript" language="JavaScript">
      function sololetras(e){
        key=e.keyCode || e.witch;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" abcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;

        for (var i in especiales){
        if (key==especiales[i]){
        teclado_especial=true;
        break;
         }
        }

        if (letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
          }
         }
</script>

<!--************************ Validar nombre de usuario *********************-->
<script type="text/javascript">
$(document).ready(function() {    
    $('#usuario').blur(function(){

        $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

        var username = $(this).val();        
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>

<!--***************** Validar fecha de nacimiento ******************-->
<script>
$(function () {
$("#fecha_nacimiento").datepicker({
maxDate: 'today',
onClose: function (selectedDate) {
$("#fecha_nacimiento").datepicker("option", "maxDate", selectedDate);
}
});
});
</script>

</head>
<!-- ****************************************************************************************** -->
<body>
    <div class="container">
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">           
      <header>Crear tu cuenta</header>
      <!-- **********************************FORMULARIO********************************************* -->          
      <form action="insert_registro.php" method="post" id="passwordForm">
      <header>Nombres:</header>
      <input type="text" name="nombres" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus nombres" required="" />
      
      <header>Apellidos:</header>
      <input type="text" name="apellidos" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus apellidos" required="" />

      <header>Email:</header>
      <input type="email" name="email" maxlength="30" placeholder="Tu correo electronico" required="" />

      <header>Genero:</header>
      <input type="radio" name="genero" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero" value="Mujer">Mujer<br><br/>

      <header>Pais:</header>
      <select name="cmbPais" id="cmbPais" required="" />
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_pais, nombre_pais FROM PAIS ORDER BY nombre_pais ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_pais']."'>".$row['nombre_pais']."</option>";
              }
          ?>
      </select>

      <header>Tipo de documento:</header>
      <select name="cmbTipoDocumento" id="cmbTipoDocumento">
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>";
              }
          ?>
      </select>

      <header># de documento:</header>
      <input type="text" name="num_documento" maxlength="20" placeholder="# de documento">

      <header># Telefono:</header>
      <input type='number' name="num_telefono" maxlength="10" placeholder="# de telefono">

      <header>Fecha de nacimiento:</header>
      <div class='input-group date' id="fecha_nacimiento">
          <input type='text' class="form-control" name="fecha_nacimiento" required="" />
          <span class="input-group-addon">
              <span class="fa fa-calendar"></span>
          </span>
      </div>

      <header>Usuario:</header>
      <input type="text" name="usuario" maxlength="30" placeholder="Usuario" required="" />

      <header>Contrasena:</header>
      <input type="password" name="contra" required id="password1"  pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/>
            
      <header>Repetir contrasena:</header>
      <input type="password" name="rcontra" required id="password2" pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/> 

      <input type="submit" value="enviar">
      <!-- **********************************FORMULARIO********************************************* -->     

      <a href="login.php">Ya tienes una cuenta? Iniciar sesion</a>
    </form>
  </div> 
</div> 
</body>
</html>     	