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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/validaciones.js"></script>

  <script type="text/javascript" language="JavaScript">
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');

    var checkPasswordValidity = function() {
        if (password1.value != password2.value) {
            password1.setCustomValidity('Las contrasenas no coinciden.');
        } else {
            password1.setCustomValidity('');
        }        
    };

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
</script>
<style>
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
      

        <div class="container">  
<a title="Inicio" href="index.php"><img src="img/logo.png" width="150" height="50" href:"index.php"/></a><br/>            
  <h3>Crear tu cuenta</h3>
                
<form action="insert_registro.php" method="post">
  <header>Nombres:</header>
  <input type="text" name="nombres" maxlength="30" placeholder="Tus nombres">
   <!---- Nombre---->

   <!---- Apellido---->
<header>Apellidos:</header>
    <input type="text" name="apellidos" maxlength="30" placeholder="Tus apellidos">
   <!---- Apellido---->


   <!---- Email---->
<header>Email:</header>
    <input type="email" name="email" maxlength="30" placeholder="Tu correo electronico">
  <!---- genero---->

<header>Genero:</header>
<input type="radio" name="genero" value="Hombre">Hombre<br>
<input type="radio" name="genero" value="Mujer">Mujer<br><br/>
  <!---- genero---->

<!---- Email---->
<header># de documento:</header>
    <input type="text" name="num_documento" maxlength="30" placeholder="# de documento">
  <!---- genero---->

  <!---- Email---->
<header>Fecha de nacimiento:</header>
<input type="date" name="fecha_nacimiento"><br/>
  <!---- genero---->

  <header>Usuario:</header>
    <input type="text" name="usuario" maxlength="30" placeholder="Usuario">
   <!---- Apellido---->

<header>Contrasena:</header>
  <input type="password" name="contra" required id="password1"  pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/>
            
<header>Repetir contrasena:</header>
<input type="password" name="rcontra" required id="password2" pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/> 

  <input type="submit">

    <a href="login.html">Ya tienes una cuenta? Iniciar sesion</a>
    </form>
                                <!---- password validation---->
 
</body>
</html>     	